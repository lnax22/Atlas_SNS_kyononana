@extends('layouts.login')

@section('content')

 <h1>Follow List</h1>
    @foreach ($posts as $post)
    <p class="icon"><img src="{{asset('storage/' .$post->user->images)}}"</p>
    <p>名前：{{ $post->user->username }}</p>
    <p>投稿内容：{{ $post->post }}</p>
    @endforeach
@endsection
