@extends('layouts.chowder')

@section('content')

<div class="col-xs-12 col-sm-8 col-sm-offset-2">
	<h2 style=" text-align: center; ">Welcome to Chowder!</h2><br>
</div>

<div class="col-xs-12 col-sm-8 col-sm-offset-2">
<div class="panel">
<div class="panel-body">
	<p>Chowder is a mobile app which helps citizen scientists contribute to a survey of the pismo clam population. Sign up and help science today!</p>

	<br><p> New user? Come jump into a warm pot of {{ HTML::link('web/accounts/newView', 'Chowder!') }}</p>
</div>
</div>
</div>


@stop
