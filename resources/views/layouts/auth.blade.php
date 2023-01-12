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

    <title>{{ config('app.name') }} | Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('') }}plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('') }}plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('') }}css/adminlte.min.css">

    <link href="http://fonts.cdnfonts.com/css/gotham" rel="stylesheet">

    <style>
        body {
            font-family: 'Gotham', sans-serif;
        }

    </style>

</head>

<body class="hold-transition login-page">
    @yield('content')
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('') }}plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('') }}js/adminlte.min.js"></script>
</body>

</html>
