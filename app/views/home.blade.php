@extends('layouts.chowder')

@section('menu')
<td>{{ HTML::link('ticker', 'Live Feed') }}</td>
@stop

@section('content')

<h2>Welcome to Chowder</h2><br>

<p>Chowder is a mobile app which helps citizen scientists contribute to a survey of the pismo clam population. Sign up and help science today!</p>

@stop