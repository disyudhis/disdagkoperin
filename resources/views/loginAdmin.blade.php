<x-layout2 title="Login">
    <div class="flex justify-center items-center min-h-screen bg-orange-500">
        <div class="w-full max-w-sm bg-white p-8 rounded-lg shadow-lg">
            <div class="text-center mb-6">
                <img src="/img/logo.png" alt="CIMAHI Logo" class="mx-auto h-24 mb-4">
                <h1 class="text-2xl font-bold">Login</h1>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <div>
                        <label value="{{old('email')}}" for="email" class="block text-gray-700">Email</label>
                        <input type="email" id="email" name="email"
                               class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>
                <div class="mb-3">
                    <div>
                        <label for="password" class="block text-gray-700">Password</label>
                        <input type="password" id="password" name="password"
                               class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>
                <div class="mb-6 text-sm">
                    Belum punya akun? buat <a href="{{route('register')}}" class="text-orange-500">disini</a>
                </div>
                <button type="submit"
                        class="w-full py-2 px-4 bg-orange-500 text-white font-bold rounded-lg hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-opacity-50 uppercase">
                    Sign In
                </button>
            </form>
        </div>
    </div>
</x-layout2>
