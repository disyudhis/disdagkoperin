<x-layout3 title="Berita">
        <div class="toast-container position-fixed top-0 end-0 p-3">
            @if (session('success'))
                <div class="toast show bg-success text-white" role="alert" id="successToast">
                    <div class="toast-header">
                        <strong class="me-auto">Success</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                    </div>
                    <div class="toast-body">{{ session('success') }}</div>
                </div>
            @endif

            @if (session('error'))
                <div class="toast show bg-danger text-white" role="alert" id="errorToast">
                    <div class="toast-header">
                        <strong class="me-auto">Error</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                    </div>
                    <div class="toast-body">{{ session('error') }}</div>
                </div>
            @endif
        </div>

        <div class="container-fluid py-4">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="card-title fs-3 mb-4">List Berita</h2>

                    <div class="row g-4">
                        @forelse($listBerita as $berita)
                            <div class="col-12 col-md-6 col-xl-4 col-xxl-3">
                                <div class="card h-100 shadow-sm">
                                    <div class="position-relative">
                                        <img src="{{ $berita->image }}" class="card-img-top" alt="News Image"
                                            style="height: 200px; object-fit: cover;">
                                    </div>
                                    <div class="card-body">
                                        <small class="text-muted">{{ $berita->created_at->diffForHumans() }}</small>
                                        <h5 class="card-title mt-2 text-truncate" style="min-height: 48px;">
                                            {{ $berita->title }}</h5>
                                        <div class="d-flex gap-2 justify-content-end mt-3">
                                            <a href="{{ route('berita.detail', $berita) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form method="POST" action="{{ route('admin.berita.destroy', $berita) }}"
                                                class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus berita ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5 text-muted">
                                <i class="fas fa-newspaper fs-1 mb-3"></i>
                                <p>Belum ada berita</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    <script>
        const toastElList = document.querySelectorAll('.toast');
        const toastList = [...toastElList].map(toastEl => new bootstrap.Toast(toastEl, {
            autohide: true,
            delay: 3000
        }));
    </script>
</x-layout3>
