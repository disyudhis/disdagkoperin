<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>

    </style>
</head>
<body>
    <button class="btn btn-secondary toggle-sidebar" type="button">
        <i class="fas fa-bars"></i>
    </button>

    <div class="backdrop"></div>

    <div class="sidebar">
        <div class="text-white h-100 d-flex flex-column">
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
    </div>

    <main class="main-content">
        {{ $slot }}
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelector('.toggle-sidebar').addEventListener('click', () => {
            document.querySelector('.sidebar').classList.toggle('active');
            document.querySelector('.backdrop').classList.toggle('show');
        });

        document.querySelector('.backdrop').addEventListener('click', () => {
            document.querySelector('.sidebar').classList.remove('active');
            document.querySelector('.backdrop').classList.remove('show');
        });
    </script>
</body>
</html>
