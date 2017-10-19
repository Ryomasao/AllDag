@extends('posts/master')


@section('content') 
    <h1>ここはユーザー登録画面です</h1>
    <div class="register">
        <form action="/posts/register" method="POST">
            {{ csrf_field() }}
            <label for="name">Name</label>
            <input name="name" type="text">
            <label for="email">email</label>
            <input name="email" type="email">
            <label for="password">password</label>
            <input name="password" type="password">
            <br/>
            <button>register</button>
        </form>
    </div>


    @if(count($errors) > 0)
        <div>
            <h1>error</h1>
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

@endsection 