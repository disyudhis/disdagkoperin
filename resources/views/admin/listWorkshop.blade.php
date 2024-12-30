<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('wub/styles/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Admin - List Workshop</title>
</head>

<body>
    <div id="wrapper" style="width: 100%; height: 100vh;">
        @component('components.sidebar')
        @endcomponent

        {{-- Start Content --}}
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <button id="sidebarToggle" class="btn btn-secondary d-md-none">
                    <i class="bi bi-list"></i>
                </button>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Daftar Workshop</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-nowrap">No</th>
                                        <th class="text-nowrap">Image</th>
                                        <th class="text-nowrap">Title</th>
                                        <th class="text-nowrap">Description</th>
                                        <th class="text-nowrap">Topics</th>
                                        <th class="text-nowrap">Subtopics</th>
                                        <th class="text-nowrap">Tanggal Dibuat</th>
                                        <th class="text-nowrap">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($workshops as $item)
                                        {{-- {{ dd($item) }} --}}
                                        <tr>
                                            <td class="text-nowrap">{{ $workshops->firstItem() + $loop->index }}</td>
                                            <td><img src="{{ App\Http\Controllers\AuthController::getUrlForImage($item->image) }}"
                                                    alt="{{ $item->name }}" style="width: 100px; height: 100px; ">
                                            </td>
                                            <td class="text-nowrap">{{ $item->name }}</td>
                                            <td>{{ Str::limit($item->description, 50) }}</td>
                                            <td>
                                                @foreach ($item->topics as $topic)
                                                    <ul>
                                                        <li>{{ $topic->title }}</li>
                                                    </ul>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($item->topics as $topic)
                                                    @foreach ($topic->subtopics as $subtopic)
                                                        <ul>
                                                            <li>{{ $subtopic->title }}</li>
                                                        </ul>
                                                    @endforeach
                                                @endforeach
                                            </td>
                                            <td class="text-nowrap">{{ $item->created_at->translatedFormat('d F Y') }}
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('admin.editWorkshop', $item->id) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>

                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $item->id }}">
                                                        Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal Konfirmasi Hapus -->
                                        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="deleteModalLabel{{ $item->id }}">Konfirmasi
                                                            Hapus Pelatihan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus Pelatihan
                                                        "{{ $item->name }}"?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('admin.deleteWorkshop', $item->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <td colspan="12" class="text-center">
                                            Belum ada pelatihan
                                        </td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            {{ $workshops->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Content --}}
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script>
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
