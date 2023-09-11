@extends('depo.depo_layout.base')

@section('sub-title')
    <title> Dashboard | CPWTM</title>
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
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card card-rounded shadow">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="card-title card-title-dash">Mapping Depo</h4>
                                                </div>
                                                <p class="card-subtitle card-subtitle-dash">Mapping Sebaran Temuan di Depo
                                                </p>
                                                @include('depo.depo_dashboard.mapping_svg')
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

    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card card-rounded shadow">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="card-title card-title-dash">Defect per Line</h4>
                                                </div>
                                                <p class="card-subtitle card-subtitle-dash">Presentase Sebaran Temuan Open
                                                    Per Line Area Depo</p>
                                                <div id="container" class="mt-5 text-center"></div>
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

    <div class="row">
        <div class="col-lg-8 d-flex flex-column grid-margin stretch-card animate__animated animate__zoomIn">
            <div class="card card-rounded shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title card-title-dash">Defect Part</h4>
                            </div>
                            <p class="card-subtitle card-subtitle-dash">Sebaran Defect Berdasarkan Part
                                di Depo</p>
                            <div id="defect-part-depo" class="mt-5 text-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex flex-column animate__animated animate__zoomIn">
            <div class="row flex-grow">
                <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                    <div class="card bg-primary card-rounded shadow">
                        <a href="#">
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
                                        <h2 class="text-white fw-bolder">
                                            {{ $temuan_baru_bulan_ini->count() }}
                                        </h2>
                                    </div>
                                    <div class="col-sm-5">
                                        <p class="status-summary-ight-white mb-1">
                                            <span class="text-white">
                                                Closing Temuan
                                            </span>
                                        </p>
                                        <h2 class="text-white fw-bolder">
                                            {{ $temuan_close_bulan_ini->count() }}
                                        </h2>
                                    </div>
                                    <div class="col-sm-12">
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
                    <div class="card card-rounded shadow">
                        <div class="card-body">
                            <div class="row">
                                <h4 class="text-center fw-bolder">Temuan Total</h4>
                                <div class="col-sm-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                        <div>
                                            <p class="text-small mb-1"><i>Open</i></p>
                                            <a href="#"
                                                title="Minor: {{ $temuan_minor }} | Moderate: {{ $temuan_moderate }} | Major: {{ $temuan_mayor }}">
                                                <h4 class="mb-0 fw-bolder text-danger">
                                                    {{ $temuan_open->count() }}
                                                </h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                        <div>
                                            <p class="text-small mb-1"><i>Monitoring</i></p>
                                            <a href="#"
                                                title="Minor: {{ $temuan_monitoring_minor }} | Moderate: {{ $temuan_monitoring_moderate }} | Major: {{ $temuan_monitoring_mayor }}">
                                                <h4 class="mb-0 fw-bolder text-warning">
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
                                                <h4 class="mb-0 fw-bolder text-success">
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
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card animate__animated animate__zoomIn">
            <div class="card card-rounded shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title card-title-dash">Klasifikasi Defect</h4>
                            </div>
                            <p class="card-subtitle card-subtitle-dash">Klasifikasi Defect Berdasarkan
                                Justifikasi Tim Track Examination
                            </p>
                            <div id="klasifikasi-depo"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        // Periksa RFI untuk Notifikasi
        let data_rfi = <?php echo json_encode($data_rfi); ?>;
        if (data_rfi > 0) {
            let notification_rfi = document.getElementById("notification_rfi");
            notification_rfi.classList.add("bell-notif");
        }
        // JS JUMLAH TEMUAN DEPO
        let temuan_line_depo = <?php echo json_encode($temuan_line_depo); ?>;
        let line_code = <?php echo json_encode($line_code); ?>;
        const chart = Highcharts.chart('container', {
            title: {
                text: '',
                align: 'left'
            },
            subtitle: {
                text: '',
                align: 'left'
            },
            yAxis: {
                title: {
                    text: 'Jumlah Temuan'
                }
            },
            xAxis: {
                categories: line_code,
            },
            series: [{
                type: 'column',
                name: 'jumlah temuan',
                colorByPoint: true,
                data: temuan_line_depo,
                showInLegend: false
            }]
        });

        document.getElementById('plain').addEventListener('click', () => {
            chart.update({
                chart: {
                    inverted: false,
                    polar: false
                },
                subtitle: {
                    text: '' +
                        '' +
                        ''
                }
            });
        });

        document.getElementById('inverted').addEventListener('click', () => {
            chart.update({
                chart: {
                    inverted: true,
                    polar: false
                },
                subtitle: {
                    text: '' +
                        '' +
                        ''
                }
            });
        });

        document.getElementById('polar').addEventListener('click', () => {
            chart.update({
                chart: {
                    inverted: false,
                    polar: true
                },
                subtitle: {
                    text: '' +
                        '"' +
                        ''
                }
            });
        });
    </script>

    <script>
        // JS KLASIFIKASI DEPO
        let minor = <?php echo json_encode($temuan_minor); ?>;
        let moderate = <?php echo json_encode($temuan_moderate); ?>;
        let mayor = <?php echo json_encode($temuan_mayor); ?>;
        Highcharts.chart('klasifikasi-depo', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: '',
                align: 'left'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                    }
                }
            },
            series: [{
                name: 'jumlah temuan',
                colorByPoint: true,
                data: [{
                    name: 'Major',
                    y: mayor,
                }, {
                    name: 'Minor',
                    y: minor,
                }, {
                    name: 'Moderate',
                    y: moderate,
                }]
            }]
        });
    </script>

    <script>
        let ballast = <?php echo json_encode($defect_ballast); ?>;
        let sleeper = <?php echo json_encode($defect_sleeper); ?>;
        let rail = <?php echo json_encode($defect_rail); ?>;
        let fastening = <?php echo json_encode($defect_fastening); ?>;
        let lainnya = <?php echo json_encode($defect_lainnya); ?>;

        Highcharts.chart('defect-part-depo', {
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
                    ['Ballast', ballast],
                    ['Rail Defect', rail],
                    ['Fastening System', fastening],
                    ['Sleeper', sleeper],
                    ['Lainnya', lainnya],
                ]
            }]
        });
    </script>
@endsection
