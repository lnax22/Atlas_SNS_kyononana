@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<div class="open">
<p class="title">AtlasSNSへようこそ</p>

{{ Form::label('mail address') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}


{{ Form::submit('LOGIN') }}


<p><a href="/register">新規ユーザーの方はこちら</a></p>
</div>

{!! Form::close() !!}

@endsection
