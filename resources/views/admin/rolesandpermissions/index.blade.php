@extends('layouts.admin')

@section('content')


<div class="row">


	<div class="md-col-6">
		<data-component endpoint="{{ route('api.roles.index') }}"></data-component> 
	</div>

	<div class="md-col-6">
		<data-component endpoint="{{ route('api.permissions.index') }}"></data-component> 
	</div>


	
</div>

@endsection

