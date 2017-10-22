@extends('posts/master')


@section('content') 
    <h1>やあ、ここはいろんなアクションができるページだよ</h1>
    <h1>とはいえ、ログインしないと、投稿データの一覧しか管理できないんだ</h1>

    <h1>新しいユーザーをつくるのにもログインしてほしいな。</h1>
    <h1>それだと困るって場合は<a href="/posts/register">ここに用意したよ。</a></h1>
    <br/>
    <ul>
        @if(Auth::Check())
            <li><a href="/posts/create">記事を投稿する</a></li>
            <li><a href="/posts/logout">ログアウト</a></li>
            @can('admin')
            <li><a href="/posts/admin/users">ユーザーを管理する</a></li>
            <li><a href="/posts/admin/admin">アドミンユーザーのみ実行できるよ</a></li>
            @endcan
            @can('operator')
            <li>operatorのみ表示</li>
            @endcan
            @can('user')
            <li>userのみ表示</li>
            @endcan
        @else
            <li><a href="/posts/login">ログイン</a></li>
        @endif
    </ul>

    <hr>
    <h1>投稿したデータ一覧はこんな感じ</h1>
    
    <ul>
        @foreach($posts as $post)
            <li>
                <span>
                <a href="posts/{{ $post->id }}">
                {{$post->title.":"}}
                </a>
                </span>
                <span>{{$post->body.":"}}</span>
                <span>{{$post->user->name }}</span>
                <span>{{$post->created_at->toFormattedDateString() }}</span>
            </li>
        @endforeach
    </ul>

@endsection