@extends('layouts.logout')

@section('content')

<div class="clear">
  <p>{{session('username')}}さん</p>
  <p class="added1">ようこそ!AtlasSNSへ!</p>
  <p class="added2">ユーザー登録が完了しました。</p>
  <p class="added3">早速ログインをしてみましょう!</p>

  <p class="btn"><a class="submit" href="/login">ログイン画面へ</a></p>
</div>

@endsection
