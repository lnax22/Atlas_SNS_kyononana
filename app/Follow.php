<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{

  protected $fillable = [
    'following_id', 'followed_id'
  ];


  //フォロー数の表示
  public function getFollowCount($user_id)
  {
    return $this->where('following_id','<>',$user_id)->count();
  }

  //フォロワー数の表示
  public function getFollowerCount($user_id)
  {
    return $this->where('followed_id','<>', $user_id)->count();
  }
}
