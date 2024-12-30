<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - Information</title>
    <link rel="stylesheet" type="text/css" href="wub/styles/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
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
                <li class="menu-item"><a href="#about">About</a></li>
                <li class="menu-item">
                    <button class="login" onclick="location.href='{{ route('tas') }}'">Login</button>
                </li>
                <li class="menu-item close-menu" id="close-menu" style="display: none;">&times;</li>
                <!-- Tombol close -->
            </ul>
        </div>
    </div>
    {{-- End Header --}}
    <div class="info-section">
        <div class="container">
            <div class="info-card" data-aos="fade-up">
                <h2 class="lable-detail">Apa itu WUB?</h2>
                <div class="row">
                    <div class="col-md-6">
                        <p class="description">
                            Morbi sit amet risus nisl. Fusce ut nunc tortor. Praesent faucibus id ligula id molestie.
                            Sed ipsum enim, euismod a bibendum non, euismod ut velit.
                            Maecenas sollicitudin enim non mollis tristique.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="description">
                            Praesent aliquam, diam sit amet malesuada venenatis, lorem risus congue ante.
                            Proin augue justo, sodales et mi dignissim, laoreet malesuada neque.
                            Morbi ante odio, maximus ac urna et, dictum porta nisi.
                        </p>
                    </div>
                </div>
            </div>

            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h2 class="lable-detail">Keuntungan Program WUB</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="p-3 border-start border-4 border-primary">
                                    <h4>Benefit 1</h4>
                                    <p class="description">Morbi sit amet risus nisl. Fusce ut nunc tortor.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 border-start border-4 border-success">
                                    <h4>Benefit 2</h4>
                                    <p class="description">Praesent faucibus id ligula id molestie.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 border-start border-4 border-info">
                                    <h4>Benefit 3</h4>
                                    <p class="description">Sed ipsum enim, euismod a bibendum non.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="info-card" data-aos="fade-up" data-aos-delay="200">
                <h2 class="lable-detail">Fasilitas Program WUB</h2>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="text-center p-4 bg-light rounded-3">
                            <i class="fas fa-laptop mb-3 fs-1 text-primary"></i>
                            <h5>Online Learning</h5>
                            <p class="description">Akses pembelajaran kapan saja</p>
                        </div>
                    </div>
                    <!-- Add more facility cards similarly -->
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
