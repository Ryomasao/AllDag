<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    //
    public function index()
    {

        /*
        where とか allとかのメソッド。ここに定義がある！
         */
        //\vendor\laravel\framework\src\Illuminate\Database\Query\Builder.php
        //$posts = Post::all();

        //getが必要かどうかってまだよくわかんないや。少なくともlatestだけじゃだめ。
        $posts = Post::latest()->get();


        return view('posts.index',compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }


    //新しくつくりたいときはこれ！
    //POST
    public function store()
    {
       //ddはlaravelのヘルパ関数でデバックの機能を有しているみたい。
       //dd(request()->all());

       /*
        $post = new Post();

        $post->title = request('title');
        $post->body = request('body');
    
        $post->save();
        */

        //上記をまとめてこうかける。
        //ただ、マスアサインメント機能によって、エラーのなる。

        //マスアサインメント機能はがわかりやすい
        //https://laravel10.wordpress.com/2015/03/02/%E5%88%9D%E3%82%81%E3%81%A6%E3%81%AElaravel-5-11-eloquent-%E3%83%9E%E3%82%B9%E3%82%A2%E3%82%B5%E3%82%A4%E3%83%B3%E3%83%A1%E3%83%B3%E3%83%88/

        //簡単に書くと、request()->all()を使うと、postデータを連想配列の形式で取得することができる。(::createに渡す形式そのまま！)
        //なので、Post::create( request()->all() ) ってかいてあげれば、一行で更新処理がかける。
        //でも、postデータに不正リクエスト(うーんどうやるんだろう)はあった場合、formからは更新しないカラムも更新されちゃう可能性がある。
        //なので、事前に更新できるやつをモデルで宣言しとくんだ。


        /*
        Post::create([
            'title' => request('title'),
            'body' => request('body')
        ]);
        */


        //モデルに定義したので試しに ←いけた
        /*
        Post::create(request()->all());
        */

        //validate
        /*
        今はvalidationを何もやってない。
        テーブルを作る際に、body tiitleはnullを許容しない設定になるので、expceptionが発生しちゃう。
        ブラウザ側でrequireする方法もあるけれども、そもそも不正なリクエストを考えると、サーバー側でやったほうがいいんだよね。
         */
        
        $this->validate(request(),[
            'title' => 'required',
            'body'  => 'required'
        ]);

        //ちょっとまって！マスアサインメントしたから？こうかけるかも
        Post::create(request(['title', 'body']));

        return redirect('posts');






    }
}