<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title')
    </title>

    <!-- ADMINLTE -->
    <link rel="stylesheet"
          href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet"
          href="{{ asset('dist/css/adminlte.min.css') }}">

</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

    <!-- NAVBAR -->
    @include('layouts.peminjam.navbar')

    <!-- SIDEBAR -->
    @include('layouts.peminjam.sidebar')

    <!-- CONTENT -->
    <div class="content-wrapper p-3">

        @yield('content')

    </div>

    <!-- FOOTER -->
    @include('layouts.peminjam.footer')

</div>

<!-- SCRIPT -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>
</html>