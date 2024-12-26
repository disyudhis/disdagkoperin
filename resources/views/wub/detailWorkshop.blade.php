<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>WUB - Detail Pelatihan</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('wub/styles/wub.css') }}" />
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
            <h1>Detail Pelatihan</h1>
        </div>

        <div class="container-fluid">
            <div class="row">
                <!-- Header Card -->
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="position-relative">
                            <img src="{{ App\Http\Controllers\AuthController::getUrlForImage($attendance->workshop->image) }}"
                                class="card-img-top" alt="{{ $attendance->workshop->name }}"
                                style="height: 300px; object-fit: cover;">
                            <div class="position-absolute bottom-0 start-0 w-100 p-4"
                                style="background: linear-gradient(transparent, rgba(0,0,0,0.8));">
                                <h2 class="text-white mb-0">{{ $attendance->workshop->name }}</h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Progress Overview -->
                            <div class="d-flex align-items-center mb-4">
                                <div class="flex-grow-1 me-3">
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar {{ $attendance->progress_percentage == 100 ? 'bg-success' : 'bg-info' }}"
                                            role="progressbar"
                                            style="width: {{ $attendance->progress_percentage }}%">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end" style="min-width: 100px;">
                                    <span class="fw-bold">{{ $attendance->progress_percentage }}%</span>
                                </div>
                            </div>

                            <!-- Workshop Info -->
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-clock me-2"></i>
                                <span
                                    class="text-muted">{{ $attendance->workshop->created_at->format('d M Y') }}</span>
                            </div>
                            <p class="lead mb-0">{{ $attendance->workshop->description }}</p>
                        </div>
                    </div>
                </div>

                <!-- Materials Accordion -->
                <div class="col-12">
                    <div class="accordion" id="workshopMaterials">
                        @foreach ($attendance->workshop->topics as $topic)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $topic->id }}">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $topic->id }}">
                                        <div class="d-flex align-items-center w-100">
                                            <i class="bi bi-book me-2"></i>
                                            <span class="flex-grow-1">{{ $topic->title }}</span>
                                            @php
                                                $completedCount = $attendance->progress
                                                    ->whereIn('subtopic_id', $topic->subtopics->pluck('id'))
                                                    ->where('is_completed', true)
                                                    ->count();
                                                $totalSubtopics = $topic->subtopics->count();
                                            @endphp
                                            <span class="badge bg-secondary ms-2">
                                                {{ $completedCount }}/{{ $totalSubtopics }}
                                            </span>
                                        </div>
                                    </button>
                                </h2>
                                <div id="collapse{{ $topic->id }}" class="accordion-collapse collapse"
                                    data-bs-parent="#workshopMaterials">
                                    <div class="accordion-body p-4">
                                        <div class="list-group">
                                            @foreach ($topic->subtopics as $subtopic)
                                                <div class="list-group-item mb-3 border rounded">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center py-2">
                                                        <div class="d-flex align-items-center">
                                                            <form
                                                                action="{{ route('wub.completeThisTask', $subtopic->id) }}"
                                                                method="POST" class="d-flex align-items-center me-3">
                                                                @csrf
                                                                <input type="hidden" name="subtopic_id"
                                                                    value="{{ $subtopic->id }}">
                                                                @php
                                                                    $isCompleted = $attendance->progress
                                                                        ->where('subtopic_id', $subtopic->id)
                                                                        ->where('is_completed', true)
                                                                        ->isNotEmpty();
                                                                @endphp
                                                                <input type="checkbox" class="form-check-input me-3"
                                                                    name="is_completed" onchange="this.form.submit()"
                                                                    {{ $isCompleted ? 'checked' : '' }}>
                                                                <h5 class="mb-0 fw-bold">{{ $subtopic->title }}</h5>
                                                            </form>
                                                        </div>
                                                        @if ($subtopic->file)
                                                            <a href="{{ route('wub.downloadFile', $subtopic->id) }}"
                                                                class="btn btn-outline-primary btn-sm">
                                                                <i class="bi bi-download me-1"></i>
                                                                Download Materi
                                                            </a>
                                                        @endif
                                                    </div>

                                                    <div class="content-wrapper mt-3 ps-4">
                                                        <div class="content">
                                                            {!! $subtopic->content !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
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
