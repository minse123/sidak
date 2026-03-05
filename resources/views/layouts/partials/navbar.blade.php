<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
    <div class="container-fluid py-2">
        <div class="d-flex align-items-center justify-content-between w-100 gap-3">
            <!-- Left Side: Branding & Sidebar Toggle -->
            <div class="d-flex align-items-center gap-3">
                <button type="button"
                    class="btn btn-light btn-sm d-lg-none border"
                    data-bs-toggle="offcanvas" data-bs-target="#appSidebar" aria-controls="appSidebar">
                    <span class="navbar-toggler-icon" style="width: 1.2em; height: 1.2em;"></span>
                </button>
                <div class="d-flex flex-column line-height-sm">
                    <small class="text-uppercase text-success fw-bold" style="letter-spacing: 0.1em; font-size: 0.65rem;">
                        Sistem Data Pemerintahan Digital
                    </small>
                    <div class="d-flex align-items-center gap-2">
                        <span class="fw-bold text-dark mb-0 h6 mb-0">SIDAK</span>
                        <span class="vr d-none d-md-block" style="height: 15px;"></span>
                        <span class="text-muted small d-none d-md-block" style="font-size: 0.75rem;">Provinsi Kalimantan Selatan</span>
                    </div>
                </div>
            </div>

            <!-- Right Side: User Profile & Logout -->
            <div class="d-flex align-items-center gap-3">
                <div class="text-end d-none d-sm-block">
                    <p class="fw-semibold mb-0 small text-dark">{{ Auth::user()->name }}</p>
                    <p class="text-muted small mb-0" style="font-size: 0.7rem;">ID: #{{ str_pad(Auth::id(), 4, '0', STR_PAD_LEFT) }}</p>
                </div>
                <div class="vr mx-1 d-none d-sm-block" style="height: 30px;"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">
                        <i class="bi bi-box-arrow-right"></i> Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
