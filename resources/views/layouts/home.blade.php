{{-- @php
echo  Request::segment(1);
die();
@endphp --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fintch Website by fintch team">
    <meta name="keywords" content="Fintch web, fintch ,fintch ">
    <meta http-equiv="Copyright" content="Sniren-ren">
    <meta name="author" content="Sniren-ren">
    <meta itemprop="image" content="{{ asset('img/favicon.ico') }}">
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('img/favicon.ico') }}" />
    <title>{{ config('app.name') }} | Home</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('') }}plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('') }}plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('') }}plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('') }}plugins/jqvmap/jqvmap.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('') }}plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('') }}plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('') }}plugins/summernote/summernote-bs4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('') }}css/adminlte.min.css">

    <link href="http://fonts.cdnfonts.com/css/gotham" rel="stylesheet">

    <style>
        body {
            font-family: 'Gotham', sans-serif;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: rgb(255 255 255);
        }

        [class*=sidebar-dark-] .sidebar a {
            color: #fff;
        }

        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active,
        .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
            color: black;
            background-color: #a951ff;
        }
    </style>

    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        @if ($params)
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="{{ asset('') }}img/fintch_point.png" alt="fintch_point"
                    height="60" width="60">
            </div>
        @endif

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-purple navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('') }}" class="nav-link">Beranda</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">

                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/user/' . Auth::user()->id) }}" class="nav-link">Profile</a>
                </li>
                <li class="nav-item  d-lg-none d-md-none d-sm-none">
                    <a href="{{ url('/user/' . Auth::user()->id) }}" class="nav-link">
                        <i class="fas fa-user"></i>
                    </a>
                </li>
                <li class="nav-item  d-lg-none d-md-none d-sm-none">
                    <a class="nav-link" href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar bg-purple sidebar-dark-primary ">
            <!-- Brand Logo -->
            <a href="{{ url('home') }}" class="brand-link" style="border-color: unset;">
                <img src="{{ asset('') }}img/fintch_point.png" alt="fintch_point" class="brand-image img-circle "
                    style="opacity: .8" width="25">
                <span class="brand-text font-weight-bold"> {{ config('app.name') }}
                    {{ Auth::user()->level != 1 ? 'Admin' : '' }} </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border-color: unset;">
                    <div class="image">
                        <img src="{{ asset('img/profile') }}/{{ Auth::user()->img }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{ url('/user/' . Auth::user()->id) }}" class="d-block">{{ Auth::user()->name }}
                        </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column pb-4" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ url('dashboard') }}"
                                class="nav-link {{ Request::segment(1) === 'dashboard' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Home</p>
                            </a>
                        </li>
                        <li class="nav-header">USER</li>
                        <li class="nav-item">
                            <a href="{{ url('user') }}"
                                class="nav-link {{ Request::segment(1) === 'user' ? 'active' : '' }}">
                                <i class="fas fa-users"></i>
                                <p>User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('barang') }}"
                                class="nav-link {{ Request::segment(1) === 'barang' ? 'active' : '' }}">
                                <i class="fas fa-wallet"></i>
                                <p>Barang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('supplier') }}"
                                class="nav-link {{ Request::segment(1) === 'supplier' ? 'active' : '' }}">
                                <i class="fas fa-qrcode"></i>
                                <p>Supplier</p>
                            </a>
                        </li>
                        <li class="nav-header">TRANSACTION</li>
                        <li class="nav-item">
                            <a href="{{ url('transaction') }}"
                                class="nav-link {{ Request::segment(1) === 'transaction' ? 'active' : '' }}">
                                <i class="fas fa-history"></i>
                                <p>History</p>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Level 1
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Level 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Level 2
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Level 3</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Level 3</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Level 3</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Level 2</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('content')

        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="mailto:fintch.team@gmail.com">Fintch tech</a>.</strong>
            All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('') }}plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('') }}plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ asset('') }}plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="{{ asset('') }}plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="{{ asset('') }}plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{ asset('') }}plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('') }}plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('') }}plugins/moment/moment.min.js"></script>
    <script src="{{ asset('') }}plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('') }}plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="{{ asset('') }}plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('') }}plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('') }}js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('') }}js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('') }}js/pages/dashboard.js"></script>

    @yield('js')
</body>

</html>
