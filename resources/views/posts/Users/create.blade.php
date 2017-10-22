@extends('posts/master')

@section('content') 
    <h1>新規でユーザーを作成するよ</h1>
    <h1><a href="/posts/admin/users">戻る</a></h1>
    <div class="register">
        <form action="/posts/admin/users" method="POST">
            {{ csrf_field() }}
            <label for="name">name</label>
            <input name="name" type="text">
            <label for="email">email</label>
            <input name="email" type="email">
            <label for="password">password</label>
            <input name="password" type="password">
            <select name="role">
            @foreach(Config::get('const.role') as $role)
                    <option>{{$role}}</option>
            @endforeach
            </select>
            <button>register</button>
        </form>
    </div>

    @include('posts/error')
@endsection 