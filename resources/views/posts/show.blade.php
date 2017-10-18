@extends('posts/master')


@section('content') 
    <h1> place to show the post</h1>

    <h2>title:{{$post->title}}</h2>
    <h3>body:{{$post->body}}</h3>

@endsection 