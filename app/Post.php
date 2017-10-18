<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //詳しくは、PostControllerのstoreメソッドを見て
    protected $fillable = ['title', 'body'];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {
        //ここだとvalidateができないんだけれども、どうするんだろ
        //validateはcommentcontroller1でやるみたい
        /*
        $this->validate(request(),[
            'body' => 'required'
        ]);
        */

        Comment::create([
            'body' => $body,
            'post_id' => $this->id ,
            'user_id' => $this->id
        ]);

        //上記よりさらにこっちがいいんだって
        //comments()は、postに紐づくクラスここだと、commentを返してくれて、それをcrateするってことなのかな。
        //createするときに、post_idがhasManyの関係で設定されるっっぽい。
        //そもそもどうやってキーを判別してるのかはわからない。
        //あとuser_idがないとレコードつくれない。
        //$this->comments()->create(compact('body'));

    



    }
}
