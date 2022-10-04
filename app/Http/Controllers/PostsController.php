<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use Validator;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }
 //「php artisan」コマンドで取り入れたユーザー認証機能群である「auth認証」を適用
    // public function __construct()
    // {
        // $this->middleware('auth');
    // }
    public function store(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'post_title' => 'required|max:255',
            'post_content' => 'required|max:255',
        ]);

        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/')
            ->withInput()
            ->withErrors($validator);
        }

        //以下に登録処理を記述（Eloquentモデル）
        $posts = new Post;
        $posts->post_title = $request->post_title;
        $posts->post_content = $request->post_content;
        $posts->user_id = Auth::id();//ここでログインしているユーザidを登録しています
        $posts->save();
        return redirect('/');
    }
}
