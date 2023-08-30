@extends('layouts.login')
@section('content')
<div class="flex">
 <h1>Follow List</h1>
<!-- フォローしているユーザーのアイコン -->
 @foreach ($follows as $follow)
  <a href="/profile/{{$follow->id}}/other"><img src="{{asset('storage/' .$follow->images)}}" class="icon" width="35" height="35">
 @endforeach
</div>

<!-- 区切りの線 -->
<hr>

@foreach ($posts as $post)
 <div class="flex">
   <p><a href="/profile/{{$post->user->id}}/other"><img src="{{asset('storage/' .$post->user->images)}}" class="icon" width="35" height="35"></a></p>
   <p class="post_username">{{ $post->user->username }}<br>{{ $post->post }}</p>
   <p class="post_date">{{$post->created_at}}</p>
 </div>
@endforeach

@endsection
