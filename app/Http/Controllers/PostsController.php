<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Follow;
use Validator;

class PostsController extends Controller
{
    //auth認証
    public function __construct()
    {
        $this->middleware('auth');
    }

    // 投稿の表示(top画面の表示)
    // ルーティングの第2引数から呼び出せるように
    public function index(Request $request)
    {
        $user=Auth::user(); //ログインしているユーザーの取得
        // $following_id=Auth::user()->pluck(); //フォローしているユーザーのIDを取得
        $posts = Post::with('user')->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->orWhere('user_id', Auth::user()->id)->latest()->get();
        //フォローしているユーザーと自分の投稿を取得
        //    ->orWhere('user_id',$following_id) //さらにフォローしているユーザー
          //PostテーブルとUserテーブルを取得している
          return view('posts.index',['posts'=>$posts,]);
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
        $data = $request->input();
        $validator=$this->validate($request,[
            'newPost' => 'required|string|min:1|max:150',
        ]);

        \DB::table('posts')->insert([
            'post' => $posts,
            'user_id' => $user_id,
            // カラムの名前=>入れたい値

        ]);
            return redirect('top');
    }

    // 投稿の更新
    // 1つ目は、name属性が「upPost」「id」で指定されているフォームのテキストを、別々の変数で取得しています。2つ目は「\DB::~~」と書かれている箇所です。改行されていますが、最後に「->update();」と書かれているので、postsテーブルのレコードをここで更新しています。「where」でpostsテーブルのidカラムがフォームから持ってきた$id変数の値と一致する箇所の投稿内容を変更するという指示を出しているのです。最後のリダイレクトで指定したURLは、投稿一覧ページへとなっていますね。

    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        // dd($up_post);
        \DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );

        return redirect('top');
    }

    //投稿の消去
    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('top');
    }


}
