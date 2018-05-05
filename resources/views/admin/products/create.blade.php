@extends('layouts.admin')

@section('content')


<div class="row">


	<div class="md-col-12">
		<div class="panel pane--default" >
		    <div class="panel__header">
		        <a class="btn btn--primary" href="#">Back to Product</a>
		    </div>
		    <div class="panel__body">
		    	<form action="{{ route('admin.product.store', $product) }}" method="post">
		    		@csrf 

		    		<div class="form__group">
		    		    <div class="dropzone" id="file"></div>  
		    		</div>



		    		<div class="form__group {{ $errors->has('sku') ? ' has__danger' : '' }} ">
		    			<label for="sku" class="form__label">Stock Number <em>(SKU)</em>:</label>
		    			<input type="text" name="sku" id="sku" class="form__item" value="{{ old('sku', $product->sku) }}">
		    			@if($errors->has('sku'))
							<small class="form__helper">
								{{ $errors->first('sku') }}
							</small>
		    			@endif
		    		</div>  

		    		<div class="form__group {{ $errors->has('name') ? ' has__danger' : '' }} ">
		    			<label for="name" class="form__label">Product Name:</label>
		    			<input type="text" name="name" id="name" class="form__item" value="{{ old('name', $product->name) }}">
		    			@if($errors->has('name'))
							<small class="form__helper">
								{{ $errors->first('name') }}
							</small>
		    			@endif
		    		</div> 



		    		<div class="form__group {{ $errors->has('price') ? ' has__danger' : '' }} ">
		    			<label for="category_id" class="form__label">Category:</label>
		    			<select class="form__item" name="category_id" id="category_id">
		    				@foreach ($categories as $cat)
			    				<option value="{{ $cat->id }}" {{ old('category_id', $product->category_id == $cat->id) ? ' selected' : '' }} >{{ $cat->name }}</option>

		    				@endforeach
		    			</select>
		    			
		    			@if($errors->has('category_id'))
							<small class="form__helper">
								{{ $errors->first('category_id') }}
							</small>
		    			@endif
		    		</div> 


		    		<div class="form__group {{ $errors->has('slug') ? ' has__danger' : '' }} ">
		    			<label for="slug" class="form__label">Slug:</label>
		    			<input disabled="disabled" type="text" name="slug" id="slug" class="form__item" value="{{ old('slug', $product->slug) }}">
		    			@if($errors->has('slug'))
							<small class="form__helper">
								{{ $errors->first('slug') }}
							</small>
		    			@endif
		    		</div>
		    		

		    		<div class="form__group {{ $errors->has('excerpt') ? ' has__danger' : '' }} ">
		    			<label for="excerpt" class="form__label">Excerpt</label>
<textarea class="form__item" name="excerpt" id="excerpt" cols="30" rows="5">{{ old('excerpt', $product->excerpt) }}</textarea>
		    			
		    			@if($errors->has('excerpt'))
							<small class="form__helper">
								{{ $errors->first('excerpt') }}
							</small>
		    			@endif
		    		</div> 		    		

		    		<div class="form__group {{ $errors->has('content') ? ' has__danger' : '' }} ">
		    			<label for="content" class="form__label">Content Description</label>
