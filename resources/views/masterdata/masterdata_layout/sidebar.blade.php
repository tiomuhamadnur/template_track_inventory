<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-category">Navigasi</li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" href="{{ route('masterdatadashboard.index') }}">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-folder-multiple"></i>
                <span class="menu-title">Master Data</span>
                {{-- <i class="menu-arrow"></i> --}}
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('masterdata_area.index') }}">Area</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('masterdata_linemainline.index') }}">Line Mainline</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('masterdata_linedepo.index') }}">Line Depo</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('masterdata_part.index') }}">Parts</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('masterdata_detail-part.index') }}">Detail Parts</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('masterdata_defect.index') }}">Defects</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('masterdata_transDefect.index') }}">Relasi Defect</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('masterdata_trackbed.index') }}">Track Bed Mainline</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="{{ route('depo.index') }}">Track Bed</a></li> --}}
                </ul>
            </div>
        </li>

        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
                <i class="menu-icon mdi mdi-briefcase"></i>
                <span class="menu-title">Activity</span>
                {{-- <i class="menu-arrow"></i> --}}
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link"
                            href="#">List Temuan</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Settings</li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" href="#auth" aria-expanded="false"
                aria-controls="auth">
                <i class="menu-icon mdi mdi-account"></i>
                <span class="menu-title">Management User</span>
            </a>
        </li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" href="/transisi" aria-expanded="false"
                aria-controls="auth">
                <i class="menu-icon mdi mdi-call-split"></i>
                <span class="menu-title">Switch Dashboard</span>
            </a>
        </li>
    </ul>
</nav>
