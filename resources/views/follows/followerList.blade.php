@extends('layouts.login')

@section('content')
<h1>Follower List</h1>
    @foreach ($posts as $post)
    <a href="/profile/{{$post->user->id}}/other"><p class="icon"><img src="{{asset('storage/' .$post->user->images)}}"></p></a>
    <p>名前：{{ $post->user->username}}</p>
    <p>投稿内容：{{ $post->post }}</p>
    @endforeach
@endsection
