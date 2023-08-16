@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Data Individual Performance | CPWTM</title>
@endsection

@section('sub-content')
    <h4>Master Data > Individual Performance</h4>
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <div>
                    </div>
                </div>
                <div class="col-lg-12 grid-margin stretch-card mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Individual Performance (Filter: {{ $filter ?? '-' }})</h4>
                            <button class="btn btn-outline-dark btn-lg dropdown-toggle" type="button"
                                id="dropdownMenuIconButton1" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" style="margin-left: -10px;">
                                <i class="ti-filter"></i> Filter By Time
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                                <a class="dropdown-item" href="{{ route('performance.index', 'filter=this_month') }}">This
                                    Month</a>
                                <a class="dropdown-item" href="{{ route('performance.index', 'filter=this_year') }}">This
                                    Year</a>
                                <a class="dropdown-item" href="{{ route('performance.index', 'filter=all_time') }}">All
                                    Time</a>
                            </div>
                            <div class="table-responsive pt-3">
                                <div id="performance-rams" class="border rounded"></div>
                            </div>
                            <div class="table-responsive pt-5">
                                <div id="performance-maintenance" class="border rounded"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script type="text/javascript">
        function toggleModal(id) {
            $('#id').val(id);
        }

        let rams_team = <?php echo json_encode($rams_team); ?>;
        let maintenance_team = <?php echo json_encode($maintenance_team); ?>;
        let temuan_rams = <?php echo json_encode($temuan_rams); ?>;
        let rfi_maintenance = <?php echo json_encode($rfi_maintenance); ?>;

        Highcharts.chart('performance-rams', {
            title: {
                text: 'Permanent Way RAMS Team'
            },
            xAxis: {
                categories: rams_team,
            },
            yAxis: {
                title: {
                    text: 'Jumlah Temuan'
                }
            },
            plotOptions: {
                series: {
                    allowPointSelect: true,
                },
            },
            series: [{
                type: 'column',
                name: 'jumlah temuan',
                showInLegend: false,
                color: 'green',
                data: temuan_rams,
            }, ]
        });

        Highcharts.chart('performance-maintenance', {
            title: {
                text: 'Permanent Way Maintenance Team'
            },
            xAxis: {
                categories: maintenance_team,
            },
            yAxis: {
                title: {
                    text: 'Jumlah Perbaikan'
                }
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                type: 'column',
                name: 'jumlah perbaikan',
                showInLegend: false,
                color: 'orange',
                data: rfi_maintenance,
            }, ]
        });
    </script>
@endsection
