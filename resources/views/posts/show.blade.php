@extends('posts/master')


@section('content') 
    <h1> place to show the post</h1>

    <h2>title:{{$post->title}}</h2>
    <h3>body:{{$post->body}}</h3>

    <div class="comment">
        @foreach($post->comments as $comment)
        <hr>
        <article>
            {{ $comment->body }}
        </article>
        @endforeach
    </div>

    <hr>

    <div class="do_comment">
        <form action="{{ $post->id }}/comments" method="POST">
            {{ csrf_field() }}
            <textarea name="body"  cols="30" rows="10" placeholder="enter your comment"></textarea>
            <br/>
            <button>doComment!</button>
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