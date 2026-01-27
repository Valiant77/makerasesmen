<aside class="sidebar">
    <div class="sidebar-logo">
        <i class="fa-solid fa-building sidebar-logo-icon"></i>
        <span class="sidebar-logo-text">MakerAsesmen</span>
    </div>

    <div class="sidebar-section">
        <p class="sidebar-title">Alat</p>

        <a href="{{ route('user.index') }}"
           class="sidebar-item {{ request()->routeIs('user.index', 'rekap.show') ? 'active' : '' }}">
            <i class="fa-solid fa-users"></i>
            <span>Daftar Pengguna</span>
        </a>

        <a href="{{ route('verifikasi.show') }}"
           class="sidebar-item {{ request()->routeIs('verifikasi.show') ? 'active' : '' }}">
            <i class="fa-solid fa-circle-check"></i>
            <span>Verifikasi</span>
            @if($amount > 0)
                <span class="badge">{{ $amount }}</span>
            @endif
        </a>

        <a href="{{  route('monitor.show') }}"
           class="sidebar-item {{ request()->routeIs('monitor.show') ? 'active' : '' }}">
            <i class="fa-solid fa-desktop"></i>
            <span>Monitoring</span>
        </a>
    </div>

    <div class="sidebar-section">
        <p class="sidebar-title">Lainnya</p>

        <a href="{{ route('profil') }}"
           class="sidebar-item {{ request()->routeIs('profil', 'admin.create') ? 'active' : '' }}">
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
