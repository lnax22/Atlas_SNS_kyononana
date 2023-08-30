@extends('layouts.login')

@section('content')
<div class="search">
 <form action="/search" method="GET">
 <input type="search" name="keyword" placeholder="ユーザー名">
<button class="nameSearch" type="submit" value=""><img src="{{ asset('images/search.jpeg')}}" width="35" height="35"></button>
 </form>
@if(!empty($keyword))
 <div class="alert alert-primary" >検索ワード：{{$keyword}}</div>
@endif
</div>
<hr>
<div class="userSearchList">
@foreach ($users as $user)
<!-- （コントローラーから引っ張ってくる as ここで定義する） -->
 <div class="search-wrapper">
@if(Auth::user()->isFollowing($user->id))
 <a href="/profile/{{$user->id}}/other">
 @if(Auth::user()->images == null)
  <img src ="{{ asset('images/icon1.png')}}" class="icon" width="35" height="35">
  @else
  <img src="{{asset('storage/' .$user->images)}}" class="icon" width="35" height="35"></a>
 @endif

 <label class="userSearch">{{$user->username}}</label>
 <button class="unFollowBtn"><a href="/users/{{$user->id}}/unFollow">フォロー解除</a></button><br>
@else
 <!-- <a href="/profile/{{$user->id}}/other"><img src ="{{ asset('images/icon1.png')}}" class="icon" width="35" height="35"></a> -->
 <a href="/profile/{{$user->id}}/other">
 @if(Auth::user()->images == null)
  <img src ="{{ asset('images/icon1.png')}}" class="icon" width="35" height="35">
  @else
  <img src="{{asset('storage/' .$user->images)}}" class="icon" width="35" height="35"></a>
 @endif

 <label class="userSearch">{{$user->username}}</label>
 <button class="followBtn"><a href="/users/{{$user->id}}/Follow">フォローする</a></button><br>
@endif
 </div>
@endforeach
</div>

@endsection
