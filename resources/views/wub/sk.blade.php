<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WUB - Syarat dan Ketentuan</title>
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
        .terms-section {
            padding: 80px 0;
            background-color: #f8f9fa;
        }

        .terms-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .terms-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .terms-title {
            color: #2c3e50;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 15px;
        }

        .terms-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #0d6efd, #0dcaf0);
            border-radius: 2px;
        }

        .terms-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .terms-card:hover {
            transform: translateY(-5px);
        }

        .section-title {
            color: #0d6efd;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e9ecef;
        }

        .timeline-item {
            position: relative;
            padding-left: 30px;
            margin-bottom: 20px;
        }

        .timeline-item:before {
            content: '';
            position: absolute;
            left: 0;
            top: 5px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #0d6efd;
        }

        .timeline-item:after {
            content: '';
            position: absolute;
            left: 5px;
            top: 20px;
            width: 2px;
            height: calc(100% - 15px);
            background: #e9ecef;
        }

        .timeline-title {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .timeline-content {
            color: #666;
            line-height: 1.6;
        }

        .highlight-box {
            background: #f8f9fa;
            border-left: 4px solid #0d6efd;
            padding: 15px;
            margin: 15px 0;
            border-radius: 0 8px 8px 0;
        }

        @media (max-width: 768px) {
            .terms-title {
                font-size: 2rem;
            }

            .terms-card {
                padding: 20px;
            }
        }
    </style>
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

    <div class="terms-section">
        <div class="terms-container">
            <div class="terms-header">
                <h1 class="terms-title" data-aos="fade-up">Syarat dan Ketentuan Program WUB</h1>
            </div>

            <!-- Overview Card -->
            <div class="terms-card" data-aos="fade-up">
                <h2 class="section-title">Gambaran Umum Program</h2>
                <div class="highlight-box">
                    <p>Program Wirausaha Baru (WUB) merupakan tahap pembinaan awal bagi para calon wirausaha baru yang
                        mencakup:</p>
                    <ul>
                        <li>Pembinaan Pelatihan dasar-dasar wirausaha</li>
                        <li>Pendampingan Usaha Mikro</li>
                        <li>Layanan konsultasi dan advokasi</li>
                        <li>Layanan fasilitasi promosi</li>
                    </ul>
                </div>
            </div>

            <!-- Timeline Card -->
            <div class="terms-card" data-aos="fade-up" data-aos-delay="100">
                <h2 class="section-title">Tahapan Program (5 Bulan)</h2>
                <div class="timeline">
                    <div class="timeline-item">
                        <h3 class="timeline-title">Tahap 1: Seleksi Pendamping</h3>
                        <p class="timeline-content">Menyiapkan tim 7 orang pendamping se-kota Cimahi untuk membimbing
                            peserta WUB</p>
                    </div>
                    <div class="timeline-item">
                        <h3 class="timeline-title">Tahap 2: Seleksi Peserta</h3>
                        <p class="timeline-content">Menseleksi 150 peserta WUB dari 15 kelurahan se-kota Cimahi</p>
                    </div>
                    <div class="timeline-item">
                        <h3 class="timeline-title">Tahap 3: Bimbingan Teknis</h3>
                        <p class="timeline-content">Pelatihan intensif selama 1 hari untuk para pendamping</p>
                    </div>
                    <div class="timeline-item">
                        <h3 class="timeline-title">Tahap 4: Pelaksanaan Program</h3>
                        <p class="timeline-content">Program berlangsung selama 5 bulan</p>
                    </div>
                </div>
            </div>

            <!-- Program Content Card -->
            <div class="terms-card" data-aos="fade-up" data-aos-delay="200">
                <h2 class="section-title">Materi Program</h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="highlight-box">
                            <h4>Pelatihan dan Pendampingan</h4>
                            <ul>
                                <li>Pelatihan/Pembekalan pengetahuan Wirausaha</li>
                                <li>Pendampingan Usaha</li>
                                <li>Home Visit</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="highlight-box">
                            <h4>Layanan dan Fasilitas</h4>
                            <ul>
                                <li>Layanan Konsultasi dan Advokasi Legalitas</li>
                                <li>Layanan Fasilitasi</li>
                                <li>Gebyar Promosi Produk</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Participants Card -->
            <div class="terms-card" data-aos="fade-up" data-aos-delay="300">
                <h2 class="section-title">Peserta dan Evaluasi</h2>
                <div class="highlight-box">
                    <p><strong>Jumlah Peserta:</strong> 150 orang WUB + pendamping dan stakeholder dinas</p>
                    <p><strong>Evaluasi Akhir:</strong></p>
                    <ul>
                        <li>Evaluasi proses pembinaan dan pendampingan</li>
                        <li>Evaluasi hasil binaan WUB</li>
                        <li>Penyerahan sertifikat kegiatan</li>
                    </ul>
                </div>
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
