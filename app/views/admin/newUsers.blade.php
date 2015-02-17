@extends('layouts.chowder')

@section('content')
<h2> Approve New Users </h2><br>

<table>
<tr><td><h3>Username</h3></td><td><h3>Created</h3></td><td><h3>Message</h3></td>
	<td><h3>Approve</h3></td><td><h3>Reject</h3></td></tr>
	
@foreach ($users as $user)
<tr>
<td>{{ $user->username }} </td> <td>{{ $user->created_at }}</td> <td> {{ $user->message }} </td>
<td> {{HTML::link('admin/approveUser/'.$user->id, 'Approve') }} </td>
<td> {{HTML::link('admin/rejectUser/'.$user->id, 'Reject') }} </td>
</tr>
@endforeach
</table>

@stop