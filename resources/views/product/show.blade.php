{{-- List of categories --}}

@extends('layouts.app')

@section('title', 'Product list for '  . $product->name)


@section('content')
<div class="backgroud--mute-pattern margin--bottom-small">
	<div class="wrapper">
		<div class="row text-align-center add--padding-small">
			<div class="md-col-8 md-offset-2">
				<h1 class="text--primary primary--header">{{ ucwords($product->name) }}</h1>
				{{-- <h4>STOCK NUMBER - {{ $product->sku }}</h4> --}}
			</div>
		</div>
	</div>	
</div>
<div class="wrapper margin--bottom-small">
	<div class="row stickme__trigger">
		<div class="md-col-5 ">
			<div class="stickme">
				
			@if ($product->photos()->count())
				<div class="product__photo__list main-carousel">
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
				<form action="{{ route('email.product.info', [$product]) }}" method="post">
					{{ csrf_field() }}

					<div class="panel panel--default">
						<div class="panel__header">CONTACT US ABOUT THIS PRODUCT</div>
						<div class="panel__body">
							
							<div class="notify notify--warning-light">
								<small class="form__helper">The <strong class="text--danger">*</strong> indicate required fields</small>
								
							</div>

							<div class="form__group {{ $errors->has('name') ? ' has__danger' : '' }}">
								<label for="name" class="form__label">Name <strong class="text--danger">*</strong></label>
								<input type="text" name="name" id="name" value="{{ old('name') }}" class="form__item" autofocus >
								@if ($errors->has('name'))
									<span class="form__helper">{{ $errors->first('name') }}</span>
								@endif
							</div>

							<div class="form__group {{ $errors->has('email') ? ' has__danger' : '' }}">
								<label for="email" class="form__label">Email <strong class="text--danger">*</strong></label>
								<input type="email" name="email" id="email" value="{{ old('email') }}" class="form__item" >
								@if ($errors->has('email'))
									<span class="form__helper">{{ $errors->first('email') }}</span>
								@endif
							</div>

							<div class="form__group {{ $errors->has('phone') ? ' has__danger' : '' }}">
								<label for="phone" class="form__label">Phone Number <strong class="text--danger">*</strong></label>
								<input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="form__item" >
								@if ($errors->has('phone'))
									<span class="form__helper">{{ $errors->first('phone') }}</span>
								@endif
							</div>

							<div class="form__group {{ $errors->has('message_body') ? ' has__danger' : '' }}">
								<label for="message_body" class="form__label">Message <strong class="text--danger">*</strong></label>
								<textarea class="form__item" type="text" name="message_body" id="message_body" cols="30" rows="10" >{{ old('message_body') }}</textarea>
								
								@if ($errors->has('message_body'))
									<span class="form__helper">{{ $errors->first('message_body') }}</span>
								@endif
							</div>

							<div class="form__group">
								<button type="submit" class="btn btn--primary">SEND MAIL</button>
							</div>
						</div>
					</div>		


				</form>
			</footer>
		</div>
	</div>
</div>
@endsection


