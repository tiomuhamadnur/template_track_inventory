@extends('depo.depo_layout.base')

@section('sub-title')
    <title> Dashboard | TCSM</title>
@endsection
@section('sub-content')
    <h4>Dashboard Depo</h4>
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <div>
                    </div>
                </div>
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        {{-- <div class="text-center">
                            <a class="btn btn-outline-primary btn-lg  animate__animated animate__jello"
                                data-bs-toggle="collapse" href="#menu" aria-expanded="false" aria-controls="#menu">
                                <span class="menu-title">MAPPING TEMUAN</span>
                            </a>
                        </div> --}}
                        {{-- <div class="collapse" id="menu">
                            @include('depo.depo_dashboard.mapping')
                        </div> --}}
                        {{-- <h1 class="animate__animated animate__fadeInDown">An animated element</h1> --}}


                        <div class="row">
                            <div class="col-lg-6 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card" style="background: white; border-radius: 40px;">
                                    <div class="card-body" style="background: white; border-radius: 40px;">
                                        <img src="" style="border-radius: 50px;" alt="">
                                        <div class="row-lg-1">
                                            <h4>Dokumentasi</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-sm-flex justify-content-between align-items-start">
                                            <div>
                                                <h4 class="card-title card-title-dash">Total Temuan</h4>
                                                <h5 class="card-subtitle card-subtitle-dash">Update January</h5>
                                            </div>
                                            <div id="performance-line-legend"></div>
                                        </div>
                                        <div class="chartjs-wrapper mt-5">
                                            <canvas id="performaneLine"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card" style="background: white; border-radius: 40px;">
                                    <div class="card-body" style="background: white; border-radius: 40px;">
                                        <img src="" style="border-radius: 50px;" alt="">
                                        <div class="row-lg-1">
                                            <h4>Dokumentasi</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-sm-flex justify-content-between align-items-start">
                                            <div>
                                                <h4 class="card-title card-title-dash">Total Temuan</h4>
                                                <h5 class="card-subtitle card-subtitle-dash">Update January</h5>
                                            </div>
                                            <div id="performance-line-legend"></div>
                                        </div>
                                        <div class="chartjs-wrapper mt-5">
                                            <canvas id="performaneLine"></canvas>
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
@endsection
