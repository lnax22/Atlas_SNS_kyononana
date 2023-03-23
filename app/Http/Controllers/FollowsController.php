<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;


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
        // $following_id = Auth::user()->follows()->pluck('followed_id');  // フォローしているユーザーのidを取得
        // //Auth::userはログインしているユーザーの情報.id（登録番号）を持ってくる
        // $users = User::whereIN('id',$following_id)->get();
        // //フォローしているユーザーのidを元に投稿内容を取得
        // $posts = Post::whereIn('user_id', $following_id)
        //         ->orderBy('created_at','desc')
        //         ->get();
        //  //whereInは値が複数取り得る場合に使用、自分がフォローしている人の投稿

        //画像アイコン
        // $images = DB::table('users')->get();
        // $images = auth()->user()->follows()->get();
        $user = auth()->user();
        $follow_ids = $follow->followingIds($user->id);
        $following_ids = $follow_ids->pluck('followed_id')->toArray();
        $timelines = $post->getTimelines($user->id, $following_ids);
        return view('follows.followList',['timelines' => $timelines]);
    }

    // フォロワーリスト
    public function followerList()
    {
        $followed_id = Auth::user()->pluck('id');
        $posts = Post::with('user')->where('id', $followed_id)->get();

        return view('follows.followerList',['posts'=>$posts]);
    }

    //フォロー,フォロワー数の表示
    public function show(User $user, Follow $follow)
    {
        $login_user = auth()->user();
        $is_following = $login_user->isFollowing($user->id);
        $is_followed = $login_user->isFollowed($user->id);
        $follow_count = $follow->getFollowCount($user->id);
        $follower_count = $follow->getFollowerCount($user->id);

        return view('users.show', [
            'user'           => $user,
            'is_following'   => $is_following,
            'is_followed'    => $is_followed,
            'follow_count'   => $follow_count,
            'follower_count' => $follower_count
        ]);
    }
}
