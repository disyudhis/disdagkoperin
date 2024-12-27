<div class="bg-dark text-white h-100 d-flex flex-column">
    <div class="p-4">
        <!-- Profile -->
        <div class="text-center mb-4">
            <div class="mx-auto mb-3" style="width: 80px; height: 80px;">
                <img src="/img/logo.png" alt="User Icon" class="rounded-circle w-100 h-100 object-fit-cover bg-white">
            </div>
            <h5 class="mb-0">{{ Auth::user()->name }}</h5>
        </div>

        <!-- Navigation -->
        <nav class="mb-4">
            <div class="list-group list-group-flush">
                <a href="{{route('admin.berita.create')}}"
                   class="list-group-item list-group-item-action {{ request()->routeIs('admin.berita.create') ? 'active' : '' }}">
                    <i class="fas fa-plus-circle me-2"></i>Input Berita
                </a>
                <a href="{{route('admin.berita')}}"
                   class="list-group-item list-group-item-action {{ request()->routeIs('admin.berita') ? 'active' : '' }}">
                    <i class="fas fa-list me-2"></i>List Berita
                </a>
            </div>
        </nav>
    </div>

    <!-- Logout -->
    <div class="mt-auto p-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-light w-100">
                <i class="fas fa-sign-out-alt me-2"></i>Keluar
            </button>
        </form>
    </div>
</div>
