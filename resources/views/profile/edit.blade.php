<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
    <title>WUB - Dashboard</title>
    <link rel="stylesheet" type="text/css" href="wub/styles/wub.css" />
</head>

<body>
    <nav class="navbar navbar-expand navbar-light bg-navbar-custom fixed-top">
        <a class="navbar-brand text-white ps-3" href="">
            <img src="img/logo.png" width="35px" height="40px" alt="">
        </a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasSidebar">
                    <img src="wub/icon/hamburger_menu.svg" width="25px" height="30px" alt="">
                </a>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end pe-2">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="wub/icon/settings_icon.svg" width="25px" height="30px" alt="">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log-Out</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="offcanvas offcanvas-start offcanvas-custom bg-canvas-custom" data-bs-scroll="true"
        data-bs-backdrop="false" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title text-white" id="offcanvasSidebarLabel"></h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body ps-4">
            <div class="text-center mb-4">
                <img src="{{ \App\Http\Controllers\AuthController::getUrlForImage(Auth::user()->photo) ?? 'https://media.geeksforgeeks.org/wp-content/uploads/20190802021607/geeks14.png' }}"
                    class="rounded-circle mt-2" alt="Circular Image" width="100" height="100" style="object-fit: cover">
                <h3 class="text-white mt-3">{{ $user->name }}</h3>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item py-2">
                    <h6><a class="nav-link text-white" href="{{ route('wub.dashboardWub') }}">Dashboard</a></h6>
                </li>
                <li class="nav-item">
                    <h6><a class="nav-link text-white" href="{{ route('wub.pelatihan') }}">Pelatihan</a></h6>
                </li>
                <li class="nav-item py-2">
                    <h6><a class="nav-link text-white" href="#">Absen</a></h6>
                </li>
            </ul>
        </div>
    </div>

    <div class="container profile-container py-5">
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
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="card-title text-center mb-0">Edit Profile</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <!-- Profile Picture Column -->
                                <div class="col-md-4 text-center">
                                    <div class="position-relative mb-4">
                                        <div class="profile-image-container mx-auto"
                                            style="width: 200px; height: 200px;">
                                            <img src="{{ $user->photo ? \App\Http\Controllers\AuthController::getUrlForImage($user->photo) : 'https://media.geeksforgeeks.org/wp-content/uploads/20190802021607/geeks14.png' }}"
                                                alt="Profile Picture" class="rounded-circle img-thumbnail"
                                                id="currentPhoto"
                                                style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                        <div class="mb-10">
                                            <h4>{{ $user->name }}</h4>
                                        </div>
                                    </div>
                                </div>

                                <!-- Form Fields Column -->
                                <div class="col-md-8">
                                    <div class="mb-4">
                                        <label for="fullname" class="form-label fw-semibold">Full Name</label>
                                        <input type="text"
                                            class="form-control form-control-lg @error('fullname') is-invalid @enderror"
                                            id="fullname" name="fullname"
                                            value="{{ old('fullname', $user->fullname) }}">
                                        @error('fullname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="email" class="form-label fw-semibold">Email Address</label>
                                        <input type="email"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email', $user->email) }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="address" class="form-label fw-semibold">Address</label>
                                        <textarea class="form-control form-control-lg @error('address') is-invalid @enderror" id="address" name="address"
                                            rows="3">{{ old('address', $user->address) }}</textarea>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="image" class="form-label">Profile Image</label>
                                        <div class="image-upload-container">
                                            <input type="file" class="form-control" id="image" name="photo"
                                                accept="image/*">
                                            <small class="form-text text-muted">
                                                <i class="bi bi-info-circle me-1"></i>
                                                Unggah foto baru
                                            </small>
                                            @error('photo')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex gap-3">
                                        <button type="submit" class="btn btn-primary btn-lg flex-grow-1">
                                            <i class="bi bi-check-lg"></i> Save Changes
                                        </button>
                                        <a href="{{ route('wub.dashboardWub') }}" class="btn btn-light btn-lg">
                                            <i class="bi bi-x-lg"></i> Cancel
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-auto py-3">
        <div class="container">
            <div class="marquee">
                <p class="text-white">
                    Your running text here. Make sure to replace this with your actual text.
                </p>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
