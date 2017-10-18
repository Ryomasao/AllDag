<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    //commentだからcommentインスタンスを渡すとおもったら。。。
    public function store(Post $post)
    {
        
        
        $this->validate(request(),[
            'body' => 'required'
        ]);

        //このへんのロジックは、postのaddcommentにあったほうがいいじゃない！っていう話
        $post->addComment(request('body'));
        /*

        //lessonだとモデルにマスアサイントメントを適用していないのにうまくいってる。なんでだろ。
        Comment::create([
            'body' => request('body'),
            'post_id' => $post->id ,
            'user_id' => $post->id
        ]);

        */


        //redirect('/posts/'.$post->id);
        //もとに戻すのにこんな関数が！
        return back();

    }
}
