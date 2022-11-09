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
	<table class="table table-hover">
		自分のつぶやき
  <!-- 投稿フォーム -->
  <form action="posts" method="POST" class="form-horizontal"><!-- アクションでURLを指定 -->
  {{ csrf_field() }}
	 <div class="form-group">
	 {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) !!}
	 <!-- Form::input('type属性','name属性','フォーム内に初めから入れる値の指定',[その他属性をまとめて指定]) -->
	 </div>
	 <button type="submit" class="btn btn-success pull-right">書き込む</button>
	@foreach ($posts as $posts)
		 <td>{{$posts->post}}</td>
		 <!-- <td>{{$posts->user_id}}</td> -->
		 <td><a class="btn btn-danger" href="/posts/{{$posts->user_id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>

   </tr>
  @endforeach
  </form>
 </table>
</div>
@endsection
