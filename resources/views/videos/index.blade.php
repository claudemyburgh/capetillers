@extends('layouts.app')

@section('title', 'Videos about our tillers')

@section('content')

<div class="backgroud--mute-pattern margin--bottom-small">
	<div class="wrapper">
		<div class="row text-align-center add--padding-small">
			<div class="md-col-8 md-offset-2">
				<h1 class="text--primary primary--header">Demo Videos</h1>
			</div>
		</div>
	</div>	
</div>



<div class="wrapper  margin--bottom-small">
	<div class="row">
		<div class="md-col-8 md-offset-2 text-align-center">
			<h2>Stalk Harvester</h2>
			<div class="well ">
				<div class="responsive__wide-screen">
					<iframe class="responsive__item" width="560" height="315" src="https://www.youtube.com/embed/vQi5cvIu5tE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
			</div>
			<div class="devider"></div>

			<h2>Mini Tiller</h2>
			
			<div class="well ">
				<div class="responsive__wide-screen">
					<iframe class="responsive__item" width="1280" height="720" src="https://www.youtube.com/embed/8FQkHMPhXd8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
			</div>
			

		</div>
	</div>
</div>



@endsection

