<nav class="navbar navbar-expand navbar-light bg-navbar-custom fixed-top">
    <a class="navbar-brand text-white ps-3" href="">
        <img src="{{ asset('img/logo.png') }}" width="35px" height="40px" alt="">
    </a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="#" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasSidebar">
                <img src="{{ asset('wub/icon/hamburger_menu.svg') }}" width="25px" height="30px" alt="">
            </a>
        </li>
    </ul>
    <div class="navbar-collapse justify-content-end pe-2">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('wub/icon/settings_icon.svg') }}" width="25px" height="30px" alt="">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                    <li><a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log-Out</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<div class="offcanvas offcanvas-start offcanvas-custom bg-canvas-custom" data-bs-scroll="true"
    data-bs-backdrop="false" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title text-white" id="offcanvasSidebarLabel"></h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body ps-4">
        <div class="text-center mb-4">
            <img src="{{ \App\Http\Controllers\AuthController::getUrlForImage(Auth::user()->photo) ?? 'https://media.geeksforgeeks.org/wp-content/uploads/20190802021607/geeks14.png' }}"
                class="rounded-circle mt-2" alt="Circular Image" width="100" height="100"
                style="object-fit: cover">
            <h3 class="text-white mt-3">{{ Auth::user()->name }}</h3>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item py-2">
                <h6><a class="nav-link text-white" href="{{ route('wub.dashboardWub') }}">Dashboard</a></h6>
            </li>
            <li class="nav-item">
                <h6><a class="nav-link text-white" href="{{ route('wub.pelatihan') }}">Pelatihan</a></h6>
            </li>
            @if (Auth::user()->is_enrolled)
                <li class="nav-item py-2">
                    <h6><a class="nav-link text-white" href="{{ route('wub.absensi') }}">Absen</a></h6>
                </li>
            @endif
        </ul>
    </div>
</div>
