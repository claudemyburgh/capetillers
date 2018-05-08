@extends('layouts.admin')

@section('content')


<div class="row">


	<div class="md-col-6">
		<data-component endpoint="{{ route('data.roles.index') }}"></data-component> 
	</div>

	<div class="md-col-6">
		<data-component endpoint="{{ route('data.permissions.index') }}"></data-component> 
	</div>


	
</div>

@endsection

