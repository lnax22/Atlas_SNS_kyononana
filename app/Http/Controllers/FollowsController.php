<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Follow;


class FollowsController extends Controller
{

    //auth認証
    public function __construct()
    {
        $this->middleware('auth');
    }

    //フォローする
     public function follow($id)
     {
        $following_id = Auth::id();
        //Auth::idはログインしているユーザーのIDを取得する

        \DB::table('follows')->insert([
            'following_id' => $following_id,
            'followed_id' => $id
            //$idはフォローされたユーザーのid
            // カラムの名前=>入れたい値
        ]);
            return back();
    }

    //フォロー解除
     public function unFollow($id)
     {
        $following_id = Auth::id();

        \DB::table('follows')
            // followsテーブルの'following_id'が$following_idに一致しているものを削除
            ->where('following_id', $following_id)
            ->where('followed_id', $id)
            //ログインしているユーザーがフォロを外す、他ユーザーは反映されない
            ->delete();

            return back();
     }

    //フォローリスト
    public function followList(Post $post, Follow $follow)
    {
        // //フォローしているユーザーのidを元に投稿内容を取得
        // $posts = Post::whereIn('user_id', $following_id)
        //         ->orderBy('created_at','desc')
        //         ->get();
        //  //whereInは値が複数取り得る場合に使用、自分がフォローしている人の投稿

        //画像アイコン
        $images = Auth::User()->follows()->get();
        $follows = Auth::User()->follows()->get();
        //ログインユーザーがフォローしている人を表示する
        $following_id = Auth::user()->follows()->pluck('followed_id');
        // フォローしているユーザーのidを元に投稿内容を取得
        $posts = Post::with('user')->whereIn('user_id', $following_id)
        ->orderBy('created_at','desc')
        ->get();
        return view('follows.followList',['follows'=>$follows,'posts'=>$posts,]);
    }

    // フォロワーリスト
    public function followerList()
    {
        $images = Auth::User()->followed()->get();
        $followed = Auth::User()->followed()->get();
        $followed_id = Auth::user()->followed()->pluck('following_id');
        $posts = Post::with('user')->whereIn('user_id', $followed_id)
        ->orderBy('created_at','desc')
        ->get();
        return view('follows.followerList',['followed'=>$followed,'posts'=>$posts,]);
    }

}
