<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //詳しくは、PostControllerのstoreメソッドを見て
    protected $fillable = ['title', 'body'];
}
