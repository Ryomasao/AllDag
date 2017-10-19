<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function create(){

        return view('posts/register');
    }

    public function store(){


        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);


        //$user =  User::create(request(['name', 'email', 'password']));


        //laravelのauth->attempsを使うときは、bcryptでpasswordを暗号化しとかないと一致しないという罠に
        $user =  User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);


        //\Request::input
        //request()
        //\Auth::login();

        //auth機能をつかうみたい
        auth()->login($user);


        //web.phpで->name('home')としたところでリダイレクトする。home以外の名前に飛ばしたいんだけれもどうすればいいんだろ。
        return redirect()->home();

    }


}
