<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
    <div class="container-fluid d-flex align-items-center justify-content-between gap-3">
        <div class="d-flex align-items-center gap-3">
            <button type="button" class="btn btn-outline-secondary btn-sm rounded-circle" data-sidebar-toggle
                aria-label="Toggle sidebar">
                <span class="fw-bold">≡</span>
            </button>
            <div class="d-flex flex-column">
                <small class="text-uppercase text-success fw-semibold" style="letter-spacing: 0.35em;">Sistem Data
                    Pemerintahan Digital</small>
                <span class="fw-semibold text-muted">Informasi dan Pengelolaan Data Sidak</span>
                <span class="text-muted small">Biro Umum Sekretariat Daerah Provinsi Kalimantan Selatan</span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-3">
            <div class="text-end">
                <p class="text-muted text-uppercase small mb-0">Pengguna Aktif</p>
                <p class="fw-semibold mb-0">{{ Auth::user()->name }}</p>
            </div>
            <span
                class="d-none d-sm-inline-flex text-muted text-uppercase small">#{{ str_pad(Auth::id(), 4, '0', STR_PAD_LEFT) }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-dark rounded-pill px-4">Keluar</button>
            </form>
        </div>
    </div>
</nav>
