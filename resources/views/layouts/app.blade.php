<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

	<!-- Styles -->
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
	


	<div class="the__loader" >
		<div class="sk-folding-cube">
		  <div class="sk-cube1 sk-cube"></div>
		  <div class="sk-cube2 sk-cube"></div>
		  <div class="sk-cube4 sk-cube"></div>
		  <div class="sk-cube3 sk-cube"></div>
		</div>
		<h1 class="text-align-center">LOADING....</h1>
			
	</div>

	<div class="primary__overlay"></div>
	<div class="secondary__overlay"></div>

	<div id="app">
		@if (session()->has('success'))
			<div class="notify notify__big notify--success">
			   <div class="wrapper">
				   <div class="row">
					   <div class="col text-align-center">
						  <h3>{{ session('success') }}</h3>
					   </div>
				   </div>
			   </div>
			</div>
		@endif


		@include('layouts.partials._menu')
		@if (!request()->is('/'))
			<div class="hero__small"></div>
		@endif
		@yield('content')
		@include('layouts.partials._contact_list')
		<footer class="footer">
			<div class="wrapper">
				<div class="row">
					<div class="md-col-4">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis voluptatum hic expedita esse, similique inventore velit sunt dolorem fugit dolor voluptatem, sed, ratione excepturi laboriosam ducimus suscipit consequatur reprehenderit molestias.
					</div>
				</div>
			</div>
		</footer>
		<footer class="footer__developer">
			<div class="wrapper">
				<div class="row text-align-center">
					Design and Developed by <a href="http://designbycode.co.za">DesignByCode</a>
				</div>
			</div>
		</footer>
	</div>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
