@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/register']) !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('username') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('mailaddress') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('password') }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('password confirm') }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
