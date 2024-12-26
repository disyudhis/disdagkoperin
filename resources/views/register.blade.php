<x-layout2 title="Register">
    <!-- Registration Form Section -->
    <div class="flex justify-center items-center min-h-screen bg-orange-500">
        <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-lg border">
            <div class="text-center mb-6">
                <img src="/img/logo.png" alt="CIMAHI Logo" class="mx-auto h-24 mb-4">
                <h1 class="text-2xl font-bold">Register</h1>
            </div>
            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf
                <!-- Name Field -->
                <div>
                    <label for="nama" class="block text-gray-700">Nama</label>
                    <input type="text" id="nama" name="name" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
{{--                <!-- NIK Field -->--}}
{{--                <div>--}}
{{--                    <label for="nik" class="block text-gray-700">NIK</label>--}}
{{--                    <input type="text" id="nik" name="nik" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">--}}
{{--                </div>--}}
                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
                <!-- Password Field -->
                <div>
                    <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
                <div class="mb-6 text-sm">
                    Sudah punya akun? klik <a href="{{route('login')}}" class="text-orange-500">disini</a>
                </div>
                <!-- Captcha and Submit Button -->
                <div class="flex items-center justify-between">
                    <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                    <button type="submit" class="py-2 px-4 bg-orange-500 text-white font-bold rounded-lg hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-opacity-50">Register</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
