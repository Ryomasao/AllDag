<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function __construct()
    {
        error_log("Session Controller is generated");

        //うーん、これはIfAnなんちゃらRedirectをやってる
        //役割としてすでにログインしている場合に、ログイン画面にいった場合、
        //すでに認証しているので、ログイン画面には遷移しないことをやってるのかな？

        //リダイレクト先は、
        //c:\Users\yamauchi.ryoji\vagrant\centos\share\vue-app\app\Http\Middleware\RedirectIfAuthenticated.php
        //にハードコーディングされている。

        $this->middleware('guest',['except' => 'destroy']);

        //destroyを対象外としているのは。logout処理を行いたいのに
        //君は認証済みだからそこにはいかなくていいよね！ってなっちゃうので対象外にする必要がある。

    }

    //GET post/login
    public function create(){

        return view('posts.sessions.create');
    }

    //POST post/login
    public function store(){
        //loginに挑戦

        error_log("attempt login");


        if(!  auth()->attempt(request(['email', 'password'])) ){
          error_log("login failed");

          return back()->withErrors([
              'message' => 'Please Check your credentials and try again'
          ]);
        }

        error_log("login success");

        //loginに成功した場合、wep.phpのname('home')にとばす
        return redirect()->home();
    }




    //GET post/logout
    public function destroy(){
        

        auth()->logout();

        return redirect()->home();
    }

}
