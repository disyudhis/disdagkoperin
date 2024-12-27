<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #f97316;">
    <div class="container">
        <!-- Logo & Title -->
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="/img/logo.png" width="40" alt="Logo" class="me-2">
            <span class="d-none d-sm-inline">DISDAGKOPERIN | Bidang Koperasi UKM Cimahi</span>
            <span class="d-inline d-sm-none">DISDAGKOPERIN</span>
        </a>

        <!-- Hamburger Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}"
                        href="{{ route('profile') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pelayanan') ? 'active' : '' }}"
                        href="{{ route('pelayanan') }}">Pelayanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('berita') ? 'active' : '' }}"
                        href="{{ route('berita') }}">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}"
                        href="{{ route('kontak') }}">Kontak</a>
                </li>
                @auth
                    <li class="nav-item">
                        <span class="nav-link">{{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link btn btn-link" data-bs-toggle="modal"
                            data-bs-target="#logoutModal">Logout</button>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin keluar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Ya, Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
