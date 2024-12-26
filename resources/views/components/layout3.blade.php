<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')

    <style>
        .sidebar {
            transition: transform 0.3s ease;
            position: fixed;
            width: 250px;
            height: 100%;
            background: #1f2937;
            color: white;
            transform: translateX(-100%);
            z-index: 1000;
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .main-content {
            margin-left: 0;
            transition: margin-left 0.3s ease;
        }

        @media (min-width: 768px) {
            .sidebar {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 250px;
            }
        }

        .hamburger {
            display: none;
            cursor: pointer;
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 5px;
            padding: 10px;
            z-index: 1;
            transition: background-color 0.3s ease;
        }

        .hamburger:hover {
            background-color: rgba(0, 0, 0, 0.9);
        }

        .close-button {
            display: none;
            cursor: pointer;
            position: absolute;
            top: 20px;
            right: 20px;
            color: white;
        }

        @media (max-width: 768px) {
            .hamburger {
                display: block;
            }

            .close-button {
                display: block;
            }
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Hamburger Button -->
        <div class="hamburger" id="hamburger-button">
            <i class="fas fa-bars text-white"></i>
        </div>

        <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <div class="close-button" id="close-button">
                <i class="fas fa-times"></i>
            </div>
            {{ $slot }}
        </div>

        <!-- Main Content -->
        <main id="main-content" class="main-content flex-1 min-h-screen w-full">
            <div class="pt-16 lg:pt-0">
                {{ $content ?? '' }}
            </div>
        </main>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const hamburgerButton = document.getElementById('hamburger-button');
        const closeButton = document.getElementById('close-button');

        hamburgerButton.addEventListener('click', () => {
            sidebar.classList.add('active');
        });

        closeButton.addEventListener('click', () => {
            sidebar.classList.remove('active');
        });
    </script>
</body>

</html>
