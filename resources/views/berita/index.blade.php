<x-layout title="Berita">
    <main class="container mx-auto my-8 p-4">
        <section class="mb-8">
            <h2 class="text-3xl font-bold mb-10 uppercase text-center">Berita</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($listBerita as $berita)
                    <div class="bg-white p-4 shadow rounded-md">
                        <div class="image-container">
                            <img src="{{$berita->image}}" alt="News Image" class="object-cover rounded-t-lg">
                        </div>
                        <div class="p-4">
                            <p class="text-gray-600 text-sm mb-2">{{ $berita->created_at->diffForHumans() }}</p>
                            <h3 class="text-xl font-semibold mb-2">{{ $berita->title }}</h3>
                            <a href="{{route('berita.detail', $berita)}}" class="text-orange-600 hover:underline">Selengkapnya ></a>
                        </div>
                    </div>
                @empty
                    <p class="text-white text-center">Belum ada berita</p>
                @endforelse
            </div>
        </section>
    </main>

    <style>
        .image-container {
            width: 100%; /* Full width of the parent */
            height: 200px; /* Fixed height for the image */
            overflow: hidden; /* Hide overflow */
            position: relative; /* Position relative for absolute children */
        }

        .image-container img {
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            object-fit: cover; /* Cover the container */
            position: absolute; /* Position absolute to fill the container */
            top: 0; /* Align to top */
            left: 0; /* Align to left */
        }
    </style>
</x-layout>
