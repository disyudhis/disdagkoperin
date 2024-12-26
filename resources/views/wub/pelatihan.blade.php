<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>WUB - Pelatihan</title>
    <link rel="stylesheet" type="text/css" href="wub/styles/wub.css" />
</head>

<body>
    @component('components.sidebar-wub')
    @endcomponent

    <!-- Main content wrapper -->
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Pelatihan</h1>
        </div>

        <!-- Category Cards -->
        <div class="row row-cols-1 row-cols-md-2 g-4 mb-5">
            <div class="col">
                <div class="card h-100 category-card">
                    <div class="card-body d-flex align-items-center justify-content-between p-4">
                        <div>
                            <h2 class="card-text mb-2">Wajib</h2>
                            <p class="mb-0">Pelatihan dasar yang harus diselesaikan</p>
                        </div>
                        <i class="bi bi-star-fill fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 category-card">
                    <div class="card-body d-flex align-items-center justify-content-between p-4">
                        <div>
                            <h2 class="card-text mb-2">Workshop</h2>
                            <p class="mb-0">Pelatihan tambahan untuk mengembangkan skill</p>
                        </div>
                        <i class="bi bi-laptop fs-1"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Available Workshops -->
        <h2 class="mb-4">Workshop Tersedia</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
            @forelse ($workshops as $workshop)
                <div class="col">
                    <div class="card h-100 workshop-card">
                        <img src="{{ App\Http\Controllers\AuthController::getUrlForImage($workshop->image) }}"
                            class="card-img-top" alt="{{ $workshop->title }}">
                        <div class="workshop-status bg-success text-white">
                            Tersedia
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $workshop->name }}</h5>
                            <p class="card-text text-muted">{{ $workshop->description }}</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    <i class="bi bi-book"></i>
                                    <small class="text-muted">{{ $workshop->type }}</small>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-white border-0 p-3">
                            <form action="{{ route('wub.enrollCourse', $workshop->id) }}" method="POST">
                                @csrf
                                @if (Auth::user()->role == App\Models\User::ROLE_CLIENT)
                                    <button type="submit" class="btn btn-primary w-100">Enroll Sekarang</button>
                                @else
                                    <button type="submit" class="btn btn-primary w-100" disabled>Enroll
                                        Sekarang</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center">Workshop tidak ada yang tersedia</div>
            @endforelse
        </div>

        <!-- Progress Overview -->
        <div class="container">
            <h2 class="mb-4">Workshop Saya</h2>
            @forelse ($attendances as $attendance)
                <div class="card mb-4 shadow-sm">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <!-- Image Column -->
                            <div class="col-md-2">
                                @if ($attendance->workshop->image)
                                    <img src="{{ App\Http\Controllers\AuthController::getUrlForImage($attendance->workshop->image) }}"
                                        alt="{{ $attendance->workshop->name }}" class="img-fluid rounded">
                                @else
                                    <div class="bg-light rounded p-3 text-center">
                                        <i class="bi bi-journal-text fs-1 text-muted"></i>
                                    </div>
                                @endif
                            </div>

                            <!-- Content Column -->
                            <div class="col-md-10">
                                <div class="d-flex flex-column">
                                    <!-- Workshop Title -->
                                    <h4 class="card-title mb-4">{{ $attendance->workshop->name }}</h4>

                                    <!-- Progress Section -->
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="flex-grow-1 me-3">
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-bar {{ $attendance->progress_percentage == 100 ? 'bg-success' : 'bg-info' }}"
                                                        role="progressbar"
                                                        style="width: {{ $attendance->progress_percentage }}%;"
                                                        aria-valuenow="{{ $attendance->progress_percentage }}"
                                                        aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="min-width: 60px;">
                                                <span
                                                    class="small fw-medium">{{ $attendance->progress_percentage }}%</span>
                                            </div>
                                        </div>

                                        <!-- Progress Details -->
                                        @php
                                            $totalLessons = $attendance->workshop->topics->sum(function ($topic) {
                                                return $topic->subtopics->count();
                                            });
                                            $completedLessons = $attendance->progress
                                                ->where('is_completed', true)
                                                ->count();
                                        @endphp
                                        <div class="text-muted small">
                                            <i class="bi bi-book-half me-1"></i>
                                            {{ $completedLessons }} dari {{ $totalLessons }} materi selesai
                                        </div>
                                    </div>

                                    <!-- Action Button -->
                                    <div class="text-end">
                                        <a href="{{ route('wub.detailWorkshop', $attendance->id) }}"
                                            class="btn btn-primary btn-sm px-4">
                                            <i class="bi bi-play-fill me-1"></i>
                                            Lanjutkan Belajar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-journal-x fs-1 text-muted mb-3"></i>
                        <p class="mb-0">Anda belum mengikuti pelatihan apapun</p>
                    </div>
                </div>
            @endforelse

            <!-- Pagination -->
            <div class="mt-4">
                {{ $attendances->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-navbar-custom">
        <div class="container">
            <div class="marquee">
                <p class="text-white">
                    Selamat datang di platform pelatihan WUB! Tingkatkan skill Anda dengan berbagai workshop yang
                    tersedia.
                </p>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
</body>

</html>
