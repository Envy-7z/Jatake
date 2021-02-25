<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jatake Battery - @yield('title','Halaman Depan')</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <script src="{{ asset('modules/jquery-3.4.1/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('modules/bootstrap-4.3.1/js/bootstrap.min.js') }}" async></script>
    <script src="{{ asset('/plugins/swal2/sweetalert2.min.js') }}" type="text/javascript" defer></script>
    <script src="{{ asset('modules/fontawesome/js/all.min.js') }}" async></script>
    <script src="{{ asset('modules/slick/slick.min.js') }}" async></script>
    <script src="{{ asset('js/main.js') }}" async></script>
    @yield('head')
</head>
@include('loader')

<body class="@yield('bodyClass')">
    @yield('content')
</body>

</html>
