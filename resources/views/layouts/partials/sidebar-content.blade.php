<div class="offcanvas-header d-flex d-lg-none align-items-center border-bottom border-white border-opacity-10">
    <h2 class="h6 fw-bold mb-0 text-white" @if (!empty($headingId)) id="{{ $headingId }}" @endif>
        SIDAK
    </h2>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Tutup"></button>
</div>

<div class="offcanvas-body p-0 d-flex flex-column">
    <div class="px-4 py-4 mb-2">
        <div class="d-flex align-items-center gap-3">
            <img src="{{ asset('assets/logos/logo_pemprov.png') }}" alt="Logo" class="img-fluid"
                style="max-height: 40px; width: auto;">
            <div>
                <h1 class="h6 fw-bold mb-0 text-white">SIDAK</h1>
                <p class="text-white-50 small mb-0" style="font-size: 0.75rem;">Provinsi Kalimantan Selatan</p>
            </div>
        </div>
    </div>

    <nav class="flex-grow-1 overflow-auto px-3" aria-label="Navigasi utama">
        <div class="mb-4">
            <p class="text-uppercase text-white-50 fw-bold small mb-2 ps-2"
                style="font-size: 0.7rem; letter-spacing: 0.05rem;">Main</p>
            <ul class="nav nav-pills flex-column gap-1">
                @foreach ($dashboardNavigation as $item)
                    <li class="nav-item">
                        <a href="{{ $item['route'] }}"
                            class="nav-link d-flex align-items-center gap-3 rounded-2 px-3 py-2 transition-all {{ $item['active'] ? 'bg-primary text-white shadow-sm' : 'text-white-50 bg-transparent opacity-75 hover-opacity-100' }}">
                            <span class="fs-6 w-20px text-center">
                                <i class="{{ $item['icon'] }}" aria-hidden="true"></i>
                            </span>
                            <span class="fw-medium">{{ $item['label'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="mb-4">
            <p class="text-uppercase text-white-50 fw-bold small mb-2 ps-2"
                style="font-size: 0.7rem; letter-spacing: 0.05rem;">Data Master</p>
            <button type="button"
                class="nav-link w-100 d-flex align-items-center justify-content-between rounded-2 px-3 py-2 transition-all {{ $isDataNavigationActive ? 'text-white' : 'text-white-50 opacity-75' }}"
                data-bs-toggle="collapse" data-bs-target="#{{ $dataNavigationCollapseId }}"
                aria-expanded="{{ $isDataNavigationActive ? 'true' : 'false' }}"
                aria-controls="{{ $dataNavigationCollapseId }}">
                <span class="d-flex align-items-center gap-3">
                    <span class="fs-6 w-20px text-center">
                        <i class="bi bi-database-fill" aria-hidden="true"></i>
                    </span>
                    <span class="fw-medium">Data</span>
                </span>
                <i class="bi bi-chevron-down small transition-transform {{ $isDataNavigationActive ? 'rotate-180' : '' }}"
                    aria-hidden="true"></i>
            </button>
            <div class="collapse {{ $isDataNavigationActive ? 'show' : '' }}" id="{{ $dataNavigationCollapseId }}">
                <ul class="nav nav-pills flex-column gap-1 mt-1 ps-2">
                    @foreach ($dataNavigation as $item)
                        <li class="nav-item border-start border-white border-opacity-10 ms-3">
                            <a href="{{ $item['route'] }}"
                                class="nav-link d-flex align-items-center gap-3 rounded-2 px-3 py-2 transition-all {{ $item['active'] ? 'text-white fw-bold' : 'text-white-50 opacity-75 hover-opacity-100' }}">
                                <span class="fw-medium" style="font-size: 0.85rem;">{{ $item['label'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="mb-4">
            <p class="text-uppercase text-white-50 fw-bold small mb-2 ps-2"
                style="font-size: 0.7rem; letter-spacing: 0.05rem;">Settings</p>
            <ul class="nav nav-pills flex-column gap-1">
                @foreach ($userNavigation as $item)
                    <li class="nav-item">
                        <a href="{{ $item['route'] }}"
                            class="nav-link d-flex align-items-center gap-3 rounded-2 px-3 py-2 transition-all {{ $item['active'] ? 'bg-primary text-white shadow-sm' : 'text-white-50 bg-transparent opacity-75 hover-opacity-100' }}">
                            <span class="fs-6 w-20px text-center">
                                <i class="{{ $item['icon'] }}" aria-hidden="true"></i>
                            </span>
                            <span class="fw-medium">{{ $item['label'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</div>
