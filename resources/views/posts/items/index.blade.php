@extends('posts/master')

@section('content') 
    <h1>やあ、ここはファイルをアップロードする画面だよ</h1>
    <div>
        <form method="post" action="/posts/admin/items/upload" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label>ファイル:</label>
            <input type="file" name="up_file">
            <br/>
            <button>upload</button>
        </form> 
    </div>
    <h1><a href="/posts">戻る</a></h1>
@endsection
