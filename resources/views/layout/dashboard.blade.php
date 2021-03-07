<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Jatake Battery - Administrator </title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('modules/datatable/datatables.min.css') }}" rel="stylesheet">

    {{-- Scripts --}}
    <script src="{{ asset('modules/jquery-3.4.1/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('modules/bootstrap-4.3.1/js/bootstrap.min.js') }}" async></script>
    <script src="{{ asset('modules/fontawesome/js/all.min.js') }}" async></script>
    <script src="{{ asset('modules/swal/sweetalert2.all.min.js') }}" async></script>
    <script src="{{ asset('modules/slick/slick.min.js') }}" async></script>
    <script src="{{ asset('modules/datatable/datatables.min.js') }}" async></script>
    @yield('head')
</head>
@include('loader')

<body>
    <div class="bg-light">
        <div id="admin" class="main-wrapper">
            <header>
                <nav class="navbar-expand-md navbar navbar-light">
                    <div class="container">
                        <div id="logo" class="navbar-header">
                            <div class="navbar-brand" id="mainlogo">
                                <a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="" srcset="">
                                </a>
                            </div>
                        </div>
                        <div class="navbar-collapse">
                            <div class="ml-auto">
                                <div class="d-inline-block mt-1 mr-4">
                                    <h5>Hello Admin!</h5>
                                </div>
                                <div class="d-inline-block">
                                    <a href="{{route('admin.logout')}}" class="btn btn-sm btn-danger"><i class="fas fa-sign-out-alt"></i>Logout</a>
                                    {{-- <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                    @csrf
                                    </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div class="container content" id="@yield('contentId')">
                @yield('content')
            </div>
            <footer class="container-fluid text-white p-0">

                <div class="py-2 bg-dark">
                    <div class="container">
                        <div class="text-right">
                            <b>Jatake.LeaProjects&copy;{{ date('Y') }}</b>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

<script src="{{ asset('/modules/fontawesome/js/all.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</html>
