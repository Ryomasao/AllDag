@extends('posts/master')


@section('content') 
    <h1>やあ、ここはいろんなアクションができるページだよ</h1>
    <ul>
        <li><a href="/create">記事を投稿する</a></li>
        <li><a href="">新規にユーザーを作成する</a></li>
        <li><a href="/logout">ログアウト</a></li>
    </ul>

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