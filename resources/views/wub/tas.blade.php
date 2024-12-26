<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat dan Ketentuan</title>
    <link rel="stylesheet" href="wub/styles/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> <!-- Menambahkan font Poppins -->
</head>

<body class="background-image">
    <div class="tas-box">
        <h1>Syarat dan Ketentuan</h1>
        <div class="content">
            <p>
                Morbi sit amet risus nisl. Fusce ut nunc tortor. Praesent faucibus id ligula id molestie.
                Sed ipsum enim, euismod a bibendum non, euismod ut velit. Maecenas sollicitudin enim non mollis tristique.
                Phasellus et nisl vitae magna placerat ornare et nec lorem. In tortor tortor, viverra vitae ultricies vel, placerat sit amet turpis.
                Ut turpis turpis, elementum lobortis est non, facilisis rutrum odio. Proin convallis condimentum porttitor. Sed lobortis placerat congue.
                Donec feugiat lorem vitae libero porttitor, ut tincidunt ante sollicitudin. Donec luctus ullamcorper velit consectetur auctor.
                Praesent aliquam, diam sit amet malesuada venenatis, lorem risus congue ante, at vulputate massa mi vitae nulla. Proin augue justo, sodales et mi dignissim, laoreet malesuada neque. Morbi ante odio, maximus ac urna et, dictum porta nisi. Aliquam tortor ipsum, blandit eu nibh ac, ornare elementum nulla. Nulla facilisi. Aliquam vel ex enim. Aliquam id nulla sed nunc sagittis bibendum. In hac habitasse platea dictumst. Vivamus posuere, magna vitae malesuada dapibus, purus odio sodales nulla, quis rhoncus eros enim sed ex. Aliquam at arcu eu diam ornare ullamcorper ac at tortor. Morbi consectetur porttitor gravida.
            </p>
        </div>
        <div class="tas-checkbox">
            <label>
                <input type="checkbox" id="tas-checkbox" onchange="toggleButton()">
                Dengan ini saya telah membaca dan menyetujui syarat serta ketentuan yang sudah diberlakukan
            </label>
        </div>
        <div class="buttons-tas">
            <button class="btn-accept" disabled onclick="location.href='{{ route('loginWub') }}'">Saya Setuju</button>
            <button class="btn-disagree" onclick="location.href='{{ route('home') }}'">Tidak Setuju</button>
        </div>
    </div>
    <script src="wub/js/script.js"></script>
    <script>
        function toggleButton() {
            const checkbox = document.getElementById('tas-checkbox');
            const acceptButton = document.querySelector('.btn-accept');
            acceptButton.disabled = !checkbox.checked; // Enable button if checkbox is checked
            acceptButton.classList.toggle('enabled', checkbox.checked); // Toggle enabled class
        }
    </script>
</body>

</html>
