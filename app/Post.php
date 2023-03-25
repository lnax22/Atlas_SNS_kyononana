<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'user_id', 'post',
  ];

    // usersテーブルとのリレーション（従テーブル側）//1対多の「１」側なので単数系
    public function user(){
        return $this->belongsTo('App\User');
    }

    //フォローしている人のつぶやき表示
    public function getTimeLines(Int $user_id, Array $follow_ids)
    {
        //whereInは値が複数取り得る場合に使用、自分がフォローしている人の投稿
        //orderByは登録日の昇順
        return $this->whereIn('user_id', $follow_ids)->orderBy('created_at', 'DESC')->paginate();
    }
}
