<x-layout title="Home">
    <section class="relative">
        <img src="img/banner.jpeg" alt="Cimahi" class="w-full h-[500px] object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <h1 class="text-white text-3xl font-bold text-center">DISDAGKOPERIN<br>Bidang Koperasi Usaha Kecil Menengah</h1>
        </div>
    </section>

    <section class="py-8">
        <h2 class="text-center text-2xl font-bold mb-6 uppercase">Pelayanan</h2>
        <div class="flex justify-center space-x-4 flex-wrap">
            <div class="bg-gray-100 p-6 rounded-lg shadow-md text-center w-64">
                <img src="img/logo.png" width="200" alt="Service 1" class="mx-auto mb-4">
                <h3 class="text-xl font-bold mb-2">WUB</h3>
                <a href="http://localhost:8010/dashboard" class="bg-orange-500 text-white px-4 py-2 rounded">Learn More</a>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-md text-center w-64">
                <img src="img/logo.png" width="200" alt="Service 2" class="mx-auto mb-4">
                <h3 class="text-xl font-bold mb-2">Lorem</h3>
                <button class="bg-orange-500 text-white px-4 py-2 rounded">Learn More</button>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-md text-center w-64">
                <img src="img/logo.png" width="200" alt="Service 3" class="mx-auto mb-4">
                <h3 class="text-xl font-bold mb-2">Lorem</h3>
                <button class="bg-orange-500 text-white px-4 py-2 rounded">Learn More</button>
            </div>
        </div>
    </section>

    <section class="bg-orange-500 py-8">
        <h2 class="text-center text-2xl text-white font-bold mb-6 uppercase">Berita</h2>
        <div class="flex justify-center flex-wrap gap-4">
            @forelse($listBerita as $berita)
                <div class="bg-white p-4 rounded-lg shadow-md w-64">
                    <div class="image-container">
                        <img src="{{$berita->image}}" alt="News 1" class="news-image">
                    </div>
                    <p class="text-gray-700 mb-2">{{$berita->created_at->diffForHumans()}}</p>
                    <h3 class="text-xl font-bold mb-2">{{$berita->title}}</h3>
                    <a href="{{route('berita.detail', $berita)}}" class="text-orange-500 font-bold">Selengkapnya ></a>
                </div>
            @empty
                <p class="text-white text-center">Belum ada berita</p>
            @endforelse
        </div>
    </section>

    <style>
        .image-container {
            width: 100%; /* Full width of the parent */
            height: 200px; /* Fixed height for the image */
            overflow: hidden; /* Hide overflow */
            position: relative; /* Position relative for absolute children */
        }

        .news-image {
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            object-fit: cover; /* Cover the container */
            position: absolute; /* Position absolute to fill the container */
            top: 0; /* Align to top */
            left: 0; /* Align to left */
        }
    </style>

    <script>
        // Optional: Add any JavaScript functionality if needed
    </script>
</x-layout>
