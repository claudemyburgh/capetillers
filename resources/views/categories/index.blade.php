@extends('layouts.app')

@section('title', 'Product Categories List')


@section('content')
<div class="backgroud--mute-pattern margin--bottom-small">
	<div class="wrapper">
		<div class="row text-align-center add--padding-small">
			<div class="md-col-8 md-offset-2">
				<h1 class="text--primary primary--header">See our product list of <strong>Tiller, Tractors</strong> and <strong>Attacments</strong></h1>
			</div>
		</div>
	</div>	
</div>
	<div class="wrapper margin--bottom-small">
		<div class="row flex block_animation_trigger">
			@foreach ($categories as $cat)
				<div class="sm-col-6 md-col-3 block_animation_elements">
					<a class="panel__link" href="{{ route('product.index', $cat->slug)  }}">					
						<div class="panel panel--default">
							<div class="panel__header background--primary text--mute">{{ $cat->name }}</div>
							<img class="panel__image" src="{{ asset('/img/categories/') . '/' . $cat->slug }}.jpg" alt="{{ config('app.name') }} {{ $cat->slug }}">
							<div class="panel__footer">
								<a href="{{ route('product.index', $cat->slug)  }}" class="btn btn--secondary btn--block">VIEW CATEGORY</a>
							</div>
						</div>
					</a>
				</div>
			@endforeach
		</div>
	</div>
@endsection


