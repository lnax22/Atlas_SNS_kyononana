@extends('layouts.login')
@section('content')
<h1>Follower List</h1>
<!-- フォローされているユーザーのアイコン -->
@foreach ($followed as $followed)
<a href="/profile/{{$followed->id}}/other"><img src="{{asset('storage/' .$followed->images)}}" class="icon" width="35" height="35">
@endforeach
<!-- 区切りの線 -->
<hr>

  <div class="flex">
    @foreach ($posts as $post)
    <a href="/profile/{{$post->user->id}}/other"><img src="{{asset('storage/' .$post->user->images)}}"class="icon" width="35" height="35"></a>
    <p>{{$post->user->username}} <br> {{ $post->post }}</p>
    <p class="post_date">{{$post->created_at}}</p>
    @endforeach
  </div>
@endsection
