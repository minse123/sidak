<aside id="appSidebar" class="d-none d-lg-flex flex-column shrink-0 text-white bg-dark shadow" style="width: 18rem;">
    <div class="p-4 border-bottom border-secondary-subtle">
        <div class="text-center">
            <img src="{{ asset('assets/logos/logo_pemprov.png') }}" alt="Logo Pemerintah" class="img-fluid rounded-2"
                style="max-height: 56px; object-fit: contain;">
            <h1 class="h5 fw-semibold mt-3 mb-2 text-white">Sistem Data Kepemerintahan</h1>
            <p class="text-white-50 small mb-1">Portal Sistem Informasi Data</p>
            <p class="text-white-50 small mb-0">Kepemerintahan Non ASN</p>
        </div>
    </div>

    <nav class="grow overflow-auto" aria-label="Navigasi utama">
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
                    'icon' => 'fa-solid fa-gauge-high',
                    'active' => request()->routeIs(['dashboard.index', 'dashboard']),
                ],
            ];

            $dataNavigation = [
                [
                    'label' => 'Kwitansi',
                    'route' => $resolveRoute('kwitansi.index'),
                    'icon' => 'fa-solid fa-file-invoice-dollar',
                    'active' => request()->routeIs('kwitansi.*'),
                ],
                [
                    'label' => 'Norek Bank Kalsel',
                    'route' => $resolveRoute('norek-bank-kalsel.index'),
                    'icon' => 'fa-solid fa-building-columns',
                    'active' => request()->routeIs('norek-bank-kalsel.*'),
                ],
                [
                    'label' => 'Absen',
                    'route' => $resolveRoute('absen.index'),
                    'icon' => 'fa-solid fa-user-check',
                    'active' => request()->routeIs('absen.*'),
                ],
                [
                    'label' => 'Surat Pesanan',
                    'route' => $resolveRoute('surat-pesanan.index'),
                    'icon' => 'fa-solid fa-file-signature',
                    'active' => request()->routeIs('surat-pesanan.*'),
                ],
                [
                    'label' => 'Laporan Pekerjaan',
                    'route' => $resolveRoute('laporan-pekerjaan.index'),
                    'icon' => 'fa-solid fa-list-check',
                    'active' => request()->routeIs('laporan-pekerjaan.*'),
                ],
                [
                    'label' => 'BAPP',
                    'route' => $resolveRoute('bapp.index'),
                    'icon' => 'fa-solid fa-file-contract',
                    'active' => request()->routeIs('bapp.*'),
                ],
                [
                    'label' => 'Invoice',
                    'route' => $resolveRoute('invoice.index'),
                    'icon' => 'fa-solid fa-file-invoice',
                    'active' => request()->routeIs('invoice.*'),
                ],
                [
                    'label' => 'PNBP',
                    'route' => $resolveRoute('pnbp.index'),
                    'icon' => 'fa-solid fa-receipt',
                    'active' => request()->routeIs('pnbp.*'),
                ],
            ];

            $userNavigation = [
                [
                    'label' => 'Manajemen User',
                    'route' => $resolveRoute('user.index'),
                    'icon' => 'fa-solid fa-users',
                    'active' => request()->routeIs('user.*'),
                ],
            ];

            $isDataNavigationActive = collect($dataNavigation)->contains(fn (array $item): bool => $item['active']);
        @endphp

        <div class="px-3 py-4 border-bottom border-secondary-subtle">
            <p class="text-uppercase text-white-50 small mb-3">Navigasi</p>
            <ul class="nav nav-pills flex-column gap-2">
                @foreach ($dashboardNavigation as $item)
                    <li class="nav-item">
                        <a href="{{ $item['route'] }}"
                            class="nav-link d-flex align-items-center justify-content-between rounded-3 px-3 py-2 {{ $item['active'] ? 'bg-light text-dark shadow-sm' : 'text-white-50 bg-transparent border border-secondary-subtle' }}">
                            <span class="d-flex align-items-center gap-3">
                                <span class="fs-5">
                                    <i class="{{ $item['icon'] }}" aria-hidden="true"></i>
                                </span>
                                <span class="fw-medium">{{ $item['label'] }}</span>
                            </span>
                            <i class="fa-solid fa-chevron-right small {{ $item['active'] ? 'text-dark' : 'text-white-50' }}"
                                aria-hidden="true"></i>
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="mt-4">
                @php
                    $dataDropdownButtonClasses = $isDataNavigationActive
                        ? 'bg-light text-dark shadow-sm'
                        : 'text-white-50 bg-transparent border border-secondary-subtle';
                @endphp
                <button type="button"
                    class="w-100 d-flex align-items-center justify-content-between rounded-3 px-3 py-2 border {{ $dataDropdownButtonClasses }}"
                    data-bs-toggle="collapse" data-bs-target="#sidebarDataNavigation" aria-expanded="{{ $isDataNavigationActive ? 'true' : 'false' }}"
                    aria-controls="sidebarDataNavigation">
                    <span class="d-flex align-items-center gap-3">
                        <span class="fs-5">
                            <i class="fa-solid fa-database" aria-hidden="true"></i>
                        </span>
                        <span class="fw-medium">Data</span>
                    </span>
                    <i class="fa-solid fa-chevron-down small {{ $isDataNavigationActive ? 'text-dark' : 'text-white-50' }}"
                        aria-hidden="true"></i>
                </button>
                <div class="collapse {{ $isDataNavigationActive ? 'show' : '' }}" id="sidebarDataNavigation">
                    <ul class="nav nav-pills flex-column gap-2 mt-3">
                        @foreach ($dataNavigation as $item)
                            <li class="nav-item">
                                <a href="{{ $item['route'] }}"
                                    class="nav-link d-flex align-items-center justify-content-between rounded-3 px-3 py-2 {{ $item['active'] ? 'bg-light text-dark shadow-sm' : 'text-white-50 bg-transparent border border-secondary-subtle' }}">
                                    <span class="d-flex align-items-center gap-3">
                                        <span class="fs-5">
                                            <i class="{{ $item['icon'] }}" aria-hidden="true"></i>
                                        </span>
                                        <span class="fw-medium">{{ $item['label'] }}</span>
                                    </span>
                                    <i class="fa-solid fa-chevron-right small {{ $item['active'] ? 'text-dark' : 'text-white-50' }}"
                                        aria-hidden="true"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="px-3 py-4 border-top border-secondary-subtle">
            <p class="text-uppercase text-white-50 small mb-3">User</p>
            <ul class="nav nav-pills flex-column gap-2">
                @foreach ($userNavigation as $item)
                    <li class="nav-item">
                        <a href="{{ $item['route'] }}"
                            class="nav-link d-flex align-items-center justify-content-between rounded-3 px-3 py-2 {{ $item['active'] ? 'bg-light text-dark shadow-sm' : 'text-white-50 bg-transparent border border-secondary-subtle' }}">
                            <span class="d-flex align-items-center gap-3">
                                <span class="fs-5">
                                    <i class="{{ $item['icon'] }}" aria-hidden="true"></i>
                                </span>
                                <span class="fw-medium">{{ $item['label'] }}</span>
                            </span>
                            <i class="fa-solid fa-chevron-right small {{ $item['active'] ? 'text-dark' : 'text-white-50' }}"
                                aria-hidden="true"></i>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</aside>
