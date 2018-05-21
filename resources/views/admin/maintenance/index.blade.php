@extends('layouts.admin')

@section('content')


<div class="row">
	<div class="md-col-12">
		<h2>Maintenance &amp; Optimization</h2>
	</div>
</div>

<div class="row">
	<div class="col">
		<h3>Caching of files</h3>
	</div>
	<div class="md-col-3">
		<run-task title="Cache Routes" btn="btn--primary" url="{{ route('admin.maintenance.route') }}"></run-task>
	</div>

	<div class="md-col-3">
		<run-task title="Cache Config File" btn="btn--primary" url="{{ route('admin.maintenance.config') }}"></run-task>
	</div>

	<div class="md-col-3">
		<run-task title="Cache View Blade Files" btn="btn--primary" url="{{ route('admin.maintenance.view') }}"></run-task>
	</div>

	<div class="md-col-3">
		<run-task title="Clear All Cached Files" btn="btn--danger" url="{{ route('admin.maintenance.cache') }}"></run-task>
	</div>

</div>

	<div class="row">
		
		<div class="col">
			<h3>Create bot files</h3>
		</div>
		<div class="md-col-3">
			<run-task title="Genarate Sitmap" btn="btn--info" url="{{ route('admin.maintenance.sitemap') }}"></run-task>
		</div>
	</div>
	
<div class="row">
	
	<div class="col">
		<h3>Database Tasks</h3>
	</div>
	<div class="md-col-3">
		
		<run-task title="Clean DataBase" btn="btn--primary" url="{{ route('admin.maintenance.cleandb') }}"></run-task>
	</div>

</div>



@endsection


@section('scripts')

<script>
	



</script>

@endsection
