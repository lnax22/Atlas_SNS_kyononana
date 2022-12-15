<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Rule;
// use App\Models\User;
// use App\Models\Tweet;
// use App\Models\Follower;


class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(Request $request)
    {
        $users=User::all();
        // $keyword = $request->input('keyword');
        // // dd($keyword);

        // if (!empty($keyword)) {
        //     $users = User::where('username', 'LIKE' , "%{$keyword}%")->get();
        // }
        // else{
        //     $users=User::all();
        //     // ユーザー情報を全部持ってくる
        // }

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

}
