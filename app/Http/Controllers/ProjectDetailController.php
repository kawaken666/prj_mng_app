<?php

namespace App\Http\Controllers;

use App\Models\ProjectDetail;
use App\Models\ProjectMember;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ProjectDetailController extends Controller
{
    /**
     * 初期表示メソッド
     */
    public function index(Request $request){
        // 日付設定。初回遷移時は当日を設定する。
        $date = (isset($request->date)) ? $request->date : date('Y-m-d');

        // プロジェクトメンバー情報を取得
        $projectMemberInfo = ProjectMember::
                        leftjoin('users', 'project_members.user_id', '=', 'users.id')
                        ->select('name')
                        ->where('project_id', $request->id)
                        ->get();


        // プロジェクト詳細とそれに紐づくメンバーごとの詳細をDBから取得
        $projectDetailInfo = ProjectDetail::
                        leftjoin('project_member_details', 'project_details.project_detail_id', '=', 'project_member_details.project_detail_id')
                        ->join('users', 'project_member_details.user_id', '=', 'users.id')
                        ->select('project_details.status', 'project_details.overview as projectOverview', 'project_details.date', 'project_member_details.result_man_hour', 'project_member_details.overview as memberOverview', 'users.name')
                        ->where('project_details.project_detail_id', $request->id)
                        ->where('date', $date)
                        ->get();
        
        if(!($projectDetailInfo->isEmpty())){
            // 対象日付のプロジェクト詳細が登録されていた場合
            // statusのコード値をコード名称に変換
             switch ($projectDetailInfo[0]->status) {
                 case 0:
                     $projectDetailInfo[0]->status = 'オンスケ';
                     break;
                 case 1:
                     $projectDetailInfo[0]->status = '遅延';
                     break;
                 case 2:
                     $projectDetailInfo[0]->status = '前倒し';
                     break;
                 default:
                     $projectDetailInfo[0]->status = '登録なし';
                     break;
             }
        }else{
            // 対象日付のプロジェクト詳細が登録されてない場合
            foreach($projectMemberInfo as $info){
                // 登録がなかった場合のモデルインスタンス生成処理
                $projectDetailInfo[] = new ProjectDetail([
                    'date' => $date,
                    'status' => '登録なし',
                    'projectOverview' => '',
                    'name' => $info->name,
                    'result_man_hour' => '',
                    'memberOverview' => ''
                ]);
            }
        }
        return view('project.projectDetail', ['projectDetailInfo' => $projectDetailInfo]);
    }
}
