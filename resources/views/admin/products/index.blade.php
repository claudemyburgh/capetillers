@extends('layouts.admin')

@section('content')


<div class="row">


	<div class="md-col-12">
		<div class="panel pane--default" >
		    <div class="panel__header">
		        <a class="btn btn--primary" href="{{ route('admin.product.create.start') }}">Create Product</a>		        

		        <a class="btn btn--primary" href="{{ route('admin.products.list') }}">Edit Products List</a>
		    </div>
		</div>
		<data-component endpoint="{{ route('api.products.index') }}"></data-component> 
	</div>
</div>

@endsection


