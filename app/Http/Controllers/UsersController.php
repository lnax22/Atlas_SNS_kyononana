<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        // dd($keyword);

        if (!empty($keyword)) {
            $users = User::where('username', 'LIKE' , "%".$keyword."%")->get();
        }
        else{
            $users=User::all();
            // ユーザー情報を全部持ってくる
        }

        return view('users.search',['users'=>$users]);
        // $request->session()->put('keyword',$data['keyword']);
        // search.blade.phpで使えるように定義

    }

    // public function search(Request $request){
    //     $keyword = $request->input('keyword', '');

    //     $posts = Post::where('title', 'LIKE' , "%{$keyword}%")->get()->all();

        // ページ更新時にクエリパラメータが消えないようにkeywordも渡す
        // $params = array('posts'   => $posts,'keyword' => $keyword);
        // return view('/search', $params);

    //フォローする
     public function follow(Request $Request)
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
     public function unFollow(Request $Request)
     {
        $following_id = Auth::id();

        \DB::table('follows')
            ->where('followed_id', $id)
            ->where('following_id', $following_id)
            //ログインしているユーザーがフォロを外す、他ユーザーは反映されない
            ->delete();

            return back();
     }



}
