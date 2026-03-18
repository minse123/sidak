<div class="d-flex flex-column h-100 sidebar-shell text-white">
    <div class="sidebar-header px-4 px-xl-4 pt-4 pb-3">
        <div class="d-flex align-items-center gap-3">
            <div class="sidebar-logo-wrap flex-shrink-0">
                <img src="{{ asset('assets/logos/logo_pemprov.png') }}" alt="Logo SIDAK" class="sidebar-logo">
            </div>

            <div class="min-w-0">
                <h1 id="{{ $headingId }}" class="sidebar-brand mb-1">SIDAK</h1>
                <div class="sidebar-subtitle">Provinsi Kalimantan Selatan</div>
            </div>
        </div>
    </div>

    <div class="sidebar-body flex-grow-1 overflow-auto px-3 pb-4">
        <div class="sidebar-section mb-2">
            @foreach ($dashboardNavigation as $item)
                <a href="{{ $item['route'] }}" class="sidebar-link {{ $item['active'] ? 'active' : '' }}">
                    <span class="sidebar-link-icon">
                        <i class="{{ $item['icon'] }}"></i>
                    </span>
                    <span class="sidebar-link-label">{{ $item['label'] }}</span>
                </a>
            @endforeach
        </div>

        <div class="sidebar-heading mt-4 mb-2">Data Master</div>

        <div class="sidebar-group">
            <button class="sidebar-link sidebar-link-toggle {{ $isDataNavigationActive ? 'active-parent' : '' }}"
                type="button" data-bs-toggle="collapse" data-bs-target="#{{ $dataNavigationCollapseId }}"
                aria-expanded="{{ $isDataNavigationActive ? 'true' : 'false' }}"
                aria-controls="{{ $dataNavigationCollapseId }}">
                <span class="d-flex align-items-center gap-3">
                    <span class="sidebar-link-icon">
                        <i class="bi bi-stack"></i>
                    </span>
                    <span class="sidebar-link-label">Data</span>
                </span>
                <i class="bi bi-chevron-down sidebar-chevron"></i>
            </button>

            <div class="collapse {{ $isDataNavigationActive ? 'show' : '' }}" id="{{ $dataNavigationCollapseId }}">
                <div class="sidebar-submenu mt-2">
                    @foreach ($dataNavigation as $item)
                        <a href="{{ $item['route'] }}" class="sidebar-sublink {{ $item['active'] ? 'active' : '' }}">
                            <span class="sidebar-sublink-dot"></span>
                            <span>{{ $item['label'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="sidebar-heading mt-4 mb-2">Settings</div>

        <div class="sidebar-section">
            @foreach ($userNavigation as $item)
                <a href="{{ $item['route'] }}" class="sidebar-link {{ $item['active'] ? 'active' : '' }}">
                    <span class="sidebar-link-icon">
                        <i class="{{ $item['icon'] }}"></i>
                    </span>
                    <span class="sidebar-link-label">{{ $item['label'] }}</span>
                </a>
            @endforeach
        </div>
    </div>
</div>
