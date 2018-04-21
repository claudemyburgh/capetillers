@extends('layouts.app')

@section('title', 'Manuals for tillers')

@section('content')

<div class="backgroud--mute-pattern margin--bottom-small">
	<div class="wrapper">
		<div class="row text-align-center add--padding-small">
			<div class="md-col-8 md-offset-2">
				<h1 class="text--primary primary--header">Download your <strong>User Maunuals</strong> here</h1>
			</div>
		</div>
	</div>	
</div>

<div class="wrapper margin--bottom-small">
	<div class="row flex">
		
		<div class="md-col-3">
			<div class="card">
				<div class="card__thumb">
					<img src="{{ asset('/img/manuals.jpg') }}" alt="{{ config('app.name') }} user manuals">
				</div>
				<div class="card__body">
					<div class="card__body__title">
						Diesel Engine Manual
					</div>
				</div>
				<div class="card__footer">
					<a href="#" class="btn btn--secondary btn--block">DOWNLOAD</a>
				</div>
			</div>
		</div>		

		
		<div class="md-col-3">
			<div class="card">
				<div class="card__thumb">
					<img src="{{ asset('/img/manuals.jpg') }}" alt="{{ config('app.name') }} user manuals">
				</div>
				<div class="card__body">
					<div class="card__body__title">
						Petrol Engine Manual
					</div>
				</div>
				<div class="card__footer">
					<a href="#" class="btn btn--secondary btn--block">DOWNLOAD</a>
				</div>
			</div>
		</div>		


		<div class="md-col-3">
			<div class="card">
				<div class="card__thumb">
					<img src="{{ asset('/img/manuals.jpg') }}" alt="{{ config('app.name') }} user manuals">
				</div>
				<div class="card__body">
					<div class="card__body__title">
						Trencher TM450A Manual
					</div>
				</div>
				<div class="card__footer">
					<a href="#" class="btn btn--secondary btn--block">DOWNLOAD</a>
				</div>
			</div>
		</div>

		<div class="md-col-3">
			<div class="card">
				<div class="card__thumb">
					<img src="{{ asset('/img/manuals.jpg') }}" alt="{{ config('app.name') }} user manuals">
				</div>
				<div class="card__body">
					<div class="card__body__title">
						TM1000 Series Manual
					</div>
				</div>
				<div class="card__footer">
					<a href="#" class="btn btn--secondary btn--block">DOWNLOAD</a>
				</div>
			</div>
		</div>


		<div class="md-col-3">
			<div class="card">
				<div class="card__thumb">
					<img src="{{ asset('/img/manuals.jpg') }}" alt="{{ config('app.name') }} user manuals">
				</div>
				<div class="card__body">
					<div class="card__body__title">
						TM950A Manual
					</div>
				</div>
				<div class="card__footer">
					<a href="#" class="btn btn--secondary btn--block">DOWNLOAD</a>
				</div>
			</div>
		</div>



		<div class="md-col-3">
			<div class="card">
				<div class="card__thumb">
					<img src="{{ asset('/img/manuals.jpg') }}" alt="{{ config('app.name') }} user manuals">
				</div>
				<div class="card__body">
					<div class="card__body__title">
						Trencher TM600 Manual
					</div>
				</div>
				<div class="card__footer">
					<a href="#" class="btn btn--secondary btn--block">DOWNLOAD</a>
				</div>
			</div>
		</div>

		<div class="md-col-3">
			<div class="card">
				<div class="card__thumb">
					<img src="{{ asset('/img/manuals.jpg') }}" alt="{{ config('app.name') }} user manuals">
				</div>
				<div class="card__body">
					<div class="card__body__title">
						15HP Wood Chipper Manual
					</div>
				</div>
				<div class="card__footer">
					<a href="#" class="btn btn--secondary btn--block">DOWNLOAD</a>
				</div>
			</div>
		</div>


		<div class="md-col-3">
			<div class="card">
				<div class="card__thumb">
					<img src="{{ asset('/img/manuals.jpg') }}" alt="{{ config('app.name') }} user manuals">
				</div>
				<div class="card__body">
					<div class="card__body__title">
						6.5HP Wood Chipper Manual
					</div>
				</div>
				<div class="card__footer">
					<a href="#" class="btn btn--secondary btn--block">DOWNLOAD</a>
				</div>
			</div>
		</div>

	</div>	
</div>


@endsection

