<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ __('Diginlink') }}</title>
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<!-- Dashboard Core -->
<link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
<!-- Styles -->
<link href="{{ asset('dist/libs/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet">
<link href="{{ asset('dist/css/tabler.css') }}" rel="stylesheet">
<link href="{{ asset('dist/css/tabler-flags.min.css') }}" rel="stylesheet">
<link href="{{ asset('dist/css/tabler-payments.min.css') }}" rel="stylesheet">
<link href="{{ asset('dist/css/tabler-vendors.min.css') }}" rel="stylesheet">
<link href="{{ asset('dist/css/demo.min.css') }}" rel="stylesheet">
<link href="{{ asset('dist/libs/flatpickr/dist/flatpickr.min.css') }}" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('dist/libs/selectize/dist/css/selectize.css') }}" rel="stylesheet"/>

</head>

<body>
<div id="app">
<header class="navbar navbar-expand-md navbar-light d-print-none">
<div class="container-xl">
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
<span class="navbar-toggler-icon"></span>
</button>
<h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pr-0 pr-md-3">
<a href="{{route('admin.index')}}" class="pt-2">
<h1 class="text-dark" style="font-weight:bold;">Diginlink<span class="text-danger">.</span>

</h1>
</a>
</h1>
<div class="navbar-nav flex-row order-md-last">
<div class="nav-item dropdown d-none d-md-flex mr-3">
<a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path><path d="M9 17v1a3 3 0 0 0 6 0v-1"></path></svg>
<span class="badge bg-red"></span>
</a>
<div class="dropdown-menu dropdown-menu-right dropdown-menu-card">
<div class="card">
<div class="card-body">

</div>
</div>
</div>
</div>
<div class="nav-item dropdown">
<a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
<span class="avatar avatar-sm" ></span>
<div class="d-none d-xl-block pl-2">
<div>Kapil Soni</div>
<div class="mt-1 small text-muted">Web Designer</div>
</div>
</a>
<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

<a href="{{route('admin.profile')}}" class="dropdown-item">Profile &amp; account</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">Settings</a>

<a class="dropdown-item" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
{{ __('Logout') }}
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
</form>
</div>
</div>
</div>
</div>
</header>
@component('components.navigation')
@endcomponent
<main class="py-4 container">
@yield('content')
</main>
</div>
<!-- Scripts -->
<script src="{{ asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js') }}" ></script>
<script src="{{ asset('dist/libs/jqvmap/dist/jquery.vmap.min.js') }}" ></script>
<script src="{{ asset('dist/libs/jqvmap/dist/maps/jquery.vmap.world.js') }}" ></script>
<script src="{{ asset('dist/libs/selectize/dist/js/standalone/selectize.min.js') }}"></script>
<!-- Tabler Core -->
<script src="{{ asset('dist/js/tabler.min.js') }}" ></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('dist/libs/flatpickr/dist/flatpickr.min.js') }}"></script>
<script src="{{ asset('dist/libs/flatpickr/dist/plugins/rangePlugin.js') }}"></script>
<script>
$(document).ready(function() {
$('.select2').select2();
});
</script>
<script>

setTimeout(function() {
$('#alertmessage').fadeOut();
}, 3000);
</script>
@yield('script')
</body>
</html>
