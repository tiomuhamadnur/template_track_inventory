<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>
        <div>
            <a class="navbar-brand brand-logo" href="{{ route('transisi') }}" style="margin-left: 18px">
                <img src="{{ asset('assets/images/mm.png') }}" alt="logo" /> TCSM
            </a>
            <a class="navbar-brand brand-logo-mini" href="index.html">
                <img src="{{ asset('assets/images/mm.png') }}" alt="logo" />
            </a>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                <h1 class="welcome-text">Hello, <span
                        class="text-black fw-bold">{{ auth()->user()->name ?? '' }}!</span></h1>
                <h4>Examination Data Distribution System</h4>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <form class="search-form" action="#">
                    <i class="icon-search"></i>
                    <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                </form>
            </li>
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle"
                        @if (auth()->user()->photo != null) src="{{ asset('storage/' . auth()->user()->photo) }}"
                    @else
                    src="{{ asset('storage/photo-profil/default.png') }}" @endif
                        alt="Profile image"> </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <img class="img-xs rounded-circle"
                            @if (auth()->user()->photo != null) src="{{ asset('storage/' . auth()->user()->photo) }}"
                    @else
                    src="{{ asset('storage/photo-profil/default.png') }}" @endif
                            alt="Profile image">
                        <p class="mb-1 mt-3 font-weight-bold">{{ auth()->user()->name ?? '' }}</p>
                        <p class="fw-light text-muted mb-0">{{ auth()->user()->jabatan ?? '' }}</p>
                        <p class="fw-light text-muted mb-0">{{ auth()->user()->email ?? '' }}</p>
                        <a href="{{ route('profile') }}"><i class="ti-user icon-md" style="margin: 10px"></i></a>
                        <a href="{{ route('logout') }}"><i class="ti-power-off icon-md"></i></a>
                    </div>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
