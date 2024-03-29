@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title> Dashboard Admin | P & C</title>
@endsection
@section('sub-content')
    <h4>Dashboard Master Data Planning & Control</h4>
    <div class="d-sm-flex align-items-center justify-content-between border-bottom mb-3">
        <div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-lg-6 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="d-sm-flex justify-content-between align-items-start">
                                            <div>
                                                <h4 class="card-title card-title-dash">Grafik Sebaran Tools Dept. CPWTM</h4>
                                                <h5 class="card-subtitle card-subtitle-dash">
                                                    <span>
                                                        Update
                                                        {{ \Carbon\Carbon::now()->format('F Y') }}
                                                    </span>
                                                </h5>
                                            </div>
                                        </div>
                                        <div id="sebaran-tools" style="width: 100%; height: 250px;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="d-sm-flex justify-content-between align-items-start">
                                            <div>
                                                <h4 class="card-title card-title-dash">Penggunaan Consumable Terkini Dept.
                                                    CPWTM (belom juga )</h4>
                                                <h5 class="card-subtitle card-subtitle-dash">
                                                    <span>
                                                        Update
                                                        {{ \Carbon\Carbon::now()->format('F Y') }}
                                                    </span>
                                                </h5>
                                            </div>
                                        </div>
                                        <div id="consumable-usage" style="width: 100%; height: 250px;">
                                            {{-- <canvas id="trenOpen"></canvas> --}}
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
                            <div class="col-lg-4 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card card-rounded shadow">
                                    <div class="card-body">
                                        <div class="row">
                                            <h4 class="text-center fw-bolder" style="padding-bottom: 10px;">Contract Status
                                            </h4>
                                            <div class="col-sm-12 text-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('masterdata-contract.filter', ['status' => 'open']) }}"
                                                        title="">
                                                        <h3 class="mb-0 fw-bold text-primary">
                                                            {{ $on_going_contract }}
                                                            <br>
                                                            <p class="text-dark">On Going</p>
                                                        </h3>
                                                    </a>
                                                    <div class="mx-5"></div>
                                                    <a href="/masterdata/contract/filter?status=close" title="">
                                                        <h3 class="mb-0 fw-bold text-primary">
                                                            {{ $finished_contract }}
                                                            <br>
                                                            <p class="text-dark">Finished</p>
                                                        </h3>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card card-rounded shadow">
                                    <div class="card-body">
                                        <div class="row">
                                            <h4 class="text-center fw-bolder" style="padding-bottom: 10px;">Informasi
                                                Penyerapan Anggaran (%)</h4>
                                            <div class="col-sm-12 text-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('masterdata-fund.index') }}" title="">
                                                        <h3 class="mb-0 fw-bold text-primary">
                                                            {{ $persen_penyerapan ?? 0 }}
                                                            <br>
                                                            <p class="text-dark">Penyerapan (%)</p>
                                                        </h3>
                                                    </a>
                                                    <div class="mx-5"></div>
                                                    <a href="{{ route('masterdata-fund.index') }}" title="">
                                                        <h3 class="mb-0 fw-bold text-primary">
                                                            {{ $persen_sisa_anggaran ?? 0 }}
                                                            <br>
                                                            <p class="text-dark">Sisa (%)</p>
                                                        </h3>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card card-rounded shadow">
                                    <div class="card-body">
                                        <div class="row">
                                            <h4 class="text-center fw-bolder" style="padding-bottom: 10px;">Informasi
                                                Penyerapan Anggaran (Rp)</h4>
                                            <div class="col-sm-12 text-center">
                                                <div class="btn-group">
                                                    <a href="#" title="">
                                                        <h3 class="mb-0 fw-bold text-primary" style="font-size: 15px;">
                                                            {{ formatRupiah($nominal_penyerapan_anggaran, true) }}
                                                            <br>
                                                            <p class="text-dark">Penyerapan (Rp)</p>
                                                        </h3>
                                                    </a>
                                                    <div class="mx-5"></div>
                                                    <a href="#" title="">
                                                        <h3 class="mb-0 fw-bold text-primary" style="font-size: 15px;">
                                                            {{ formatRupiah($nominal_sisa_anggaran, true) }}
                                                            <br>
                                                            <p class="text-dark">Sisa (Rp)</p>
                                                        </h3>
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
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 grid-margin stretch-card animate__animated animate__zoomIn">
            <div class="card card-rounded shadow">
                <div class="card-body">
                    <div>
                        <h5>Fund Budget Information</h5>
                        <h5 class="card-subtitle card-subtitle-dash">
                            <span>
                                Update
                                {{ \Carbon\Carbon::now()->format('F Y') }}
                            </span>
                        </h5>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 grid-margin stretch-card animate__animated animate__zoomIn">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div>
                                            <h4 class="card-title card-title-dash">Budget J1933 (Koordinasi)</h4>
                                        </div>
                                    </div>
                                    <div id="budget-J1933" style="width: 100%; height: 250px;">
                                        {{-- <canvas id="trenOpen"></canvas> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 grid-margin stretch-card animate__animated animate__zoomIn">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div>
                                            <h4 class="card-title card-title-dash">Budget J1715 (Perizinan & Sertifikasi)
                                            </h4>
                                        </div>
                                    </div>
                                    <div id="budget-J1715" style="width: 100%; height: 250px;">
                                        {{-- <canvas id="trenOpen"></canvas> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 grid-margin stretch-card animate__animated animate__zoomIn">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div>
                                            <h4 class="card-title card-title-dash">Budget J1932 (Thirdparty)</h4>
                                        </div>
                                    </div>
                                    <div id="budget-J1932" style="width: 100%; height: 250px;">
                                        {{-- <canvas id="trenOpen"></canvas> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 grid-margin stretch-card animate__animated animate__zoomIn">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div>
                                            <h4 class="card-title card-title-dash">Budget J1931 (OPEX)</h4>
                                        </div>
                                    </div>
                                    <div id="budget-J1931" style="width: 100%; height: 250px;">
                                        {{-- <canvas id="trenOpen"></canvas> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 grid-margin stretch-card animate__animated animate__zoomIn">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div>
                                            <h4 class="card-title card-title-dash">Budget J1930 (CAPEX)</h4>
                                        </div>
                                    </div>
                                    <div id="budget-J1930" style="width: 100%; height: 250px;">
                                        {{-- <canvas id="trenOpen"></canvas> --}}
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
            /////////// SEBARAN TOOLS ///////////
            // Gudang B
            let tools_gudangb_pwr = <?php echo json_encode($tools_gudangb_pwr); ?>;
            let tools_gudangb_pwm = <?php echo json_encode($tools_gudangb_pwm); ?>;
            let tools_gudangb_civilr = <?php echo json_encode($tools_gudangb_civilr); ?>;
            let tools_gudangb_civilm = <?php echo json_encode($tools_gudangb_civilm); ?>;
            // D06
            let tools_d06_pwr = <?php echo json_encode($tools_d06_pwr); ?>;
            let tools_d06_pwm = <?php echo json_encode($tools_d06_pwm); ?>;
            let tools_d06_civilr = <?php echo json_encode($tools_d06_civilr); ?>;
            let tools_d06_civilm = <?php echo json_encode($tools_d06_civilm); ?>;
            // Ruang Track
            let tools_rtrack_pwr = <?php echo json_encode($tools_rtrack_pwr); ?>;
            let tools_rtrack_pwm = <?php echo json_encode($tools_rtrack_pwm); ?>;
            let tools_rtrack_civilr = <?php echo json_encode($tools_rtrack_civilr); ?>;
            let tools_rtrack_civilm = <?php echo json_encode($tools_rtrack_civilm); ?>;
            // Ruang Track
            let tools_unknown_pwr = <?php echo json_encode($tools_unknown_pwr); ?>;
            let tools_unknown_pwm = <?php echo json_encode($tools_unknown_pwm); ?>;
            let tools_unknown_civilr = <?php echo json_encode($tools_unknown_civilr); ?>;
            let tools_unknown_civilm = <?php echo json_encode($tools_unknown_civilm); ?>;

            Highcharts.chart('sebaran-tools', {
                chart: {
                    type: 'column'
                },
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
                    categories: ['Gudang B', 'D06', 'Ruang Track', 'Unknown'],
                    crosshair: true,
                    accessibility: {
                        description: 'Countries'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jenis'
                    }
                },
                tooltip: {
                    valueSuffix: ' Jenis Tools'
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                        name: 'PW RAMS',
                        data: [
                            ['Gudang B', tools_gudangb_pwr],
                            ['D06', tools_d06_pwr],
                            ['Ruang Track', tools_rtrack_pwr],
                            ['Unknown', tools_unknown_pwr],
                        ]
                    },
                    {
                        name: 'PW MAINT',
                        data: [
                            ['Gudang B', tools_gudangb_pwm],
                            ['D06', tools_d06_pwm],
                            ['Ruang Track', tools_rtrack_pwm],
                            ['Unknown', tools_unknown_pwm],
                        ]
                    },
                    {
                        name: 'CIVIL RAMS',
                        data: [
                            ['Gudang B', tools_gudangb_civilr],
                            ['D06', tools_d06_civilr],
                            ['Ruang Track', tools_rtrack_civilr],
                            ['Unknown', tools_unknown_civilr],
                        ]
                    },
                    {
                        name: 'CIVIL MAINT',
                        data: [
                            ['Gudang B', tools_gudangb_civilm],
                            ['D06', tools_d06_civilm],
                            ['Ruang Track', tools_rtrack_civilm],
                            ['Unknown', tools_unknown_civilm],
                        ]
                    },
                ]
            });


            //////////// CONSUMABLE USAGE ///////////
            Highcharts.chart('consumable-usage', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: '',
                    align: 'left'
                },
                subtitle: {
                    text: '',
                    align: 'left'
                },
                xAxis: {
                    categories: ['Majun', 'WD-40', 'Gloves', 'Antirust Terami', 'Nitto', 'Damdex'],
                    crosshair: true,
                    accessibility: {
                        description: 'Jenis Material'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: ''
                    }
                },
                tooltip: {
                    valueSuffix: ''
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                        name: 'PW',
                        data: [10, 20, 12, 9, 0, 23]
                    },
                    {
                        name: 'CIVIL',
                        data: [12, 11, 32, 0, 2, 23]
                    }
                ]
            });


            //////////// BUDGETING J1933 ///////////
            Highcharts.chart('budget-J1933', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                },
                title: {
                    text: 'J1933',
                    align: 'center',
                    verticalAlign: 'middle',
                    y: 60
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
                        dataLabels: {
                            enabled: true,
                            distance: -50,
                            style: {
                                fontWeight: 'bold',
                                color: 'white'
                            }
                        },
                        startAngle: -90,
                        endAngle: 90,
                        center: ['50%', '75%'],
                        size: '150%'
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Budget',
                    innerSize: '50%',
                    data: [
                        ['Available', 73.86],
                        ['Paid', 11.97]

                    ]
                }]
            });

            //////////// BUDGETING J1715 ///////////
            Highcharts.chart('budget-J1715', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                },
                title: {
                    text: 'J1715',
                    align: 'center',
                    verticalAlign: 'middle',
                    y: 60
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
                        dataLabels: {
                            enabled: true,
                            distance: -50,
                            style: {
                                fontWeight: 'bold',
                                color: 'white'
                            }
                        },
                        startAngle: -90,
                        endAngle: 90,
                        center: ['50%', '75%'],
                        size: '150%'
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Budget',
                    innerSize: '50%',
                    data: [
                        ['Available', 13.86],
                        ['Paid', 71.97]

                    ]
                }]
            });

            //////////// BUDGETING J1932 ///////////
            Highcharts.chart('budget-J1932', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                },
                title: {
                    text: 'J1932',
                    align: 'center',
                    verticalAlign: 'middle',
                    y: 60
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
                        dataLabels: {
                            enabled: true,
                            distance: -50,
                            style: {
                                fontWeight: 'bold',
                                color: 'white'
                            }
                        },
                        startAngle: -90,
                        endAngle: 90,
                        center: ['50%', '75%'],
                        size: '150%'
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Budget',
                    innerSize: '50%',
                    data: [
                        ['Available', 43.86],
                        ['Paid', 41.97]

                    ]
                }]
            });


            //////////// BUDGETING J1931 ///////////
            Highcharts.chart('budget-J1931', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                },
                title: {
                    text: 'J1931',
                    align: 'center',
                    verticalAlign: 'middle',
                    y: 60
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
                        dataLabels: {
                            enabled: true,
                            distance: -50,
                            style: {
                                fontWeight: 'bold',
                                color: 'white'
                            }
                        },
                        startAngle: -90,
                        endAngle: 90,
                        center: ['50%', '75%'],
                        size: '150%'
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Budget',
                    innerSize: '50%',
                    data: [
                        ['Available', 53.86],
                        ['Paid', 31.97]

                    ]
                }]
            });

            //////////// BUDGETING J1930 ///////////
            Highcharts.chart('budget-J1930', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                },
                title: {
                    text: 'J1930',
                    align: 'center',
                    verticalAlign: 'middle',
                    y: 60
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
                        dataLabels: {
                            enabled: true,
                            distance: -50,
                            style: {
                                fontWeight: 'bold',
                                color: 'white'
                            }
                        },
                        startAngle: -90,
                        endAngle: 90,
                        center: ['50%', '75%'],
                        size: '150%'
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Budget',
                    innerSize: '50%',
                    data: [
                        ['Available', 23.86],
                        ['Paid', 61.97]

                    ]
                }]
            });
        </script>
    @endsection
