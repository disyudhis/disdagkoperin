<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" type="text/css" href="wub/styles/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="row one">
        <div class="col col-1-row-1">
            <img src="wub/img/logo.png">
        </div>
        <div class="col col-2-row-1">
            <ul>
            <li class="menu-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="menu-item"><a href="#information">Information</a></li>
            <li class="menu-item"><a href="#about" >About</a></li>
                <button class="login" onclick="location.href='{{ route('tas') }}'">Login</button>
            </ul>
        </div>
    </div>
    <div class="row two">
        <div class="col col-1-row-2">
            <div class="image-container">
                <img src="wub/img/banner.jpeg" alt="banner">
                <div class="overlay">
                    <div class="text-container">
                        <h1>Welcome to WUB Program</h1>
                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id ligula magna.</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row three" id="information">
        <p class="lable-info">Apa itu WUB?</p>
        <p class="description-info">Morbi sit amet risus nisl. Fusce ut nunc tortor. Praesent faucibus id ligula id molestie. 
            Sed ipsum enim, euismod a bibendum non, euismod ut velit. Maecenas sollicitudin enim non mollis tristique. 
            Phasellus et nisl vitae magna placerat ornare et nec lorem. In tortor tortor, viverra vitae ultricies vel, 
            placerat sit amet turpis. Ut turpis turpis, elementum lobortis est non, facilisis rutrum odio. Proin convallis condimentum 
        </p>
        <button id="learnMoreBtn" class="learn-more-wub">Learn More</button>
    </div>
    <div class="row four" id="about">
        <div class="col col-1-row-4">
            <img class="about-img" src="wub/img/about.png" alt="">
        </div>
        <div class="col col-2-row-4">
            <h2>About</h2>
            <p>
                Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Morbi nec euismod tortor,
                semper gravida ex.
                Quisque nec elit a risus mollis ornare egestas vitae nisl.
            </p>
        </div>
    </div>
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
    <div class="row six">
        <div class="col col-1-row-6">
            <footer>© 2xxx - Company, Inc. All rights reserved. Address Address</footer>
        </div>
    </div>

    <script>
      document.getElementById('learnMoreBtn').addEventListener('click', function() {
        window.location.href = '{{ route('informasi') }}';
      });
    </script>
</body>
</html>