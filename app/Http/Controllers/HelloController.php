<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(Request $request){
        $data = [
            ['name' => 'hoge', 'color'=> 'fuga']
        ];

        return view('hello.index',['data'=>$request->data]);

        //return view('hello.index',['data'=>$data]);
    }
}
