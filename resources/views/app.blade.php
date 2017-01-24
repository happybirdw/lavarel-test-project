<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel Test Project</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">


		<nav class="navbar fixed-top navbar-light bg-faded">

	        <a class="navbar-brand" href="{{ url('/') }}">Laravel Test Project</a>
{{-- 
	    	<div class="collapse navbar-collapse">
	            <ul class="navbar-nav">
	                <li class="nav-item"><a class="nav-link" href="{{ url('/articles') }}">Articles</a></li>
	                <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
	                <li class="nav-item"><a class="nav-link" href="https://laravel-news.com">News</a></li>
	                <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
	                <li class="nav-item"><a class="nav-link" href="https://github.com/happybirdw/lavarel-test-project">GitHub</a></li>
	            </ul>
        	</div>
 --}}
        </nav>

		@yield('content')

	</div>

	@yield('footer')
</body>
</html>