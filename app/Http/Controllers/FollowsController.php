<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;

class FollowsController extends Controller
{
    //フォローリスト
    public function followList()
    {
        $following_id = Auth::user()->pluck('id');
        //Auth::userはログインしているユーザーの情報.id（登録番号）を持ってくる
        //フォローしているユーザーのidを元に投稿内容を取得
        $posts = Post::with('user')->where('id', $following_id)->get();
        // ddd($posts);
        //PostテーブルとUserテーブルを取得している
        return view('follows.followList',['posts'=>$posts]);
    }

    // フォロワーリスト
    public function followerList()
    {
        $followed_id = Auth::user()->pluck('id');
        $posts = Post::with('user')->where('id', $followed_id)->get();

        return view('follows.followerList',['posts'=>$posts]);
    }

}
