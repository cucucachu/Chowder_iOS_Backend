@extends('layouts.chowder')

@section('content')
	{{ Form::open(array('action' => 'AccountsController@new_account')) }}
	Username:        {{ Form::text('username') }}<br>
	Password:        {{ Form::password('password') }}<br>
	Retype Password: {{ Form::password('password_again') }}<br>
	{{ Form::submit('Clam it up') }}
	{{ Form::close() }}
@stop