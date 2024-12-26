<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('wub/styles/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Admin - Input Iklan</title>
</head>

<body>
    <div id="wrapper" style="width: 100%; height: 100vh;">
        {{-- Sidebar --}}
        @component('components.sidebar')
        @endcomponent
        {{-- End Sidebar --}}

        {{-- Start Content --}}
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <button id="sidebarToggle" class="btn btn-secondary d-md-none">
                    <i class="bi bi-list"></i> <!-- Hamburger icon -->
                </button>
                <h1 class="mt-4">Input Pengumuman</h1>
                <form id="announcementForm" class="bg-light p-4 rounded shadow-sm"
                    action="{{ route('admin.storeAnnouncement') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="announcementTitle" class="form-label">Judul Pengumuman</label>
                        <input type="text" class="form-control" id="announcementTitle" name="title"
                            placeholder="Masukkan judul pengumuman">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="announcementImage" class="form-label">Gambar Pengumuman</label>
                        <input type="file" class="form-control" id="announcementImage" name="image">
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="announcementDescription" class="form-label">Deskripsi Pengumuman</label>
                        <textarea class="form-control" id="announcementDescription" name="description" rows="4"
                            placeholder="Masukkan deskripsi pengumuman"></textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Kirim</button>
                </form>
            </div>
        </div>
        {{-- End Content --}}
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

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
