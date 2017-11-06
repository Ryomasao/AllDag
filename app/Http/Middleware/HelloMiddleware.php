<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data = [
            ['name' => 'ayane', 'color'=>'blue'],
            ['name' => 'mirin', 'color'=>'red'],
            ['name' => 'risa', 'color'=>'white'],
            ['name' => 'nemu', 'color'=>'mintgreen'],
            ['name' => 'eitaso', 'color'=>'yellow'],
        ];

        $request->merge(['data'=>$data]);

        return $next($request);
    }
}
