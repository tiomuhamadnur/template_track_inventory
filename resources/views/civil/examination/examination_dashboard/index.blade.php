@extends('civil.examination.examination_layout.base')

@section('sub-title')
    <title>Dashboard | Civil</title>
@endsection

@section('sub-content')
<h4>Dashboard Temuan Mainline</h4>
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
                            <h5>Mapping Temuan Mainline</h5>
                        </div>
                        <p class="card-subtitle card-subtitle-dash">Mapping Area Mainline
                            @include('civil.examination.examination_dashboard.mappingcivil_svg')
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
                                                            {{-- {{ $temuan_baru_bulan_ini->count() }} --}}
                                                        </h2>
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
                                                            {{-- {{ $temuan_close_bulan_ini->count() }} --}}
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
                                                <div class="col-sm-6">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                                        <div>
                                                            <p class="text-small mb-1"><i>Open</i></p>
                                                            {{-- <a href="#"
                                                                title="Minor: {{ $temuan_minor }} | Moderate: {{ $temuan_moderate }} | Major: {{ $temuan_mayor }}">
                                                                <h4 class="mb-0 fw-bold text-danger">
                                                                    {{ $temuan_open->count() }}
                                                                </h4>
                                                            </a> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <p class="text-small mb-1"><i>Closed</i></p>
                                                            {{-- <a href="#"
                                                                title="Minor: {{ $temuan_close_minor }} | Moderate: {{ $temuan_close_moderate }} | Major: {{ $temuan_close_mayor }}">
                                                                <h4 class="mb-0 fw-bold text-success">
                                                                    {{ $temuan_close->count() }}
                                                                </h4>
                                                            </a> --}}
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
                                                </p>
                                            <div id="temuan-per-part" class="mt-5 text-center"></div>
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
                                                <h4 class="card-title card-title-dash">Defect per Stasiun</h4>
                                            </div>
                                            <p class="card-subtitle card-subtitle-dash">Persentase Sebaran Defect per Stasiun</p>
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

const chart = new Highcharts.Chart({
    chart: {
        renderTo: 'defect-per-stasiun',
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 15,
            beta: 15,
            depth: 50,
            viewDistance: 25
        }
    },
    xAxis: {
        categories: ['St. LBB', 'St. FTM', 'St. CPR', 'St. HJN', 'St. BLA', 'St. BLM',
            'St. ASEAN', 'St. SNY', 'St. IST', 'St. BNH', 'St. STB', 'St. DKA', 'St. BHI']
    },
    yAxis: {
        title: {
            enabled: false
        }
    },
    tooltip: {
        headerFormat: '<b>{point.key}</b><br>',
        pointFormat: 'Total Temuan: {point.y}'
    },
    title: {
        text: '',
        align: 'left'
    },
    legend: {
        enabled: false
    },
    plotOptions: {
        column: {
            depth: 25
        }
    },
    series: [{
        data: [10,12,23,12,12,34,13,13,12,10,12,10,9],
        colorByPoint: true
    }]
});

Highcharts.setOptions({
    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.5,
                cy: 0.3,
                r: 0.7
            },
            stops: [
                [0, color],
                [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    })
});

// Build the chart
Highcharts.chart('temuan-per-part', {
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
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        name: 'Share',
        data: [
            { name: 'Tunnel', y: 14 },
            { name: 'Breaking Pad', y: 12.93 },
            { name: 'Viaduct', y: 4.73 },
            { name: 'Balok', y: 2.50 },
            { name: 'Pedestal', y: 1.65 },
            { name: 'Other', y: 4.93 }
        ]
    }]
});

    </script>


@endsection
