<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\ProjectStoreRequest;
use App\Models\Project;
use App\Models\User;
use App\Models\ProjectMember;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

const FIRST_DAY_OF_THE_MONTH = '-01';

 /**
  * プロジェクトコントローラー
  */
class ProjectController extends Controller
{
    /**
     * 登録画面表示
     */
    public function create(){
        return view('project.register', ['users' => User::all() ]);
    }

    /**
     * 登録処理
     */
    public function store(ProjectStoreRequest $request){ 
        try{
            DB::beginTransaction();

            // プロジェクトの登録
            $project = new Project;
            $project->project_name = $request->projectName;
            $project->estimation = $request->estimation;
            $project->release_date = $request->releaseDate;
            $project->work_date = $request->workDate . FIRST_DAY_OF_THE_MONTH;
            $project->save();

            // 直前に登録したプロジェクトのIDを取得
            $projectId = $project->id;

            //　プロジェクトメンバーの登録
            $data = [];

            //　メンバーが単数の場合のデータ詰め
            if(!is_array($request->member)){
                array_push($data, ['user_id' => $request->member, 'project_id' => $projectId]);

            //　メンバーが複数の場合のデータ詰め
            }else{
                foreach($request->member as $member){
                    array_push($data, ['user_id' => $member, 'project_id' => $projectId]);
                }
            }
            ProjectMember::insert($data);
            
            DB::commit();

        }catch(Exception $e){
            DB::rollback();
            dd($e->getMessage()); // デバッグ用
        }

        return redirect('dashboard');   
    }
}