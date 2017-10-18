<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::resource('projects', 'ProjectsController');
Route::resource('dummyprojects', 'DummyProjectsController');

//Route::get('/projects/create','ProjectsController@create');
//Route::post('/projects','ProjectsController@store');

Route::get('/statuses',function(){
    return App\Status::with('user')->latest()->get();
});


//AllDugのTopページを作成するよ！
Route::get('/alldug',function(){
    return view('alldug.app');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//routerがものっそい長くなるので、コントローラを作ろう
Route::get('/tasks','TaskController@index');


//{task}というモデルがあると、URLに入力した数字ではなく、入力した数字に紐づくインスタンスを渡すらしい
Route::get('/tasks/{task}','TaskController@show');


//新たにpostパターンをやる
Route::get('/posts','PostsController@index');


//こういうルーティングの場合どうすんだろ。逆になると、createもshowになっちゃうよ。
Route::get('/posts/create','PostsController@create');
Route::get('/posts/{post}','PostsController@show');


//post/createがなんとなくpostするURLな気もするんだけれども違うんだね
Route::post('/posts','PostsController@store');

//commentをできるようにするよ
Route::post('/posts/{post}/comments','CommentsController@store');



/* 
今更だけど、
controller : PostsController 単数
model : Post 単数
table : Posts 複数形

php artisan make:controller PostsController
php artisan make:model Post
php artisan make:migration create_posts_table --create=posts

//モデルとテーブルを一緒につくる。テーブル名は勝手に複数形にしてくれるみたい
php artisan make:model Post -mc 

*/



/*

use App\Task;

Route::get('/tasks',function(){

    //DB:table('projects')->get();
    //getじゃなくてallでいいよ！違いはよくわからないよ！
    //$tasks = DB::table('tasks')->all();
    
    //Taskモデル(ただし空っぽ)を作成したので、DB:tableじゃなくて、App\Task::all()で書こう！
    //$tasks = App\Task::all();
    
    //いっそのこと、namespaceを定義しよう！
    $tasks = Task::all();

    return view('tasks.index',compact('tasks'));
});

Route::get('/tasks/{id}',function($id){

    //DB:table('projects')->get();
    //$task = DB::table('tasks')->find($id);
    $task = Task::find($id);


    //dd($task);

    return view('tasks.show',compact('task'));
});

*/

