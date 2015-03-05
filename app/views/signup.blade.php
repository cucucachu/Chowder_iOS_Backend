@extends('layouts.chowder')

@section('content')
	{{ Form::open(array('action' => 'AccountsController@new_account')) }}
	Username:        {{ Form::text('username') }}<br>
	Email:           {{ Form::text('email') }}<br>
	First Name:      {{ Form::text('firstname') }}<br>
	Last Name:       {{ Form::text('lastname') }}<br>
	Password:        {{ Form::password('password') }}<br>
	Retype Password: {{ Form::password('password_again') }}<br><br>
	Message:    <br> {{ Form::textarea('message') }}<br>
	{{ Form::submit('Clam it up') }}
	{{ Form::close() }}
@stop