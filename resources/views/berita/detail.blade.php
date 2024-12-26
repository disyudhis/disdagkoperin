<x-layout title="{{$berita->title}}">
    <main class="container mx-auto my-8 p-4 bg-white shadow-lg rounded-lg">
        <article>
            <h2 class="text-2xl font-bold mb-4">{{$berita->title}}</h2>
            <div class="image-container mb-4">
                <img src="{{$berita->image}}" alt="News Image" class="news-image">
            </div>
            <p class="text-gray-600 text-sm mb-4">{{$berita->created_at->diffForHumans()}}</p>
            <div class="prose max-w-none">
                <p>{{$berita->content}}</p>
            </div>
        </article>
    </main>

    <style>
        .image-container {
            width: 100%; /* Full width of the parent */
            height: 300px; /* Fixed height for the image */
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
</x-layout>
