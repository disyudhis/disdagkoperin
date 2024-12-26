<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <title>Disdagkoperin KUKM - Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body class="custom-font-body bg-color5">
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
        <div class="card p-4" style="max-width: 600px; width: 100%;">
            <div class="row g-0">
                <div class="col-12 d-flex flex-column justify-content-center">
                    <h4 class="mb-3 text-center">Register</h4>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('postRegister') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama" value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <label for="birthdate" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Masukkan tanggal lahir" value="{{ old('birthdate') }}">
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="gender" name="gender">
                                <option value="">Pilih jenis kelamin</option>
                                <option value="Laki-laki" {{ old('gender') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nib" class="form-label">NIB</label>
                            <input type="text" class="form-control" id="nib" name="nib" placeholder="Masukkan NIB" value="{{ old('nib') }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
                        </div>
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm-password" name="password_confirmation" placeholder="Masukkan password kembali">
                        </div>
                        <button type="submit" class="button-custom w-100 text-white mt-3">Register</button>
                        <p>Sudah punya akun?, klik <a href="{{ route('loginPortal') }}">disini</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
