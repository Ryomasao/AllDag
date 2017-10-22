@extends('posts/master')

@section('content') 
    <h1>やあ、ここは登録されているユーザーをすべて表示するよ</h1>
    <h1><a href="/posts">戻る</a></h1>
        @foreach($users as $user)
            <li >
                <a href="/posts/admin/users/{{ $user->id }}">
                <span>{{$user->id}}:</span>
                <span>{{$user->name}}:</span>
                <span>{{$user->email}}</span>
                <span>{{$user->role}}</span>
                <form style="display:inline" method="POST" action="/posts/admin/users/{{ $user->id }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }} 
                    <button>delete</button>
                </form>
                </a>
            </li>
        @endforeach
    </ul>

    <br/> 
    <h2><a href="/posts/admin/users/create">新規にユーザーを作成する</a></h2>
@endsection