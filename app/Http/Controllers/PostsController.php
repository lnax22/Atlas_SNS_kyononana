<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use Validator;

class PostsController extends Controller
{
    // 投稿の表示
    // ルーティングの第2引数から呼び出せるように
    public function index()
    {
          $posts = \DB::table('posts')->get();
          return view('posts.index',['posts'=>$posts]);
          // 「ビューファイルを引っ張ってくる」という処理内容です。
    }

    // POST通信で、フォームから値が送られる場合は、引数に用意してある$request変数の中に値(パラメータ)が渡されることになります。その中から、<input>タグのname属性が「newPost」と指定されていたところの値を$post変数内に入れている流れとなっています。あとは、テーブルのpostカラムに、$post変数を当てはめて登録を行っているということになっています

    // 投稿の登録
    public function store(Request $request)
    {
        $posts = $request->input('newPost');
        // （）の中はname属性を指定する
        $user_id = Auth::id();
        //Auth、requestは上に処理を書かないと適用されない

        \DB::table('posts')->insert([
            'post' => $posts,
            'user_id' => $user_id,
            // カラムの名前=>入れたい値

        ]);
            return redirect('top');
    }

    // 投稿の編集
    // public function edit($user_id)
    // {
    // $posts = Post::findOrFail($user_id);
    // return view('posts.index', ['post' => $posts]);
    // }

    // 投稿の編集実行
    public function update(Request $request)
    {
        \DB::table('posts')
            ->where('user_id', $user_id)
            ->update();

        return redirect('top');
    }

    //投稿の消去
    public function delete($user_id)
    {
        \DB::table('posts')
            ->where('user_id', $user_id)
            ->delete();

        return redirect('top');
    }
}




//「php artisan」コマンドで取り入れたユーザー認証機能群である「auth認証」を適用
    // public function __construct()
    // {
        // $this->middleware('auth');
    // }
//バリデーション
        // $validator = Validator::make($request->all(), [
        //     'following_id' => 'required|max:255',
        //     'followed_id' => 'required|max:255',
        // ]);

        //バリデーション:エラー
        // if ($validator->fails()) {
        //     return redirect('/')
        //     ->withInput()
        //     ->withErrors($validator);
        // }

        //以下に登録処理を記述（Eloquentモデル）
        // $posts = new follows;
        // $posts-> following_id = $request->following_id;
        // $posts->followed_id = $request->followed_id;
        // $posts->following_id = Auth::id();//ここでログインしているユーザidを登録しています
        // $posts->save();
        // return redirect('/');
