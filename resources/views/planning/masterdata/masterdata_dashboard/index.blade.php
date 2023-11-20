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
        <div class="col-sm-12 grid-margin stretch-card animate__animated animate__zoomIn"">
            <div class="card card-rounded shadow">
                <div class="card-body">
                    <div>
                        <h5>Budget</h5>
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
                                            <h4 class="card-title card-title-dash">Budget J1933</h4>
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
                                            <h4 class="card-title card-title-dash">Budget J02</h4>
                                        </div>
                                    </div>
                                    <div id="budget-J02" style="width: 100%; height: 250px;">
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
                                            <h4 class="card-title card-title-dash">Budget J03</h4>
                                        </div>
                                    </div>
                                    <div id="budget-J03" style="width: 100%; height: 250px;">
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
                                            <h4 class="card-title card-title-dash">Budget J04</h4>
                                        </div>
                                    </div>
                                    <div id="budget-J04" style="width: 100%; height: 250px;">
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
                                            <h4 class="card-title card-title-dash">Budget J05</h4>
                                        </div>
                                    </div>
                                    <div id="budget-J05" style="width: 100%; height: 250px;">
                                        {{-- <canvas id="trenOpen"></canvas> --}}
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
                            <div class="col-lg-6 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="d-sm-flex justify-content-between align-items-start">
                                            <div>
                                                <h4 class="card-title card-title-dash">Sebaran Tools Dept. CPWTM (belom diquery yaa)</h4>
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
                                                <h4 class="card-title card-title-dash">Penggunaan Consumable Terkini Dept. CPWTM (belom juga )</h4>
                                                <h5 class="card-subtitle card-subtitle-dash">
                                                    <span>
                                                        Update
                                                        {{ \Carbon\Carbon::now()->format('F Y') }}
                                                    </span>
                                                </h5>
                                            </div>
                                            <div id="performance-line-legend"></div>
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
@endsection


@section('javascript')

    <script>

        /////////// SEBARAN TOOLS ///////////
        Highcharts.chart('sebaran-tools', {
    chart: {
        type: 'bar'
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
        categories: ['D06', 'Gudang B', 'CPW Room', 'Stasiun', 'Dipinjam'],
        title: {
            text: null
        },
        gridLineWidth: 0.5,
        lineWidth: 0
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jenis (Type)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        },
        gridLineWidth: 0
    },
    tooltip: {
        valueSuffix: ''
    },
    plotOptions: {
        bar: {
            borderRadius: '50%',
            dataLabels: {
                enabled: true
            },
            groupPadding: 0.1
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 130,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Tools Section Permanent Way',
        data: [20, 2, 4, 1, 2]
    }, {
        name: 'Tools Section Civil',
        data: [34, 11, 5, 1, 1]
    }]
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
        text:
            '',
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
    series: [
        {
            name: 'Section Permanent Way',
            data: [10, 20, 12, 9, 0, 23]
        },
        {
            name: 'Section Civil',
            data: [12, 11, 32, 0, 2, 23]
        }
    ]
});


    //////////// BUDGETING J01 ///////////
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

//////////// BUDGETING J02 ///////////
Highcharts.chart('budget-J02', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: 'J02',
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

//////////// BUDGETING J03 ///////////
Highcharts.chart('budget-J03', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: 'J03',
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


//////////// BUDGETING J04 ///////////
Highcharts.chart('budget-J04', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: 'J04',
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

//////////// BUDGETING J05 ///////////
Highcharts.chart('budget-J05', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: 'J05',
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
    </script>


@endsection
