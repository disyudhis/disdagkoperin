<div class="bg-gray-800 text-white h-full min-h-screen flex flex-col justify-between overflow-y-auto">
    <!-- Header/Profile Section -->
    <div>
        <div class="p-6">
            <div class="flex flex-col items-center mb-8 gap-4">
                <div class="bg-white rounded-full w-16 md:w-20 h-16 md:h-20 flex items-center justify-center overflow-hidden">
                    <img src="/img/logo.png"
                         alt="User Icon"
                         class="w-full h-full object-cover">
                </div>
                <div>
                    <h1 class="text-lg md:text-xl font-semibold">{{ Auth::user()->name }}</h1>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="mb-6">
                <ul class="space-y-2">
                    <li>
                        <a href="{{route('admin.berita.create')}}"
                           class="block px-4 py-3 rounded-lg transition-colors duration-200
                                  {{request()->routeIs('admin.berita.create')
                                    ? 'bg-gray-700 text-white font-semibold'
                                    : 'text-gray-300 hover:bg-gray-700 hover:text-white'}}">
                            <i class="fas fa-plus-circle mr-2"></i>
                            Input Berita
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.berita')}}"
                           class="block px-4 py-3 rounded-lg transition-colors duration-200
                                  {{request()->routeIs('admin.berita')
                                    ? 'bg-gray-700 text-white font-semibold'
                                    : 'text-gray-300 hover:bg-gray-700 hover:text-white'}}">
                            <i class="fas fa-list mr-2"></i>
                            List Berita
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Logout Button -->
    <div class="p-6">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full text-center bg-white text-gray-800 p-3 rounded-lg font-semibold
                         hover:bg-gray-100 transition-colors duration-200 flex items-center justify-center gap-2"
                    type="submit">
                <i class="fas fa-sign-out-alt"></i>
                Keluar
            </button>
        </form>
    </div>
</div>
