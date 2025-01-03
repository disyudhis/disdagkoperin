<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('img/about.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('wub/styles/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> --}}
    <title>Admin - Input Materi</title>
</head>
<body>
    <div id="wrapper" style="width: 100%; height: 100vh;">
        {{-- Sidebar --}}
        <nav class="bg-blue text-white border-end" id="sidebar-wrapper">
            <button id="sidebarClose" class="btn text-white d-md-none" aria-label="Close" style="border: none; background: none; font-size: 1.5rem;">
                <i class="bi bi-x-circle"></i>
            </button>
            <div class="sidebar-heading text-center py-4">
                <img src="{{ asset('wub/img/logoAdmin.png') }}" alt="Logo Admin" width="140" height="50" class="mb-3">
                <div class="profile-container">
                    <img src="{{ auth()->user()->profile_picture ?? 'https://eu.ui-avatars.com/api/?name=Admin&size=250' }}" alt="Profile Picture" class="profile-picture">
                    <p class="username">{{ auth()->user()->name }}</p>
                </div>
            </div>
            <div class="list-group list-group-flush">
                <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action text-white">
                    <i class="bi bi-house-door"></i> Dashboard
                </a>
                <a href="#inputDataMenu" data-bs-toggle="collapse" class="list-group-item list-group-item-action text-white">
                    <i class="bi bi-file-earmark-plus"></i> Input Data
                </a>
                <div class="collapse" id="inputDataMenu">
                    <a href="{{ route('admin.createPelatihan') }}" class="list-group-item list-group-item-action text-white">
                        <i class="bi bi-file-earmark-text"></i> Pelatihan
                    </a>
                    <a href="{{ route('admin.createMateri') }}" class="list-group-item list-group-item-action text-white">
                        <i class="bi bi-file-earmark-text"></i> Materi
                    </a>
                    <a href="{{ route('admin.createIklan') }}" class="list-group-item list-group-item-action text-white">
                        <i class="bi bi-file-earmark-text"></i> Iklan
                    </a>
                    <a href="{{ route('admin.createAnnouncement') }}" class="list-group-item list-group-item-action text-white">
                        <i class="bi bi-file-earmark-text"></i> Pengumuman
                    </a>
                </div>
                <a href="#listDataMenu" data-bs-toggle="collapse" class="list-group-item list-group-item-action text-white">
                    <i class="bi bi-list-ul"></i> List Data
                </a>
                <div class="collapse" id="listDataMenu">
                    <a href="{{ route('admin.listNews') }}" class="list-group-item list-group-item-action text-white">
                        <i class="bi bi-file-earmark-text"></i> Iklan
                    </a>
                    <a href="{{ route('admin.listAnnouncements') }}" class="list-group-item list-group-item-action text-white">
                        <i class="bi bi-file-earmark-text"></i> Pengumuman
                    </a>
                </div>
                <a href="{{ route('admin.logout') }}" class="list-group-item list-group-item-action text-white">
                    <i class="bi bi-box-arrow-right"></i> Log-Out
                </a>
            </div>
        </nav>
        {{-- End Sidebar --}}

        {{-- Start Content --}}
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <button id="sidebarToggle" class="btn btn-secondary d-md-none">
                    <i class="bi bi-list"></i> <!-- Hamburger icon -->
                </button>
                <h1 class="mt-4">Input Materi</h1>
                <form id="materiForm" class="bg-light p-4 rounded shadow-sm">
                    <div class="mb-3">
                        <label for="materialName" class="form-label">Nama Materi</label>
                        <input type="text" class="form-control" id="materialName" placeholder="Masukkan nama materi" required>
                    </div>
                    <div class="mb-3">
                        <label for="materialDescription" class="form-label">Deskripsi</label>
                        <textarea id="materialDescription" class="form-control" placeholder="Masukkan deskripsi materi" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="mediaUpload" class="form-label">Upload Gambar/Video</label>
                        <input type="file" id="mediaUpload" class="form-control" accept="image/*,video/*" required>
                    </div>
                    <div class="mb-3">
                        <label for="subMaterial" class="form-label">Sub-Materi</label>
                        <div id="subMaterialContainer">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="subMaterial[]" placeholder="Masukkan sub-materi" required>
                                <button class="btn btn-outline-secondary add-sub-material" type="button"><i class="bi bi-plus"></i></button>
                            </div>
                        </div>
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
        $(document).ready(function() {
            // Menangani penambahan sub-materi
            $('#materiForm').on('click', '.add-sub-material', function() {
                const subMaterialHTML = `
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="subMaterial[]" placeholder="Masukkan sub-materi" required>
                    <button class="btn btn-outline-danger remove-sub-material" type="button"><i class="bi bi-x"></i></button>
                </div>
                `;
                $('#subMaterialContainer').append(subMaterialHTML);
            });

            // Menangani penghapusan sub-materi
            $('#materiForm').on('click', '.remove-sub-material', function() {
                $(this).closest('.input-group').remove();
            });

            // JavaScript untuk toggle sidebar
            $('#sidebarToggle').click(function() {
                $('#sidebar-wrapper').toggleClass('show'); // Menyembunyikan atau menampilkan sidebar
                $('#page-content-wrapper').toggleClass('sidebar-open'); // Menyesuaikan konten saat sidebar ditoggle
            });

            $('#sidebarClose').click(function() {
                $('#sidebar-wrapper').removeClass('show'); // Menyembunyikan sidebar
                $('#page-content-wrapper').removeClass('sidebar-open'); // Menyesuaikan konten saat sidebar ditutup
            });
        });
    </script>
</body>
</html>
