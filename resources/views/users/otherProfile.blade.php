@extends('layouts.login')

@section('content')
<div class="flex">
<p class="icon"><img src="{{asset('storage/' .$user->images)}}" class="icon" width="35" height="35"></p>
<p>name {{ $user->username }} <br> bio {{ $user->bio }}</br>
</div>

<!-- フォローする、フォロー解除ボタン -->
@if(Auth()->user()->isFollowing($user->id))

 <button><a class="btn btn-danger" href="/users/{{$user->id}}/unFollow">フォロー解除</a></button>
 @else
 <button><a class="btn btn-primary" href="/users/{{$user->id}}/Follow">フォローする</a></button>
 @endif

 <!-- 区切りの線 -->
<hr>

<!-- 投稿内容 -->
<div class="flex">
 @foreach ($posts as $post)
    <p class="icon"><img src="{{asset('storage/' .$post->user->images)}}" class="icon" width="35" height="35"></p>
    <p>{{ $post->user->username }} <br> {{ $post->post }}</p>
    <p class="post_date">{{$post->created_at}}</p>
    @endforeach
</div>






@endsection
