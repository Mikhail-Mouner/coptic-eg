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
<body data-layout="detached" data-topbar="colored">

<div class="container-fluid">
    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- ========== Top navbar Start ========== -->
    @include('layouts.admin.includes.header')
    <!-- Top navbar End -->
        <!-- ========== Left Sidebar Start ========== -->
    @include('layouts.admin.includes.sidebar')
    <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="page-title mb-0 font-size-18">@yield('title')</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">@yield('sub-title')</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
{{--                <div class="container">--}}

                    @yield('content')
{{--                </div>--}}
            </div>
            <!-- End Page-content -->

            <!-- ========== Footer bar Start ========== -->
        @include('layouts.admin.includes.footer')
        <!-- Footer bar End -->

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

</div>
<!-- end container-fluid -->

<!-- JAVASCRIPT -->
@include('layouts.admin.includes.footer-script')

@yield('script')
<!-- Scripts -->

</body>
</html>
