<!doctype html>
<html lang="en">
<head>
	@section('head')
	<meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script type="text/javascript" src="js/app.js"></script>
    @show

</head>

<body>
<div class="navbar">
<nav id="nav-3">
    <a class="link-3" href="{{ URL::route('home') }}">Početna strana</a>
    <a class="link-3" href="{{ URL::route('forum-home') }}">Forum</a>

    @if(!Auth::check())
        <a class="link-3" href="{{ URL::route('getCreate') }}">Registracija</a>
        <a class="link-3" href="{{ URL::route('getLogin') }}">Login</a>
    @else
        <a class="link-3" href="{{ URL::route('getLogout') }}">Logout</a>
    @endif
</nav>
</div>


	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif


	<div class="container">@yield('content')</div>

	@section('javascript')
		<script src="http://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="js/app.js" type="javascript"></script>

    @show

    @section('styles')
        <?php echo HTML::style('css/style.css'); ?>
    @show
</br>
    <ul class="nav pull-right scroll-top">
        <li><a href="#" title="Scroll to top"><i class="glyphicon glyphicon-chevron-up"></i></a></li></ul>

<div id="content_footer"></div>
<div id="footer">
    <p><a href="#">Home</a> | <a href="#">Examples</a> | <a href="#">A Page</a> | <a href="#">Another Page</a> | <a href="#">Contact Us</a></p>
    <p>Tehnički fakultet "Mihajlo Pupin" Zrenjanin | <a href="#">HTML5</a> | <a href="#">CSS</a> | <a href="#">E-mail foruma, neki tekst</a></p>
</div>


</body>
</html>
