<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('wub/styles/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Admin - List Absensi</title>
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
                    <i class="bi bi-list"></i>
                </button>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="bi bi-list-check me-2"></i>Daftar Absensi Peserta
                        </h4>
                        <div class="d-flex align-items-center">
                            {{-- <button class="btn btn-light me-2" data-bs-toggle="modal" data-bs-target="#exportModal">
                                <i class="bi bi-download me-1"></i>Export
                            </button> --}}
                            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#filterModal">
                                <i class="bi bi-funnel me-1"></i>Filter
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="alert alert-info d-flex align-items-center" role="alert">
                                    <i class="bi bi-calendar-check me-2"></i>
                                    Menampilkan Data Absensi:
                                    <strong
                                        class="ms-2">{{ $selectedDate ? \Carbon\Carbon::parse($selectedDate)->format('d F Y') : 'Semua Tanggal' }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Nama Peserta</th>
                                        <th>NIP/ID</th>
                                        <th class="text-center">Status Absensi</th>
                                        <th>Waktu Absensi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($attendances as $index => $attendance)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ App\Http\Controllers\AuthController::getUrlForImage($attendance->image) ?? 'https://avatar.iran.liara.run/public/boy' }}"
                                                        class="rounded-circle me-2"
                                                        style="width: 40px; height: 40px; object-fit: cover;">
                                                    {{ $attendance->user->name }}
                                                </div>
                                            </td>
                                            <td>{{ $attendance->user->nib }}</td>
                                            <td class="text-center">
                                                <span class="badge bg-{{ $attendance->absensi_status_color }}">
                                                    {{ $attendance->status }}
                                                </span>
                                            </td>
                                            <td>{{ $attendance->absen_at ? \Carbon\Carbon::parse($attendance->absen_at)->format('H:i:s') : '-' }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                <div class="alert alert-warning">
                                                    <i class="bi bi-exclamation-triangle me-2"></i>
                                                    Tidak ada data absensi yang ditemukan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div>
                                Menampilkan {{ $attendances->firstItem() }} - {{ $attendances->lastItem() }} dari
                                {{ $attendances->total() }} data
                            </div>
                            {{ $attendances->links() }}
                        </div>
                    </div>
                </div>


                <!-- Filter Modal -->
                <div class="modal fade" id="filterModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title">Filter Absensi</h5>
                                <button type="button" class="btn-close btn-close-white"
                                    data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ route('admin.listAbsensi') }}" method="GET">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Pilih Tanggal</label>
                                        <input type="date" name="selected_date" class="form-control"
                                            value="{{ $selectedDate }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Terapkan</button>
                                </div>
                            </form>
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
