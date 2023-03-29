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
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="card-title card-title-dash">Titik Sebaran Defect Area Mainline</h4>
                                                </div>
                                                <p class="card-subtitle card-subtitle-dash">Presentase Sebaran Temuan Per Area</p>
                                                    <div id="sebaran-area-chart"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                            <div class="col-7 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="card-title card-title-dash">(%)Kategori Defect</h4>
                                                </div>
                                                <p class="card-subtitle card-subtitle-dash">Klasifikasi Defect Berdasarkan Justifikasi Tim Track Examination</p>
                                                <div id="klasifikasi-chart" class="mt-5 text-center"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="card-title card-title-dash">(%)Sebaran Defect</h4>
                                                </div>
                                                <p class="card-subtitle card-subtitle-dash">Presentase Sebaran Temuan Per Area</p>
                                                <div id="sebaran-chart" class="mt-5 text-center"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('mainline.mainline_dashboard.modals')
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        // {{-- JS TREN TEMUAN --}}
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
                name: 'jumlah temuan',
                data: temuan
            }, ]
        });

        //{{-- JS TREN PEKERJAAN PERTAHUN --}}
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
                categories: ['Track Patrol on Foot', 'Cabin Ride', 'Accelerometer', 'Track Master',
                    'Rail Joint Gap', 'Rail Bonding Examination', 'TO & SC Examination', 'MPM Examination',
                    'Expansion Joint Examination', 'Buffer & Wheel Stop Examination',
                    'Fastening System Examination', 'Ballast Examination', 'Trackbed Examination',
                    'Sleeper Examination', 'Rail Profile Examination', 'Rail Corrugation Examination',
                    'Rail Surface of Welds Examination', 'GIJ Examination',
                    'Rail Flow, Corrosion & Defect Examination', 'Rail Hardness Test', 'NDT Examination'
                ]
            },
            series: [{
                type: 'column',
                name: 'Telah Dilaksanakan',
                colorByPoint: true,
                data: [31, 26, 27, 30, 49, 73, 23, 45,
                    97, 89, 12, 34, 34, 44, 100, 14, 44, 56, 23, 44, 67
                ],
                showInLegend: false
            }]
        });


        //{{-- JS MAJOR MINOR --}}
        let minor = <?php echo json_encode($temuan_minor); ?>;
        let moderate = <?php echo json_encode($temuan_moderate); ?>;
        let mayor = <?php echo json_encode($temuan_mayor); ?>;
        Highcharts.chart('klasifikasi-chart', {
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
                name: 'jumlah temuan',
                data: [
                    ['Major', mayor],
                    ['Moderate', moderate],
                    ['Minor', minor],
                ]
            }]
        });

        //{{-- JS SEBARAN --}}
        Highcharts.chart('sebaran-chart', {
    chart: {
        type: 'column'
    },
    title: {
        align: 'left',
        text: ''
    },
    subtitle: {
        align: 'left',
        text: ''
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Presentase Temuan'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: 'Line',
            colorByPoint: true,
            data: [
                {
                    name: 'Uptrack',
                    y: 30.06,
                },
                {
                    name: 'Downtrack',
                    y: 25.84,
                },
                {
                    name: 'Middle Track',
                    y: 4.18,
                },
                {
                    name: 'DAL-TB',
                    y: 4.12,
                }
            ]
        }
    ]
});
    // JS BUBBLE SEBARAN TEMUAN PER-AREA

    Highcharts.chart('sebaran-area-chart', {
    chart: {
        type: 'packedbubble',
        height: '50%'
    },
    title: {
        text: '',
        align: 'left'
    },
    tooltip: {
        useHTML: true,
        pointFormat: '<b>{point.name}:</b> {point.value} Titik<sub></sub>'
    },
    plotOptions: {
        packedbubble: {
            minSize: '30%',
            maxSize: '200%',
            zMin: 0,
            zMax: 1000,
            layoutAlgorithm: {
                splitSeries: false,
                gravitationalConstant: 0.02
            },
            dataLabels: {
                enabled: true,
                format: '{point.name}',
                filter: {
                    property: 'y',
                    operator: '>',
                    value: 250
                },
                style: {
                    color: 'black',
                    textOutline: 'none',
                    fontWeight: 'normal'
                }
            }
        }
    },
    series: [{
        name: 'Mainline UT',
        data: [{
            name: 'St. LBB',
            value: 7.2
        },
        {
            name: 'LBB-FTM',
            value: 8.1
        },
        {
            name: 'St.FTM',
            value: 17.8
        },
        {
            name: 'FTM-CPR',
            value: 34
        },
        {
            name: 'St.CPR',
            value: 43
        },
        {
            name: 'CPR-HJN',
            value: 78.6
        },
        {
            name: 'St.HJN',
            value: 52
        },
        {
            name: 'HJN-BLA',
            value: 74.1
        },
        {
            name: 'St.BLA',
            value: 89.1
        }, {
            name: 'BLA-BLM',
            value: 199
        },
        {
            name: 'St.BLM',
            value: 195.2
        },
        {
            name: 'BLM-ASEAN',
            value: 195.2
        },{
            name: 'St.ASEAN',
            value: 195.2
        },
        {
            name: 'ASEAN-SNY',
            value: 195.2
        },{
            name: 'St.SNY',
            value: 195.2
        },{
            name: 'SNY-IST',
            value: 195.2
        },
        {
            name: 'St.IST',
            value: 195.2
        },
        {
            name: 'IST-BNH',
            value: 195.2
        },
        {
            name: 'St.BNH',
            value: 195.2
        },{
            name: 'BNH-STB',
            value: 195.2
        },{
            name: 'St.STB',
            value: 195.2
        },
        {
            name: 'STB-DKA',
            value: 195.2
        },{
            name: 'St.DKA',
            value: 195.2
        },{
            name: 'DKA-BHI',
            value: 195.2
        },{
            name: 'St.BHI',
            value: 195.2
        }]
    },
    {
        name: 'Mainline DT',
        data: [{
            name: 'St. LBB',
            value: 7.2
        },
        {
            name: 'LBB-FTM',
            value: 8.1
        },
        {
            name: 'St.FTM',
            value: 17.8
        },
        {
            name: 'FTM-CPR',
            value: 34
        },
        {
            name: 'St.CPR',
            value: 43
        },
        {
            name: 'CPR-HJN',
            value: 78.6
        },
        {
            name: 'St.HJN',
            value: 52
        },
        {
            name: 'HJN-BLA',
            value: 74.1
        },
        {
            name: 'St.BLA',
            value: 89.1
        }, {
            name: 'BLA-BLM',
            value: 199
        },
        {
            name: 'St.BLM',
            value: 195.2
        },
        {
            name: 'BLM-ASEAN',
            value: 195.2
        },{
            name: 'St.ASEAN',
            value: 195.2
        },
        {
            name: 'ASEAN-SNY',
            value: 195.2
        },{
            name: 'St.SNY',
            value: 195.2
        },{
            name: 'SNY-IST',
            value: 195.2
        },
        {
            name: 'St.IST',
            value: 195.2
        },
        {
            name: 'IST-BNH',
            value: 195.2
        },
        {
            name: 'St.BNH',
            value: 195.2
        },{
            name: 'BNH-STB',
            value: 195.2
        },{
            name: 'St.STB',
            value: 195.2
        },
        {
            name: 'STB-DKA',
            value: 195.2
        },{
            name: 'St.DKA',
            value: 195.2
        },{
            name: 'DKA-BHI',
            value: 195.2
        },{
            name: 'St.BHI',
            value: 195.2
        }]
    },
    {
        name: 'Mainline Middle Track',
        data: [{
            name: 'MT BLM',
            value: 7.2
        },
        {
            name: 'MT BHI',
            value: 8.1
        }]
    },
    {
        name: 'DAL-TB',
        data: [{
            name: 'DAL-TB',
            value: 7.2
        },
        {
            name: 'MT BHI',
            value: 8.1
        }]
    }]

});
    </script>
@endsection
