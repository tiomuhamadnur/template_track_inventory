<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-category">Navigasi</li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" href="{{ route('jadwal.pekerjaan.index') }}">
                <i class="mdi mdi-calendar-clock menu-icon"></i>
                <span class="menu-title">Jadwal Pekerjaan</span>
            </a>
        </li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" href="{{ route('man.power.index') }}">
                <i class="mdi mdi-account-check menu-icon"></i>
                <span class="menu-title">Man Power On Duty</span>
            </a>
        </li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" href="{{ route('announcement.index') }}">
                <i class="mdi mdi-bullhorn-outline menu-icon"></i>
                <span class="menu-title">Announcement</span>
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
