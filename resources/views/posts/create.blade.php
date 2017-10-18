@extends('posts/master')


@section('content') 
    <h1> place to create the post</h1>

    <hr>

    <!--formに関して言えば、method actionが一番大事な気がする -->
    <form method="POST" action="/posts">
        {{ csrf_field() }}
        <div class="form-gruop">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">

        </div>

        <div class="form-gruop">
            <label for="body">Body</label>
            <textarea id="body" name="body"></textarea>
        </div>

        <button type="submit">Publish</button>
    </form>

    @if(count($errors))
        <div class="error">
            <h1>errorがある</h1>
            <ul>
                @foreach($errors->all() as $error) 
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div> 
    @endif
@endsection 