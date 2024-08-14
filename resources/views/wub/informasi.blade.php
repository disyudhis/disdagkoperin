<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - Information</title>
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
            <li class="menu-item"><a href="{{ route('home') }}#information">Information</a></li>
            <li class="menu-item"><a href="#about" >About</a></li>
                <button class="login" onclick="location.href='{{ route('tas') }}'">Login</button>
            </ul>
        </div>
    </div>
    <div class="row two information transparent-bg">
        <p class="lable-detail">Apa itu WUB?</p>
        <div class="description-container">
            <p class="description">
            Morbi sit amet risus nisl. 
            Fusce ut nunc tortor. Praesent faucibus id ligula id molestie. 
            Sed ipsum enim, euismod a bibendum non, euismod ut velit. 
            Maecenas sollicitudin enim non mollis tristique. 
            Phasellus et nisl vitae magna placerat ornare et nec lorem. 
            In tortor tortor, viverra vitae ultricies vel, placerat sit amet turpis. 
            Ut turpis turpis, elementum lobortis est non, facilisis rutrum odio. 
            Proin convallis condimentum porttitor. Sed lobortis placerat congue. 
            Donec feugiat lorem vitae libero porttitor, ut tincidunt ante sollicitudin. 
            Donec luctus ullamcorper velit consectetur auctor. 
        </p>
        <p class="description">
            Praesent aliquam, diam sit amet malesuada venenatis, lorem risus congue ante, at vulputate massa mi vitae nulla. 
            Proin augue justo, sodales et mi dignissim, laoreet malesuada neque. 
            Morbi ante odio, maximus ac urna et, dictum porta nisi. 
            Aliquam tortor ipsum, blandit eu nibh ac, ornare elementum nulla. 
            Nulla facilisi. Aliquam vel ex enim. Aliquam id nulla sed nunc sagittis bibendum. 
            In hac habitasse platea dictumst. 
            Vivamus posuere, magna vitae malesuada dapibus, purus odio sodales nulla, quis rhoncus eros enim sed ex. 
            Aliquam at arcu eu diam ornare ullamcorper ac at tortor. Morbi consectetur porttitor gravida. 
        </p> 
        </div>
        
        
        <p class="lable-detail">Apa keuntungan yang didapat dari program WUB?</p>
        <div class="description-container">
            <p class="description">
            Morbi sit amet risus nisl. 
            Fusce ut nunc tortor. Praesent faucibus id ligula id molestie. 
            Sed ipsum enim, euismod a bibendum non, euismod ut velit. 
            Maecenas sollicitudin enim non mollis tristique. 
            Phasellus et nisl vitae magna placerat ornare et nec lorem. 
            In tortor tortor, viverra vitae ultricies vel, placerat sit amet turpis. 
            Ut turpis turpis, elementum lobortis est non, facilisis rutrum odio. 
            Proin convallis condimentum porttitor. Sed lobortis placerat congue. 
            Donec feugiat lorem vitae libero porttitor, ut tincidunt ante sollicitudin. 
            Donec luctus ullamcorper velit consectetur auctor. 
        </p>
        <p class="description">
            Praesent aliquam, diam sit amet malesuada venenatis, lorem risus congue ante, at vulputate massa mi vitae nulla. 
            Proin augue justo, sodales et mi dignissim, laoreet malesuada neque. 
            Morbi ante odio, maximus ac urna et, dictum porta nisi. 
            Aliquam tortor ipsum, blandit eu nibh ac, ornare elementum nulla. 
            Nulla facilisi. Aliquam vel ex enim. Aliquam id nulla sed nunc sagittis bibendum. 
            In hac habitasse platea dictumst. 
            Vivamus posuere, magna vitae malesuada dapibus, purus odio sodales nulla, quis rhoncus eros enim sed ex. 
            Aliquam at arcu eu diam ornare ullamcorper ac at tortor. Morbi consectetur porttitor gravida. 
        </p> 
        </div>

        <p class="lable-detail">Fasilitas apa saja yang didapat dari program WUB?</p>
        <div class="description-container">
            <p class="description">
            Morbi sit amet risus nisl. 
            Fusce ut nunc tortor. Praesent faucibus id ligula id molestie. 
            Sed ipsum enim, euismod a bibendum non, euismod ut velit. 
            Maecenas sollicitudin enim non mollis tristique. 
            Phasellus et nisl vitae magna placerat ornare et nec lorem. 
            In tortor tortor, viverra vitae ultricies vel, placerat sit amet turpis. 
            Ut turpis turpis, elementum lobortis est non, facilisis rutrum odio. 
            Proin convallis condimentum porttitor. Sed lobortis placerat congue. 
            Donec feugiat lorem vitae libero porttitor, ut tincidunt ante sollicitudin. 
            Donec luctus ullamcorper velit consectetur auctor. 
        </p>
        <p class="description">
            Praesent aliquam, diam sit amet malesuada venenatis, lorem risus congue ante, at vulputate massa mi vitae nulla. 
            Proin augue justo, sodales et mi dignissim, laoreet malesuada neque. 
            Morbi ante odio, maximus ac urna et, dictum porta nisi. 
            Aliquam tortor ipsum, blandit eu nibh ac, ornare elementum nulla. 
            Nulla facilisi. Aliquam vel ex enim. Aliquam id nulla sed nunc sagittis bibendum. 
            In hac habitasse platea dictumst. 
            Vivamus posuere, magna vitae malesuada dapibus, purus odio sodales nulla, quis rhoncus eros enim sed ex. 
            Aliquam at arcu eu diam ornare ullamcorper ac at tortor. Morbi consectetur porttitor gravida. 
        </p> 
        </div>
    </div>
    <div class="row six">
        <div class="col col-1-row-6">
            <footer>© 2xxx - Company, Inc. All rights reserved. Address Address</footer>
        </div>
    </div>
</body>
</html>