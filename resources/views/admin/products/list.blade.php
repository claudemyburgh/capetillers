@extends('layouts.admin')

@section('content')


<div class="row">


	<div class="md-col-12">
		<div class="table__responsive">
		
			<table class="table table--striped table--bordered">
				<thead class="table__head">
					<tr>
						<th>ID</th>
						<th>SKU</th>
						<th>NAME</th>
						<th>SLUG</th>
						<th>ACTION</th>
					</tr>
				</thead>
				<tbody class="table__body">
					@foreach ($products as $product)
						<tr>
							<td>{{ $product->id }}</td>
							<td>{{ $product->sku }}</td>
							<td>{{ $product->name }}</td>
							<td>{{ $product->slug }}</td>
							<td><a href="{{ route('admin.product.create', $product) }}">Edit</a></td>
						</tr>
					@endforeach
				</tbody>	
			</table>
		</div>	
		{{ $products->links() }}
	</div>
</div>

@endsection


