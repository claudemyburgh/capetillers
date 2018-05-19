@extends('layouts.admin')

@section('content')

<div class="row">
	
	<div class="sm-col-6 md-col-3">
		<a class="dashboard__block--link" href="{{ route('admin.categories.index') }}">
			<div class="dashboard__block">
				<div class="dashboard__block--left">
					<l class="lunacon lunacon-document lunacon--size-x3"></l>
				</div>
				<div class="dashboard__block--right">
					<h3>Categories</h3>
					<h4>{{ $categories->count() }}</h4>
				</div>
			</div>
		</a>
	</div>
	
	<div class="sm-col-6 md-col-3">
		<a class="dashboard__block--link" href="{{ route('admin.products.index') }}">
			<div class="dashboard__block">
				<div class="dashboard__block--left">
					<l class="lunacon lunacon-box-opened lunacon--size-x3"></l>
				</div>
				<div class="dashboard__block--right">
					<h3>Products</h3>
					<h4>{{ $products }}</h4>
				</div>
			</div>
		</a>
	</div>
	
	<div class="sm-col-6 md-col-3">
		<a class="dashboard__block--link" href="{{ route('admin.agents.index') }}">
			<div class="dashboard__block">
				<div class="dashboard__block--left">
					<l class="lunacon lunacon-users-solid lunacon--size-x2"></l>
				</div>
				<div class="dashboard__block--right">
					<h3>Agents</h3>
					<h4>{{ $agents }}</h4>
				</div>
			</div>
		</a>	
	</div>

	<div class="sm-col-6 md-col-3">
		<a class="dashboard__block--link" href="{{ route('admin.clients.index') }}">
			<div class="dashboard__block">
				<div class="dashboard__block--left">
					<l class="lunacon lunacon-address-book lunacon--size-x2"></l>
				</div>
				<div class="dashboard__block--right">
					<h3>Clients</h3>
					<h4>{{ $clients }}</h4>
				</div>
			</div>
		</a>
	</div>


</div>

@endsection
