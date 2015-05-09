@extends('layouts.chowder')

@section('content')

<div class="col-xs-12 col-sm-8 col-sm-offset-2">
<div class="panel">
<div class="panel-body">
	<h3>Please dive in!</h3>

	{{ Form::open(array('url' => '/web/accounts/login')) }}
	{{ Form::text('username', '', array('class' => 'form-control', 'placeholder' => 'Username')) }}
	{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
	{{ Form::submit('Dive in', array('class' => 'btn btn-default')) }}
	{{ Form::close() }}
</div>
</div>
</div>
@stop
