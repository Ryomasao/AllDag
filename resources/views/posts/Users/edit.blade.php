@extends('posts/master')

@section('content') 
    <h1>ここは登録されているユーザーを編集する画面だよ</h1>
    
    <label for="name">やあ、{{ $user->name}} さん</label>
    <div class="register">
        <form action="/posts/admin/users/{{$user->id}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }} 
            <label for="email">email</label>
            <input name="email" type="email" value="{{ $user->email }}">
            <label for="text">role</label>
            <select name="role">
                <option>admin</option>
                <option>operator</option>
            </select>
            <button>register</button>
        </form>
    </div>

    @include('posts/error')
@endsection 