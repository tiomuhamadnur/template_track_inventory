@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title> Dashboard | TCSM</title>
@endsection
@section('sub-content')
    <h4>Dashboard Mainline</h4>
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <div>
                    </div>
                </div>
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="text-center">
                            <a class="btn btn-outline-primary btn-lg  animate__animated animate__jello"
                                data-bs-toggle="collapse" href="#menu" aria-expanded="false" aria-controls="#menu">
                                <span class="menu-title">MAPPING TEMUAN</span>
                            </a>
                        </div>
                        <div class="collapse" id="menu">
                            @include('mainline.mainline_dashboard.mapping')
                        </div>
                        {{-- <h1 class="animate__animated animate__fadeInDown">An animated element</h1> --}}


                        <div class="row">
                            <div class="col-lg-8 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-sm-flex justify-content-between align-items-start">
                                            <div>
                                                <h4 class="card-title card-title-dash">Total Temuan Open</h4>
                                                <h5 class="card-subtitle card-subtitle-dash">
                                                    <span>
                                                        Update
                                                        {{ \Carbon\Carbon::now()->format('F Y') }}
                                                    </span>
                                                </h5>
                                            </div>
                                            <div id="performance-line-legend"></div>
                                        </div>
                                        <div class="chartjs-wrapper mt-5">
                                            <canvas id="trenOpen"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex flex-column animate__animated animate__zoomIn">
                                <div class="row flex-grow">
                                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                        <div class="card bg-primary card-rounded">
                                            <a href="">
                                                <div class="card-body pb-0">
                                                    <h4 class="card-title card-title-dash text-white mb-4">
                                                        Temuan {{ \Carbon\Carbon::now()->format('F Y') }}
                                                    </h4>
                                                    <div class="row">
                                                        <div class="col-sm-5">
                                                            <p class="status-summary-ight-white mb-1">
                                                                <span>
                                                                    Temuan Baru
                                                                </span>
                                                            </p>
                                                            <h2 class="text-info">
                                                                {{ $temuan_baru_bulan_ini->count() }}
                                                            </h2>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <p class="status-summary-ight-white mb-1">
                                                                <span>
                                                                    Closing Temuan
                                                                </span>
                                                            </p>
                                                            <h2 class="text-info">
                                                                {{ $temuan_close_bulan_ini->count() }}
                                                            </h2>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <div class="status-summary-chart-wrapper pb-4">
                                                                <canvas id="status-summary"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="row">
                                                    <h4 class="text-center">Temuan Total</h4>
                                                    <div class="col-sm-6">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                                            <div>
                                                                <p class="text-small mb-2">Temuan Open</p>
                                                                <h4 class="mb-0 fw-bold">
                                                                    {{ $temuan_open->count() }}
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <p class="text-small mb-2">Temuan Closed</p>
                                                                <h4 class="mb-0 fw-bold">
                                                                    {{ $temuan_close->count() }}
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-flex flex-column animate__animated animate__zoomIn">
                                <div class="row flex-grow">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="d-sm-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h4 class="card-title card-title-dash">Komparasi Open-Close Temuan
                                                        </h4>
                                                        <p class="card-subtitle card-subtitle-dash">Data didapat berdasarkan
                                                            Open & Closing setiap bulan </p>
                                                    </div>
                                                    <div>
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0"
                                                                type="button" id="dropdownMenuButton2"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false"> Tahun ini </button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuButton2">
                                                                <a class="dropdown-header">2022</a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                                    <div class="d-sm-flex align-items-center mt-4 justify-content-between">
                                                        <h2 class="me-2 fw-bold"></h2>
                                                        <h4 class="me-2">KOMPARASI</h4>
                                                        <h4 class="text-success">(%)</h4>
                                                    </div>
                                                    <div class="me-3">
                                                        <div id="marketing-overview-legend"></div>
                                                    </div>
                                                </div>
                                                <div class="chartjs-bar-wrapper mt-3">
                                                    <canvas id="komparasiTemuan"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex flex-column animate__animated animate__zoomIn">
                                <div class="row flex-grow">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card bg-primary card-rounded">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <h4 class="card-title card-title-dash text-white">Tableau Bulan
                                                                Ini</h4>
                                                        </div>
                                                        <div class="list-wrapper text-white">
                                                            <ul class="todo-list todo-list-rounded">
                                                                <li class="d-block">
                                                                    <div class="form-check w-100">
                                                                        <label class="form-check-label">
                                                                            <span class="checkbox" type="checkbox">Track
                                                                                Patrol on Foot<i
                                                                                    class="input-helper rounded"></i></span>
                                                                        </label>
                                                                        <div class="d-flex mt-2">
                                                                            <div class="ps-4 text-small me-3">12 June 2020
                                                                            </div>
                                                                            <div class="badge badge-opacity-success me-3">
                                                                                Done</div>

                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="d-block">
                                                                    <div class="form-check w-100">
                                                                        <label class="form-check-label">
                                                                            <span class="checkbox" type="checkbox">EJ
                                                                                Examination<i
                                                                                    class="input-helper rounded"></i></span>
                                                                        </label>
                                                                        <div class="d-flex mt-2">
                                                                            <div class="ps-4 text-small me-3">23 June 2020
                                                                            </div>
                                                                            <div class="badge badge-opacity-warning me-3">
                                                                                On Going</div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="form-check w-100">
                                                                        <label class="form-check-label">
                                                                            <span class="checkbox"
                                                                                type="checkbox">Accelerometer <i
                                                                                    class="input-helper rounded"></i></span>
                                                                        </label>
                                                                        <div class="d-flex mt-2">
                                                                            <div class="ps-4 text-small me-3">24 June 2020
                                                                            </div>
                                                                            <div class="badge badge-opacity-warning me-3">
                                                                                On Going</div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="form-check w-100">
                                                                        <label class="form-check-label">
                                                                            <span class="checkbox" type="checkbox"> Rail
                                                                                Joint Gap Examination <i
                                                                                    class="input-helper rounded"></i></span>
                                                                        </label>
                                                                        <div class="d-flex mt-2">
                                                                            <div class="ps-4 text-small me-3">24 June 2020
                                                                            </div>
                                                                            <div class="badge badge-opacity-warning me-3">
                                                                                On Going</div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="form-check w-100">
                                                                        <label class="form-check-label">
                                                                            <span class="checkbox" type="checkbox"> Cabin
                                                                                Ride <i
                                                                                    class="input-helper rounded"></i></span>
                                                                        </label>
                                                                        <div class="d-flex mt-2">
                                                                            <div class="ps-4 text-small me-3">24 June 2020
                                                                            </div>
                                                                            <div class="badge badge-opacity-warning me-3">
                                                                                On Going</div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="card-title card-title-dash">Kategori Defect</h4>
                                                </div>
                                                <canvas class="my-auto" id="doughnutChart" height="200"></canvas>
                                                <div id="doughnut-chart-legend" class="mt-5 text-center"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('mainline.mainline_dashboard.modals')
    </div>
@endsection
