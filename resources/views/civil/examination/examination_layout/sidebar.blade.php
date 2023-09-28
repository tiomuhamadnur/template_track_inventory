<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-category">Navigasi</li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" href="{{ route('dashboard-activity-civil.index') }}">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
                <i class="menu-icon mdi mdi-briefcase"></i>
                <span class="menu-title">Main Activity</span>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('temuan-visual.index') }}">List Temuan Visual</a>
                    </li>
                </ul>
            </div>
        </li>
        {{-- <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" href="{{ route('rfi.mainline.index') }}">
                <i id="notification_rfi" class="mdi mdi-arrange-send-backward menu-icon"></i>
                <span class="menu-title">Request For Inspection</span>
            </a>
        </li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" href="{{ route('closing_report.index') }}">
                <i class="mdi mdi-file-export menu-icon"></i>
                <span class="menu-title">Form/Report Generator</span>
            </a>
        </li> --}}

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

<style>
    .bell-notif {
        color: #fff;
        position: relative;
        transform-origin: top;

    }

    .fa-bell {
        font-size: 5px;
    }

    .bell-notif::after {
        content: attr(current-count);
        position: absolute;
        top: 0;
        right: -10%;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        /* background-color: red; */
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 4px;
        border: 4px solid red;

    }
</style>
