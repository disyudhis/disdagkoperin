<x-layout title="{{ $berita->title }}">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg">
                    {{-- Title Section --}}
                    <div class="card-header bg-white border-0 pt-4 px-4 px-lg-5">
                        <h1 class="display-5 fw-bold text-dark">{{ $berita->title }}</h1>
                        <div class="d-flex align-items-center text-muted">
                            <i class="bi bi-clock me-2"></i>
                            <small>{{ $berita->created_at->diffForHumans() }}</small>
                        </div>
                    </div>

                    {{-- Image Section --}}
                    <div class="card-body px-4 px-lg-5 pt-4">
                        <div class="text-center mb-4">
                            <img src="{{ $berita->image }}"
                                 class="img-fluid rounded shadow-sm"
                                 style="max-height: 600px; width: auto;"
                                 alt="{{ $berita->title }}">
                        </div>

                        {{-- Content Section --}}
                        <div class="content fs-5">
                            {!! nl2br(e($berita->content)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
</x-layout>
