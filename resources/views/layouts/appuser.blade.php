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

    {{-- NAVBAR --}}
    @include('layouts.user.navbar')

    {{-- SIDEBAR --}}
    @if(Auth::check())

        @if(Auth::user()->role == 'admin')

            @include('layouts.user.sidebaradmin')

        @elseif(Auth::user()->role == 'petugas')

            @include('layouts.user.sidebarpetugas')

        @endif

    @endif

    {{-- CONTENT --}}
    <div class="content-wrapper">

        @yield('content')

    </div>

    {{-- FOOTER --}}
    @include('layouts.user.footer')

</div>

<!-- JQUERY -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<!-- BOOTSTRAP -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- ADMINLTE -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>
</html>