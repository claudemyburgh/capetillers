<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,700" rel="stylesheet">

</head>
<body class="{{ Session::get('sidebar') }}">
    <div id="app">
        <div class="admin__nav">
            <div class="admin__nav__left">
                
            </div>
            <div class="admin__nav__right">
                <sidebar-button url="{{ route('sidebartoggle') }}"></sidebar-button>  
{{--                 <div class="admin__nav__avatar">
                	<img class="admin__nav__avatar__img" src="{{ get_gravatar(auth()->user()->email, '30') }}" alt="{{ auth()->user()->name }}"> <b class="admin__nav__avatar__name">{{ auth()->user()->name }}</b>
                </div> --}}

                <div class="nav__links__wrapper nav__links--left">
			      <ul class="nav__links">

			        <li class="nav__links__button">
						<div class="dropdown">
				        	<a class="btn btn--dark dropdown__link" href="#">
					        	<img class="admin__nav__avatar__img" src="{{ get_gravatar(auth()->user()->email, '30') }}" alt="{{ auth()->user()->name }}">
					        	<b class="admin__nav__avatar__name">{{ auth()->user()->name }}</b>
					        	 <i class="lunacon lunacon-chevron-down"></i>
					        </a>
					        <div class="dropdown__container"> 
					          <ul> 
					          	<li>
					          		<a href="{{ route('logout') }}"
					            onclick="event.preventDefault(); document.getElementById('nav-logout').submit();"
					            >Logout</a></li>
					          </ul>
					          <form id="nav-logout" action="{{ route('logout') }}" method="post">
					              {{ csrf_field() }}
					          </form>
					        </div>
							
						</div>
			    </li>
			      </ul>
                </div>
            </div>
        </div>
        <div class="admin__sidebar">
            <ul class="admin__sidebar__menu">
                <li  class="{{ return_if(on_page('admin' ), ' active') }}">
                    <a href="{{ route('admin.index') }}"><i class="lunacon lunacon-dashboard"></i> <span>Dashbord</span></a>
                </li>
                
            	@role('super admin')
                <li class="{{ return_if(on_page('admin/users*' ), ' active') }}">
                    <a href="{{ route('admin.users.index') }}"><i class="lunacon lunacon-users-solid"></i> <span>Users</span></a>
                </li>
                <li class=" {{ return_if(on_page('admin/categories*' ), ' active') }}">
                    <a href="{{ route('admin.categories.index') }}"><i class="lunacon lunacon-list"></i> <span>Categories</span></a>
                </li>
                <li class="{{ return_if(on_page('admin/products*' ), ' active') }}">
                    <a href="{{ route('admin.products.index') }}"><i class="lunacon lunacon-box-opened"></i> <span>Products</span></a>
                </li>
				@endrole

                

                <li class="{{ return_if(on_page('admin/agents*' ), ' active') }}">
                    <a href="{{ route('admin.agents.index') }}"><i class="lunacon lunacon-users-solid"></i> <span>Sales Agents</span></a>
                </li>                
            
                <li class="{{ return_if(on_page('admin/clients*' ), ' active') }}">
                    <a href="{{ route('admin.clients.index') }}"><i class="lunacon lunacon-address-book"></i> <span>Clients Leads</span></a>
                </li>                
                @role('super admin')

                <li class="{{ return_if(on_page('admin/rolesandpermissions*' ), ' active') }}">
                    <a href="{{ route('admin.rolesandpermissions.index') }}"><i class="lunacon lunacon-management"></i> <span>Roles &amp; Permissions</span></a>
                </li>

                @endrole


                <li class="{{ return_if(on_page('admin/maintenance*' ), ' active') }}">
                    <a  class="ellipsis" href="{{ route('admin.maintenance.index') }}"><i class="lunacon lunacon-gears"></i> <span>Maintenance</span></a>
                </li>


                <li class="{{ return_if(on_page('admin/logs*' ), ' active') }}">
                    <a href="{{ route('admin.logs.index') }}"><i class="lunacon lunacon-test"></i> <span>Logs</span></a>
                </li>



            </ul>
        </div>
         
        <div class="admin__content">
            <div class="wrapper--fluid">

                @if (session()->has('success'))
                    <div class="form__group">
                        <div class="notify notify__dismissable notify--success">{{ session('success') }}</div>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="form__group">
                        <div class="notify notify__dismissable notify--danger">{{ session('error') }}</div>
                    </div>
                @endif

                @yield('content')
                
            </div>
        </div>    

    </div>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}"></script>
    @yield('scripts')


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-71625494-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-71625494-1');
    </script>

</body>
</html>
