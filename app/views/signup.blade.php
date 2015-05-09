@extends('layouts.chowder')

@section('content')

<div class="col-xs-12 col-sm-8 col-sm-offset-2">
<div class="panel">
<div class="panel-body">
	<h3 style="text-align: center;">Sign Up for Chowder</h3>
	
	{{ Form::open(array('action' => 'AccountsController@new_account')) }}
	{{ Form::text('username', '', array('class' => 'form-control', 'placeholder' => 'Username')) }}
	{{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email')) }}
	{{ Form::text('firstname', '', array('class' => 'form-control', 'placeholder' => 'First Name')) }}
	{{ Form::text('lastname', '', array('class' => 'form-control', 'placeholder' => 'Last Name')) }}
	{{ Form::text('password', '', array('class' => 'form-control', 'placeholder' => 'Password')) }}
	{{ Form::text('password_again', '', array('class' => 'form-control', 'placeholder' => 'Retype Password')) }}
	{{ Form::textarea('message', '', array('class' => 'form-control', 'placeholder' => 'Message')) }}
	{{ Form::submit('Clam it up', array('class' => 'btn btn-default')) }}
	{{ Form::close() }}
</div>
</div>
</div>
@stop