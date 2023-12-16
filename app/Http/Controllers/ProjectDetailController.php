<?php

namespace App\Http\Controllers;

use App\Models\ProjectDetail;
use Illuminate\Http\Request;

class ProjectDetailController extends Controller
{
    /**
     * 初期表示メソッド
     */
    public function index(Request $request){
        // プロジェクト詳細とそれに紐づくメンバーごとの詳細をDBから取得
        $projectDetailInfo = ProjectDetail::
                        leftjoin('project_member_details', 'project_details.project_detail_id', '=', 'project_member_details.project_detail_id')
                        ->join('users', 'project_member_details.user_id', '=', 'users.id')
                        ->select('project_details.status', 'project_details.overview', 'project_details.date', 'project_member_details.result_man_hour', 'project_member_details.overview', 'users.name')
                        ->where('project_details.project_detail_id', $request->id)
                        ->get();

        dd($projectDetailInfo);

        return view('project.projectDetail', ['projectDetailInfo' => $projectDetailInfo]);
    }
}
