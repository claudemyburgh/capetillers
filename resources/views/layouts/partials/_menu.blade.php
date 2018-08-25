<div id="searchBlock" class="search__block">
	<div class="wrapper">
		<div class="row">
			<div class="col">
				<div class="form__item__group">
					<div class="addon">SEARCH</div>
					<input type="text" class="form__item form__item--xl">
					<a href="#" class="btn btn--primary searchTrigger"> <i class="lunacon lunacon-close-small"></i> </a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="menu">
	<div class="wrapper">
		<div class="nav">
			<div class="nav__wrapper--fluid">
				<div class="nav__brand"><a href="{{ route('frontpage') }}">{{ config('app.name') }}</a></div>
				   <div class="nav__navicon"></div>
				   <div class="nav__links__wrapper nav__links--right">
				     <ul class="nav__links">
				       <li class="nav__links__item {{ return_if(on_page('/' ), ' nav__links__item--active') }}"><a href="{{ route('frontpage') }}">HOME</a></li>
				       <li class="nav__links__item nav__links__item--dropdown {{ return_if(on_page('product*' ), ' nav__links__item--active') }}">
				       		<a href="{{ route('categories.index') }}">PRODUCTS</a>
				       		<ul class="nav__links nav__scroll">
				       			@foreach ($categories as $cat)
					       		  <li class="nav__links__item">
					       		    <a href="{{ route('product.index', $cat->slug) }}">{{ ucwords($cat->name) }}</a>
					       		  </li>
					       		  @endforeach
				       		</ul>
				       	</li>
				       <li class="nav__links__item {{ return_if(on_page('business-opportunity' ), ' nav__links__item--active') }}"><a href="{{ route('business-opportunity.index') }}">BUSINESS OPPORTUNITY</a></li>
				       <li class="nav__links__item {{ return_if(on_page('videos*' ), ' nav__links__item--active') }}"><a href="{{ route('videos.index') }}">VIDEOS</a></li>
				       <li class="nav__links__item {{ return_if(on_page('manuals*' ), ' nav__links__item--active') }}"><a href="{{ route('manuals.index') }}">MANUALS</a></li>
				       <li class="nav__links__item {{ return_if(on_page('contact-us' ), ' nav__links__item--active') }}"><a href="{{ route('contact.index') }}">CONTACT US</a></li>
{{-- 				       <li class="nav__links__button">
					       	<a class="btn btn--primary searchTrigger" href="#"> <i class="lunacon lunacon-search"></i> </a>
				       </li> --}}
				     </ul>
				   </div>
			</div>
		</div>
	</div>
</div>
