<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-category">Navigasi</li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" href="{{ route('dashboard-masterdata-planning.index') }}">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
                <i class="menu-icon mdi mdi-cart-outline"></i>
                <span class="menu-title">Transaction</span>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('masterdata-transaksi-tools.index') }}">Transaksi Tools</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Transaksi Material</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" data-bs-toggle="collapse" href="#budgeting" aria-expanded="false"
                aria-controls="budgeting">
                <i class="menu-icon mdi mdi-cash-multiple"></i>
                <span class="menu-title">Budgeting</span>
            </a>
            <div class="collapse" id="budgeting">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Slot</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Progress Project</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item nav-category">Master Data</li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-folder-lock"></i>
                <span class="menu-title">Data Essentials</span>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('masterdata-location.index') }}">Data Location</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('masterdata-detail-location.index') }}">Data Detail
                            Location</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" data-bs-toggle="collapse" href="#data-assets" aria-expanded="false"
                aria-controls="data-assets">
                <i class="menu-icon mdi mdi-server"></i>
                <span class="menu-title">Data Assets</span>
            </a>
            <div class="collapse" id="data-assets">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('masterdata-tools') }}">Data Tools</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('masterdata-consumable.index') }}">Data Consumable</a>
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
