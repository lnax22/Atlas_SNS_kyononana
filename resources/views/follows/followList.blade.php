@extends('layouts.login')

@section('content')
<div class="container">
  <section class="followList"></section>
    <h1>Follow List</h1>
    @foreach ($timelines as $timelines)
    {{ $timelines->user_id }}
    {{ $timelines->post }}
    @endforeach
</div>
@endsection
