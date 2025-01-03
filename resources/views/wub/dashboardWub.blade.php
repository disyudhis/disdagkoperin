<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/about.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
    <title>WUB - Dashboard</title>
    <link rel="stylesheet" type="text/css" href="wub/styles/wub.css" />
</head>

<body>
    @component('components.sidebar-wub')
    @endcomponent
    <div id="myCarousel" class="carousel slide py-5 pb-2" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($announcements as $index => $announcement)
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{ $index }}"
                    class="{{ $index == 0 ? 'active' : '' }}" aria-current="true"
                    aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @if ($announcements->isEmpty())
                <div class="carousel-item active">
                    <img src="https://placehold.co/1920x1080?text=No%20Announcement" class="d-block w-100"
                        alt="No Announcements Available">
                    <div class="carousel-caption d-none d-md-block text-start text-black px-3">
                        <h5>No Announcements Available</h5>
                        <p>Please check back later.</p>
                    </div>
                </div>
            @else
                @foreach ($announcements as $index => $announcement)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" data-bs-toggle="modal"
                        data-bs-target="#announcementModal{{ $announcement->id }}">
                        <img src="{{ App\Http\Controllers\AuthController::getUrlForImage($announcement->image) ?? 'https://placehold.co/1920x1080?text=No%20Image' }}"
                            class="d-block w-100" alt="{{ $announcement->title }}">
                        <div class="carousel-caption d-none d-md-block text-start text-dark px-3">
                            <h5>{{ $announcement->title }}</h5>
                            <p>{{ $announcement->description }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            @forelse ($news as $item)
                <div class="col-6 col-md-4 mb-4">
                    <div class="card h-100" data-bs-toggle="modal" data-bs-target="#newsModal{{ $item->id }}">
                        <img src="{{ App\Http\Controllers\AuthController::getUrlForImage($item->image) ?? 'https://placehold.co/1920x1080?text=No%20Image' }}"
                            class="card-img-top img-fluid" alt="{{ $item->title }}"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ Str::limit($item->description, 100) }}</p>
                        </div>
                    </div>

                    <!-- News Detail Modal -->
                    <div class="modal fade" id="newsModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="newsModalLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newsModalLabel{{ $item->id }}">
                                        {{ $item->title }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ App\Http\Controllers\AuthController::getUrlForImage($item->image) ?? 'https://placehold.co/1920x1080?text=No%20Image' }}"
                                        class="img-fluid mb-3" alt="{{ $item->title }}">
                                    <p>{!! nl2br(e($item->content)) !!}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center mb-4">
                    <div class="alert alert-warning" role="alert">
                        <strong>Oops!</strong> Tidak ada berita yang tersedia saat ini.
                    </div>
                </div>
            @endforelse

            @if ($news->count())
                <div class="col-12">
                    {{ $news->links('pagination::bootstrap-5') }} <!-- Menampilkan pagination hanya jika ada berita -->
                </div>
            @endif
        </div>
    </div>


    <!-- Announcement Modals -->
    @foreach ($announcements as $announcement)
        <div class="modal fade" id="announcementModal{{ $announcement->id }}" tabindex="-1"
            aria-labelledby="announcementModalLabel{{ $announcement->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="announcementModalLabel{{ $announcement->id }}">
                            {{ $announcement->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ App\Http\Controllers\AuthController::getUrlForImage($announcement->image) ?? 'https://placehold.co/1920x1080?text=No%20Announcement' }}"
                            class="img-fluid mb-3" alt="{{ $announcement->title }}">
                        <p>{!! nl2br(e($announcement->description)) !!}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

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
