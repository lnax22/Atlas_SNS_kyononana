@extends('layouts.login')

@section('content')
<div class="otherProfile">
 <img src="{{asset('storage/' .$user->images)}}" class="otherProfileIcon" width="35" height="35">
 <div class="wrap1">
  <label >name</label>
  <p class="profileContentName">{{ $user->username }}</p>
 </div>
 <div class="wrap2">
  <label>bio</label>
  <p class="profileContentBio">{{ $user->bio }}</p>
 </div>
</div>


<!-- <全体を囲う>
  <名前を囲う>
    <項目名>name</項目名>
    <名前>○○さん</名前>
  </名前を囲う>
  <自己紹介を囲う>
    <項目名>bio</項目名>
    <bio>○○</bio>
  </自己紹介を囲う>
</全体を囲う>  -->

<!-- フォローする、フォロー解除ボタン -->
@if(Auth()->user()->isFollowing($user->id))
 <button class="unFollowBtnOther"><a href="/users/{{$user->id}}/unFollow">フォロー解除</a></button>
 @else
 <button class="followBtnOther"><a href="/users/{{$user->id}}/Follow">フォローする</a></button>
@endif

 <!-- 区切りの線 -->
<hr>

<!-- 投稿内容 -->
@foreach ($posts as $post)
 <div class="flex">
   <p class="icon"><img src="{{asset('storage/' .$post->user->images)}}" class="icon" width="35" height="35"></p>
   <p class="post">{{ $post->user->username }} <br> {{ $post->post }}</p>
   <p class="post_date">{{$post->created_at}}</p>
 </div>
@endforeach

@endsection
