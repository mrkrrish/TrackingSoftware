<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Diginlink') }}</title>

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('dist/libs/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/tabler-flags.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/tabler-payments.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/tabler-vendors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/demo.min.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
        <!-- Scripts -->
          <script src="{{ asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}" ></script>
     <script src="{{ asset('dist/libs/jquery/dist/jquery.slim.min.js') }}" ></script>
      <script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js') }}" ></script>
       <script src="{{ asset('dist/libs/jqvmap/dist/jquery.vmap.min.js') }}" ></script>
    <script src="{{ asset('dist/libs/jqvmap/dist/maps/jquery.vmap.world.js') }}" ></script>
   <!-- Tabler Core -->
     <script src="{{ asset('dist/js/tabler.min.js') }}" ></script>


</body>
</html>
