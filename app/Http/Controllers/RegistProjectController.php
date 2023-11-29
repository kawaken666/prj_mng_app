<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

 /**
  * プロジェクト登録コントローラー
  */
class RegistProjectController extends Controller
{
    /**
     * 初期表示メソッド
     */
    public function index(){
        return view('registProject');
    }
}
