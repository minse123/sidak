<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIDAK') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/logos/logo_pemprov.png') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

</head>

<body class="bg-light">
    <div id="app" class="min-vh-100 d-flex flex-column">
        @auth
            <div class="d-flex flex-column flex-lg-row flex-grow-1">
                @include('layouts.partials.sidebar')

                <div id="appMainContent" class="flex-grow-1 d-flex flex-column min-vh-100 bg-light">
                    @include('layouts.partials.navbar')

                    @if (View::hasSection('page-header'))
                        @yield('page-header')
                    @else
                        <div class="bg-white border-bottom shadow-sm">
                            <div
                                class="container-fluid py-4 d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-4">
                                <div class="flex-grow-1 w-100">
                                    <small class="text-uppercase text-success fw-semibold"
                                        style="letter-spacing: 0.35em;">{{ now()->format('d F Y') }}</small>
                                    <h2 class="h4 fw-semibold text-dark mt-2 mb-0">Dashboard</h2>
                                    <p class="text-muted mb-0">Pantau ringkasan data secara real-time.</p>
                                </div>
                                <div class="text-start text-md-end text-muted small text-uppercase w-100 w-md-auto">
                                    <p class="mb-1 mb-md-0">Status Akun</p>
                                    <p class="h5 fw-semibold text-dark mb-0">Aktif</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <main class="flex-grow-1 @yield('main-classes', 'p-4')">
                        @yield('content')
                    </main>
                </div>
            </div>
        @endauth

        @guest
            <main class="py-4">
                @yield('content')
            </main>
        @endguest
    </div>

    @include('sweetalert::alert')
    
</body>

</html>
