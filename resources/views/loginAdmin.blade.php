<x-layout2 title="Login">
    <div class="min-vh-100 d-flex align-items-center justify-content-center" style="background-color: #f97316;">
        <div class="card shadow-lg" style="max-width: 400px; width: 90%;">
            <div class="card-body p-4 p-md-5">
                <div class="text-center mb-4">
                    <img src="/img/logo.png" alt="CIMAHI Logo" class="mb-3" style="height: 96px;">
                    <h1 class="h4 fw-bold">Login</h1>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4 small">
                        Belum punya akun? buat <a href="{{ route('register') }}" class="text-decoration-none" style="color: #f97316;">disini</a>
                    </div>

                    <button type="submit" class="btn w-100 text-uppercase fw-bold text-white" style="background-color: #f97316;">
                        Sign In
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layout2>
