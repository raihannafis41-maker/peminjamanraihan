<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Aplikasi Peminjaman Alat')</title>

    {{-- FONT AWESOME (AdminLTE) --}}
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    {{-- ADMINLTE --}}
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    {{-- BOOTSTRAP 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- CUSTOM STYLE --}}
    <style>
        body {
            background-color: #f4f6f9;
            padding-top: 80px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        a {
            text-decoration: none;
        }

        .card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
        }

        .hero-section {
            min-height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;

            background:
                linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('{{ asset("dist/img/bg-alat.jpg") }}');

            background-size: cover;
            background-position: center;
            color: #fff;
        }

        .container-custom {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        /* Smooth UI hover */
        .btn, .card {
            transition: all 0.2s ease-in-out;
        }

        .card:hover {
            transform: translateY(-3px);
        }
    </style>

    @stack('styles')
</head>

<body>

    {{-- NAVBAR --}}
    @include('layouts.tamu.navbar')

    {{-- MAIN CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('layouts.tamu.footer')

    {{-- SCRIPTS --}}

    {{-- jQuery (AdminLTE dependency) --}}
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- AdminLTE --}}
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

    @stack('scripts')

</body>

</html>