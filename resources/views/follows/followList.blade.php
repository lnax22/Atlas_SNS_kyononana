@extends('layouts.login')

@section('content')
 <h1>Follow List</h1>
  <div class="flex">
    @foreach ($posts as $post)
    <a href="/profile/{{$post->user->id}}/other"><img src="{{asset('storage/' .$post->user->images)}}" class="icon" width="35" height="35"></a>
    <p>{{ $post->user->username }} <br> {{ $post->post }}</p>
    @endforeach
  </div>
@endsection
