@extends('layouts.login')

@section('content')
<input type="search" name="search" placeholder="ユーザー名">
<input type="submit" name="submit" value="検索">

{{$keyword}}


@endsection
