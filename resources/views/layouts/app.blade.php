<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        #appSidebar.sidebar-hidden {
            display: none !important;
        }
    </style>
</head>

<body class="bg-light">
    <div id="app" class="min-vh-100">
        @auth
            <div class="d-flex min-vh-100">
                @include('layouts.partials.sidebar')

                <div id="appMainContent" class="grow d-flex flex-column min-vh-100 bg-light">
                    @include('layouts.partials.navbar')

                    @if (View::hasSection('page-header'))
                        @yield('page-header')
                    @else
                        <div class="bg-white border-bottom shadow-sm">
                            <div class="container-fluid py-4 d-flex align-items-center justify-content-between">
                                <div>
                                    <small class="text-uppercase text-success fw-semibold"
                                        style="letter-spacing: 0.35em;">{{ now()->format('d F Y') }}</small>
                                    <h2 class="h4 fw-semibold text-dark mt-2 mb-0">Dashboard</h2>
                                    <p class="text-muted mb-0">Pantau ringkasan data secara real-time.</p>
                                </div>
                                <div class="text-end text-muted small text-uppercase">
                                    <p class="mb-1">Status Akun</p>
                                    <p class="h5 fw-semibold text-dark mb-0">Aktif</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <main class="grow p-4">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('appSidebar');
            const mainContent = document.getElementById('appMainContent');
            const toggleButtons = document.querySelectorAll('[data-sidebar-toggle]');

            if (!sidebar || toggleButtons.length === 0) {
                return;
            }

            toggleButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    sidebar.classList.toggle('sidebar-hidden');
                    const isHidden = sidebar.classList.contains('sidebar-hidden');
                    button.setAttribute('aria-pressed', isHidden ? 'true' : 'false');

                    if (mainContent) {
                        if (isHidden) {
                            mainContent.classList.add('sidebar-collapsed');
                        } else {
                            mainContent.classList.remove('sidebar-collapsed');
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
