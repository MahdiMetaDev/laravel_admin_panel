<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Admin Dashboard</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet"/>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    @yield('confirmation_script')
</head>
<body class="sb-nav-fixed">
@include('admin.layout.header')
<div id="layoutSidenav">
    @include('admin.layout.sidebar')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                @include('admin.layout.toolbar')
                @yield('content')
            </div>
        </main>
        @include('admin.layout.footer')
    </div>
</div>
<script src="{{ asset('assets/js/hammer.min.js') }}"></script>
<script src="{{ asset('assets/js/itemslide.js') }}"></script>
<script src="{{ asset('assets/js/fontawesome.all.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/chart.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/chart-area-demo.js') }}"></script>
<script src="{{ asset('assets/js/chart-bar-demo.js') }}"></script>
<script src="{{ asset('assets/js/datatables.min.js') }}" crossorigin="anonymous"></script>
{{--<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>--}}
<script src="{{ asset('assets/js/bootstrap.min.js') }}" crossorigin="anonymous"></script>
@yield('product_image_slider')
</body>
</html>
