@extends('layouts.chowder')
			
@section('content')
			
			@if (isset($msg))
				<p> {{ $msg }} </p>
			@endif		
			<br>

<div class="col-xs-12 col-sm-8 col-sm-offset-2">
<div class="panel">
<div class="panel-body">
			<h3>Live Feed</h3>
			<div id='digs_table'></div>
</div>
</div>
</div>
@stop

@section('script')
<script>
$(document).ready(function() {
	update();
});

function update() {
	$('#digs_table').load('/web/latest');
	setTimeout(update, 2000);
}
</script>
@stop
