<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\ProjectDetailRequest;
use App\Models\Project;
use App\Models\ProjectDetail;
use App\Models\ProjectMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectDetailController extends Controller
{
    /**
     * 初期表示メソッド
     */
    public function index(ProjectDetailRequest $request, $id){
        // 対象プロジェクト存在チェック
        $project = Project::where('project_id', $id)->get();
        // 存在しない場合、ダッシュボードにリダイレクト                
        if($project->isEmpty()){
            Log::debug('プロジェクト未存在');
            return redirect('dashboard');
        }

        // 日付設定（フォームに対象日付がない場合は当日）
        $targetDate = (isset($request->targetDate)) ? $request->targetDate : date('Y-m-d');

        // プロジェクト詳細とそれに紐づくメンバーごとの状況詳細を取得
        $projectDetail = ProjectDetail::
                        leftjoin('project_member_details', 'project_details.project_detail_id', '=', 'project_member_details.project_detail_id')
                        ->join('users', 'project_member_details.user_id', '=', 'users.id')
                        ->select('project_id', 'project_details.status', 'project_details.overview as projectOverview', 'project_details.date', 'project_member_details.result_man_hour', 'project_member_details.overview as memberOverview', 'users.name')
                        ->where('project_details.project_detail_id', $id)
                        ->where('date', $targetDate)
                        ->get();
        
        // プロジェクトメンバー情報を取得
        $projectMember = ProjectMember::
                        leftjoin('users', 'project_members.user_id', '=', 'users.id')
                        ->select('name')
                        ->where('project_id', $id)
                        ->get();

        if($projectDetail->isNotEmpty()){
            // 対象日付のプロジェクト詳細が登録されていた場合
            // statusのコード値をコード名称に変換
             switch ($projectDetail[0]->status) {
                 case 0:
                     $projectDetail[0]->status = 'オンスケ';
                     break;
                 case 1:
                     $projectDetail[0]->status = '遅延';
                     break;
                 case 2:
                     $projectDetail[0]->status = '前倒し';
                     break;
                 default:
                     $projectDetail[0]->status = '登録なし';
                     break;
             }
        }else{
            // 対象日付のプロジェクト詳細が登録されてない場合
            foreach($projectMember as $member){
                // 登録がなかった場合のモデルインスタンス生成処理
                $projectDetail[] = new ProjectDetail([
                    'project_id' => $id,
                    'date' => $targetDate,
                    'status' => '登録なし',
                    'projectOverview' => '',
                    'name' => $member->name,
                    'result_man_hour' => '',
                    'memberOverview' => ''
                ]);
            }
        }
        return view('project.projectDetail', ['projectDetail' => $projectDetail]);
    }
}
