<?php
if( !empty($_POST['btn_submit']) ) {
	var_dump($_POST);
}
?>
<!-- 「書き込み」ボタンのデータは$_POST[‘btn_submit’]からアクセスできますが、この変数が存在しているかを確認するためにempty関数を使います。

empty関数は変数が存在しない、または空であればtrueを返す関数です。
今回はその反対の意味で「空じゃなければtrue」にしたいので、関数の前に「!」を付けています。

これで、ユーザーが書き込みを行うためにページを開いたのかを自動的に判別できるようになりました。 -->
<!DOCTYPE HTML>
@extends('layouts.login')
<!-- laravelのCRUD、CREATE機能を参考にする -->
<!-- Laravelでは、ビューファイルを作るときには「〇〇.blade.php」と名前を付けてあげます。 -->
<!-- この1行で、オブジェクト指向のクラスと同じように、継承をおこなうことができるようになります。引数の中にかいてある「‘layouts.login’」の部分は、ディレクトリresource/viewsの直下を起点として、どの「○○.blade.php」の内容を受け継ぐかを決める役割を担っています -->

@section('content')
<div class="table-responsive">
  <!-- 投稿フォーム -->
  <form action="posts" method="POST"><!-- アクションでURLを指定 -->
  {{ csrf_field() }}
	 <div class="form-group">
	 <!-- {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) !!} -->
	 <!-- Form::input('type属性','name属性','フォーム内に初めから入れる値の指定',[その他属性をまとめて指定]) -->
   <img src="{{asset('storage/'. Auth::user()->images)}}" class="icon" width="35" height="35">
   <input type="text" name="newPost" class="form-control" placeholder="投稿内容を入力してください">
	 </div>
	 <button><img src="{{ asset('images/post.png')}}" class="post" width="40" height="40"></button>
</form>

<!-- 区切りの線 -->
<hr>

	@foreach ($posts as $posts)
   <!-- $postsはPostモデル経由で取得している情報になるのでPostモデルに定義されているusersテーブルとのリレーションを定義しているuserメソッドにアクセスしuserの情報を取得している流れになります。 -->
    <div class="flex">
       <p><img src="{{asset('storage/' .$posts->user->images)}}" class="icon" width="35" height="35"></p>
       <p>{{$posts->user->username}} <br> {{ $posts->post }}</p>
      <!-- userはメゾット名（User.phpからデータを取ってきている） -->
    </div>
     <button><a class="js-modal-open" post="{{ $posts->post }}"  post_id="{{ $posts->id }}"><img src="{{ asset('images/edit.png')}}" class="edit" width="25" height="25"></a></button>
		 <button><a href="/posts/{{$posts->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="{{ asset('images/trash.png')}}" class="trash" width="25" height="25"></a></button>
  @endforeach

	<!-- 投稿編集のモーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="/update" method="POST">
            <!-- 投稿内容 // 取得した投稿内容をモーダルの中身へ渡す-->
              <textarea name="upPost" class="modal_post"></textarea>
             <!-- 投稿のID（どこの投稿なのか） // 取得した投稿のidをモーダルの中身へ渡す-->
              <input type="hidden" name="id" class="modal_id" value="">
              <input type="submit" value="更新">
                {{ csrf_field() }}
           </form>
           <button><a class="js-modal-close" >閉じる</a></button>
        </div>
    </div>
 </table>
</div>
@endsection
