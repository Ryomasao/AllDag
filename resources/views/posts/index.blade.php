@extends('posts/master')


@section('content') 
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
                <span>{{$post->created_at->toFormattedDateString() }}</span>
            </li>
        @endforeach
    </ul>

@endsection 