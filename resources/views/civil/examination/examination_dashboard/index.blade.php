@extends('civil.examination.examination_layout.base')

@section('sub-title')
    <title>Dashboard | Civil</title>
@endsection

@section('sub-content')
    {{-- <h4>Dashboard Temuan Mainline</h4> --}}
    <div class="d-sm-flex align-items-center justify-content-between border-bottom mb-3">
        <div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id='overview' role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-lg-8 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="d-sm-flex justify-content-between align-items-start">
                                            <div>
                                                <h4 class="card-title card-title-dash">Grafik Trend Temuan</h4>
                                                <h5 class="card-subtitle card-subtitle-dash">
                                                    <p>
                                                        <span>
                                                            Update
                                                            {{ \Carbon\Carbon::now()->format('F Y') }}
                                                        </span>
                                                    </p>
                                                </h5>
                                            </div>
                                            <div id="performance-line-legend"></div>
                                        </div>
                                        <div id="grafik-temuan" style="width: 100%; height: 250px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex flex-column animate__animated animate__zoomIn">
                                <div class="row flex-grow">
                                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                        <div class="card shadow bg-primary card-rounded">
                                            <div class="card-body pb-0">
                                                <h4 class="card-title card-title-dash text-white mb-4">
                                                    Temuan {{ \Carbon\Carbon::now()->format('F Y') }}
                                                </h4>
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <p class="status-summary-ight-white mb-1">
                                                            <span class="text-white">
                                                                Temuan Baru
                                                            </span>
                                                        </p>
                                                        <a href="#">
                                                            <h2 class="text-white fw-bolder">
                                                                150</h2>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <p class="status-summary-ight-white mb-1">
                                                            <span class="text-white">
                                                                Closing Temuan
                                                            </span>
                                                        </p>
                                                        <a href="#">
                                                            <h2 class="text-white fw-bolder">
                                                                20</h2>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <div class="status-summary-chart-wrapper pb-4">
                                                            <canvas id="status-summary"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                        <div class="card card-rounded shadow">
                                            <div class="card-body">
                                                <div class="row">
                                                    <h4 class="text-center fw-bolder">Temuan Total</h4>
                                                    <div class="col-sm-4">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                                            <div>
                                                                <p class="text-small mb-1"><i>Open</i></p>
                                                                <h4 class="text-danger">50</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <p class="text-small mb-1"><i>Monitoring</i></p>
                                                                <h4 class="text-warning">100</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <p class="text-small mb-1"><i>Closed</i></p>
                                                                <h4 class="text-success">100</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card card-rounded shadow">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="card-title card-title-dash">Klasifikasi Temuan
                                                    </h4>
                                                </div>
                                                <p class="card-subtitle card-subtitle-dash">Klasifikasi temuan
                                                    berdasarkan
                                                    justifikasi Tim Civil RAMS
                                                </p>
                                                <div id="sebaran-temuan-aset"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card card-rounded shadow">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="card-title card-title-dash">Temuan Area Petak Mainline</h4>
                                                </div>
                                                <p class="card-subtitle card-subtitle-dash">Sebaran Temuan Area Petak</p>
                                                <div>
                                                    <div class="dropdown">
                                                        <form action="{{ route('home') }}">
                                                            @csrf
                                                            @method('GET')
                                                            <div class="btn-group">
                                                                <select class="btn btn-secondary btn-lg me-0"
                                                                    name="bulan">
                                                                    {{-- <option value="1"
                                                                        @if ($bulan_ini == 1) selected @endif>
                                                                        Januari</option>
                                                                    <option value="2"
                                                                        @if ($bulan_ini == 2) selected @endif>
                                                                        Februari</option>
                                                                    <option value="3"
                                                                        @if ($bulan_ini == 3) selected @endif>Maret
                                                                    </option>
                                                                    <option value="4"
                                                                        @if ($bulan_ini == 4) selected @endif>April
                                                                    </option>
                                                                    <option value="5"
                                                                        @if ($bulan_ini == 5) selected @endif>Mei
                                                                    </option>
                                                                    <option value="6"
                                                                        @if ($bulan_ini == 6) selected @endif>Juni
                                                                    </option>
                                                                    <option value="7"
                                                                        @if ($bulan_ini == 7) selected @endif>Juli
                                                                    </option>
                                                                    <option value="8"
                                                                        @if ($bulan_ini == 8) selected @endif>
                                                                        Agustus</option>
                                                                    <option value="9"
                                                                        @if ($bulan_ini == 9) selected @endif>
                                                                        September</option>
                                                                    <option value="10"
                                                                        @if ($bulan_ini == 10) selected @endif>
                                                                        Oktober</option>
                                                                    <option value="11"
                                                                        @if ($bulan_ini == 11) selected @endif>
                                                                        November</option>
                                                                    <option value="12"
                                                                        @if ($bulan_ini == 12) selected @endif>
                                                                        Desember</option> --}}
                                                                </select>
                                                                <select class="btn btn-secondary btn-lg ms-0 me-0"
                                                                    name="tahun" required>
                                                                    {{-- <option value="{{ $tahun_ini }}">{{ $tahun_ini }}
                                                                    </option>
                                                                    <option value="{{ $tahun_ini - 1 }}">{{ $tahun_ini - 1 }}
                                                                    </option>
                                                                    <option value="{{ $tahun_ini - 2 }}">{{ $tahun_ini - 2 }}
                                                                    </option>
                                                                    <option value="{{ $tahun_ini - 3 }}">{{ $tahun_ini - 3 }}
                                                                    </option> --}}
                                                                </select>
                                                            </div>
                                                            <button class="btn btn-warning btn-lg ms-0" type="submit">
                                                                <i class="mdi mdi-eye"></i>
                                                                Show
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div id="defect-per-petak" class="mt-5 text-center"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card card-rounded shadow">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="card-title card-title-dash">Temuan Area Stasiun</h4>
                                                </div>
                                                <p class="card-subtitle card-subtitle-dash">Sebaran Temuan Area Stasiun</p>
                                                <div>
                                                    <div class="dropdown">
                                                        <form action="{{ route('home') }}">
                                                            @csrf
                                                            @method('GET')
                                                            <div class="btn-group">
                                                                <select class="btn btn-secondary btn-lg me-0"
                                                                    name="bulan">
                                                                    {{-- <option value="1"
                                                                        @if ($bulan_ini == 1) selected @endif>
                                                                        Januari</option>
                                                                    <option value="2"
                                                                        @if ($bulan_ini == 2) selected @endif>
                                                                        Februari</option>
                                                                    <option value="3"
                                                                        @if ($bulan_ini == 3) selected @endif>Maret
                                                                    </option>
                                                                    <option value="4"
                                                                        @if ($bulan_ini == 4) selected @endif>April
                                                                    </option>
                                                                    <option value="5"
                                                                        @if ($bulan_ini == 5) selected @endif>Mei
                                                                    </option>
                                                                    <option value="6"
                                                                        @if ($bulan_ini == 6) selected @endif>Juni
                                                                    </option>
                                                                    <option value="7"
                                                                        @if ($bulan_ini == 7) selected @endif>Juli
                                                                    </option>
                                                                    <option value="8"
                                                                        @if ($bulan_ini == 8) selected @endif>
                                                                        Agustus</option>
                                                                    <option value="9"
                                                                        @if ($bulan_ini == 9) selected @endif>
                                                                        September</option>
                                                                    <option value="10"
                                                                        @if ($bulan_ini == 10) selected @endif>
                                                                        Oktober</option>
                                                                    <option value="11"
                                                                        @if ($bulan_ini == 11) selected @endif>
                                                                        November</option>
                                                                    <option value="12"
                                                                        @if ($bulan_ini == 12) selected @endif>
                                                                        Desember</option> --}}
                                                                </select>
                                                                <select class="btn btn-secondary btn-lg ms-0 me-0"
                                                                    name="tahun" required>
                                                                    {{-- <option value="{{ $tahun_ini }}">{{ $tahun_ini }}
                                                                    </option>
                                                                    <option value="{{ $tahun_ini - 1 }}">{{ $tahun_ini - 1 }}
                                                                    </option>
                                                                    <option value="{{ $tahun_ini - 2 }}">{{ $tahun_ini - 2 }}
                                                                    </option>
                                                                    <option value="{{ $tahun_ini - 3 }}">{{ $tahun_ini - 3 }}
                                                                    </option> --}}
                                                                </select>
                                                            </div>
                                                            <button class="btn btn-warning btn-lg ms-0" type="submit">
                                                                <i class="mdi mdi-eye"></i>
                                                                Show
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div id="defect-per-stasiun" class="mt-5 text-center"></div>
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
@endsection

