<!DOCTYPE html>
<head> 
<link rel="stylesheet" type="text/css" href="/iOS/public/css/default.css">
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
			
			@if (isset($msg))
				<p> {{ $msg }} </p>
			@endif
			
			<table width = 800>
				<tr>
					<td>
						<h3>Login</h3>
						<form action="accounts/login" method="POST">
							username<input type="text" name="username"><br>
							password<input type="text" name="password"><br>
							<input type="submit" value="Login"><br>
						</form>
					</td>
					<td>
						<h3>Sign Up</h3>
						<form action="accounts/signUp" method="POST">
							username<input type="text" name="username"><br>
							email<input type="text" name="email"><br>
							password<input type="text" name="password"><br>
							password again<input type="text" name="password_again"><br>
							<input type="submit" value="Sign Up"><br>
						</form>
					</td>
				</tr>
				<tr>
					<td>
						<h3>Add Transect</h3>
						<form action="upload/transect" method="POST">
							Device<input type="text" name="device"><br>
							Client_ID<input type="text" name="client_id"><br>
							GPS x<input type="text" name="gps_x"><br>
							GPS y<input type="text" name="gps_y"><br>	
							Test<input type="text" name="test"><br>	
							<input type="submit" value="Add Transect"><br>
						</form>
					</td>
					
					<td>			
						<h3>Add Section</h3>
						<form action="upload/section" method="POST">
							Device<input type="text" name="device"><br>
							Client_ID<input type="text" name="client_id"><br>
							Transect_ID<input type="text" name="transect_id"><br>
							GPS x<input type="text" name="gps_x"><br>
							GPS y<input type="text" name="gps_y"><br>			
							Test<input type="text" name="test"><br>	
							<input type="submit" value="Add Section"><br>
						</form><br><br>
					</td>
					
					<td>
						<h3>Add Clam</h3>
						<form action="upload/clam" method="POST">
							Device<input type="text" name="device"><br>
							Client_ID<input type="text" name="client_id"><br>
							Section_ID<input type="text" name="section_id"><br>
							Size<input type="text" name="size"><br>
							Test<input type="text" name="test"><br>		
							<input type="submit" value="Add Clam"><br>
						</form><br><br>
					</td>
				</tr>
			</table>
			
			
			@if (isset($transects))
				@foreach ($transects as $t)
					{{ "<h2>Transects $t->id</h2>" }}
					@foreach ($t->sections as $s)
						{{ "<h3>Section $s->id</h3>" }}
						@foreach ($s->clams as $clam)
							{{ "<p>Clam $clam->id</p>" }}
						@endforeach
					@endforeach
				@endforeach
			@endif
			
			@if (isset($users))
				@foreach ($user as $users)
					<p> {{ $user->username }} </p>
				@endforeach
			@endif
		</div>
	</div>
</div>

</body>

</html>