<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Dashboard - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    <link href="{{ asset('admin/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin/css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin/css/demo.min.css') }}" rel="stylesheet"/>
</head>
<body class="antialiased">
<div class="wrapper">
    @include('dashboard.partials.sidebar.side-bar')
    @include('dashboard.partials.navbar.nav-bar')
    <div class="page-wrapper">
        @yield('content')
        @include('dashboard.partials.footer.footer')
    </div>
</div>

<script src="{{ asset('admin/js/tabler.min.js') }}"></script>
<script src="{{ asset('admin/libs/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('admin/libs/axios.min.js') }}"></script>
<script src="{{ asset('admin/libs/sweetalert2@11.js') }}"></script>
@yield('js')
</body>
</html>
