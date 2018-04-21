
<section id="parallax" class="section--secondary strip--margin-bottom">

	<div class="wrapper">

		<div class="row zup">
			<div class="md-col-12 text-align-center ">
				<h1 class="text--secondary secondary--header">Contact Us <strong>Today!</strong></h1>
			</div>
			
		</div>
		<div class="row flex">
			@foreach ($agents as $agent)
				<div class="md-col-4 jQueryEqualHeight ">
					<div class="panel panel--default text--secondary block_animation_elements">
						<div class="panel__header">{{ $agent->area }}</div>
						<div class="panel__body">
							<p>
								<strong>{{ $agent->name }}</strong>
								
							</p>
							@if ($agent->company)
								<p><strong>Company:</strong> {{ $agent->company }}</p>
							@endif

							@if ($agent->phone)
								<p><strong>Phone:</strong> <a href="tel:{{ trim($agent->phone) }}">{{ $agent->phone }}</a></p>
							@endif

							@if ($agent->cell)
								<p><strong>Cell Phone:</strong> <a href="tel:{{ trim($agent->cell) }}">{{ $agent->cell }}</a></p>
							@endif

							@if ($agent->email)
								<p><strong>Email:</strong> <a href="mailto:{{ trim($agent->email) }}">{{ $agent->email }}</a></p>
							@endif

							@if ($agent->website)
								<p><strong>Website:</strong> <a href="mailto:{{ trim($agent->website) }}">{{ $agent->website }}</a></p>
							@endif


						</div>
					</div>

				</div>
			@endforeach
		</div>
	</div>
	{{-- <div class="parallax__image"> --}}
		<video  class="parallax__image" autoplay="true" loop="true" src="{{ asset('/video/file.mp4') }}"></video>
	{{-- </div> --}}

</section>