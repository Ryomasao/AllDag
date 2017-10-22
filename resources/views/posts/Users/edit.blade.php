@extends('posts/master')

@section('content') 
    <h1>ここは登録されているユーザーを編集する画面だよ</h1>
    <h1><a href="/posts/admin/users">戻る</a></h1>
    <label for="name">やあ、{{ $user->name}} さん</label>
    <div class="register">
        <form action="/posts/admin/users/{{$user->id}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }} 
            <label for="email">email</label>
            <input name="email" type="email" value="{{ $user->email }}">
            <label for="text">role</label>
            <select name="role">
            @foreach(Config::get('const.role') as $role)
                @if($user->role == $role)
                    <option selected>{{$role}}</option>
                @else
                    <option>{{$role}}</option>
                @endif
            @endforeach
            </select>
            <button>register</button>
        </form>
    </div>

    @include('posts/error')
@endsection 