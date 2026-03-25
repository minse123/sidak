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
            'label' => 'Kwitansi Pembayaran',
            'route' => $resolveRoute('kwitansi.index'),
            'icon' => 'bi bi-cash-stack',
            'active' => request()->routeIs('kwitansi.*'),
        ],
        [
            'label' => 'Rekening Bank Kalsel',
            'route' => $resolveRoute('norek-bank-kalsel.index'),
            'icon' => 'bi bi-bank',
            'active' => request()->routeIs('norek-bank-kalsel.*'),
        ],
        [
            'label' => 'Data Absensi',
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
            'label' => 'Berita Acara (BAPP)',
            'route' => $resolveRoute('bapp.index'),
            'icon' => 'bi bi-file-earmark-medical',
            'active' => request()->routeIs('bapp.*'),
        ],
        [
            'label' => 'Faktur / Invoice',
            'route' => $resolveRoute('invoice.index'),
            'icon' => 'bi bi-file-earmark-spreadsheet',
            'active' => request()->routeIs('invoice.*'),
        ],
        [
            'label' => 'Data PNBP',
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

<aside id="appSidebar" class="offcanvas offcanvas-start border-0 d-lg-none sidebar-modern" tabindex="-1"
    aria-labelledby="appSidebarLabel" style="--bs-offcanvas-width: 300px;">
    @include('layouts.partials.sidebar-content', [
        'dashboardNavigation' => $dashboardNavigation,
        'dataNavigation' => $dataNavigation,
        'userNavigation' => $userNavigation,
        'isDataNavigationActive' => $isDataNavigationActive,
        'dataNavigationCollapseId' => 'sidebarDataNavigationOffcanvas',
        'headingId' => 'appSidebarLabel',
    ])
</aside>

<div class="sidebar-modern d-none d-lg-flex flex-column sticky-top vh-100" style="width: 300px; flex: 0 0 300px;">
    @include('layouts.partials.sidebar-content', [
        'dashboardNavigation' => $dashboardNavigation,
        'dataNavigation' => $dataNavigation,
        'userNavigation' => $userNavigation,
        'isDataNavigationActive' => $isDataNavigationActive,
        'dataNavigationCollapseId' => 'sidebarDataNavigationDesktop',
        'headingId' => 'appSidebarDesktopLabel',
    ])
</div>

