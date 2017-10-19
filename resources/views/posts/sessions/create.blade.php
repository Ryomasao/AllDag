@extends('posts/master')


@section('content') 
    <h1>SingIn</h1>

    <hr>

    <!--formに関して言えば、method actionが一番大事な気がする -->
    <form method="POST" action="/posts/login">
        {{ csrf_field() }}
        <label for="email">email</label>
        <input name="email" type="email">
        <label for="password">password</label>
        <input name="password" type="password">
        <br/>
        <button type="submit">login</button>
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