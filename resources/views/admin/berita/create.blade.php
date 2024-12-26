<x-layout3 title="Input Berita">
    <x-slot:content>
        <div class="p-4 lg:p-8">
            <div class="bg-white rounded-lg shadow-md">
                <div class="p-4 md:p-6 lg:p-8">
                    <h2 class="text-xl md:text-2xl font-bold mb-6">Input Berita</h2>

                    <form enctype="multipart/form-data" method="POST" action="{{route('admin.berita.store')}}" class="max-w-3xl">
                        @csrf
                        <div class="space-y-6">
                            <!-- Judul Berita -->
                            <div>
                                <label for="judulBerita" class="block text-gray-700 font-medium mb-2">
                                    Judul Berita
                                </label>
                                <input type="text"
                                       id="judulBerita"
                                       name="title"
                                       value="{{old('judul')}}"
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-gray-500 focus:ring-1 focus:ring-gray-500 transition-colors"
                                       placeholder="Masukkan Judul Berita">
                                <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                            </div>

                            <!-- Gambar -->
                            <div>
                                <label for="gambar" class="block text-gray-700 font-medium mb-2">
                                    Gambar
                                </label>
                                <input type="file"
                                       id="gambar"
                                       name="image"
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-gray-500 focus:ring-1 focus:ring-gray-500 transition-colors">
                                <x-input-error :messages="$errors->get('image')" class="mt-2"/>
                            </div>

                            <!-- Detail Berita -->
                            <div>
                                <label for="detailBerita" class="block text-gray-700 font-medium mb-2">
                                    Detail Berita
                                </label>
                                <textarea id="detailBerita"
                                          name="content"
                                          rows="8"
                                          class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-gray-500 focus:ring-1 focus:ring-gray-500 transition-colors"
                                          placeholder="Masukkan Detail Berita">{{old('isi')}}</textarea>
                                <x-input-error :messages="$errors->get('content')" class="mt-2"/>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end">
                                <button type="submit"
                                        class="px-6 py-3 bg-gray-800 text-white rounded-lg hover:bg-gray-700 focus:ring-2 focus:ring-gray-300 transition-colors">
                                    <i class="fas fa-paper-plane mr-2"></i>
                                    Publish
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot:content>

    <x-sidebar/>
</x-layout3>
