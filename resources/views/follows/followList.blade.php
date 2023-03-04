@extends('layouts.login')

@section('content')
  @foreach ($posts as $posts)
   <!-- $postsはPostモデル経由で取得している情報になるのでPostモデルに定義されているusersテーブルとのリレーションを定義しているuserメソッドにアクセスしuserの情報を取得している流れになります。 -->
       <p>名前:{{$posts->user->username}}</p>
      <!-- userはメゾット名（User.phpからデータを取ってきている） -->
       <p>投稿内容：{{ $posts->post }}</p>
  @endforeach
@endsection
