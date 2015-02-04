<!DOCTYPE html>
<head> 
<link rel="stylesheet" type="text/css" href="/iOS/public/css/default.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>

<div class="top">
	<div class="header">
		<div class="left">
			<img src="/iOS/public/images/ChowderBackground_320x367.png">
		</div>
		<div class="right">
			<h1>Chowder</h1>
		</div>
	</div>
</div>

<div class="container">	
	<div class="main">
		<div class="content">
			
			<h1>Live Feed</h1>
			
			@if (isset($msg))
				<p> {{ $msg }} </p>
			@endif		
			<br>
			<div id='transects_table'></div>
			
		</div>
	</div>
</div>

</body>

</html>

<script>
$(document).ready(function() {
	update();
});

function update() {
	$('#transects_table').load('/iOS/public/latest');
	setTimeout(update, 2000);
}
</script>