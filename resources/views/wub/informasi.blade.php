<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WUB - Information</title>
    <link rel="icon" href="{{ asset('img/about.png') }}">
    <link rel="stylesheet" type="text/css" href="wub/styles/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <style>
        .info-card {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .lable-detail {
            color: #333;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 10px;
        }

        .lable-detail:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: #0d6efd;
        }

        .description {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
            text-align: justify;
            margin-bottom: 1rem;
        }

        .benefit-card {
            height: 100%;
            transition: transform 0.3s ease;
        }

        .benefit-card:hover {
            transform: translateY(-5px);
        }

        .stages-card {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1.5rem;
            height: 100%;
            transition: all 0.3s ease;
        }

        .stages-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .stages-number {
            font-size: 2rem;
            font-weight: 700;
            color: #0d6efd;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    {{-- Start Header --}}

    <div class="header">
        <div class="logo-container">
            <img src="wub/img/logo.png" alt="Logo" class="logo">
        </div>
        <div class="menu-container">
            <div class="hamburger" id="hamburger">
                &#9776; <!-- Simbol hamburger -->
            </div>
            <ul class="menu" id="menu">
                <li class="menu-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="menu-item"><a href="#information">Information</a></li>
                @auth
                    <li class="menu-item"><a href="{{ route('wub.dashboardWub') }}">Dashboard</a></li>
                    <li class="menu-item" style="color: white">Hai, {{ Auth::user()->name }}</li>
                    <li class="menu-item">
                        <button style="border: none; background: none; color: white" onclick="showLogoutModal()">
                            <i class="bi bi-power"></i>
                        </button>
                    </li>
                @else
                    <li class="menu-item">
                        <button class="login" onclick="location.href='{{ route('tas') }}'">Login</button>
                    </li>
                @endauth
                <li class="menu-item close-menu" id="close-menu" style="display: none;">&times;</li>
                <!-- Tombol close -->
            </ul>
        </div>
    </div>
    {{-- End Header --}}
    <div class="info-section">
        <div class="container">
            <!-- Program WUB Introduction -->
            <div class="info-card" data-aos="fade-up">
                <h2 class="lable-detail">Apa itu WUB?</h2>
                <div class="row">
                    <div class="col-md-6">
                        <p class="description">
                            Program Wirausaha Baru (WUB) adalah salah satu upaya pemerintah Kota Cimahi khususnya
                            DOSDAGKOPERIN untuk meningkatkan jumlah wirausaha di daerahnya. Program ini bertujuan untuk
                            mendukung masyarakat dalam merintis usaha dengan memberikan pembekalan pengetahuan dan
                            keterampilan yang diperlukan dalam menjalankan bisnis.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="description">
                            Melalui program ini, calon wirausaha diberikan pelatihan dan pendampingan, seperti pelatihan
                            manajemen usaha, pemasaran, dan keterampilan teknis sesuai bidang usaha.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Program Benefits -->
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h2 class="lable-detail">Jenis Usaha WUB</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row g-4">
                            <div class="col-md-3">
                                <div class="p-3 border-start border-4 border-primary benefit-card">
                                    <h4>Kuliner</h4>
                                    <p class="description">Pengembangan usaha di bidang makanan dan minuman</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="p-3 border-start border-4 border-success benefit-card">
                                    <h4>Fashion</h4>
                                    <p class="description">Pengembangan usaha di bidang pakaian dan mode</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="p-3 border-start border-4 border-info benefit-card">
                                    <h4>Kerajinan</h4>
                                    <p class="description">Pengembangan usaha di bidang kerajinan tangan</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="p-3 border-start border-4 border-warning benefit-card">
                                    <h4>Jasa</h4>
                                    <p class="description">Pengembangan usaha di bidang pelayanan jasa</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Program Stages -->
            <div class="info-card" data-aos="fade-up" data-aos-delay="200">
                <h2 class="lable-detail">Tahapan Program WUB</h2>
                <div class="row g-4">
                    <div class="col-md-3">
                        <div class="stages-card">
                            <div class="stages-number">01</div>
                            <h5>Seleksi</h5>
                            <p class="description">Tahap seleksi bagi para peserta dan pendamping program</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stages-card">
                            <div class="stages-number">02</div>
                            <h5>Bimbingan Teknis</h5>
                            <p class="description">Tahap bimbingan teknis untuk para pendamping</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stages-card">
                            <div class="stages-number">03</div>
                            <h5>Pelaksanaan</h5>
                            <p class="description">Tahap pelaksanaan kegiatan selama lima bulan</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stages-card">
                            <div class="stages-number">04</div>
                            <h5>Evaluasi</h5>
                            <p class="description">Tahap evaluasi hasil program</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grading System -->
            <div class="info-card" data-aos="fade-up" data-aos-delay="300">
                <h2 class="lable-detail">Sistem Grading</h2>
                <p class="description">
                    Dalam setiap jenis usaha terdapat grading sebagai penilaian untuk menentukan kualitas setiap produk
                    para wirausaha baru, mulai dari grade D sampai dengan A+. Para peserta WUB yang baru memulai usaha
                    akan ditempatkan pada grade D. Jika setelah mengikuti program ini mereka memenuhi syarat umum dan
                    syarat khusus, maka akan mendapatkan fasilitas yang diberikan oleh DISDAGKOPERIN sesuai dengan
                    kelompok jenis usaha mereka, dan eligible untuk melanjutkan pelatihan ke grade selanjutnya.
                </p>
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

    <footer class="row six">
        <div class="col col-1-row-6">
            <footer>© 2xxx - Company, Inc. All rights reserved. Address Address</footer>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Library -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/your-kit-code.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/modal.js') }}"></script>

    <script>
        AOS.init({
            duration: 1000,
            once: true
        });

        // Perbaikan event listener untuk hamburger menu
        document.addEventListener('DOMContentLoaded', function() {
            const hamburger = document.getElementById('hamburger');
            const menu = document.getElementById('menu');
            const closeMenu = document.getElementById('close-menu');

            if (hamburger && menu && closeMenu) {
                hamburger.addEventListener('click', function(e) {
                    e.stopPropagation();
                    menu.classList.toggle('active');
                    closeMenu.style.display = menu.classList.contains('active') ? 'block' : 'none';
                });

                closeMenu.addEventListener('click', function(e) {
                    e.stopPropagation();
                    menu.classList.remove('active');
                    this.style.display = 'none';
                });

                // Close menu when clicking outside
                document.addEventListener('click', function(e) {
                    if (!menu.contains(e.target) && !hamburger.contains(e.target)) {
                        menu.classList.remove('active');
                        closeMenu.style.display = 'none';
                    }
                });
            }
        });
    </script>
</body>

</html>
