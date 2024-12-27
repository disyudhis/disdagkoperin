<x-layout2 title="Register">
    <div class="min-vh-100 d-flex align-items-center justify-content-center" style="background-color: #f97316;">
        <div class="card shadow-lg" style="max-width: 500px; width: 90%;">
            <div class="card-body p-4 p-md-5">
                <div class="text-center mb-4">
                    <img src="/img/logo.png" alt="CIMAHI Logo" class="mb-3" style="height: 96px;">
                    <h1 class="h4 fw-bold">Register</h1>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="name">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>

                    <div class="mb-3 small">
                        Sudah punya akun? klik <a href="{{ route('login') }}" class="text-decoration-none" style="color: #f97316;">disini</a>
                    </div>

                    <div class="row align-items-center g-3">
                        <div class="col-auto">
                            <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn w-100 text-white fw-bold" style="background-color: #f97316;">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout2>
