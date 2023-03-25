@extends('layouts.login')

@section('content')
 <h1>Follow List</h1>
    @foreach ($timelines as $timelines)
    <p>{{ $timelines->user_id }}</p>
    <p>{{ $timelines->post }}</p>
    @endforeach
@endsection
