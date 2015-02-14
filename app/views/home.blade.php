@extends('layouts.chowder')

@section('content')

<h2>Welcome to Chowder</h2><br>

<p>Chowder is a mobile app which helps citizen scientists contribute to a survey of the pismo clam population. Sign up and help science today!</p>

<p> New user? Come jump into a warm pot of {{ HTML::link('web/accounts/newView', 'Chowder!') }}</p>

@stop