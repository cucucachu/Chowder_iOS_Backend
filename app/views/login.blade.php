

	<form action="/iOS/public/accounts/login" method="post">
	<label>username: </label><input type="text" name="username"></input><br>
	<label>password: </label><input type="text" name="password"></input><br>
	<input type="Submit" value="Submit"></input>
	</form>
	@if (isset($msg))
		{{ $msg }}
	@endif

