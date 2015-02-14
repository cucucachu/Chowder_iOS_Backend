@extends('layouts.chowder')

@section('content')
	<h3>Please dive in!</h3><br>

	{{ Form::open(array('url' => '/web/accounts/login')) }}
	{{ Form::label('Username ') }}{{ Form::text('username') }}<br>
	{{ Form::label('Password ') }}{{ Form::password('password') }}<br>
	{{ Form::submit('Dive in') }}<br>
	{{ Form::close() }}

@stop
