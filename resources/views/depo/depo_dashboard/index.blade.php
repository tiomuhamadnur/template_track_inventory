@extends('depo.depo_layout.base')

@section('sub-title')
    <title> Dashboard | TCSM</title>
@endsection
@section('sub-content')
    <h4>Dashboard Depo</h4>
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="card-title card-title-dash">Defect per Line</h4>
                                                </div>
                                                <p class="card-subtitle card-subtitle-dash">Presentase Sebaran Temuan Per
                                                    Line Area Depo</p>
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
        <div class="col-8 grid-margin stretch-card animate__animated animate__zoomIn">
            <div class="card card-rounded">
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
                                        <h2 class="text-white fw-bolder">
                                            0
                                        </h2>
                                    </div>
                                    <div class="col-sm-5">
                                        <p class="status-summary-ight-white mb-1">
                                            <span>
                                                Closing Temuan
                                            </span>
                                        </p>
                                        <h2 class="text-white fw-bolder">
                                            0
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
                                <h4 class="text-center fw-bolder">Temuan Total</h4>
                                <div class="col-sm-6">
                                    <div
                                        class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                        <div>
                                            <p class="text-small mb-2">Temuan Open</p>
                                            <a href="#"
                                                title="Minor: 0 | Moderate: 0 | Major: 0">
                                                <h4 class="mb-0 fw-bold text-danger">
                                                    0
                                                </h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="text-small mb-2">Temuan Closed</p>
                                            <h4 class="mb-0 fw-bold text-success">
                                                0
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
        <div class="col-12 grid-margin stretch-card animate__animated animate__zoomIn">
            <div class="card card-rounded">
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
    // JS JUMLAH TEMUAN DEPO
    const chart = Highcharts.chart('container', {
    title: {
        text: '',
        align: 'left'
    },
    subtitle: {
        text: '',
        align: 'left'
    },
    xAxis: {
        categories: ['ST1', 'ST2', 'ST3', 'ST4', 'ST5', 'ST6', 'CT1', 'CT2', 'WLT', 'ERT', 'TDT1', 'TDT2', 'INT1', 'INT2', 'SLT', 'WT1', 'WT2', 'WT3', 'IFLT', 'IFT1', 'IFT2', 'IFT3', 'LT']
    },
    series: [{
        type: 'column',
        name: 'Temuan',
        colorByPoint: true,
        data: [10, 10, 34, 11, 12, 11, 9, 29, 10, 11, 12, 35, 13, 13, 10, 12, 12, 9, 17, 12, 13, 14, 14],
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
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Presentase',
        colorByPoint: true,
        data: [{
            name: 'Major',
            y: 10.10,
        }, {
            name: 'Minor',
            y: 4.40
        }, {
            name: 'Moderate',
            y: 4.84
        }]
    }]
});

</script>

<script>
    //JS DEFECT PART
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
        name: 'Medals',
        data: [
            ['Ballast', 16],
            ['Rail Defect', 12],
            ['Fastening System', 8],
            ['Sleeper', 8],
            ['Lainnya', 8]

        ]
    }]
});

</script>
@endsection
