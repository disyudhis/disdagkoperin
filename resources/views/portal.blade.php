<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <title>Disdagkoperin KUKM - Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }

        /* Previous styles remain the same */
        .bg-container {
            background-color: transparent;
        }

        .bg-color1 {
            background-color: #FFFDD6;
        }

        .bg-color2 {
            background-color: #FBF7A5;
        }

        .bg-color3 {
            background-color: #F8F367;
        }

        .button-custom {
            background-color: transparent;
            border: 2px solid white;
            border-radius: 25px;
            padding: 8px 24px;
            transition: all 0.3s ease;
        }

        .button-custom:hover {
            background-color: white;
            color: var(--bs-primary) !important;
        }

        /* Updated and new styles */
        .hero-wrapper {
            position: relative;
            width: 100%;
            min-height: 100vh;
            background-image: url('img/bg-portal.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .hero-wrapper::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg,
                    rgba(0, 0, 139, 0.9) 0%,
                    /* Dark blue */
                    rgba(0, 0, 255, 0.8) 50%,
                    /* Blue */
                    rgba(30, 144, 255, 0.7) 100%
                    /* Dodger blue */
                );
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .navbar {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
            background-color: transparent;
        }

        .navbar.scrolled {
            background: linear-gradient(135deg,
                    rgba(0, 0, 139, 0.95) 0%,
                    rgba(0, 0, 255, 0.95) 50%,
                    rgba(30, 144, 255, 0.95) 100%);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            width: 200px;
            height: auto;
        }

        .navbar-toggler {
            border-color: white;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: white;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 2rem 1rem;
            }

            .hero-section h1 {
                font-size: 1.75rem;
            }

            .service-item {
                margin-bottom: 2rem;
            }

            .hero-wrapper {
                min-height: 100vh;
            }
        }
    </style>
</head>

<body class="custom-font-body">
    <!-- Navbar remains the same -->
    <nav class="navbar navbar-expand-lg navbar-light px-3">
        <!-- Previous navbar content -->
        <div class="container-fluid">
            <a class="navbar-brand" href="#home">
                <img src="img/logoPortal.png" alt="Logo" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#services">Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <button class="button-custom text-white"
                            onclick="location.href='{{ route('loginPortal') }}'">Login</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Updated Hero Section -->
    <div id="home" class="hero-wrapper">
        <div class="hero-content d-flex flex-column min-vh-100">
            <div
                class="hero-section text-center text-white d-flex flex-column justify-content-center align-items-center mt-auto mb-5 px-3">
                <h1 class="mb-3">Dinas Perdagangan KUKM dan Perindustrian Kota Cimahi</h1>
                <h5 class="mb-3">Layanan Pengembangan Usaha Mikro</h5>
                <p class="mb-4">Mulai sekarang untuk melihat informasi terkini dari <br class="d-none d-md-block">
                    Disdagkoperin KUKM!</p>
                <button class="button-custom text-white">Get Started</button>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div id="services" class="container-fluid bg-color1 py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Apa yang kami berikan?</h2>
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-4 service-item">
                    <div class="text-center h-100">
                        <img src="img/Vector2.svg" alt="Service 1" class="img-fluid mb-3" style="max-height: 100px;">
                        <h5>Informasi Berita</h5>
                        <p class="mb-0">Memberikan informasi terkini dan relevan mengenai pengembangan usaha mikro</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 service-item">
                    <div class="text-center h-100">
                        <img src="img/Vector4.svg" alt="Service 2" class="img-fluid mb-3" style="max-height: 100px;">
                        <h5>Fasilitasi UKM</h5>
                        <p class="mb-0">Memberikan fasilitasi berupa sertifikasi Halal, HKI Merk Dagang, fasilitasi
                            marketplace, dan fasilitasi pembuatan desain label serta portofolia usaha ( Company Profile
                            ) usaha.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 service-item">
                    <div class="text-center h-100">
                        <img src="img/Vector1.svg" alt="Service 3" class="img-fluid mb-3" style="max-height: 100px;">
                        <h5>Layanan Program UMKM</h5>
                        <p class="mb-0">Menyediakan layanan program yang tersedia untuk pengembangan usaha mikro
                            seperti Pelatihan dan juga Pendampingan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div id="about" class="container-fluid bg-color2 py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Tentang Kami</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-12 col-md-6 mb-4 mb-md-0">
                    <p class="fs-5">
                        Bidang ini berdiri untuk mendukung pertumbuhan ekonomi Usaha Mikro. Kami berfokus pada
                        pengembangan Usaha Mikro melalui pelatihan, dan pendampingan. Seiring waktu, kami terus
                        berinovasi untuk memenuhi kebutuhan pelaku usaha mikro di Kota Cimahi.
                    </p>
                </div>
                <div class="col-12 col-md-6 text-center">
                    <img src="img/Vector3.svg" alt="About Image" class="img-fluid" style="max-height: 300px;">
                </div>
            </div>
        </div>
    </div>

    <!-- Media Section -->
    <div id="media" class="container-fluid bg-color1 py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Media</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div id="mediaCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/Carousel 1.jpeg" class="d-block w-100 rounded" alt="Media 1">
                            </div>
                            <div class="carousel-item">
                                <img src="img/Carousel 2.jpeg" class="d-block w-100 rounded" alt="Media 2">
                            </div>
                            <div class="carousel-item">
                                <img src="img/Carousel 3.jpeg" class="d-block w-100 rounded" alt="Media 3">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#mediaCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#mediaCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-color3 py-4">
        <div class="container">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item">
                    <a href="#home" class="nav-link px-2 text-dark">Beranda</a>
                </li>
                <li class="nav-item">
                    <a href="#services" class="nav-link px-2 text-dark">Informasi</a>
                </li>
                <li class="nav-item">
                    <a href="#about" class="nav-link px-2 text-dark">Tentang</a>
                </li>
            </ul>
            <p class="text-center text-dark mb-0">@2024 Disdagkoperin KUKM, Inc</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script>
        // Add scrolled class to navbar when page is scrolled
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Close mobile menu when clicking a nav link
        document.querySelectorAll('.navbar-nav a').forEach(link => {
            link.addEventListener('click', () => {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse.classList.contains('show')) {
                    navbarCollapse.classList.remove('show');
                }
            });
        });
    </script>
</body>

</html>
