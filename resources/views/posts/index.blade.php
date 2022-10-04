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
<div class="card-body">
	<div class="card-title">
		つぶやき
  </div>
 <!-- 投稿フォーム -->
 <form action="{{ url('posts') }}" method="POST"
 class="form-horizontal"><!-- アクションでURLを指定 -->
	{{ csrf_field() }}
	<div class="form-group">
	{!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) !!}
		<div class="col-sm-6">
			みんなの投稿
			<input type="text" name="post_title" class="form-control">
	  </div>
		<label for="message"></label>
		<textarea id="message" name="message"></textarea>
	</div>
	<button type="submit" class="btn btn-success pull-right"><img src="images/edit.png"></button>
   </div>
  </div>
</form>
@endsection
