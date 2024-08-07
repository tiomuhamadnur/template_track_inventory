@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title> Dashboard | CPWTM</title>
@endsection
@section('sub-content')
    <h4>Dashboard Mainline</h4>
    <div class="d-sm-flex align-items-center justify-content-between border-bottom mb-3">
        <div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card animate__animated animate__zoomIn ">
            <div class="card card-rounded shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5>Mapping Mainline</h5>
                            </div>
                            <p class="card-subtitle card-subtitle-dash">Mapping Sebaran Temuan di Area Mainline</p>
                            @include('mainline.mainline_dashboard.mapping_svg')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-lg-8 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="d-sm-flex justify-content-between align-items-start">
                                            <div>
                                                <h4 class="card-title card-title-dash">Grafik Trend Temuan</h4>
                                                <h5 class="card-subtitle card-subtitle-dash">
                                                    <span>
                                                        Update
                                                        {{ $nama_bulan_ini ?? '-' }} {{ $tahun_ini ?? '-' }}
                                                    </span>
                                                </h5>
                                            </div>
                                            <div>
                                                <div class="dropdown">
                                                    <form action="{{ route('home') }}">
                                                        @csrf
                                                        @method('GET')
                                                        <div class="btn-group">
                                                            <select class="btn btn-secondary btn-lg me-0" name="bulan">
                                                                <option value="1"
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
                                                                    Desember</option>
                                                            </select>
                                                            <select class="btn btn-secondary btn-lg ms-0 me-0"
                                                                name="tahun" required>
                                                                <option value="{{ $tahun_ini }}">{{ $tahun_ini }}
                                                                </option>
                                                                <option value="{{ $tahun_ini - 1 }}">{{ $tahun_ini - 1 }}
                                                                </option>
                                                                <option value="{{ $tahun_ini - 2 }}">{{ $tahun_ini - 2 }}
                                                                </option>
                                                                <option value="{{ $tahun_ini - 3 }}">{{ $tahun_ini - 3 }}
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <button class="btn btn-warning btn-lg ms-0" type="submit">
                                                            <i class="mdi mdi-eye"></i>
                                                            Show
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="chart-container" style="width: 100%; height: 250px;">
                                            {{-- <canvas id="trenOpen"></canvas> --}}
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
                                                    Temuan {{ $nama_bulan_ini ?? '-' }} {{ $tahun_ini ?? '-' }}
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
                                                                {{ $temuan_baru_bulan_ini->count() }}
                                                            </h2>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <p class="status-summary-ight-white mb-1">
                                                            <span class="text-white">
                                                                Total Record Temuan
                                                            </span>
                                                        </p>
                                                        <a href="#">
                                                            <h2 class="text-white fw-bolder">
                                                                {{ $total_record_temuan->count() }}
                                                            </h2>
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
                                                                <a href="#"
                                                                    title="Minor: {{ $temuan_minor }} | Moderate: {{ $temuan_moderate }} | Major: {{ $temuan_mayor }}">
                                                                    <h4 class="mb-0 fw-bold text-danger">
                                                                        {{ $temuan_open->count() }}
                                                                    </h4>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <p class="text-small mb-1"><i>Monitoring</i></p>
                                                                <a href="#"
                                                                    title="Minor: {{ $temuan_monitoring_minor }} | Moderate: {{ $temuan_monitoring_moderate }} | Major: {{ $temuan_monitoring_mayor }}">
                                                                    <h4 class="mb-0 fw-bold text-warning">
                                                                        {{ $temuan_monitoring->count() }}
                                                                    </h4>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <p class="text-small mb-1"><i>Closed</i></p>
                                                                <a href="#"
                                                                    title="Minor: {{ $temuan_close_minor }} | Moderate: {{ $temuan_close_moderate }} | Major: {{ $temuan_close_mayor }}">
                                                                    <h4 class="mb-0 fw-bold text-success">
                                                                        {{ $temuan_close->count() }}
                                                                    </h4>
                                                                </a>
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
                                                    <h4 class="card-title card-title-dash">Klasifikasi Temuan Total
                                                    </h4>
                                                </div>
                                                <p class="card-subtitle card-subtitle-dash">Klasifikasi temuan
                                                    berdasarkan
                                                    justifikasi Tim Permanent Way RAMS
                                                </p>
                                                <div id="klasifikasi-chart"></div>
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
                                                    <h4 class="card-title card-title-dash">Defect Part</h4>
                                                </div>
                                                <p class="card-subtitle card-subtitle-dash">Sebaran Defect Berdasarkan Part
                                                    di Mainline</p>
                                                <div id="defect-part-chart" class="mt-5 text-center"></div>
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
                                                    <h4 class="card-title card-title-dash">Defect per Line</h4>
                                                </div>
                                                <p class="card-subtitle card-subtitle-dash">Persentase Sebaran Temuan Per
                                                    Line di Mainline</p>
                                                <div id="sebaran-chart" class="mt-5 text-center"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 d-flex flex-column animate__animated animate__zoomIn">
                                <div class="row flex-grow">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card card-rounded shadow">
                                            <div class="card-body">
                                                <div class="d-sm-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h4 class="card-title card-title-dash">Progress Pekerjaan
                                                            Tahunan
                                                        </h4>
                                                        <p class="card-subtitle card-subtitle-dash">Data didapat
                                                            berdasarkan
                                                            Pekerjaan yang sudah dikerjakan</p>
                                                    </div>
                                                    <div>
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0"
                                                                type="button" id="dropdownMenuButton2"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                Tahun {{ $tahun_ini ?? '-' }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                                    <div class="col-12">
                                                        <div class="table-responsive  mt-1">
                                                            <table class="table select-table" style="width: 100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 3%"></th>
                                                                        <th class="text-wrap" style="width: 40%">
                                                                            Preventive Maintenance</th>
                                                                        <th class="text-wrap text-center">Progress</th>
                                                                        <th class="text-wrap text-center">Status
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @foreach ($pic as $item)
                                                                        <tr>
                                                                            <td class="text-center">
                                                                                <img src="{{ asset('storage/' . $item->job->logo ?? '') }}"
                                                                                    alt="logo">
                                                                            </td>
                                                                            <td class="text-wrap">
                                                                                <h6>{{ $item->job->name }}</h6>
                                                                                <p class="text">PIC:
                                                                                    {{ $item->user->name ?? '-' }}</p>
                                                                            </td>
                                                                            <td>
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                                    <p class="text-success">
                                                                                        @if ($item->progress == null or $item->progress == 0)
                                                                                            @php
                                                                                                $persentase = 0;
                                                                                            @endphp
                                                                                        @else
                                                                                            @php
                                                                                                $persentase =
                                                                                                    ($item->progress /
                                                                                                        $item->job
                                                                                                            ->frekuensi) *
                                                                                                    100;
                                                                                            @endphp
                                                                                        @endif
                                                                                        {{ number_format($persentase, 1, '.', ',') }}%
                                                                                    </p>
                                                                                    <p>{{ $item->progress }}/{{ $item->job->frekuensi }}
                                                                                    </p>
                                                                                </div>
                                                                                <div class="progress progress-md">
                                                                                    <div class="progress-bar bg-success"
                                                                                        role="progressbar"
                                                                                        style="width: {{ round($persentase) }}%; height: 100%;"
                                                                                        aria-valuenow="25"
                                                                                        aria-valuemin="0"
                                                                                        aria-valuemax="100"></div>
                                                                                </div>
                                                                                <div class="mt-1">
                                                                                    <p class="text-right">(Updated:
                                                                                        {{ $item->updated_at->format('d-M-Y') }})
                                                                                    </p>
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                @if (round($persentase) >= 100)
                                                                                    <div
                                                                                        class="badge badge-opacity-success">
                                                                                        Completed</div>
                                                                                @else
                                                                                    <div
                                                                                        class="badge badge-opacity-warning">
                                                                                        On Pogress</div>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach

                                                                </tbody>
                                                            </table>
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
        // Periksa RFI untuk Notifikasi
        let data_rfi = <?php echo json_encode($data_rfi); ?>;
        if (data_rfi > 0) {
            let notification_rfi = document.getElementById("notification_rfi");
            notification_rfi.classList.add("bell-notif");
        }

        // {{-- JS TREN TEMUAN --}}
        let temuan = <?php echo json_encode($temuan); ?>;
        let perbaikan_temuan = <?php echo json_encode($perbaikan_temuan); ?>;
        let monitoring_temuan = <?php echo json_encode($monitoring_temuan); ?>;
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
                    text: 'Temuan'
                }
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                    type: 'column',
                    name: 'Temuan baru',
                    showInLegend: true,
                    color: 'red',
                    data: temuan,
                },
                // {
                //     type: 'column',
                //     name: 'Temuan monitoring',
                //     showInLegend: true,
                //     color: 'yellow',
                //     data: monitoring_temuan,
                // },
                {
                    type: 'column',
                    name: 'Temuan closed',
                    showInLegend: true,
                    color: 'green',
                    data: perbaikan_temuan,
                },
            ]
        });


        //{{-- JS MAJOR MINOR STATUS OPEN --}}
        // let minor = <?php echo json_encode($temuan_minor); ?>;
        // let moderate = <?php echo json_encode($temuan_moderate); ?>;
        // let mayor = <?php echo json_encode($temuan_mayor); ?>;
        let open = <?php echo json_encode($temuan_open->count()); ?>;
        let monitoring = <?php echo json_encode($temuan_monitoring->count()); ?>;
        let close = <?php echo json_encode($temuan_close->count()); ?>;
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
                colors: ['red', 'yellow', 'green'],
                data: [
                    ['Open', open],
                    ['Monitoring', monitoring],
                    ['Closed', close],
                ]
            }]
        });

        //{{-- JS DEFECT PART --}}
        let trackbed = <?php echo json_encode($defect_trackbed); ?>;
        let sleeper = <?php echo json_encode($defect_sleeper); ?>;
        let rail = <?php echo json_encode($defect_rail); ?>;
        let fastening = <?php echo json_encode($defect_fastening); ?>;
        let lainnya = <?php echo json_encode($defect_lainnya); ?>;
        Highcharts.chart('defect-part-chart', {
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
                    ['Trackbed', trackbed],
                    ['Sleeper', sleeper],
                    ['Fastening System', fastening],
                    ['Rail', rail],
                    ['Lainnya', lainnya],
                ]
            }]
        });

        //{{-- JS SEBARAN Per LINE --}}
        let persentase_UT = <?php echo json_encode($persentase_UT); ?>;
        let persentase_DT = <?php echo json_encode($persentase_DT); ?>;
        let persentase_MT = <?php echo json_encode($persentase_MT); ?>;
        let persentase_DAL = <?php echo json_encode($persentase_DAL); ?>;
        let persentase_TB = <?php echo json_encode($persentase_TB); ?>;
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

            series: [{
                name: 'Line',
                colorByPoint: true,
                data: [{
                        name: 'Up Track',
                        y: persentase_UT,
                    },
                    {
                        name: 'Down Track',
                        y: persentase_DT,
                    },
                    {
                        name: 'Middle Track',
                        y: persentase_MT,
                    },
                    {
                        name: 'DAL',
                        y: persentase_DAL,
                    },
                    {
                        name: 'TB',
                        y: persentase_TB,
                    },
                ]
            }]
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
                        }, {
                            name: 'St.ASEAN',
                            value: 195.2
                        },
                        {
                            name: 'ASEAN-SNY',
                            value: 195.2
                        }, {
                            name: 'St.SNY',
                            value: 195.2
                        }, {
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
                        }, {
                            name: 'BNH-STB',
                            value: 195.2
                        }, {
                            name: 'St.STB',
                            value: 195.2
                        },
                        {
                            name: 'STB-DKA',
                            value: 195.2
                        }, {
                            name: 'St.DKA',
                            value: 195.2
                        }, {
                            name: 'DKA-BHI',
                            value: 195.2
                        }, {
                            name: 'St.BHI',
                            value: 195.2
                        }
                    ]
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
                        }, {
                            name: 'St.ASEAN',
                            value: 195.2
                        },
                        {
                            name: 'ASEAN-SNY',
                            value: 195.2
                        }, {
                            name: 'St.SNY',
                            value: 195.2
                        }, {
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
                        }, {
                            name: 'BNH-STB',
                            value: 195.2
                        }, {
                            name: 'St.STB',
                            value: 195.2
                        },
                        {
                            name: 'STB-DKA',
                            value: 195.2
                        }, {
                            name: 'St.DKA',
                            value: 195.2
                        }, {
                            name: 'DKA-BHI',
                            value: 195.2
                        }, {
                            name: 'St.BHI',
                            value: 195.2
                        }
                    ]
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
                        }
                    ]
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
                        }
                    ]
                }
            ]

        });
    </script>
@endsection
