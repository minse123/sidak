@php
    use Illuminate\Support\Facades\Route;

    $resolveRoute = function (string $preferred, ?string $alternative = null): string {
        if (Route::has($preferred)) {
            return route($preferred);
        }

        if ($alternative && Route::has($alternative)) {
            return route($alternative);
        }

        return '#';
    };

    $dashboardNavigation = [
        [
            'label' => 'Dashboard',
            'route' => $resolveRoute('dashboard.index', 'dashboard'),
            'icon' => 'bi bi-grid-fill',
            'active' => request()->routeIs(['dashboard.index', 'dashboard']),
        ],
    ];

    $dataNavigation = [
        [
            'label' => 'Kwitansi',
            'route' => $resolveRoute('kwitansi.index'),
            'icon' => 'bi bi-cash-stack',
            'active' => request()->routeIs('kwitansi.*'),
        ],
        [
            'label' => 'Norek Bank Kalsel',
            'route' => $resolveRoute('norek-bank-kalsel.index'),
            'icon' => 'bi bi-bank',
            'active' => request()->routeIs('norek-bank-kalsel.*'),
        ],
        [
            'label' => 'Absen',
            'route' => $resolveRoute('absen.index'),
            'icon' => 'bi bi-person-check',
            'active' => request()->routeIs('absen.*'),
        ],
        [
            'label' => 'Surat Pesanan',
            'route' => $resolveRoute('surat-pesanan.index'),
            'icon' => 'bi bi-file-earmark-text',
            'active' => request()->routeIs('surat-pesanan.*'),
        ],
        [
            'label' => 'Laporan Pekerjaan',
            'route' => $resolveRoute('laporan-pekerjaan.index'),
            'icon' => 'bi bi-list-check',
            'active' => request()->routeIs('laporan-pekerjaan.*'),
        ],
        [
            'label' => 'BAPP',
            'route' => $resolveRoute('bapp.index'),
            'icon' => 'bi bi-file-earmark-medical',
            'active' => request()->routeIs('bapp.*'),
        ],
        [
            'label' => 'Invoice',
            'route' => $resolveRoute('invoice.index'),
            'icon' => 'bi bi-file-earmark-spreadsheet',
            'active' => request()->routeIs('invoice.*'),
        ],
        [
            'label' => 'PNBP',
            'route' => $resolveRoute('pnbp.index'),
            'icon' => 'bi bi-receipt',
            'active' => request()->routeIs('pnbp.*'),
        ],
    ];

    $userNavigation = [
        [
            'label' => 'Manajemen User',
            'route' => $resolveRoute('users.index'),
            'icon' => 'bi bi-people-fill',
            'active' => request()->routeIs('users.*'),
        ],
    ];

    $isDataNavigationActive = collect($dataNavigation)->contains(fn(array $item): bool => $item['active']);
@endphp

<aside id="appSidebar" class="offcanvas offcanvas-start text-bg-dark border-0 d-lg-none" tabindex="-1"
    aria-labelledby="appSidebarLabel" style="--bs-offcanvas-width: 280px;">
    @include('layouts.partials.sidebar-content', [
        'dashboardNavigation' => $dashboardNavigation,
        'dataNavigation' => $dataNavigation,
        'userNavigation' => $userNavigation,
        'isDataNavigationActive' => $isDataNavigationActive,
        'dataNavigationCollapseId' => 'sidebarDataNavigationOffcanvas',
        'headingId' => 'appSidebarLabel',
    ])
</aside>

<div class="text-bg-dark border-end border-white border-opacity-10 d-none d-lg-flex flex-column sticky-top vh-100"
    style="width: 280px; flex: 0 0 280px;">
    @include('layouts.partials.sidebar-content', [
        'dashboardNavigation' => $dashboardNavigation,
        'dataNavigation' => $dataNavigation,
        'userNavigation' => $userNavigation,
        'isDataNavigationActive' => $isDataNavigationActive,
        'dataNavigationCollapseId' => 'sidebarDataNavigationDesktop',
        'headingId' => 'appSidebarDesktopLabel',
    ])
</div>
