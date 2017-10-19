<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//日付の変換 march => 3
use carbon\carbon;

class Post extends Model
{
    //詳しくは、PostControllerのstoreメソッドを見て
    protected $fillable = ['title', 'body','user_id'];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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

    //filterで勝手に使われるメソッド
    //第二引数ががfilter(request([]))のリクエスト部分らしい
    public function scopeFilter($query, $filters)
    {

        if ($month = $filters['month']){
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filters['year']){
            $query->whereYear('created_at', $year);
        }

    }
}
