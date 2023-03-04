@extends('layouts.login')

@section('content')
<form action="/search" method="GET">
<input type="search" name="keyword" placeholder="ユーザー名">
<input type="submit" name="submit" value="検索">
@if(!empty($keyword_name))
 <div class="alert alert-primary" >
</form>
@endif

@foreach ($users as $user)
<!-- （コントローラーから引っ張ってくる as ここで定義する） -->
<!-- if文は一個 -->
 <tr>
    <td class >
    <!--ifで切り替え-->
    @if (Auth()->user()->isFollowed($user->id))
     <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
      <button type="submit" class="btn btn-danger">フォロー解除</button>
    </form>
    @endif
    <!--ifで切り替え-->
    @if (Auth()->user()->isFollowing($user->id))
    <form action="{{ route('follow',['id'=> $user->id])}}" method="POST">
        {{csrf_field}}
    <button type="submit" class="btn btn-primary">フォローする</button>
    </form>
    @endif



@endforeach



@endsection
