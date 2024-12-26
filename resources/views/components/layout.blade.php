<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex flex-col justify-between">
    <x-header/>
    {{ $slot }}
    <x-footer/>

    <!-- JavaScript for the dropdown -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownLink = document.getElementById('dropdownUserLink');
            const dropdownMenu = document.getElementById('dropdownUserMenu');

            dropdownLink.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default anchor behavior
                dropdownMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function(e) {
                if (!dropdownLink.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
