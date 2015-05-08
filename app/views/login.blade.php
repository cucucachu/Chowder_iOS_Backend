@extends('layouts.chowder')

@section('content')

<div class="col-xs-12 col-sm-8 col-sm-offset-2">
<div class="panel">
<div class="panel-body">
	<h3>Please dive in!</h3><br>

	{{ Form::open(array('url' => '/web/accounts/login')) }}
	{{ Form::label('Username ') }}{{ Form::text('username') }}<br>
	{{ Form::label('Password ') }}{{ Form::password('password') }}<br>
	{{ Form::submit('Dive in') }}<br>
	{{ Form::close() }}
</div>
</div>
</div>
@stop
