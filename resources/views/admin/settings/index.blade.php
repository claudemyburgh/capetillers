@extends('layouts.admin')

@section('content')


<div class="row text-align-center">

	<div class="sm-col-3">
		<run-task title="Cache Config File" url="{{ route('admin.settings.config') }}"></run-task>
	</div>
	<div class="sm-col-3">
		<run-task title="Cache View Blade Files" url="{{ route('admin.settings.view') }}"></run-task>
	</div>
	<div class="sm-col-3">
		<run-task title="Clean DataBase" url="{{ route('admin.settings.cleandb') }}"></run-task>
	</div>
	<div class="sm-col-3">
		<run-task title="Genarate Sitmap" url="{{ route('admin.settings.sitemap') }}"></run-task>
	</div>

	
</div>

@endsection


@section('scripts')

<script>
	



</script>

@endsection
