<x-layout title="Home">
    <!-- Banner Section -->
    <div class="position-relative">
        <img src="img/banner.jpeg" alt="Cimahi" class="w-100" style="height: 500px; object-fit: cover;">
        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center"
            style="background: rgba(0,0,0,0.5);">
            <h1 class="text-white text-center fw-bold display-4">
                DISDAGKOPERIN<br>
                <span class="fs-3">Bidang Koperasi Usaha Kecil Menengah</span>
            </h1>
        </div>
    </div>

    <!-- Services Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-4 text-uppercase">Pelayanan</h2>
            <div class="row justify-content-center g-4">
                <div class="col-md-4 col-sm-6">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="{{ asset('img/about.png') }}" alt="Service 1" class="img-fluid mb-3" style="max-width: 200px;">
                            <h3 class="card-title fw-bold">WUB</h3>
                            <a href="http://localhost:8010" class="btn btn-warning text-white">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="{{ asset('img/pelayanan-placeholder.jpg') }}" alt="Service 2" class="img-fluid mb-3" style="max-width: 200px;">
                            <h3 class="card-title fw-bold">Lorem</h3>
                            <button class="btn btn-warning text-white">Learn More</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="{{ asset('img/pelayanan-placeholder.jpg') }}" alt="Service 3" class="img-fluid mb-3" style="max-width: 200px;">
                            <h3 class="card-title fw-bold">Lorem</h3>
                            <button class="btn btn-warning text-white">Learn More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="py-5" style="background-color: #f97316;">
        <div class="container">
            <h2 class="text-center text-white fw-bold mb-4 text-uppercase">Berita</h2>
            <div class="row justify-content-center g-4">
                @forelse($listBerita as $berita)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card h-100">
                            <div style="height: 200px; overflow: hidden;">
                                <img src="{{ $berita->image }}" alt="News" class="card-img-top h-100"
                                    style="object-fit: cover;">
                            </div>
                            <div class="card-body">
                                <p class="text-muted small">{{ $berita->created_at->diffForHumans() }}</p>
                                <h3 class="card-title fw-bold fs-5">{{ $berita->title }}</h3>
                                <a href="{{ route('berita.detail', $berita) }}"
                                    class="text-warning fw-bold text-decoration-none">Selengkapnya ></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-white text-center">Belum ada berita</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layout>
