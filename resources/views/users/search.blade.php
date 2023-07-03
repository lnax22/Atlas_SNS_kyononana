@extends('layouts.login')

@section('content')
<form action="/search" method="GET">
<input type="search" name="keyword" placeholder="ユーザー名">
<button type="submit" name="nameSearch" value=""><img src="{{ asset('images/search.jpeg')}}" width="35" height="35"></button>
</form>
@if(!empty($keyword))
 <div class="alert alert-primary" >検索ワード：{{$keyword}}</div>
@endif

<hr>
<div class="userSearchList">
@foreach ($users as $user)
<!-- （コントローラーから引っ張ってくる as ここで定義する） -->
 @if(Auth()->user()->isFollowing($user->id))
<!-- if文は一個 -->
<a href="/profile/{{$user->id}}/other"><img src="{{asset('storage/' .$user->images)}}" class="icon" width="35" height="35"></a>
 {{$user->username}}<button class="unFollowBtn"><a href="/users/{{$user->id}}/unFollow">フォロー解除</a></button><br>
 @else
 {{$user->username}}<button class="followBtn"><a href="/users/{{$user->id}}/Follow">フォローする</a></button><br>
 @endif
@endforeach
</div>

@endsection
