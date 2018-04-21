@extends('layouts.app')

@section('title', 'Welcome to Cape Tillers the of tiller in Cape Town')

@section('content')

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

<section class="section--dark">
	<div class="wrapper">
		<div class="row">
			<div class="md-col-6">
				<h1>Welcome to Cape Tillers</h1>
				<p>Cape Tillers is the proud distributor of Tillers / Rotovators / Cultivators / Walk Behind Tractors, Mini Trenchers, Two Wheel Tractors, Vegetable Seeders and Wood Chippers in the Western, Eastern, Northern Cape &amp; Namibia.

					<p>All our machines are built to standards of quality and durability expected of agricultural equipment and used worldwide for small-scale farming, horticultural, industrial, landscaping, home use and is the perfect tool to use for sustainable farming. Like a 4-wheel farm tractor, these rugged two-wheel machines are designed to run many attachments with a single power source and give thousands of hours of service.</p>

					<p>We offer and stock more implements for walk-behind tractors than any other distributor in South Africa, greatly expanding on the implement offerings. We currently stock over 20 different types of implements.</p>

					<p>We provide complete service and parts for all equipment we sell. We ensure to keep all required spare parts in stock. Parts orders usually ship out the same day or the next day via the parcel carrier of your choice. In addition we carry a full line of gasoline and diesel replacement engines to fit all our machines.</p>

					<p>All machines carry a 1-year carry in warranty</p>
					<p>
					For customers beyond driving distance, we offer equipment shipped at very reasonable rates… right to your door. All tractors test run by us prior to shipping. Call for a shipping quote!</p>
			</div>

			<div class="md-col-6">
				<div class="row img__blocks__wrapper block_animation_trigger">
					@foreach ($cats as $cat)
						<div class="img__blocks block_animation_elements" data-product="{{ $cat->name }}">
							<a href="{{ route('product.index', $cat->slug)  }}">
								<img src="{{ asset('/img/categories/') . '/' . $cat->slug }}.jpg" alt="{{ config('app.name') }} category for {{ $cat->name }} ">
							</a>
						</div>
					@endforeach
				</div>
					<p class="text-align-center">
						<a href="{{ route('categories.index') }}" class="btn btn--lg btn--primary">SEE ALL CATEGORIES</a>	
					</p>
			</div>
		</div>
	</div>	
</section>


@endsection





