@extends('layouts.chowder')
			
@section('content')
			<h1>Live Feed</h1>
			
			@if (isset($msg))
				<p> {{ $msg }} </p>
			@endif		
			<br>
			<div id='digs_table'></div>
@stop

@section('script')
<script>
$(document).ready(function() {
	update();
});

function update() {
	$('#digs_table').load('/iOS/public/web/latest');
	setTimeout(update, 2000);
}
</script>
@stop