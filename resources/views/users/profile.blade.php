
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
        <label class="form-group">user name</label><input type="text" value="{{ $user->username }}" class="input" name="username">
      </div>
      <div class="profile-wrapper">
        <label class="form-group">mail address</label><input type="text" value="{{ $user->mail }}" class="input" name="mail">
      </div>
      <div class="profile-wrapper">
        <label class="form-group">password</label><input type="password" class="input" name="password">
      </div>
      <div class="profile-wrapper">
        <label class="form-group">password confirm</label><input type="password" class="input" name="password_confirmation">
      </div>
      <div class="profile-wrapper">
        <label class="form-group">bio</label><input type="bio" value="{{ $user->bio }}" class="input" name="bio">
      </div>
      <div class="profile-wrapper">
        <label class="form-group">icon image</label>
        <label class="file">
          <div class="fileChoose">ファイルを選択</div><input type="file" class="custom-file-input" name="image">
        </label>
      </div>
   </div>

   <button type="submit" class="update">更新</button>

</form>
</div>




@endsection
