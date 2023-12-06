<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

 /**
  * プロジェクトコントローラー
  */
class ProjectController extends Controller
{
    /**
     * 登録画面表示
     */
    public function create(){
        return view('project.register');
    }

    /**
     * 登録処理
     */
    public function store(Request $request)
    {   
        //TODO プロジェクト登録処理を実装する
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);   
    }
}