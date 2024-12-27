<nav class="bg-blue text-white border-end" id="sidebar-wrapper">
    <button id="sidebarClose" class="btn text-white d-md-none" aria-label="Close"
        style="border: none; background: none; font-size: 1.5rem;">
        <i class="bi bi-x-circle"></i>
    </button>
    <div class="sidebar-heading text-center py-4">
        <img src="{{ asset('wub/img/logoAdmin.png') }}" alt="Logo Admin" width="140" height="50"
            class="mb-3">
        <div class="profile-container">
            <img src="{{ auth()->user()->profile_picture ?? 'https://eu.ui-avatars.com/api/?name=Admin&size=250' }}"
                alt="Profile Picture" class="profile-picture rounded-circle">
            <p class="username">{{ auth()->user()->name }}</p>
        </div>
    </div>
    <div class="list-group list-group-flush">
        <a href="{{ route('admin.dashboard') }}"
            class="list-group-item list-group-item-action text-white {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-house-door"></i> Dashboard
        </a>
        <a href="#inputDataMenu" data-bs-toggle="collapse"
            class="list-group-item list-group-item-action text-white {{ request()->routeIs('admin.createPelatihan') || request()->routeIs('admin.createMateri') || request()->routeIs('admin.createIklan') || request()->routeIs('admin.createAnnouncement') ? 'active' : '' }}">
            <i class="bi bi-file-earmark-plus"></i> Input Data
        </a>
        <div class="collapse" id="inputDataMenu">
            <a href="{{ route('admin.createPelatihan') }}"
                class="list-group-item list-group-item-action text-white {{ request()->routeIs('admin.createPelatihan') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text"></i> Pelatihan
            </a>
            <a href="{{ route('admin.createIklan') }}"
                class="list-group-item list-group-item-action text-white {{ request()->routeIs('admin.createIklan') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text"></i> Iklan
            </a>
            <a href="{{ route('admin.createAnnouncement') }}"
                class="list-group-item list-group-item-action text-white {{ request()->routeIs('admin.createAnnouncement') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text"></i> Pengumuman
            </a>
        </div>
        <a href="#listDataMenu" data-bs-toggle="collapse"
            class="list-group-item list-group-item-action text-white {{ request()->routeIs('admin.listNews') || request()->routeIs('admin.listAnnouncements') || request()->routeIs('admin.listAbsensi') || request()->routeIs('admin.listWorkshop') ? 'active' : '' }}">
            <i class="bi bi-list-ul"></i> List Data
        </a>
        <div class="collapse" id="listDataMenu">
            <a href="{{ route('admin.listAbsensi') }}" class="list-group-item list-group-item-action text-white {{ request()->routeIs('admin.listAbsensi') ? 'active' : '' }}">
                <i class="bi bi-people"></i> Absensi
            </a>
            <a href="{{ route('admin.listNews') }}"
                class="list-group-item list-group-item-action text-white {{ request()->routeIs('admin.listNews') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text"></i> Iklan
            </a>
            <a href="{{ route('admin.listAnnouncements') }}"
                class="list-group-item list-group-item-action text-white {{ request()->routeIs('admin.listAnnouncements') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text"></i> Pengumuman
            </a>
            <a href="{{ route('admin.listWorkshop') }}"
                class="list-group-item list-group-item-action text-white {{ request()->routeIs('admin.listWorkshop') ? 'active' : '' }}">
                <i class="bi bi-backpack"></i> Workshop
            </a>
        </div>
        <a href="{{ route('admin.logout') }}" class="list-group-item list-group-item-action text-white">
            <i class="bi bi-box-arrow-right"></i> Log-Out
        </a>
    </div>
</nav>
