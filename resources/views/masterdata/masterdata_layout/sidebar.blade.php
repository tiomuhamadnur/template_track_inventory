<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-category">Navigasi</li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" href="{{ route('masterdata.index') }}">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-folder-multiple"></i>
                <span class="menu-title">Master Data</span>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('area.index') }}">Area</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('line.index') }}">Line Mainline</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('depoline.index') }}">Line Depo</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('part.index') }}">Parts</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('detail-part.index') }}">Detail Parts</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('defect.index') }}">Defects</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('transDefect.index') }}">Relasi Defect</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('mainline.index') }}">Track Bed Mainline</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" href="/pic" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon mdi mdi-account-details"></i>
                <span class="menu-title">PIC</span>
            </a>
        </li>

        <li class="nav-item nav-category">Settings</li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" href="{{ route('profile') }}" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon mdi mdi-account"></i>
                <span class="menu-title">My Profile</span>
            </a>
        </li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" href="/usermanage" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon mdi mdi-account-multiple"></i>
                <span class="menu-title">Management User</span>
            </a>
        </li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" href="{{ route('transisi') }}" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon mdi mdi-call-split"></i>
                <span class="menu-title">Switch Dashboard</span>
            </a>
        </li>

        <li class="nav-item nav-category">Logout</li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" href="{{ route('logout') }}" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon mdi mdi-logout"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>
    </ul>
</nav>
