@extends('layouts.login')

@section('content')
<form action="/profile" method="GET">
<pre>username <input type="text" name="name" ></pre>
<pre>mail adress <input type="text" name="name" ></pre>
<pre>pass word <input type="text" name="name" ></pre>
<pre>password confirm  <input type="text" name="name" ></pre>
<pre>bio <input type="text" name="name" ></pre>
<pre>icon image
</form>

<input type="submit" value="更新する">


@endsection
