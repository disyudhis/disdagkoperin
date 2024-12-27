<x-layout title="Berita">
    <main class="container py-5">
        <h2 class="text-center fw-bold text-uppercase mb-4">Berita</h2>

        <div class="row g-4">
            @forelse($listBerita as $berita)
                <div class="col-sm-6 col-lg-4">
                    <div class="card h-100">
                        <div class="ratio ratio-16x9">
                            <img src="{{$berita->image}}" class="card-img-top object-fit-cover" alt="News Image">
                        </div>
                        <div class="card-body">
                            <p class="text-muted small mb-2">{{ $berita->created_at->diffForHumans() }}</p>
                            <h3 class="card-title h5 fw-semibold">{{ $berita->title }}</h3>
                            <a href="{{route('berita.detail', $berita)}}" class="text-warning text-decoration-none">
                                Selengkapnya <i class="bi bi-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada berita</p>
                </div>
            @endforelse
        </div>
    </main>
</x-layout>
