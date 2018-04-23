
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
					<div itemscope itemtype="http://schema.org/Person" class="panel panel--default text--secondary block_animation_elements">
						<div itemprop="workLocation" class="panel__header">{{ $agent->area }}</div>
						<div class="panel__body">
							<p>
								<strong itemprop="givenName">{{ $agent->name }}</strong>
								
							</p>
							@if ($agent->company)
								<p><strong >Company:</strong><span itemprop="worksFor"> {{ $agent->company }}</span></p>
							@endif

							@if ($agent->phone)
								<p><strong >Phone:</strong> <a href="tel:{{ trim($agent->phone) }}"><span itemprop="telephone" >{{ $agent->phone }}</span></a></p>
							@endif

							@if ($agent->cell)
								<p><strong>Cell Phone:</strong> <ahref="tel:{{ trim($agent->cell) }}"><span itemprop="telephone"  >{{ $agent->cell }}</span></a></p>
							@endif

							@if ($agent->email)
								<p><strong >Email:</strong> <a  href="mailto:{{ trim($agent->email) }}"><span itemprop="email">{{ $agent->email }}</span></a></p>
							@endif

							@if ($agent->website)
								<p><strong>Website:</strong> <a  href="{{ trim($agent->website) }}"><span itemprop="url" >{{ $agent->website }}</span></a></p>
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
