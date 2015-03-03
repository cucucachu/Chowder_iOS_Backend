@if (isset($digs))
	@foreach($digs as $i=>$dig)
		<table>
		{{ "<tr><td><h3>".$dig->name."</h3></td><td>Uploaded by <strong>".$dig->user->username."</strong> at ".substr($dig->client_timestamp, 11, 8)." on ".substr($dig->client_timestamp, 0, 10)."</td></tr>" }}

		@foreach($dig->transects as $transect)
			<tr>
			<td>Transect</td>
			<td>
			@foreach($transect->clams as $clam)
					{{ "(".$clam->size." mm) " }}
			@endforeach
			</td></tr>
		@endforeach
		</table>
	
	@endforeach
@endif

