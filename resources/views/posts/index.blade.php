<!DOCTYPE HTML>
@extends('layouts.login')
<!-- laravelのCRUD、CREATE機能を参考にする -->
<!-- Laravelでは、ビューファイルを作るときには「〇〇.blade.php」と名前を付けてあげます。 -->
<!-- この1行で、オブジェクト指向のクラスと同じように、継承をおこなうことができるようになります。引数の中にかいてある「‘layouts.login’」の部分は、ディレクトリresource/viewsの直下を起点として、どの「○○.blade.php」の内容を受け継ぐかを決める役割を担っています -->

@section('content')
<form method="post">
	<div class="form-group">
    {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) !!}
		<label for="view_name"></label>
		<input id="view_name" type="text" name="view_name" value="">
	</div>
	<div>
		<label for="message"></label>
		<textarea id="message" name="message"></textarea>
	</div>
	<button type="submit" class="btn btn-success pull-right"><img src="images/edit.png"></button>
</form>
@endsection
