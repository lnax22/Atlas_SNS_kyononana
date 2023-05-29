@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<p>AtlasSNSへようこそ</p>

{{ Form::label('mail address') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('Login') }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
