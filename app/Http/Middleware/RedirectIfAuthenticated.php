<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        error_log("are?");
        if (Auth::guard($guard)->check()) {
            return redirect('/posts');
        }

        //https://qiita.com/nunulk/items/2c637d3952096ef74677#3-middleware-%E3%81%A8-controller-%E3%81%AE%E9%96%A2%E4%BF%82
        //意味はわからないけれども、$nextの前にあれば、処理がいろいろあれば、このmiddlewareはルーター？にいくより前に処理をするんだって。



        return $next($request);
    }
}
