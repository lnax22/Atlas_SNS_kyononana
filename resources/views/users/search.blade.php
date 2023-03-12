@extends('layouts.login')

@section('content')
<form action="/search" method="GET">
<input type="search" name="keyword" placeholder="ユーザー名">
<input type="submit" name="submit" value="検索">
</form>
@if(!empty($keyword))
 <div class="alert alert-primary" >検索ワード：{{$keyword}}</div>
@endif

@foreach ($users as $user)
<!-- （コントローラーから引っ張ってくる as ここで定義する） -->
 @if(Auth()->user()->isFollowing($user->id))
<!-- if文は一個 -->
 <form action="/users/{{$user->id}}/Follow, ['id'=>$user->id]) " method="POST">
    <button type="submit" class="btn btn-danger">{{$users->username}}フォロー解除</button>
 </form>
    <!--ifで切り替え-->
 @else
 <form action="/users/{{$user->id}}/unFollow,['id'=>$user->id])}}" method="POST">
   <button type="submit" class="btn btn-primary">{{$users->username}}フォローする</button>
 </form>
 @endif



 @endforeach



@endsection
