<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('img/about.png') }}">
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
                <h1 class="mt-4">Input Iklan</h1>
                <form id="iklanForm" class="bg-light p-4 rounded shadow-sm" action="{{ route('admin.storeNews') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="iklanTitle" class="form-label">Judul Iklan</label>
                        <input type="text" class="form-control" id="iklanTitle" name="title"
                            placeholder="Masukkan judul iklan">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="iklanImage" class="form-label">Gambar Iklan</label>
                        <input type="file" class="form-control" id="iklanImage" name="image">
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="iklanDescription" class="form-label">Deskripsi Iklan</label>
                        <textarea class="form-control" id="iklanDescription" name="content" rows="4"
                            placeholder="Masukkan deskripsi iklan"></textarea>
                        @error('content')
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
