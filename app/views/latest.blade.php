@if (isset($digs))
	@foreach($digs as $i=>$dig)
		<table>
		{{ "<tr><td><h3>".$dig->name."</h3></td><td>Uploaded by <strong>".$dig->user->username."</strong> at ".substr($dig->client_timestamp, 11, 8)." on ".substr($dig->client_timestamp, 0, 10)."</td></tr>" }}

		@foreach($dig->transects as $number=>$transect)
			<tr>
			{{ "<td>Transect ".($number+1)." </td>" }}
			<td>
			@foreach($transect->clams as $clam)
					{{ "(".$clam->width." mm) " }}
			@endforeach
			</td></tr>
		@endforeach
		</table>
		<br>
	
	@endforeach
@endif

