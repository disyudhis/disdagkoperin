<x-layout title="Kontak">
    <!-- Contact Form Section -->
    <div class="flex justify-center items-center my-6">
        <div class="w-full max-w-4xl bg-white p-8 rounded-lg shadow-lg border">
            <h2 class="text-2xl font-bold mb-6 text-center uppercase">Kontak Kami</h2>
            <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Name Field -->
                <div>
                    <label for="nama" class="block text-gray-700">Nama</label>
                    <input type="text" id="nama" name="nama" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
                <!-- NIK Field -->
                <div>
                    <label for="nik" class="block text-gray-700">NIB</label>
                    <input type="text" id="nik" name="nik" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
                <!-- No Hand Phone Field -->
                <div>
                    <label for="phone" class="block text-gray-700">No Hand Phone</label>
                    <input type="text" id="phone" name="phone" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
                <!-- Message Field -->
                <div class="md:col-span-2">
                    <label for="pesan" class="block text-gray-700">Pesan</label>
                    <textarea id="pesan" name="pesan" rows="5" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"></textarea>
                </div>
                <!-- Captcha and Submit Button -->
                <div class="md:col-span-2 flex items-center justify-between">
                    <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                    <button type="submit" class="py-2 px-4 bg-green-500 text-white font-bold rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add reCAPTCHA Script -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</x-layout>
