<x-layout3>
    <x-slot:content>
        <div id="alert-container" class="fixed top-0 right-0 p-4 z-50">
            @if (session('success'))
                <div class="alert alert-success" id="success-alert">
                    <span>{{ session('success') }}</span>
                    <button class="close-btn" onclick="closeAlert('success-alert')">&times;</button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-error" id="error-alert">
                    <span>{{ session('error') }}</span>
                    <button class="close-btn" onclick="closeAlert('error-alert')">&times;</button>
                </div>
            @endif
        </div>
        <div class="p-4 lg:p-8">
            <div class="bg-white rounded-lg shadow-md">
                <div class="p-4 md:p-6 lg:p-8">
                    <h2 class="text-xl md:text-2xl font-bold mb-4 md:mb-6">List Berita</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-4 md:gap-6">
                        @forelse($listBerita as $berita)
                            <div class="bg-gray-50 rounded-lg shadow hover:shadow-md transition-shadow duration-300">
                                <div class="aspect-video w-full overflow-hidden rounded-t-lg">
                                    <img src="{{ $berita->image }}" alt="News Image" class="w-full h-full object-cover">
                                </div>

                                <div class="p-4">
                                    <p class="text-gray-600 text-xs md:text-sm mb-2">
                                        {{ $berita->created_at->diffForHumans() }}
                                    </p>

                                    <h3 class="text-lg font-semibold mb-3 line-clamp-2 min-h-[3.5rem]">
                                        {{ $berita->title }}
                                    </h3>

                                    <div class="flex gap-3 justify-end mt-4">
                                        <a href="{{ route('berita.detail', $berita) }}"
                                            class="inline-flex items-center justify-center px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors duration-200"
                                            title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <form method="POST" action="{{ route('admin.berita.destroy', $berita) }}"
                                            class="inline-block">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"
                                                class="inline-flex items-center justify-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors duration-200"
                                                title="Hapus"
                                                onclick="return confirm('Yakin ingin menghapus berita ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-8 text-gray-500">
                                <i class="fas fa-newspaper text-4xl mb-3"></i>
                                <p>Belum ada berita</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </x-slot:content>

    <x-sidebar />

    <style>
        #alert-container {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 300px;
        }

        .alert {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            transition: opacity 0.3s ease;
        }

        .alert-success {
            background-color: #4caf50; /* Green */
        }

        .alert-error {
            background-color: #f44336; /* Red */
        }

        .close-btn {
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            margin-left: 10px;
        }
    </style>

    <script>
        function closeAlert(alertId) {
            const alert = document.getElementById(alertId);
            if (alert) {
                alert.style.opacity = '0';
                setTimeout(() => {
                    alert.remove();
                }, 300); // Match the duration with the CSS transition
            }
        }
    </script>
</x-layout3>
