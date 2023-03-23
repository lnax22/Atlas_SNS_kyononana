@extends('layouts.login')

@section('content')
<form action="/search" method="GET">
<input type="search" name="keyword" placeholder="ユーザー名">
<input type="submit" name="submit" value="検索">
</form>
@if(!empty($keyword))
 <div class="alert alert-primary" >検索ワード：{{$keyword}}</div>
@endif

@foreach ($users as $user)
<!-- （コントローラーから引っ張ってくる as ここで定義する） -->
 @if(Auth()->user()->isFollowing($user->id))
<!-- if文は一個 -->
 {{$user->username}}<button><a class="btn btn-danger" href="/users/{{$user->id}}/unFollow">フォロー解除</a></button>
 @else
 {{$user->username}}<button><a class="btn btn-primary" href="/users/{{$user->id}}/Follow">フォローする</a></button>
 @endif

 @endforeach



@endsection
