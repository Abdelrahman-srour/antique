<!DOCTYPE html>
@if (app()->isLocale('ar'))
<html lang="ar" dir="rtl">
@else
<html lang="en">
@endif

<head>

    @include('layouts.partials.head')

</head>

<body>

    @include('layouts.partials.home_header')

    @yield('content')

    @include('layouts.partials.footer-scripts')

</body>

</html>
