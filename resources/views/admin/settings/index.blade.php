@extends('layouts.admin')

@section('content')


<div class="row text-align-center">

	<div class="md-col-4">
		<run-task title="Clean DataBase" url="{{ route('admin.settings.cleandb') }}"></run-task>
	</div>
	<div class="md-col-4">
		<run-task title="Genarate Sitmap" url="{{ route('admin.settings.sitemap') }}"></run-task>
	</div>

	
</div>

@endsection


@section('scripts')

<script>
	



</script>

@endsection
