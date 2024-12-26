<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('wub/styles/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> --}}
    <title>Admin - Dashboard</title>
</head>

<body>
    <div id="wrapper" style="width: 100%; height: 100vh">
        {{-- Sidebar --}}
        @component('components.sidebar')
        @endcomponent
        {{-- End Sidebar --}}

        {{-- Start Content --}}
        <div id="page-content-wrapper">
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <button id="sidebarToggle" class="btn btn-secondary d-md-none">
                    <i class="bi bi-list"></i> <!-- Hamburger icon -->
                </button>
                <h1 class="mt-4">Welcome Admin!</h1>
                <p class="lead">To start working with Input Field, please go to your left side navigation to start!
                </p>
                <h2 class="my-4">Informasi Data</h2>
                <div class="row g-4">
                    @foreach (['Data Peserta' => 0, 'Data Pelatihan' => 0, 'Data Pengumuman' => $announcementCount, 'Data Iklan' => $newsCount, 'Data Materi' => 0, 'Data Absensi' => 0] as $title => $count)
                        <div class="col-6 col-md-3">
                            <div class="card shadow-sm">
                                <div class="card-body d-flex flex-column">
                                    <h4 class="card-title">{{ $title }}</h4>
                                    <div class="mt-auto text-center">
                                        <h3><i class="bi bi-person-fill"></i> {{ $count }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    <h2 class="my-4 text-center">Quick Actions</h2>
                    <div class="row g-3">
                        <div class="col-12 col-sm-6 col-md-4">
                            <a href="{{ route('admin.createPelatihan') }}" class="btn btn-success btn-block">
                                <i class="bi bi-plus-circle"></i> Add Pelatihan
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4">
                            <a href="{{ route('admin.createMateri') }}" class="btn btn-info btn-block">
                                <i class="bi bi-plus-circle"></i> Add Materi
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4">
                            <a href="{{ route('admin.createIklan') }}" class="btn btn-warning btn-block">
                                <i class="bi bi-plus-circle"></i> Add Iklan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Content --}}
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript untuk toggle sidebar
        $(document).ready(function() {
            $('#sidebarToggle').click(function() {
                $('#sidebar-wrapper').toggleClass('show'); // Menyembunyikan atau menampilkan sidebar
                $('#page-content-wrapper').toggleClass(
                    'sidebar-open'); // Menyesuaikan konten saat sidebar ditoggle
            });

            $('#sidebarClose').click(function() {
                $('#sidebar-wrapper').removeClass('show'); // Menyembunyikan sidebar
                $('#page-content-wrapper').removeClass(
                    'sidebar-open'); // Menyesuaikan konten saat sidebar ditutup
            });
        });
    </script>
</body>

</html>
