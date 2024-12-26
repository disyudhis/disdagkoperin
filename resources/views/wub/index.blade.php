<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" type="text/css" href="wub/styles/styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
    {{-- Start Banner --}}
    <div class="row two">
        <div class="image-container">
            <div class="banner-image" style="background-image: url('wub/img/banner.jpeg');">
                <div class="overlay"></div>
                <div class="text-container">
                    <h1>Welcome to WUB Program</h1>
                    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id ligula magna.</h3>
                </div>
            </div>
        </div>
    </div>
    {{-- End Banner --}}
    {{-- Information --}}
    <div class="row three" id="information">
        <h2 class="label-info">Apa itu WUB?</h2>
        <p class="description-info">
            Morbi sit amet risus nisl. Fusce ut nunc tortor. Praesent faucibus id ligula id molestie.
            Sed ipsum enim, euismod a bibendum non, euismod ut velit. Maecenas sollicitudin enim non mollis
            tristique.
            Phasellus et nisl vitae magna placerat ornare et nec lorem. In tortor tortor, viverra vitae ultricies
            vel,
            placerat sit amet turpis. Ut turpis turpis, elementum lobortis est non, facilisis rutrum odio. Proin
            convallis condimentum.
        </p>
        <button id="learnMoreBtn" class="learn-more-wub">Learn More</button>
    </div>
    {{-- End Information --}}
    {{-- Start About --}}
    <div class="row four" id="about">
        <div class="col col-1-row-4">
            <img class="about-img" src="wub/img/about.png" alt="About" />
        </div>
        <div class="col col-2-row-4">
            <h2 class="about-title">About</h2>
            <p class="about-description">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec euismod tortor, semper gravida
                ex.
                Quisque nec elit a risus mollis ornare egestas vitae nisl.
            </p>
        </div>
    </div>
    {{-- End About --}}
    {{-- Start Terms and Service --}}
    <div class="row five">
        <div class="col col-1-row-5">
            <h1>Terms And Service</h1>
            <h2>Lorem Ipsum</h2>
            <p class="description-tas">
                Vivamus lacus est, rutrum vitae velit vel, rhoncus sodales elit.
                Nullam commodo urna non lorem semper,
                ac vestibulum ipsum gravida.
                Etiam non arcu at mauris euismod egestas sit amet elementum tortor.
            </p>
            <button class="learn-more-tos">Learn More</button>
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

    <script>
        document.getElementById('learnMoreBtn').addEventListener('click', function() {
            window.location.href = '{{ route('informasi') }}';
        });

        // JavaScript untuk toggle menu
        document.getElementById('hamburger').addEventListener('click', function() {
            const menu = document.getElementById('menu');
            menu.classList.toggle('active'); // Toggle kelas active untuk menampilkan/menyembunyikan menu
            document.getElementById('close-menu').style.display = menu.classList.contains('active') ? 'block' :
                'none'; // Tampilkan tombol close
        });

        // Menambahkan event listener untuk tombol close
        document.getElementById('close-menu').addEventListener('click', function() {
            const menu = document.getElementById('menu');
            menu.classList.remove('active'); // Sembunyikan menu
            this.style.display = 'none'; // Sembunyikan tombol close
        });
    </script>
</body>

</html>
