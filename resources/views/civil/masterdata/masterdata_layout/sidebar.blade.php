<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-category">Feature</li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" href="{{ route('dashboard-masterdata-civil.index') }}">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item nav-category">Master Data</li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-folder-lock"></i>
                <span class="menu-title">Data Essential</span>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sub-area.index') }}">Sub Area</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('detail-area.index') }}">Detail Area</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('relasi-area.index') }}">Relasi Area</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('part-civil.index') }}">Part</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('detail-part-civil.index') }}">Detail Part</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('defect-civil.index') }}">Defect</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('relasi-defect.index') }}">Relasi Defect</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" data-bs-toggle="collapse" href="#data-asset" aria-expanded="false"
                aria-controls="data-asset">
                <i class="menu-icon mdi mdi-server"></i>
                <span class="menu-title">Data Assets</span>
            </a>
            <div class="collapse" id="data-asset">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mainline.index') }}">Tunnel Mainline</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item nav-category">Settings</li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" href="{{ route('profile') }}" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon mdi mdi-account"></i>
                <span class="menu-title">My Profile</span>
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
