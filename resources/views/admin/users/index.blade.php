@extends('layouts.admin')

@section('content')


<div class="row">

	<div class="md-col-12">
		<data-component endpoint="{{ route('data.users.index') }}"></data-component> 
	</div>
</div>

@endsection


