<x-layout3 title="Input Berita">
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title h4 mb-4">Input Berita</h2>

                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.berita.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="judulBerita" class="form-label">
                            Judul Berita
                        </label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="judulBerita"
                            name="title" value="{{ old('judul') }}" placeholder="Masukkan Judul Berita">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="gambar" class="form-label">
                            Gambar
                        </label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="gambar"
                            name="image">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="detailBerita" class="form-label">
                            Detail Berita
                        </label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="detailBerita" name="content" rows="8"
                            placeholder="Masukkan Detail Berita">{{ old('isi') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane me-2"></i>
                            Publish
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout3>
