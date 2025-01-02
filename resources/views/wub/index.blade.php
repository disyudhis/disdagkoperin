<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WUB</title>
    <link rel="icon" href="{{ asset('img/about.png') }}">
    <link rel="stylesheet" type="text/css" href="wub/styles/styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    {{-- Start Header --}}
    <div class="header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo-container">
                    <img src="wub/img/logo.png" alt="Logo" class="logo">
                </div>
                <div class="menu-container">
                    <div class="hamburger" id="hamburger">
                        <i class="bi bi-list"></i>
                    </div>
                    <ul class="menu" id="menu">
                        <li class="menu-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="menu-item"><a href="{{ route('informasi') }}">Information</a></li>
                        <li class="menu-item"><a href="#about">About</a></li>
                        @if (Auth::user())
                            <li class="menu-item"><a href="{{ route('wub.dashboardWub') }}">Dashboard</a></li>
                            <li class="menu-item" style="color: white">Hai, {{ Auth::user()->name }}</li>
                            <li class="menu-item">
                                <button class="btn btn-link text-white p-0" onclick="showLogoutModal()">
                                    <i class="bi bi-power"></i>
                                </button>
                            </li>
                        @else
                            <li class="menu-item">
                                <button class="login" onclick="location.href='{{ route('tas') }}'">Login</button>
                            </li>
                        @endif
                        <li class="menu-item close-menu" id="close-menu">&times;</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="logoutModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Konfirmasi Logout</h2>
                <span class="close" onclick="closeLogoutModal()">&times;</span>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin keluar?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="button" class="btn-cancel" onclick="closeLogoutModal()">Batal</button>
                    <button type="submit" class="btn-logout">Ya, Logout</button>
                </form>
            </div>
        </div>
    </div>
    {{-- End Header --}}
    {{-- Start Banner --}}
    <div class="row two">
        <div class="image-container">
            <div class="banner-image" style="background-image: url('wub/img/banner.jpeg');">
                <div class="overlay"></div>
                <div class="text-container">
                    <h1>Welcome to WUB Program</h1>
                    <h3>Layanan Program Wirausaha Baru</h3>
                </div>
            </div>
        </div>
    </div>
    {{-- End Banner --}}
    <div class="row three" id="information">
        <div class="container text-center">
            <h2 class="label-info mb-4">Apa itu WUB?</h2>
            <img src="{{ asset('img/about.png') }}" alt="">
            <div class="d-flex justify-content-center">
                <a href="{{ route('informasi') }}" class="learn-more-wub">Learn More</a>
            </div>
        </div>
    </div>
    {{-- Start About --}}
    <div class="row four" id="about">
        <div class="col col-1-row-4">
            <img class="about-img" src="wub/img/about.png" alt="About" />
        </div>
        <div class="col col-2-row-4">
            <h2 class="about-title">About</h2>
            <p class="about-description">
                Pemerintah Kota Cimahi (Pemkot Cimahi) merupakan lembaga pemerintahan daerah yang bertanggung jawab atas
                penyelenggaraan pemerintahan di wilayah Kota Cimahi, Jawa Barat. Pemkot Cimahi dipimpin oleh seorang
                Wali Kota yang saat ini dijabat oleh Bapak Abdul Hadi Wijaya dan dibantu oleh Wakil Wali Kota Bapak
                Ngatiyana. Kantor Pemkot Cimahi terletak di Jalan Raden Demang Hardjakusumah Blok Jati Cihanjuang No 1,
                Kelurahan Cibabat, Kecamatan Cimahi Utara, Kota Cimahi. Sebagai lembaga pemerintahan, Pemkot Cimahi
                memiliki tugas dan fungsi untuk mengelola berbagai urusan pemerintahan dan pembangunan di Kota Cimahi
                sesuai dengan peraturan perundang-undangan yang berlaku
            </p>
        </div>
    </div>
    {{-- End About --}}
    {{-- Start Terms and Service --}}
    <div class="row five">
        <div class="col col-1-row-5">
            <h1>Terms And Service</h1>
            <p class="description-tas">
                Dokumen yang menjelaskan syarat, ketentuan, dan aturan penggunaan layanan atau produk yang disediakan oleh suatu perusahaan kepada pengguna atau pelanggan.
            </p>
            <a href="{{ route('sk') }}" style="text-decoration: none" class="learn-more-tos">Learn More</a>
        </div>
    </div>
    {{-- End Terms and Service --}}
    {{-- Start Footer --}}
    <div class="row six">
        <div class="col col-1-row-6">
            <footer>© 2xxx - Company, Inc. All rights reserved. Address Address</footer>
        </div>
    </div>
    {{-- End Footer --}}

    <script src="{{ asset('js/modal.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('hamburger').addEventListener('click', function() {
            const menu = document.getElementById('menu');
            menu.classList.add('active');
        });

        document.getElementById('close-menu').addEventListener('click', function() {
            const menu = document.getElementById('menu');
            menu.classList.remove('active');
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('menu');
            const hamburger = document.getElementById('hamburger');
            if (!menu.contains(event.target) && !hamburger.contains(event.target) && menu.classList.contains('active')) {
                menu.classList.remove('active');
            }
        });
    </script>
</body>

</html>
