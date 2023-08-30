@extends('layouts.login')

@section('content')
<div class="otherProfile">
 <p class="icon"><img src="{{asset('storage/' .$user->images)}}" class="icon" width="35" height="35"></p>
 <p class="otherProfileName">name {{ $user->username }}<br>bio {{ $user->bio }}</p>
</div>

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
