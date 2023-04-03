
@extends('layouts.login')

@section('content')

<form action="/profile" method="POST" enctype="multipart/form-data">
  @csrf
  <!-- バリデーション -->

<div class="profile-container">
   <figure><img width="32" src="{{asset('storage/'. $user->images)}}"></figure>
    <div class="form-update">
      <div class="profile-wrapper">
        user name<input type="text" value="{{ $user->username }}" class="input" name="name">
      </div>
      <div class="profile-wrapper">
        mail adress<input type="text" value="{{ $user->mail }}" class="input" name="mail">
      </div>
      <div class="profile-wrapper">
        password<input type="password" value="{{ $user->password }}"class="input" name="password">
      </div>
      <div class="profile-wrapper">
        password confirm<input type="password" value="{{ $user->password }}" class="input" name="password">
      </div>
      <!-- <span class="text-danger">{{ $errors->first('password_confirmation')}}</span> -->
      <div class="profile-wrapper">
        bio<input type="bio" value="{{ $user->bio }}"></input>
      </div>
      <label class="form-group mb-3">icon image</label>
      <input type="file" name="iconImage" class="custom-file-input" id="fileImage">
   </div>

   <button type="submit" class="btn btn-primary btn-Update">更新</button>

</div>
</form>



@endsection
