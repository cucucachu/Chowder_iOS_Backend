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
	<div class="menu">
		<table><tr>
			<td> {{ HTML::link('/', 'Home') }} </td>
			@yield('menu')
			<td> {{ HTML::link('/accounts/logout', 'Logout') }} </td>
		</tr></table>
	</div>
	<div class="main">
		<div class="content">
			
			@yield('content')
			
		</div>
	</div>
</div>

</body>

</html>

@yield('script');