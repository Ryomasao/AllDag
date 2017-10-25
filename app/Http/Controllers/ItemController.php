<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    //

    public function index(){
        return view('posts/items/index');
    }

    /**
     * @link https://qiita.com/zaburo/items/80b94bce19a4a670e465
     * @link https://qiita.com/zz22394/items/cd960124c3aec164a24d 
     * @link http://www.larajapan.com/tag/%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%81%AE%E3%82%A2%E3%83%83%E3%83%97%E3%83%AD%E3%83%BC%E3%83%89/
     * hasFile
     * @link https://readouble.com/laravel/5.3/ja/requests.html
     * 基本
     * @link https://readouble.com/laravel/5.5/ja/filesystem.html
     */
    public function store(Request $request){
        
        if($request->hasFile('up_file')){
            //これだけで、app/storage配下のfilesフォルダに、適当な名前で保存される。
            $path = $request->file('up_file')->store('files');
            //保存名をかえたい場合は、公式ドキュメントをみてくれい
        }
        
    }
}
