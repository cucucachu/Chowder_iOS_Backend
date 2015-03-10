@extends('layouts.chowder')

@section('content')
<h1>Admin Page</h1><br>
@stop

@section('menu')
<td>{{ HTML::link('admin/newUsers', 'Approve Users') }}</td>
<td>{{ HTML::link('admin/csv/clams', 'Clam csv') }}
@stop