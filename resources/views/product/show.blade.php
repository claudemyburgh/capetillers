{{-- List of categories --}}

@extends('layouts.app')

@section('title', 'Product list for '  . $product->name)


@section('content')
<div class="backgroud--mute-pattern margin--bottom-small">
	<div class="wrapper">
		<div class="row text-align-center add--padding-small">
			<div class="md-col-8 md-offset-2">
				<h1 class="text--primary primary--header">{{ strtoupper($product->name) }}</h1>
				<br>
				<a href="{{ route('product.download', [$category, $product]) }}" target="_blank" class="btn btn--primary">DOWNLOAD PDF</a>
				{{-- <h4>STOCK NUMBER - {{ $product->sku }}</h4> --}}
			</div>
		</div>
	</div>	
</div>
<div class="wrapper margin--bottom-small">

	<div class="row stickme__trigger">
		<div class="md-col-5 stickme">
			
			@if ($product->photos()->count())
				<div class="product__photo__list main-carousel ">
					@foreach ($product->photos as $photo)
						<div class="carousel-cell">
							<img class="product__photo__list__item__image" src="{{ Storage::url($photo->path) }}" alt="{{ config('app.name') . ' - ' . $product->slug }}">
						</div>
					@endforeach
				</div>

			@else 	
			<div class="product__photo__list main-carousel">
				<img class="product__photo__list__item__image" src="{{ asset('img/no-image.jpg') }}" alt="{{ config('app.name') . ' - ' . $product->slug }}">
			</div>
			@endif	
		
		</div>

	

		<div class="md-col-7">
			<div class="panel panel--default">
				<header class="panel__header">
					<h2>{{ $product->name }}</h2>
				</header>
			</div>
			{!! $product->content !!}

			<br>
			<footer>
				<div class="panel panel--defulat">
					<div class="panel__header">Contact us about <strong>{{ strtoupper($product->name) }}</strong></div>
					<div class="panel__body">
						<contact-form posturl="{{ route('contact.send') }}" clienturl="{{ route('list_agents') }}" product="{{ $product->name }}" ></contact-form>	
					</div>
				</div>
			</footer>
		</div>
	</div>
</div>
@endsection


