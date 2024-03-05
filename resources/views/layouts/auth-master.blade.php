<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>@yield('pageTitle')</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('build/assets/images/fav-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('build/assets/images/fav-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('build/assets/images/fav-icon.png') }}" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset ('build/admin/vendors/styles/core.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset ('build/admin/vendors/styles/icon-font.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset ('build/admin/vendors/styles/style.css')}}" />
    @stack('stylesheets')
</head>

<body class="login-page">

    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="{{ asset ('build/admin/vendors/scripts/core.js')}}"></script>
    <script src="{{ asset ('build/admin/vendors/scripts/script.min.js')}}"></script>
    <script src="{{ asset ('build/admin/vendors/scripts/process.js')}}"></script>
    <script src="{{ asset ('build/admin/vendors/scripts/layout-settings.js')}}"></script>
    @stack('scripts')

</html>
