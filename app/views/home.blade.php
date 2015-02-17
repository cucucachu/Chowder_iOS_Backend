@extends('layouts.chowder')

@section('content')

<h2>Welcome to Chowder</h2><br>

<p>Chowder is a mobile app which helps citizen scientists contribute to a survey of the pismo clam population. Sign up and help science today!</p>

@if (Auth::guest())
	<h3>Please dive in!</h3><br>

	{{ Form::open(array('url' => '/web/accounts/login')) }}
	{{ Form::label('Username ') }}{{ Form::text('username') }}<br>
	{{ Form::label('Password ') }}{{ Form::password('password') }}<br>
	{{ Form::submit('Dive in') }}<br>
	{{ Form::close() }}
@endif

<br><p> New user? Come jump into a warm pot of {{ HTML::link('web/accounts/newView', 'Chowder!') }}</p>

@stop