@section('javascript')
    <script>
        Highcharts.chart('defect-per-stasiun', {
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: ['St. LBB', 'St. FTM', 'St. CPR', 'St. HJN', 'St. BLA', 'St. BLM',
                    'St. ASEAN', 'St. SNY', 'St. IST', 'St. BNH', 'St. STB', 'St. DKA', 'St. BHI'
                ],
                crosshair: true,
                accessibility: {
                    description: 'Stasiun'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total Temuan'
                }
            },
            tooltip: {
                valueSuffix: ' Temuan'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                    name: 'Open',
                    data: [10, 10, 10, 10, 12, 12, 12, 10, 9, 12, 9, 8, 17]
                },
                {
                    name: 'Closed',
                    data: [9, 12, 34, 12, 20, 12, 30, 23, 11, 23, 29, 11, 90]
                }
            ]
        });

        Highcharts.chart('defect-per-petak', {
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: ['LBB-FTM', 'FTM-CPR', 'CPR-HJN', 'HJN-BLA', 'BLA-BLM', 'BLM-ASEAN', 'ASEAN-SNY',
                    'SNY-IST', 'IST-BNH', 'BNH-STB', 'STB-DKA', 'DKA-BHI'
                ],
                crosshair: true,
                accessibility: {
                    description: 'Stasiun'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total Temuan'
                }
            },
            tooltip: {
                valueSuffix: ' Temuan'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                    name: 'Open',
                    data: [10, 10, 10, 10, 12, 12, 12, 10, 9, 12, 9, 8]
                },
                {
                    name: 'Closed',
                    data: [9, 12, 34, 12, 20, 12, 30, 23, 11, 23, 29, 11]
                }
            ]
        });

        Highcharts.chart('grafik-temuan', {
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: '' +
                    ''
            },
            xAxis: {
                categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ],
                crosshair: true,
                accessibility: {
                    description: 'Months'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total Temuan'
                }
            },
            tooltip: {
                valueSuffix: ' Temuan'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                    name: 'Open',
                    data: [10, 20, 18, 23, 23, 23, 92, 27, 11, 10, 11, 23]
                },
                {
                    name: 'Close',
                    data: [12, 23, 12, 45, 12, 14, 12, 45, 12, 34, 11, 12]
                }
            ]
        });

        Highcharts.chart('sebaran-temuan-aset', {

            chart: {
                type: 'variwide'
            },

            title: {
                text: 'Sub Lokasi Temuan'
            },

            subtitle: {
                text: '' +
                    ''
            },

            xAxis: {
                type: 'category'
            },

            caption: {
                text: 'Temuan berdasarkan Sub Lokasi'
            },

            legend: {
                enabled: false
            },

            series: [{
                name: 'Temuan',
                data: [
                    ['Ground', 51.9, 132423],
                    ['Concourse', 48.1, 376430],
                    ['Platform', 47.1, 584699],
                    ['Room', 32, 1034086],
                    ['RSS', 25, 234501],
                    ['Stasiun', 14, 673984],
                    ['Depo', 43.3, 1123134],

                ],
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.0f} Temuan'
                },
                tooltip: {
                    pointFormat: 'Temuan' +
                        ''
                },
                borderRadius: 3,
                colorByPoint: true
            }]

        });
    </script>
@endsection
