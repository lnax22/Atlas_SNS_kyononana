<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // usersテーブルとのリレーション（従テーブル側）//1対多の「１」側なので単数系
    public function user(){
        return $this->belongsTo('App\User');
    }
}
