<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('css/materialdesignicons.css') }}">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bundle.base.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/addons.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript" src="{{ asset('js/off-canvas.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/misc.js') }}"></script>
</head>

<body>
<div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand h3" href="/">Dashboard</a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu">Menu</span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">

                {{--<li class="nav-item">
                    <a class="nav-link" href="#">
                        <span class="menu-title">Agenda</span>
                        <i class="mdi mdi-view-agenda menu-icon"></i>
                    </a>
                </li>--}}

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('clients') }}">
                        <span class="menu-title">Clients</span>
                        <i class="mdi mdi-emoticon-happy menu-icon"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('spending') }}">
                        <span class="menu-title">Dépenses</span>
                        <i class="mdi mdi-minus-circle menu-icon"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('billing.new') }}">
                        <span class="menu-title">Facture</span>
                        <i class="mdi mdi-square-inc-cash menu-icon"></i>
                    </a>
                </li>
                {{--
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('statistique') }}">
                        <span class="menu-title">Statistique</span>
                        <i class="mdi mdi-trending-up menu-icon"></i>
                    </a>
                </li>--}}

                {{--<li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#client" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-title">Client</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                    </a>
                    <div class="collapse" id="client">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/buttons.html">Buttons</a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/typography.html">Typography</a></li>
                        </ul>
                    </div>
                </li>--}}
            </ul>
        </nav>

        <div class="main-panel">
            <div class="content-wrapper">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
            </div>
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018
                        <a>Olivier Rheault Gagnon</a>. All rights reserved.</span>
                </div>
            </footer>
        </div>
    </div>
</div>
</body>
</html>
