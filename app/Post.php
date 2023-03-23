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
    public function getTimeLines(Int $user_id)
    {
        return $this->where('user_id','<>',  $user_id)->orderBy('created_at', 'DESC')->paginate();
    }
}
