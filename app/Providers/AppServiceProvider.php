<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //View:: でもいいんだよ！
        view()->composer('posts.archives',function($view){
            $view->with('archives', \App\Post::archives());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         // Messengerサービスのバインド
         $this->app->bind(  
             'App\myclass\Messenger\Messenger',
             'App\myclass\Messenger\MailMessenger'  // メール便
         );  

    }
}
