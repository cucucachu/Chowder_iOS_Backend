@if (isset($transects))
	@foreach ($transects as $i=>$t)
		{{ "<br><h2 id='tran_$i'>Transect from ".substr($t->client_timestamp, 0, 10)." at ".substr($t->client_timestamp, 11, 8)."</h2>" }}
		<table><tr><td><h3>Sections</h3></td><td><h3>Clams</h3></td></tr>
		@foreach ($t->sections as $s)
			<tr>
			{{ "<td><h3>".substr($s->client_timestamp, 11, 8)."</h3></td>" }}
			@foreach ($s->clams as $clam)
				{{ "<td><p>$clam->size mm </p></td>" }}
			@endforeach
			</tr>
		@endforeach
		</table>
	@endforeach
@endif