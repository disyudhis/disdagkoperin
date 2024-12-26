<header class="bg-orange-500 p-4">
    <div class="container mx-auto">
        <div class="flex justify-between items-center gap-4">
            <!-- Logo dan Judul -->
            <div class="flex items-center">
                <img src="/img/logo.png" width="40" alt="Logo" class="inline-block mr-2">
                <span class="text-sm md:text-base text-white font-bold">DISDAGKOPERIN | Bidang Koperasi Usaha Kecil Menengah Kota Cimahi</span>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center gap-6">
                <a href="{{ route('home') }}"
                    class="text-white hover:text-orange-200 {{ request()->routeIs('home') ? 'font-semibold' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('profile') }}"
                    class="text-white hover:text-orange-200 {{ request()->routeIs('profile') ? 'font-semibold' : '' }}">
                    Profile
                </a>
                <a href="{{ route('pelayanan') }}"
                    class="text-white hover:text-orange-200 {{ request()->routeIs('pelayanan') ? 'font-semibold' : '' }}">
                    Pelayanan
                </a>
                <a href="{{ route('berita') }}"
                    class="text-white hover:text-orange-200 {{ request()->routeIs('berita') ? 'font-semibold' : '' }}">
                    Berita
                </a>
                <a href="{{ route('kontak') }}"
                    class="text-white hover:text-orange-200 {{ request()->routeIs('kontak') ? 'font-semibold' : '' }}">
                    Kontak
                </a>

                @auth
                    <div class="relative">
                        <button id="desktopUserButton" class="text-white hover:text-orange-200">
                            {{ Auth::user()->name }}
                        </button>
                        <button id="desktopLogoutButton" class="text-white hover:text-red-200 ml-4">
                            Logout
                        </button>
                    </div>
                @endauth
            </nav>

            <!-- Mobile Hamburger Button -->
            <button id="hamburger-button" class="text-white md:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-16 6h16"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Navigation Menu -->
        <nav id="nav-menu" class="hidden md:hidden absolute right-4 mt-2 bg-orange-500 rounded-lg shadow-lg z-50">
            <div class="py-2">
                <a href="{{ route('home') }}"
                    class="block text-white text-lg hover:bg-orange-600 px-4 py-2 {{ request()->routeIs('home') ? 'font-semibold' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('profile') }}"
                    class="block text-white text-lg hover:bg-orange-600 px-4 py-2 {{ request()->routeIs('profile') ? 'font-semibold' : '' }}">
                    Profile
                </a>
                <a href="{{ route('pelayanan') }}"
                    class="block text-white text-lg hover:bg-orange-600 px-4 py-2 {{ request()->routeIs('pelayanan') ? 'font-semibold' : '' }}">
                    Pelayanan
                </a>
                <a href="{{ route('berita') }}"
                    class="block text-white text-lg hover:bg-orange-600 px-4 py-2 {{ request()->routeIs('berita') ? 'font-semibold' : '' }}">
                    Berita
                </a>
                <a href="{{ route('kontak') }}"
                    class="block text-white text-lg hover:bg-orange-600 px-4 py-2 {{ request()->routeIs('kontak') ? 'font-semibold' : '' }}">
                    Kontak
                </a>

                @auth
                    <hr class="my-2 border-orange-400">
                    <div class="px-4 py-2">
                        <span class="block text-white font-semibold mb-2">{{ Auth::user()->name }}</span>
                        <button id="mobileLogoutButton"
                            class="text-white hover:text-red-200 text-sm">
                            Logout
                        </button>
                    </div>
                @endauth
            </div>
        </nav>

        <!-- Logout Confirmation Modal -->
        <div id="logoutModal"
            class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 overflow-y-auto h-full w-full z-50 flex items-center justify-center">
            <div class="p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3 text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Konfirmasi Logout</h3>
                    <div class="mt-2 px-7 py-3">
                        <p class="text-sm text-gray-500">Apakah Anda yakin ingin keluar?</p>
                    </div>
                    <div class="items-center px-4 py-3">
                        <form method="POST" action="{{ route('logout') }}"
                            class="flex gap-4 justify-center">
                            @csrf
                            <button type="button" id="cancelLogout"
                                class="px-4 py-2 bg-gray-300 text-gray-700 text-base font-medium rounded-md hover:bg-gray-400 focus:outline-none">
                                Batal
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white text-base font-medium rounded-md hover:bg-red-700 focus:outline-none">
                                Ya, Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const hamburgerButton = document.getElementById('hamburger-button');
        const navMenu = document.getElementById('nav-menu');
        const mobileLogoutButton = document.getElementById('mobileLogoutButton');
        const desktopLogoutButton = document.getElementById('desktopLogoutButton');
        const logoutModal = document.getElementById('logoutModal');
        const cancelLogout = document.getElementById('cancelLogout');

        // Toggle mobile menu and icon
        hamburgerButton.addEventListener('click', () => {
            navMenu.classList.toggle('hidden');
            const svg = hamburgerButton.querySelector('svg');
            if (!navMenu.classList.contains('hidden')) {
                svg.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                `;
            } else {
                svg.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-16 6h16"></path>
                `;
            }
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!hamburgerButton.contains(e.target) && !navMenu.contains(e.target)) {
                navMenu.classList.add('hidden');
                const svg = hamburgerButton.querySelector('svg');
                svg.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-16 6h16"></path>
                `;
            }
        });

        // Logout functionality
        const setupLogoutButton = (button) => {
            if (button) {
                button.addEventListener('click', () => {
                    logoutModal.classList.remove('hidden');
                });
            }
        };

        setupLogoutButton(mobileLogoutButton);
        setupLogoutButton(desktopLogoutButton);

        if (cancelLogout) {
            cancelLogout.addEventListener('click', () => {
                logoutModal.classList.add('hidden');
            });

            logoutModal.addEventListener('click', (e) => {
                if (e.target === logoutModal) {
                    logoutModal.classList.add('hidden');
                }
            });
        }
    </script>
</header>
