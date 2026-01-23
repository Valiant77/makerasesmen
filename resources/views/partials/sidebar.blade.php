<aside class="sidebar">
    <div class="sidebar-logo">
        <i class="fa-solid fa-building sidebar-logo-icon"></i>
        <span class="sidebar-logo-text">MakerAsesmen</span>
    </div>

    <div class="sidebar-section">
        <p class="sidebar-title">Alat</p>

        <a href="{{ route('user.index') }}"
           class="sidebar-item {{ request()->routeIs('user.*') ? 'active' : '' }}">
            <i class="fa-solid fa-users"></i>
            <span>Daftar Pengguna</span>
        </a>

        <a href="{{ route('verifikasi.show') }}"
           class="sidebar-item {{ request()->routeIs('verifikasi.*') ? 'active' : '' }}">
            <i class="fa-solid fa-circle-check"></i>
            <span>Verifikasi</span>
            <span class="badge">{{ $amount }}</span>
        </a>

        <a href="#"
           class="sidebar-item {{ request()->routeIs('pengawasan.*') ? 'active' : '' }}">
            <i class="fa-solid fa-desktop"></i>
            <span>Pengawasan</span>
        </a>
    </div>

    <div class="sidebar-section">
        <p class="sidebar-title">Lainnya</p>

        <a href="/profil"
           class="sidebar-item {{ request()->routeIs('profil.*') ? 'active' : '' }}">
            <i class="fa-solid fa-user"></i>
            <span>Profil</span>
        </a>

        <a href="{{ route('logout') }}"
           class="sidebar-item logout"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
    </div>
</aside>
