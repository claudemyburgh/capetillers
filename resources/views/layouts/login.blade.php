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
</head>
<body class="login">
    <div id="app">
        
        @if (session()->has('status'))
            <div class="form__group">
                <div class="notify notify__dismissable notify--success">{{ session('status') }}</div>
            </div>
        @endif
        
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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

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
