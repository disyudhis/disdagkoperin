<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
    <title>WUB - Absensi</title>
    <link rel="stylesheet" type="text/css" href="wub/styles/wub.css" />
</head>

<body>
    @component('components.sidebar-wub')
    @endcomponent

    <div class="container mt-5 pt-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- Header Section - Responsive pada mobile -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">Form Absensi</h4>
            <div class="d-flex align-items-center">
                <span class="badge bg-primary fs-6">
                    {{ now()->format('d F Y') }}
                </span>
            </div>
        </div>
        <div class="row g-4">
            <!-- Form Absensi - Full width pada mobile -->
            <div class="col-12 col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0">Input Absensi</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('wub.submitAbsensi') }}" method="POST">
                            @csrf

                            <!-- Grid System untuk form inputs -->
                            <div class="row">
                                <!-- Waktu - 6 columns pada desktop, full pada mobile -->
                                <div class="col-12 col-md-6">
                                    <label class="form-label">Waktu</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-clock"></i>
                                        </span>
                                        <input type="text" class="form-control" name="absen_at"
                                            value="{{ now()->format('H:i') }}" readonly>
                                    </div>
                                </div>

                                <!-- Keterangan - 6 columns pada desktop, full pada mobile -->
                                <div class="col-12 col-md-6">
                                    <label for="keterangan" class="form-label">Status</label>
                                    <select class="form-select" id="keterangan" name="status"
                                        {{ $already_checked ? 'disabled' : '' }}>
                                        <option value="" selected disabled>Pilih Keterangan</option>
                                        <option value="SUDAH">Hadir</option>
                                        <option value="SAKIT">Izin</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Submit Button - Sticky pada mobile -->
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary w-100"
                                    {{ $already_checked ? 'disabled' : '' }}>
                                    <i class="bi bi-check-circle me-2"></i>
                                    {{ $already_checked ? 'Sudah Absensi' : 'Submit Absensi' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Riwayat Absensi Card -->
                <div class="card shadow-sm mt-4">
                    <div
                        class="card-header bg-secondary text-white d-flex justify-content-between align-items-center py-3">
                        <h5 class="mb-0">Riwayat Absensi</h5>
                        <button class="btn btn-sm btn-light d-md-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#riwayatCollapse">
                            <i class="bi bi-chevron-down"></i>
                        </button>
                    </div>
                    <div class="collapse show" id="riwayatCollapse">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="px-4">Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($absens as $absensi)
                                            <tr>
                                                <td class="px-4">{{ now()->subDay()->format('d/m/Y') }}</td>
                                                <td>{{ $absensi->absen_at }}</td>
                                                <td><span
                                                        class="badge bg-{{ $absensi->absensi_status_color }}">{{ $absensi->status }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Card - Order changes pada mobile -->
            <div class="col-12 col-lg-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-info text-white py-3">
                        <h5 class="mb-0">Statistik Absensi</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-6 col-lg-12">
                                <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded">
                                    <div>
                                        <span class="text-muted small">Total Hadir</span>
                                        <h3 class="mb-0">{{ $hadir }}</h3>
                                    </div>
                                    <div class="rounded-circle bg-success p-2">
                                        <i class="bi bi-person-check text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-12">
                                <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded">
                                    <div>
                                        <span class="text-muted small">Total Alpha/Izin</span>
                                        <h3 class="mb-0">{{ $alpha }}</h3>
                                    </div>
                                    <div class="rounded-circle bg-danger p-2">
                                        <i class="bi bi-clock-history text-white"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <footer class="footer mt-auto py-3">
        <div class="container">
            <div class="marquee">
                <p class="text-white">
                    Your running text here. Make sure to replace this with your actual text.
                </p>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
