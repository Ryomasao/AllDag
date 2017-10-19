<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;

//日付の変換 march => 3
use carbon\carbon;

class PostsController extends Controller
{

    public function __construct(){

        error_log("PostController is generated");

        /*
        Contoroller生成時にauthを実行する。
        authは、以下の
        c:\Users\yamauchi.ryoji\vagrant\centos\share\vue-app\vendor\laravel\framework\src\Illuminate\Auth\Middleware\Authenticate.php
        handleメソッドを実行してる。

        handleメソッドでやってることがいまいちわからない。

        認証されていないと、なんやかんやで以下のunauthみたいなメソッドが実行されてリダイレクトされる。
        リダイレクト先はハードコーディングされてた。
        変更したい場合はどうするんだろう。

        c:\Users\yamauchi.ryoji\vagrant\centos\share\vue-app\vendor\laravel\framework\src\Illuminate\Foundation\Exceptions\Handler.php
        */

        //$this->middleware('auth');

        /*
        このままだと、PostContoroller配下の処理すべてについて認証が必要になる。（と思う。）
        posts/1 とか、ログインなしで参照したいものもあったりするじゃないですか。
        そういうときは、exceptが使える。
          
         */

        $this->middleware('auth')->except(['index','show']);

    }

    public function index()
    {

        /*
        where とか allとかのメソッド。ここに定義がある！
         */
        //\vendor\laravel\framework\src\Illuminate\Database\Query\Builder.php
        //$posts = Post::all();

        //getが必要かどうかってまだよくわかんないや。少なくともlatestだけじゃだめ。
        //latestって最新じゃなくって降順で全部取得だっけ？
        //$posts = Post::latest()->get();



        //以下の絞り込みがfilter機能によってなんかできるみたい
        //下のほうにscopeFilterっているからみてみ
        //filterなんかねえよ！っていわれる。。。
        
        //ごめん、scopeFilterを定義する場所はPostモデルの方だった。

        if(request(['month','year'])){
            $posts = Post::latest()->filter(request(['month','year']))->get();
        }else{
            $posts = Post::latest()->get();
        }


        //dd($posts);
        /*
        $posts = Post::latest();


        //カテゴリをしぼるみたい
        
        if ($month = request('month')){
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = request('year')){
            $posts->whereYear('created_at', $year);
        }

        $posts = $posts->get();

        */

        //これやる場合、database.phpのmysqlのstrictをfalseにする必要がある。
        /*
        $archives = Post::selectRaw('year(created_at) year ,monthname(created_at) month,day(created_at) day,count(*) published')
        ->groupBy('year','month')
        ->orderbyRaw('min(created_at) desc')
        ->get()
        ->toArray();
        */

        //リファクタリング
        $archives = Post::archives();

        //return view('posts.index',compact('posts','archives'));

        //かなり謎。AppServieProviderに、View::composer('posts.archivies',functuon~)てきなことを書いた。
        //やってることはarchives.balde.phpに値を紐付けているっぽい。

        //view composerっていう記事がある。
        //https://qiita.com/youkyll/items/c65af61eb33919b29e97
        return view('posts.index')->with('posts',$posts);
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
        //Post::create(request(['title', 'body']));

        //最終的にuser_idを設定することになったのでこうなった


        /*
        Post::create([
            'title' => request('title'),
            'body'  => request('body'),
            'user_id' => auth()->id(),
        ]);
        */

        //さらにこうなった。
        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );
        
        return redirect('posts');
    }



}
