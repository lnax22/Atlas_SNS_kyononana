@extends('layouts.login')
@section('content')
<div class="flex">
 <h1>Follower List</h1>
<!-- フォローされているユーザーのアイコン -->
 @foreach ($followed as $followed)
  <a href="/profile/{{$followed->id}}/other"><img src="{{asset('storage/' .$followed->images)}}" class="icon" width="35" height="35">
 @endforeach
</div>
<!-- 区切りの線 -->
<hr>

  @foreach ($posts as $post)
   <div class="flex">
    <p><a href="/profile/{{$post->user->id}}/other"><img src="{{asset('storage/' .$post->user->images)}}"class="icon" width="35" height="35"></a></p>
    <p class="post_username">{{ $post->user->username }}</p><br>
    <p class="post">{{ $post->post }}</p>
    <p class="post_date">{{$post->created_at}}</p>
   </div>
  @endforeach
@endsection
