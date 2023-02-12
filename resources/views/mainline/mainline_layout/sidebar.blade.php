<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-category">Navigasi</li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
                <i class="menu-icon mdi mdi-briefcase"></i>
                <span class="menu-title">Activity Mainline</span>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('temuan_mainline.index') }}">List Temuan
                            Mainline</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('accelerometer.index') }}">Accelerometer</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wesel.examination.index') }}">Turn Out
                            Irregularity</a>
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
