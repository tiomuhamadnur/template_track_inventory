<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" data-bs-toggle="collapse" href="#my-transaction" aria-expanded="false"
                aria-controls="my-transaction">
                <i class="menu-icon mdi mdi-cart-arrow-down"></i>
                <span class="menu-title">My Transaction</span>
            </a>
            <div class="collapse" id="my-transaction">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('my-transaksi-tools.index') }}">
                            Transaksi Tools
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('my-transaksi-consumable.index') }}">
                            Transaksi Material
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item animate__animated animate__fadeInLeft">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
                <i class="menu-icon mdi mdi-cart-outline"></i>
                <span class="menu-title">All Transactions</span>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('masterdata-transaksi-tools.index') }}">
                            Transaksi Tools
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('masterdata-transaksi-consumable.index') }}">
                            Transaksi Material
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Settings</li>
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
