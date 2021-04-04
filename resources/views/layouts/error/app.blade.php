<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="Mikhail" name="author" />
    <meta content="Courses website" name="description" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title', config('app.name', 'Laravel'))</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('back-end/images/favicon.ico') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @include('layouts.admin.includes.header-script')
    @yield('style')
</head>
<body>
@if(0)

    <div class="home-btn d-none d-sm-block">
        <a href="{{ route('home') }}" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
@endif
@yield('content')


@include('layouts.admin.includes.footer-script')

@yield('script')
<!-- Scripts -->

</body>
</html>
