@extends('layouts.login')

@section('content')
<form action="/search" method="GET">
<input type="search" name="keyword" placeholder="ユーザー名">
<input type="submit" name="submit" value="検索">
</form>



@foreach ($users as $users)

    <pre>{{ $users->username}}</pre>
    <button><a class="follow-btn-box" href="/users/{{$users->id}}/search">フォローする</a></button>
@endforeach



@endsection
