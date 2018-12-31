<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PhotoShow</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
	<link rel="stylesheet" href="css/app.css">
</head>
<body>
	
	@include('inc.topbar')
	<br>
	<div class="ui container">
		@include('inc.messages')
		<br>
		@yield('content')
		<br>
	</div>
	<!-- Scripts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
</body>
</html>