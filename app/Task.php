<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{


    public function isComplete()
    {
        return false;
    }

    /*
    public static function incomplete()
    {
        //http://maeharin.hatenablog.com/entry/20130202/php_late_static_bindings
        //なぜstaicなのかがいまいち。parentじゃだめなのだろうか。
        return static::where('completed',0)->get();
    }
    */


    //メソッドにscopeって書くと、Task::Incomplete()でこのメソッドを呼べるみたい。
    //クエリスコープっていう機能らしんだけれども、メリットがいまいちわからない。
    //たぶん、メソッドチェーンをしたいからかな。Task::Incomplete().otherMethod().othreMethod()みたいなことができるんだと思う。
    public function scopeIncomplete($query)
    {
        return $query->where('completed',0);
    }

    
}
