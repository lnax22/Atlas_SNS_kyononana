@extends('layouts.login')

@section('content')
<h1>Follower List</h1>
    @foreach ($posts as $post)
    <p>{{ $post->user->username}}</p>
    <p>{{ $post->post }}</p>
    @endforeach
@endsection
