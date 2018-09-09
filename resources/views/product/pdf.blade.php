
@extends('layouts.pdf')




@section('content')

	<div class="wrapper">
		<div class="row">
			<div class="">
				<h4>{{ config('app.name') }}</h4>
				<hr>
				<h1 class="heading">{{ strtoupper($product->name) }}</h1>
			</div>
		</div>

		<div class="row">
			<div class="">
				{!! $product->content !!}
			</div>
		</div>
		<div class="page-break"></div>
		<div class="row">
			@foreach ($agents->get() as $agent)
				<div class="panel contacts">
					<div class="panel__header">
						{{ $agent->area }}<br>
					</div>
					<div class="panel__body">
						{{ $agent->name }}<br>
						{{ $agent->email }}<br>
						{{ $agent->cell }}<br>
						{{ $agent->phone }}<br>
					</div>
				</div>
				@if ($loop->index %2)
					</div>
					<div class="row">
						
				@endif
			@endforeach
		</div>
		<div class="row">
			<div>
				<br>
				<hr>
				<br>
				Last updated {{ $product->updated_at->diffForHumans() }}
			</div>
		</div>
	</div>	
@endsection


