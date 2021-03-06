<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-71625494-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-71625494-1');
	</script>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="msvalidate.01" content="D7FA5F3C1C35DD21C8BEC2F91C49053C" />

	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">


	<title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

	<!-- Styles -->

	<link  href="{{ ltrim(asset('css/style.css'), '/') }}" rel="stylesheet">
	<!--[if IE]>
	<![endif]-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	<link defer href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,700" rel="stylesheet">
	<script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>

</head>
<body>
	
{{-- 	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=178574036113971&autoLogAppEvents=1';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script> --}}

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
			{{-- @include('layouts.partials._breadcrumbs') --}}
		@else 
			<div class="hero">
				<div class="wrapper">
					<div class="md-col-8 md-offset-2 ">
						<div class="hero__logo__wrapper">
							<a href="">
								<img class="hero__logo" src="{{ asset('/img/logo2.png') }}" alt="" class="responsive__image">
							</a>
						
							<div class="hero__tiller">
								<img class="responsive__image" src="{{ asset('/img/hero-tiller.png') }}" alt="">
							</div>
							
						</div>
					</div>
				</div>
				<div class="hero__image"></div>
			</div>	
		@endif
		
		
		@yield('content')
		@include('layouts.partials._contact_list')
{{-- 		<footer class="footer">
			<div class="wrapper">
				<div class="row">
					<div class="md-col-4">
						<div class="panel panel--default">
							<div class="panel__body text-align-center">

								<div class="fb-page" 
									data-href="https://www.facebook.com/www.crystalbars.co.za/"
									data-tabs="timeline,events,messages"
									data-width="360" 
									data-small-header="false" 
									data-adapt-container-width="true" 
									data-hide-cover="false" 
									data-show-facepile="true">
								 </div>
								
							</div>
						</div>
					</div>

					<div class="md-col-4">

					</div>
				</div>
			</div>
		</footer> --}}
		<footer class=" footer footer__developer">
			<div class="wrapper">
				<div class="row text-align-center">
					Design and Developed by <a href="http://designbycode.co.za" target="_blank">DesignByCode</a>
				</div>
			</div>
		</footer>

		
		<div class="scrollup">
		      <div class="wrapper"><a href="#" class="scrollup__button"></a></div>
	    </div>

{{-- 	
		<div class="hide" itemscope itemtype="http://schema.org/WebSite">
		  <meta itemprop="url" content="https://www.capetillers.co.za/"/>
		  <form itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction">
		    <meta itemprop="target" content="https://capetillers.co.za/search?q={search_term_string}"/>
		    <input itemprop="query-input" type="text" name="search_term_string" required/>
		    <input type="submit"/>
		  </form>
		</div>

 --}}
	</div>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>

	
</body>
</html>
