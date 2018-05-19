@extends('layouts.admin')

@section('content')


<div class="row">
	<div class="md-col-12">
		<h2>Maintenance &amp; Optimization</h2>
	</div>
</div>

<div class="row text-align-center">

	<div class="sm-col-3">
		<run-task title="Cache Config File" url="{{ route('admin.maintenance.config') }}"></run-task>
	</div>
	<div class="sm-col-3">
		<run-task title="Cache View Blade Files" url="{{ route('admin.maintenance.view') }}"></run-task>
	</div>
	<div class="sm-col-3">
		<run-task title="Clean DataBase" url="{{ route('admin.maintenance.cleandb') }}"></run-task>
	</div>
	<div class="sm-col-3">
		<run-task title="Genarate Sitmap" url="{{ route('admin.maintenance.sitemap') }}"></run-task>
	</div>
	
</div>

<div class="row text-align-center">
	
	<div class="sm-col-3">
		<run-task title="Cache Routes" url="{{ route('admin.maintenance.route') }}"></run-task>
	</div>

</div>



@endsection


@section('scripts')

<script>
	



</script>

@endsection
