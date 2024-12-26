<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <title>Disdagkoperin KUKM - Login</title>
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
        <div class="card p-4" style="max-width: 700px; width: 100%;">
            <div class="row g-0">
                <!-- Left side: Image -->
                <div class="col-md-6 p-0">
                    <img src="img/login-img.png" class="img-fluid h-100 w-100 img-cover" alt="Login Image">
                </div>
                <!-- Right side: Login Form -->
                <div class="col-md-6 d-flex flex-column justify-content-center align-items-center p-4">
                    <h4 class="mb-3 w-100 text-start">Sign-In</h4>
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <img src="img/item.png" class="h-50 w-50 mb-4 center-item">
                    <form method="POST" action="{{ route('postLogin') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nib" class="form-label">NIB</label>
                            <input type="text" class="form-control" id="nib" name="nib" placeholder="Masukkan NIB">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Masukkan password">
                        </div>
                        <button type="submit" class="button-custom w-100 text-white">Login</button>
                        <p class="fs-7">Belum punya akun?, klik <a href="{{ route('registerPortal') }}">disini</a></p>
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