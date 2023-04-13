@extends('layouts.login')

@section('content')
<p class="icon"><img src="{{asset('storage/' .$user->images)}}"></p>
<p>name {{ $user->username }}</p>
<p>bio {{ $user->bio }}</p>

<!-- フォローする、フォロー解除ボタン -->
@if(Auth()->user()->isFollowing($user->id))

 <button><a class="btn btn-danger" href="/users/{{$user->id}}/unFollow">フォロー解除</a></button>
 @else
 <button><a class="btn btn-primary" href="/users/{{$user->id}}/Follow">フォローする</a></button>
 @endif


<!-- 投稿内容 -->
 @foreach ($posts as $post)
    <p class="icon"><img src="{{asset('storage/' .$post->user->images)}}"></p>
    <p>{{ $post->user->username }}</p>
    <p>{{ $post->post }}</p>
    @endforeach







@endsection
