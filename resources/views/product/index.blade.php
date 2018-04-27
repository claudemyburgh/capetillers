{{-- List of categories --}}

@extends('layouts.app')

@section('title', "Product list for " . $category->name)


@section('content')
<div class="backgroud--mute-pattern margin--bottom-small">
	<div class="wrapper zup">
		<div class="row text-align-center add--padding-small">
			<div class="md-col-8 md-offset-2">
				<h1 class="text--primary primary--header">List of product in the <strong>"{{ $category->name }}"</strong> category</h1>
			</div>
		</div>
	</div>	
</div>
	
	<div class="wrapper margin--bottom-small">
		@if ($products->count())
			<div class="row flex ">
				@foreach ($products as $product)
					<div class="sm-col-6 md-col-3">
						<a class="panel__link" href="{{ route('product.show', [$category, $product]) }}">					
							<div class="panel panel--default">
								<div class="panel__header background--primary text--mute">{{ $product->name }}</div>
								
								@if($product->photos->count())
									<img class="panel__image" src="{{ Storage::url($product->photos->first()->path) }}" alt="{{ config('app.name') }} {{ $product->name }}">
								@else 
									<img class="panel__image" src="{{ asset('img/no-image.jpg') }}" alt="{{ config('app.name') }} no image">

								@endif
								<div class="panel__footer">
									<div class="btn__group">
										
									<a href="{{ route('product.show', [$category, $product]) }}" class="btn btn--secondary btn--block">VIEW PRODUCT</a>
									@role('super admin')
										<a target="_blank" href="{{ route('admin.product.create', $product) }}" class="btn btn--block">EDIT PRODUCT</a>
									@endrole
									</div>
								</div>
							</div>
						</a>
					</div>
				@endforeach
			</div>
		@else
			<div class="row">
				<div class="md-col-12 text-align-center">
					<h3 class="text--secondary">
						There is no products in this category at this time.
					</h3>
				</div>
			</div>
		@endif	
	</div>
@endsection


