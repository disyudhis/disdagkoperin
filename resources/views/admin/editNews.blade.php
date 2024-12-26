<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('wub/styles/admin.css') }}">
    <title>Admin - List Announcement</title>
</head>

<body>
    <div id="wrapper" style="width: 100%; height: 100vh">
        {{-- Sidebar --}}
        <nav class="bg-blue text-white border-end" id="sidebar-wrapper">
            <button id="sidebarClose" class="btn text-white d-md-none" aria-label="Close"
                style="border: none; background: none; font-size: 1.5rem;">
                <i class="bi bi-x-circle"></i>
            </button>
            <div class="sidebar-heading text-center py-4">
                <img src="{{ asset('wub/img/logoAdmin.png') }}" alt="Logo Admin" width="140" height="50"
                    class="mb-3">
                <div class="profile-container">
                    <img src="{{ auth()->user()->profile_picture ?? 'https://eu.ui-avatars.com/api/?name=Admin&size=250' }}"
                        alt="Profile Picture" class="profile-picture">
                    <p class="username">{{ auth()->user()->name }}</p>
                </div>
            </div>
            <div class="list-group list-group-flush">
                <a href="{{ route('admin.dashboard') }}"
                    class="list-group-item list-group-item-action text-white {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-house-door"></i> Dashboard
                </a>
                <a href="#inputDataMenu" data-bs-toggle="collapse"
                    class="list-group-item list-group-item-action text-white {{ request()->routeIs('admin.createPelatihan') || request()->routeIs('admin.createMateri') || request()->routeIs('admin.createIklan') || request()->routeIs('admin.createAnnouncement') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-plus"></i> Input Data
                </a>
                <div class="collapse" id="inputDataMenu">
                    <a href="{{ route('admin.createPelatihan') }}"
                        class="list-group-item list-group-item-action text-white {{ request()->routeIs('admin.createPelatihan') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-text"></i> Pelatihan
                    </a>
                    <a href="{{ route('admin.createMateri') }}"
                        class="list-group-item list-group-item-action text-white {{ request()->routeIs('admin.createMateri') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-text"></i> Materi
                    </a>
                    <a href="{{ route('admin.createIklan') }}"
                        class="list-group-item list-group-item-action text-white {{ request()->routeIs('admin.createIklan') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-text"></i> Iklan
                    </a>
                    <a href="{{ route('admin.createAnnouncement') }}"
                        class="list-group-item list-group-item-action text-white {{ request()->routeIs('admin.createAnnouncement') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-text"></i> Pengumuman
                    </a>
                </div>
                <a href="#listDataMenu" data-bs-toggle="collapse"
                    class="list-group-item list-group-item-action text-white {{ request()->routeIs('admin.listNews') || request()->routeIs('admin.listAnnouncements') ? 'active' : '' }}">
                    <i class="bi bi-list-ul"></i> List Data
                </a>
                <div class="collapse" id="listDataMenu">
                    <a href="{{ route('admin.listNews') }}"
                        class="list-group-item list-group-item-action text-white {{ request()->routeIs('admin.listNews') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-text"></i> Iklan
                    </a>
                    <a href="{{ route('admin.listAnnouncements') }}"
                        class="list-group-item list-group-item-action text-white {{ request()->routeIs('admin.listAnnouncements') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-text"></i> Pengumuman
                    </a>
                </div>
                <a href="{{ route('admin.logout') }}" class="list-group-item list-group-item-action text-white">
                    <i class="bi bi-box-arrow-right"></i> Log-Out
                </a>
            </div>
        </nav>
        {{-- End Sidebar --}}

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

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">
                            <i class="bi bi-pencil-square me-2"></i>Edit Announcement
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.updateNews', $news->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ $news->title }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Content</label>
                                        <textarea class="form-control" id="description" name="content" rows="6" required>{{ $news->content }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">News Image</label>
                                        <div class="image-upload-container">
                                            @if ($news->image)
                                                <div class="existing-image-preview mb-3">
                                                    <h6 class="text-muted">Current Image</h6>
                                                    <img src="{{ App\Http\Controllers\AuthController::getUrlForImage($news->image) }}"
                                                        alt="Current Announcement Image"
                                                        class="img-fluid rounded shadow-sm mb-3">
                                                </div>
                                            @endif

                                            <input type="file" class="form-control" id="image" name="image"
                                                accept="image/*">
                                            <small class="form-text text-muted">
                                                <i class="bi bi-info-circle me-1"></i>
                                                Update gambar sebelumnya
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <a href="{{ route('admin.listNews') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left me-2"></i>Back to List
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-2"></i>Update News
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script src="js/rteScript.js"></script>

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
