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

    <!-- BOOTSTRAP -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>

        body{
            background:#f4f6f9;
        }

        .hero-section{
            min-height:90vh;
            background:
            linear-gradient(rgba(0,0,0,0.6),
            rgba(0,0,0,0.6)),
            url('{{ asset("dist/img/bg-alat.jpg") }}');

            background-size:cover;
            background-position:center;
        }

    </style>

</head>

<body>

    <!-- NAVBAR -->
    @include('layouts.tamu.navbar')

    <!-- CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    @include('layouts.tamu.footer')

    <!-- SCRIPT -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>
</html>