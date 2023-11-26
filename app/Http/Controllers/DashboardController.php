<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class DashboardController extends Controller
{
    /**
     * ダッシュボード表示メソッド
     */
    public function index(Request $request){
        //Project全件取得
        $projects = Project::all();
        return view('dashboard', ['projects' => $projects]);
    }
}