<textarea class="form__item" name="content" id="content editor" cols="30" rows="10">{{ old('content', $product->content) }}</textarea>
		    			
		    			@if($errors->has('content'))
							<small class="form__helper">
								{{ $errors->first('content') }}
							</small>
		    			@endif
		    		</div> 

		    		<div class="row">
		    			
			    		<div class="md-col-6 form__group {{ $errors->has('price') ? ' has__danger' : '' }} ">
			    			<label for="price" class="form__label">Price:</label>
			    			<input type="text" name="price" id="price" class="form__item" value="{{ old('price', $product->price) }}">
			    			@if($errors->has('price'))
								<small class="form__helper">
									{{ $errors->first('price') }}
								</small>
			    			@endif
			    		</div> 

			    		<div class="md-col-6 form__group {{ $errors->has('salesprice') ? ' has__danger' : '' }} ">
			    			<label for="salesprice" class="form__label">Sales Price:</label>
			    			<input type="text" name="salesprice" id="salesprice" class="form__item" value="{{ old('salesprice', $product->salesprice) }}">
			    			@if($errors->has('salesprice'))
								<small class="form__helper">
									{{ $errors->first('salesprice') }}
								</small>
			    			@endif
			    		</div> 
					</div><!--row-->
 

		    		<div class="row">
		    			
			    		<div class="md-col-12 form__group {{ $errors->has('price') ? ' has__danger' : '' }} ">
			    			<label for="price" class="form__label">Availability:</label>
			    			<select class="form__item" name="availability" id="availability">
			    				<option value="instock" {{ old('availability', $product->availability === 'instock') ? ' selected' : '' }} >Instock</option>
			    				<option value="out-of-stock" {{ old('availability', $product->availability === 'out-of-stock') ? ' selected' : '' }} >Out Of Stock</option>
			    				<option value="pre-order" {{ old('availability', $product->availabilit === 'pre-oreder') ? ' selected' : '' }} >Pre Order</option>
			    			</select>
			    			
			    			@if($errors->has('price'))
								<small class="form__helper">
									{{ $errors->first('price') }}
								</small>
			    			@endif
			    		</div> 


					</div><!--row--> 

		    		<div class="row">
		    			
			    		<div class="md-col-6 form__group {{ $errors->has('live') ? ' has__danger' : '' }} ">
		
			    			<div class="form__group__checkbox">
			    			   <input type="checkbox" name="live" id="live" class="form__checkbox"   {{ old('live', $product->live) ? ' checked' : '' }}/>
			    			   <label for="live" class="from__label__checkbox">Make Live</label>
			    			   <div class="clear"></div>
			    			   <small class="form__helper">Uncheck to hide on fronted</small>
			    			 </div>
			    			
			    			@if($errors->has('live'))
								<small class="form__helper">
									{{ $errors->first('live') }}
								</small>
			    			@endif
			    		</div>
    		    		<div class="md-col-6 form__group {{ $errors->has('onsale') ? ' has__danger' : '' }} ">
    		
    		    			<div class="form__group__checkbox">
    		    			   <input type="checkbox" name="onsale" id="onsale" class="form__checkbox" {{ old('onsale', $product->onsale) ? ' checked' : '' }}/>
    		    			   <label for="onsale" class="from__label__checkbox">OnSale</label>
    		    			   <div class="clear"></div>
    		    			   <small class="form__helper">Show and hide sales banner</small>
    		    			 </div>
    		    			@if($errors->has('onsale'))
    							<small class="form__helper">
    								{{ $errors->first('onsale') }}
    							</small>
    		    			@endif
    		    		</div> 
					</div><!--row-->

					<div class="form__group">
						<button type="submit" class="btn btn--primary">Submit</button>
					</div>


		    	</form>
		    </div>
		</div>
		
	</div>
</div>

@endsection

@section('scripts')
	
	<script>
		
		let drop = new Dropzone('#file', {
		    createImageThumbnails: true,
		    addRemoveLinks: true,
		    acceptedFiles: 'image/jpeg,image/jpg,image/png,image/webp',
		    maxFiles: 6,
		    maxFilesize: 3,
		    url: '{{ route('admin.product.photo.store', [$product]) }}',
		    headers: {
		        'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content
		    }
		});


		drop.on('success', function (photo, response) {
		    photo.id = response.id
		    photo.name = response.name
		    photo.size = response.size
		    photo.thumbnail = response.path
		});

		drop.on('error', function(file) {
		    drop.removefile(file);
		});


		@if ($product->photos->count())
		    @foreach ($product->photos as $photo)
		        var mock = {id: '{{ $photo->id }}', name: '{{  $photo->name }}', size: '{{ $photo->size }}'};
		        drop.emit('addedfile', mock);
		        drop.emit('thumbnail',mock,'{{ Storage::url($photo->path) }}');
		    @endforeach
		    @php
		    	$photo = $photo->identifier;
		       
		    @endphp

		    drop.on('removedfile', function (photo) {
		            axios.delete('{{ route('admin.product.photo.destroy', [$product, $photo])}}/' + photo.id).catch(function (error) {
		                var mockfile = {id: photo.id, name: photo.name, size: photo.size};
		                drop.emit('addedfile', mockfile);
		            });
		    });

		@endif




	</script>

@endsection

