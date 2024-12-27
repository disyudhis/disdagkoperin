<x-layout title="Kontak">
    <div class="container py-5">
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


        <div class="card shadow mx-auto" style="max-width: 800px;">
            <div class="card-body p-4 p-md-5">
                <h2 class="card-title text-center text-uppercase fw-bold mb-4">Kontak Kami</h2>

                <form method="POST" action="{{ route('sendEmail') }}">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control">
                                @error('nama')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik" class="form-label">NIB</label>
                                <input type="text" id="nik" name="nik" class="form-control">
                                @error('nik')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone" class="form-label">No Hand Phone</label>
                                <input type="text" id="phone" name="phone" class="form-control">
                                @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="pesan" class="form-label">Pesan</label>
                                <textarea id="pesan" name="pesan" rows="5" class="form-control"></textarea>
                                @error('pesan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-success px-4">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
