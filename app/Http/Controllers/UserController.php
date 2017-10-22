<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    /**
     * 登録されているユーザーをすべて取得します。
     */
    public function index()
    {
        $users = User::all();
        return view('Posts.Users.index',compact('users'));
    }

    /**
     * ユーザーを1件表示します。 いらない
     */
    /*
    public function show(User $user)
    {
        return view('Posts.Users.edit',compact('user'));
    }
    */

    /**
     * ユーザーを新規に登録するための画面を用意します。
     */
    public function create()
    {
        return view('posts.users.create');
    }

    /**
     * ユーザーを新規に登録します。
     */
    public function store()
    {


        error_log("store");

        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
            'role' => 'required',
        ]);

        $user =  User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'role' => request('role')
        ]);

        return redirect('/posts/admin/users');

    }

    /**
     * ユーザーの情報を更新するための情報を表示します。
     */
    public function edit(User $user)
    {
        return view('Posts.Users.edit',compact('user'));
    }

    /**
     * ユーザーの情報を更新するための情報を表示します。
     */
    public function update(UserRequest $request, User $user)
    {

        /*
        $request->validate([
            'email' => 'required|string|email|max:255|',
            'role' => 'required',
        ]);
        */

        $user->email =$request->email;
        $user->role =$request->role;
        $user->save();
        
        return redirect('posts/admin/users');
    }

    /**
     * ユーザーを削除します。
     */
    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect('posts/admin/users');
    }
}
