@extends('posts/master')

@section('content') 
    <h1>新規でユーザーを作成するよ</h1>
    
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
                <option>admin</option>
                <option>operator</option>
            </select>
            <button>register</button>
        </form>
    </div>

    @include('posts/error')
@endsection 