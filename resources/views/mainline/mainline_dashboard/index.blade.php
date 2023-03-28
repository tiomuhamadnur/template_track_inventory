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
                                                <h4 class="card-title card-title-dash">Grafik Trend Temuan</h4>
                                                <h5 class="card-subtitle card-subtitle-dash">
                                                    <span>
                                                        Update
                                                        {{ \Carbon\Carbon::now()->format('F Y') }}
                                                    </span>
                                                </h5>
                                            </div>
                                            <div id="performance-line-legend"></div>
                                        </div>
                                        <div id="chart-container" style="width: 100%; height:100%;">
                                            {{-- <canvas id="trenOpen"></canvas> --}}
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
                                                        <h4 class="card-title card-title-dash"> (%)Progress Pekerjaan Tahunan
                                                        </h4>
                                                        <p class="card-subtitle card-subtitle-dash">Data didapat berdasarkan
                                                            Pekerjaan yang sudah dikerjakan</p>
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
                                                    <div class="col-12">
                                                        <div id="chartpic" style="width: 100%; height:100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="card-title card-title-dash">(%)Kategori Defect</h4>
                                                </div>
                                                <div id="donut-chart" class="mt-5 text-center"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="card-title card-title-dash">(%)Sebaran Defect</h4>
                                                </div>
                                                <div id="sebaran-chart" class="mt-5 text-center"></div>
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

@section('javascript')
{{-- JS TREN TEMUAN --}}
    <script type="text/javascript">
        let temuan = <?php echo json_encode($temuan); ?>;
        let bulan = <?php echo json_encode($bulan); ?>;

        Highcharts.chart('chart-container', {
            title: {
                text: ''
            },
            xAxis: {
                categories: bulan
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
                }
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },

            series: [{
                type: 'column',
                name: 'Temuan',
                data: temuan
            }, ]
        });
    </script>


    //{{-- JS TREN PEKERJAAN PERTAHUN --}}
    <script>

        Highcharts.chart('chartpic', {
    title: {
        text: '',
        align: 'left'
    },
    subtitle: {
        text: '' +
            '',
        align: 'left'
    },
    xAxis: {
        categories: ['Track Patrol on Foot', 'Cabin Ride', 'Accelerometer', 'Track Master', 'Rail Joint Gap', 'Rail Bonding Examination', 'TO & SC Examination', 'MPM Examination', 'Expansion Joint Examination', 'Buffer & Wheel Stop Examination', 'Fastening System Examination', 'Ballast Examination', 'Trackbed Examination', 'Sleeper Examination', 'Rail Profile Examination', 'Rail Corrugation Examination', 'Rail Surface of Welds Examination','GIJ Examination', 'Rail Flow, Corrosion & Defect Examination', 'Rail Hardness Test', 'NDT Examination']
    },
    series: [{
        type: 'column',
        name: 'Telah Dilaksanakan',
        colorByPoint: true,
        data: [31, 26, 27, 30, 49, 73, 23, 45,
            97, 89, 12, 34, 34, 44, 100, 14, 44, 56, 23, 44, 67],
        showInLegend: false
    }]
});

        </script>


        //{{-- JS MAJOR MINOR --}}
        <script type="text/javascript">

            Highcharts.chart('donut-chart', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: '',
        align: 'left'
    },
    subtitle: {
        text: '',
        align: 'left'
    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45
        }
    },
    series: [{
        name: 'Presentase',
        data: [
            ['Major', 3],
            ['Moderate', 2],
            ['Minor', 9]

        ]
    }]
});

            </script>

//{{-- JS SEBARAN --}}
<script>

    Highcharts.chart('sebaran-chart', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: '',
        align: 'left'
    },
    subtitle: {
        text: '',
        align: 'left'
    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45
        }
    },
    series: [{
        name: 'Presentase',
        data: [
            ['Uptrack', 3],
            ['Downtrack', 2],
            ['Middle Track', 9],
            ['Depo', 9],
            ['DAL', 9]

        ]
    }]
});



    </script>

@endsection
