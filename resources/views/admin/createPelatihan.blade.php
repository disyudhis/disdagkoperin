{{-- resources/views/admin/pelatihan/create.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - Input Pelatihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('wub/styles/admin.css') }}">
</head>

<body>
    <div id="wrapper" class="vh-100">
        @component('components.sidebar')
        @endcomponent

        <div id="page-content-wrapper">
            <div class="container-fluid">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <button id="sidebarToggle" class="btn btn-secondary d-md-none">
                    <i class="bi bi-list"></i>
                </button>
                <h1 class="mt-4">Input Pelatihan</h1>

                <form method="POST" action="{{ route('admin.storePelatihan') }}" enctype="multipart/form-data"
                    class="bg-light p-4 rounded shadow-sm">
                    @csrf

                    <!-- Basic Information Card -->
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0">Informasi Dasar</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Pelatihan <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="3">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="image" class="form-label">Upload Thumbnail</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        id="image" name="image" accept="image/*">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="type" class="form-label">Tipe Pelatihan <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select @error('type') is-invalid @enderror" id="type"
                                        name="type">
                                        <option value="">Pilih Tipe</option>
                                        <option value="Wajib" {{ old('type') == 'Wajib' ? 'selected' : '' }}>Wajib
                                        </option>
                                        <option value="Workshop" {{ old('type') == 'Workshop' ? 'selected' : '' }}>
                                            Workshop</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                @if (!session('materials'))
                                    @error('materials[][]')
                                        <div class="alert alert-danger" role="alert">
                                            Materi Pembelajaran harus dibuat!
                                        </div>
                                    @enderror
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Materials Card -->
                    <div class="card mb-4">
                        <div
                            class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Materi Pembelajaran</h5>
                            <a href="{{ route('admin.createMaterial') }}" class="btn btn-light btn-sm">
                                <i class="bi bi-plus-circle"></i> Tambah Materi
                            </a>
                        </div>
                        <div class="card-body">
                            @if (session('materials'))
                                @foreach (session('materials') as $materialIndex => $material)
                                    <div class="material-item border rounded p-3 mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h6 class="mb-0">Materi {{ $materialIndex + 1 }}</h6>
                                            <a href="{{ route('admin.removeMaterial', ['index' => $materialIndex]) }}"
                                                class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Judul Materi <span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('materials.' . $materialIndex . '.title') is-invalid
                                            @enderror"
                                                name="materials[{{ $materialIndex }}][title]"
                                                value="{{ $material['title'] ?? '' }}">
                                            @error('materials.' . $materialIndex . '.title')
                                                <div class="invalid-feedback">Judul harus diisi</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Materi <span
                                                    class="text-danger">*</span></label>
                                            <textarea
                                                class="form-control @error('materials.' . $materialIndex . '.description') is-invalid
                                            @enderror"
                                                name="materials[{{ $materialIndex }}][description]" rows="2">{{ $material['description'] ?? '' }}</textarea>
                                            @error('materials.' . $materialIndex . '.description')
                                                <div class="invalid-feedback">Materi harus diisi</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            @if (!isset($material['sub_materials']))
                                                @error('materials[][sub_materials][][]')
                                                    <div class="alert alert-danger" role="alert">
                                                        Sub Materi Pembelajaran harus dibuat!
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>

                                        <!-- Sub Materials Section -->
                                        <div class="sub-materials-section">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h6 class="mb-0">Sub Materi</h6>
                                                <a href="{{ route('admin.addSubMaterial', ['index' => $materialIndex]) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="bi bi-plus-circle"></i> Tambah Sub Materi
                                                </a>
                                            </div>

                                            @if (isset($material['sub_materials']))
                                                @foreach ($material['sub_materials'] as $subIndex => $subMaterial)
                                                    <div class="sub-material-item border-start ps-3 mb-3">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-2">
                                                            <h6 class="mb-0">Sub Materi {{ $subIndex + 1 }}</h6>
                                                            <a href="{{ route('admin.removeSubMaterial', ['index' => $materialIndex, 'subIndex' => $subIndex]) }}"
                                                                class="btn btn-danger btn-sm">
                                                                <i class="bi bi-trash"></i>
                                                            </a>
                                                        </div>

                                                        <div class="mb-2">
                                                            <label class="form-label">Judul Sub Materi <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text"
                                                                class="form-control @error('materials.' . $materialIndex . '.sub_materials.' . $subIndex . '.title')
                                                            is-invalid
                                                            @enderror"
                                                                name="materials[{{ $materialIndex }}][sub_materials][{{ $subIndex }}][title]"
                                                                value="{{ $subMaterial['title'] ?? '' }}">
                                                            @error('materials.' . $materialIndex . '.sub_materials.' .
                                                                $subIndex . '.title')
                                                                <div class="invalid-feedback">
                                                                    Judul Harus diisi!
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-2">
                                                            <label class="form-label">Konten <span
                                                                    class="text-danger">*</span></label>
                                                            <textarea
                                                                class="form-control @error('materials.' . $materialIndex . '.sub_materials.' . $subIndex . '.content')
                                                            is-invalid
                                                            @enderror"
                                                                name="materials[{{ $materialIndex }}][sub_materials][{{ $subIndex }}][content]" rows="2">{{ $subMaterial['content'] ?? '' }}</textarea>
                                                            @error('materials.' . $materialIndex . '.sub_materials.' .
                                                                $subIndex . '.content')
                                                                <div class="invalid-feedback">
                                                                    Isi konten harus diisi
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-2">
                                                            <label class="form-label">File Materi</label>
                                                            <input type="file"
                                                                class="form-control @error('materials.' . $materialIndex . '.sub_materials.' . $subIndex . '.file')
                                                            is-invalid
                                                            @enderror"
                                                                name="materials[{{ $materialIndex }}][sub_materials][{{ $subIndex }}][file]">
                                                            @error('materials.' . $materialIndex . '.sub_materials.' .
                                                                $subIndex . '.file')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan Pelatihan</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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
