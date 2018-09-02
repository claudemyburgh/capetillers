		<div class="breadcrumbs">
			<div class="wrapper clearfix">
				<a href="{{ url('/') }}" class="breadcrumb"> Home</a>

				@foreach (request()->breadcrumbs()->segments() as $segment)
					<a href="{{ $segment->url() }}" class="breadcrumb">{{ optional($segment->model())->breadcrumbValue() ?: $segment->name() }}</a>
				@endforeach
				
			</div>
		</div>
