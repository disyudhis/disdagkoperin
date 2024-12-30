{{-- resources/views/admin/pelatihan/create.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - Edit Pelatihan</title>
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

                <div class="container-fluid px-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow-sm">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Edit Pelatihan</h5>
                                    <a href="{{ route('admin.listWorkshop') }}"
                                        class="btn btn-outline-secondary btn-sm">
                                        <i class="bi bi-arrow-left"></i> Kembali
                                    </a>
                                </div>

                                <div class="card-body">
                                    <form action="{{ route('admin.updateWorkshop', $workshop->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')

                                        <div class="row">
                                            <div class="col-md-8">
                                                <!-- Basic Information Section -->
                                                <div class="mb-4">
                                                    <label for="name" class="form-label fw-bold">Nama
                                                        Pelatihan</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="name" name="name"
                                                        value="{{ old('name', $workshop->name) }}">
                                                    @error('name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-4">
                                                    <label for="description"
                                                        class="form-label fw-bold">Deskripsi</label>
                                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                                        rows="4">{{ old('description', $workshop->description) }}</textarea>
                                                    @error('description')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <!-- Sidebar Info -->
                                                <div class="card bg-light">
                                                    <div class="card-body">
                                                        <div class="mb-3">
                                                            <label for="type" class="form-label fw-bold">Tipe
                                                                Pelatihan</label>
                                                            <select
                                                                class="form-select @error('type') is-invalid @enderror"
                                                                id="type" name="type">
                                                                <option value="">Pilih Tipe</option>
                                                                <option value="Wajib"
                                                                    {{ old('type', $workshop->type) == 'Wajib' ? 'selected' : '' }}>
                                                                    Wajib</option>
                                                                <option value="Workshop"
                                                                    {{ old('type', $workshop->type) == 'Workshop' ? 'selected' : '' }}>
                                                                    Workshop</option>
                                                            </select>
                                                            @error('type')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label fw-bold">Thumbnail</label>
                                                            @if ($workshop->image)
                                                                <div class="mb-2">
                                                                    <img src="{{ App\Http\Controllers\AuthController::getUrlForImage($workshop->image) }}"
                                                                        class="img-fluid rounded"
                                                                        alt="Workshop thumbnail">
                                                                </div>
                                                            @endif
                                                            <input type="file"
                                                                class="form-control @error('image') is-invalid @enderror"
                                                                name="image" accept="image/*">
                                                            @error('image')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Materials Section -->
                                        <div class="mt-4">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h5 class="mb-0">Materi Pembelajaran</h5>
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    onclick="addMaterial()">
                                                    <i class="bi bi-plus-circle"></i> Tambah Materi
                                                </button>
                                            </div>

                                            <div id="materials-container">
                                                @foreach ($workshop->topics as $index => $topic)
                                                    <div class="card mb-3 border-0 shadow-sm material-item">
                                                        <div
                                                            class="card-header bg-light d-flex justify-content-between align-items-center">
                                                            <h6 class="mb-0">Materi <span
                                                                    class="material-number">{{ $index + 1 }}</span>
                                                            </h6>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                onclick="removeMaterial(this)">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </div>
                                                        <div class="card-body">
                                                            <input type="hidden"
                                                                name="topics[{{ $index }}][id]"
                                                                value="{{ $topic->id ?? '' }}">

                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label">Judul Materi</label>
                                                                    <input type="text"
                                                                        class="form-control @error('topics.' . $index . '.title') is-invalid @enderror"
                                                                        name="topics[{{ $index }}][title]"
                                                                        value="{{ old('topics.' . $index . '.title', $topic->title ?? '') }}">
                                                                    @error('topics.' . $index . '.title')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label">Deskripsi Materi</label>
                                                                    <textarea class="form-control @error('topics.' . $index . '.description') is-invalid @enderror"
                                                                        name="topics[{{ $index }}][description]" rows="2">{{ old('topics.' . $index . '.description', $topic->description ?? '') }}</textarea>
                                                                    @error('topics.' . $index . '.description')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <!-- Sub Materials -->
                                                            <div class="mt-3">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center mb-3">
                                                                    <h6 class="mb-0">Sub Materi</h6>
                                                                    <button type="button" class="btn btn-info btn-sm"
                                                                        onclick="addSubMaterial(this)">
                                                                        <i class="bi bi-plus-circle"></i> Tambah Sub
                                                                        Materi
                                                                    </button>
                                                                </div>
                                                                <div class="ps-4 submaterials-container">
                                                                    @foreach ($topic->subtopics ?? [] as $subIndex => $subtopic)
                                                                        <div
                                                                            class="card mb-3 border-start border-primary border-3 submaterial-item">
                                                                            <div class="card-body">
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center mb-3">
                                                                                    <h6 class="mb-0">Sub Materi <span
                                                                                            class="submaterial-number">{{ $subIndex + 1 }}</span>
                                                                                    </h6>
                                                                                    <button type="button"
                                                                                        class="btn btn-danger btn-sm"
                                                                                        onclick="removeSubMaterial(this)">
                                                                                        <i class="bi bi-trash"></i>
                                                                                    </button>
                                                                                </div>

                                                                                <input type="hidden"
                                                                                    name="topics[{{ $index }}][subtopics][{{ $subIndex }}][id]"
                                                                                    value="{{ $subtopic->id ?? '' }}">

                                                                                <div class="mb-3">
                                                                                    <label class="form-label">Judul Sub
                                                                                        Materi</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm @error('topics.' . $index . '.subtopics.' . $subIndex . '.title') is-invalid @enderror"
                                                                                        name="topics[{{ $index }}][subtopics][{{ $subIndex }}][title]"
                                                                                        value="{{ old('topics.' . $index . '.subtopics.' . $subIndex . '.title', $subtopic->title ?? '') }}">
                                                                                    @error('topics.' . $index .
                                                                                        '.subtopics.' . $subIndex .
                                                                                        '.title')
                                                                                        <div class="invalid-feedback">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        class="form-label">Konten</label>
                                                                                    <textarea
                                                                                        class="form-control form-control-sm @error('topics.' . $index . '.subtopics.' . $subIndex . '.content') is-invalid @enderror"
                                                                                        name="topics[{{ $index }}][subtopics][{{ $subIndex }}][content]" rows="2">{{ old('topics.' . $index . '.subtopics.' . $subIndex . '.content', $subtopic->content ?? '') }}</textarea>
                                                                                    @error('topics.' . $index .
                                                                                        '.subtopics.' . $subIndex .
                                                                                        '.content')
                                                                                        <div class="invalid-feedback">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label class="form-label">File
                                                                                        Materi</label>
                                                                                    <input type="file"
                                                                                        class="form-control form-control-sm @error('topics.' . $index . '.subtopics.' . $subIndex . '.file') is-invalid @enderror"
                                                                                        name="topics[{{ $index }}][subtopics][{{ $subIndex }}][file]">
                                                                                    @error('topics.' . $index .
                                                                                        '.subtopics.' . $subIndex . '.file')
                                                                                        <div class="invalid-feedback">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
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

                                        <div class="d-flex justify-content-end mt-4">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="bi bi-save"></i> Update Pelatihan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

        function addMaterial() {
            const container = document.getElementById('materials-container');
            const materialCount = container.getElementsByClassName('material-item').length;
            const newIndex = materialCount;

            const materialTemplate = `
        <div class="card mb-3 border-0 shadow-sm material-item">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Materi <span class="material-number">${newIndex + 1}</span></h6>
                <button type="button" class="btn btn-danger btn-sm" onclick="removeMaterial(this)">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
            <div class="card-body">
                <input type="hidden" name="topics[${newIndex}][id]" value="">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Materi</label>
                        <input type="text" class="form-control" name="topics[${newIndex}][title]" value="">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Deskripsi Materi</label>
                        <textarea class="form-control" name="topics[${newIndex}][description]" rows="2"></textarea>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0">Sub Materi</h6>
                        <button type="button" class="btn btn-info btn-sm" onclick="addSubMaterial(this)">
                            <i class="bi bi-plus-circle"></i> Tambah Sub Materi
                        </button>
                    </div>
                    <div class="ps-4 submaterials-container">
                    </div>
                </div>
            </div>
        </div>
    `;

            container.insertAdjacentHTML('beforeend', materialTemplate);
            updateMaterialNumbers();
        }

        function addSubMaterial(button) {
            const materialItem = button.closest('.material-item');
            const materialIndex = Array.from(materialItem.parentNode.children).indexOf(materialItem);
            const submaterialsContainer = materialItem.querySelector('.submaterials-container');
            const submaterialCount = submaterialsContainer.getElementsByClassName('submaterial-item').length;
            const newSubIndex = submaterialCount;

            const submaterialTemplate = `
        <div class="card mb-3 border-start border-primary border-3 submaterial-item">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0">Sub Materi <span class="submaterial-number">${newSubIndex + 1}</span></h6>
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeSubMaterial(this)">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>

                <input type="hidden" name="topics[${materialIndex}][subtopics][${newSubIndex}][id]" value="">

                <div class="mb-3">
                    <label class="form-label">Judul Sub Materi</label>
                    <input type="text" class="form-control form-control-sm"
                        name="topics[${materialIndex}][subtopics][${newSubIndex}][title]" value="">
                </div>

                <div class="mb-3">
                    <label class="form-label">Konten</label>
                    <textarea class="form-control form-control-sm"
                        name="topics[${materialIndex}][subtopics][${newSubIndex}][content]" rows="2"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">File Materi</label>
                    <input type="file" class="form-control form-control-sm"
                        name="topics[${materialIndex}][subtopics][${newSubIndex}][file]">
                </div>
            </div>
        </div>
    `;

            submaterialsContainer.insertAdjacentHTML('beforeend', submaterialTemplate);
            updateSubmaterialNumbers(materialItem);
        }

        function removeMaterial(button) {
            if (confirm('Apakah Anda yakin ingin menghapus materi ini?')) {
                const materialItem = button.closest('.material-item');
                materialItem.remove();
                updateMaterialNumbers();
            }
        }

        function removeSubMaterial(button) {
            if (confirm('Apakah Anda yakin ingin menghapus sub materi ini?')) {
                const submaterialItem = button.closest('.submaterial-item');
                const materialItem = submaterialItem.closest('.material-item');
                submaterialItem.remove();
                updateSubmaterialNumbers(materialItem);
            }
        }

        function updateMaterialNumbers() {
            const materials = document.getElementsByClassName('material-item');
            Array.from(materials).forEach((material, index) => {
                material.querySelector('.material-number').textContent = index + 1;
                updateFormIndexes(material, index);
            });
        }

        function updateSubmaterialNumbers(materialItem) {
            const submaterials = materialItem.getElementsByClassName('submaterial-item');
            Array.from(submaterials).forEach((submaterial, index) => {
                submaterial.querySelector('.submaterial-number').textContent = index + 1;
            });
        }

        function updateFormIndexes(materialItem, materialIndex) {
            // Update material inputs
            materialItem.querySelectorAll('input[name^="topics["], textarea[name^="topics["]').forEach(input => {
                const name = input.getAttribute('name');
                input.setAttribute('name', name.replace(/topics\[\d+\]/, `topics[${materialIndex}]`));
            });

            // Update submaterial inputs
            const submaterials = materialItem.getElementsByClassName('submaterial-item');
            Array.from(submaterials).forEach((submaterial, subIndex) => {
                submaterial.querySelectorAll('input[name^="topics["], textarea[name^="topics["]').forEach(input => {
                    const name = input.getAttribute('name');
                    input.setAttribute('name', name.replace(/topics\[\d+\]\[subtopics\]\[\d+\]/,
                        `topics[${materialIndex}][subtopics][${subIndex}]`));
                });
            });
        }
    </script>
</body>

</html>
