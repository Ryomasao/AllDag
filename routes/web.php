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


//routerがものっそい長くなるので、コントローラを作ろう
Route::get('/tasks','TaskController@index');


//{task}というモデルがあると、URLに入力した数字ではなく、入力した数字に紐づくインスタンスを渡すらしい
Route::get('/tasks/{task}','TaskController@show');


//新たにpostパターンをやる
Route::get('/posts','PostsController@index')->name('home');

//Auth機能をつくろう
Route::get('/posts/register','RegistrationController@create');
Route::post('/posts/register','RegistrationController@store');

Route::get('/posts/login','SessionController@create')->name('login');
Route::post('/posts/login','SessionController@store');

Route::get('/posts/logout','SessionController@destroy');



//こういうルーティングの場合どうすんだろ。逆になると、createもshowになっちゃうよ。
Route::get('/posts/create','PostsController@create');
Route::get('/posts/{post}','PostsController@show');


//post/createがなんとなくpostするURLな気もするんだけれども違うんだね
Route::post('/posts','PostsController@store');

//commentをできるようにするよ
Route::post('/posts/{post}/comments','CommentsController@store');


//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

//ユーザーを管理するURI
Route::get('/posts/admin/users','UserController@index');

/*一覧画面から直接編集画面を開く場合って、
以下のようにeditを用意すると、users/1/とかにアクセスした場合も考慮しなきゃいけない
*/
//Route::get('/posts/admin/users/{user}/edit','UserController@edit');

Route::get('/posts/admin/users/create','UserController@create');
Route::post('/posts/admin/users','UserController@store');

Route::get('/posts/admin/users/{user}','UserController@edit');
Route::patch('/posts/admin/users/{user}','UserController@update');
Route::delete('/posts/admin/users/{user}','UserController@destroy');


//uploadを試してみよう　
Route::get('/posts/admin/items','ItemController@index');
Route::post('/posts/admin/items/upload','ItemController@store');


//ServiceProviderを試してみよう
use App\myclass\Messenger\Messenger;
Route::get('send_message/{message}', function(Messenger $messenger, $message){
    return $messenger->sendMessage($message);
});

//DIを個別でやった
Route::get('/human', 'DITest\ScheduleController@view');

//pugでやるのかvueでやるのか、bladeでやるのか
Route::get('/sidebar_blade', function(){
    return view('sidebar_blade/app');
});

//coupon_admin
Route::get('/coupon_admin', function(){
    return view('coupon_admin/toppage');
});


//adminだけが見れるページ

/*
Route::group( ['middleware' => ['auth', 'can:admin']], function(){
    Route::get('/posts/admin/admin',function(){
        return 'Only Amin Page';
    });
} );
*/

Route::group( ['middleware' => ['auth', 'can:admin']], function(){
    Route::get('posts/admin/admin', 'SecretController@index');
});


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

