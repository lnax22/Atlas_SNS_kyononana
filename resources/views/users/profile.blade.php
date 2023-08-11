
@extends('layouts.login')

@section('content')
<!-- バリデーション エラーメッセージ-->
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif

<div class="profile-container">
<form action="/profile/update" method="POST" enctype="multipart/form-data">
  @csrf

  @if(Auth::user()->images == null)
   <figure><img src ="{{ asset('images/icon1.png')}}" class="profileIcon" width="35" height="35"></figure>
   @else
   <figure><img src="{{asset('storage/'.Auth::user()->images)}}" class="profileIcon" width="35" height="35"></figure>
  @endif
    <div class="form-update">
      <div class="profile-wrapper">
        <label>user name<input type="text" value="{{ $user->username }}" class="input" name="username"></label>
      </div>
      <div class="profile-wrapper">
        <label>mail address<input type="text" value="{{ $user->mail }}" class="input" name="mail"></label>
      </div>
      <div class="profile-wrapper">
        <label>password<input type="password" class="input" name="password"></label>
      </div>
      <div class="profile-wrapper">
        <label>password confirm<input type="password" class="input" name="password_confirmation"></label>
      </div>
      <!-- <span class="text-danger">{{ $errors->first('password_confirmation')}}</span> -->
      <div class="profile-wrapper">
        <label>bio<input type="bio" value="{{ $user->bio }}" name="bio"></label>
      </div>
      <br>
      <label class="form-group">icon image</label>
      <input type="file" name="image" class="custom-file-input" id="image">
   </div>
   <br>

   <button type="submit" class="update">更新</button>

</form>
</div>




@endsection
