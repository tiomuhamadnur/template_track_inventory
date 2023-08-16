@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title>Accelerometer | CPWTM</title>
@endsection

@section('sub-content')
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
                            <h4 class="card-title">Data Summary Accelerometer</h4>
                            <div class="btn-group">
                                <a href="{{ route('accelerometer.index') }}" class="btn btn-outline-dark btn-lg me-0"
                                    type="button">
                                    <i class="mdi mdi-arrow-left"></i>
                                    Back
                                </a>
                                <a href="#" class="btn btn-lg btn-outline-info ms-0" data-bs-toggle="modal"
                                    data-bs-target="#ModalExportExcel" title="Export to Excel File">
                                    <i class="mdi mdi-file-export"></i>
                                </a>
                            </div>
                            <table>
                                <tr>
                                    <td>Examiner</td>
                                    <td> : </td>
                                    <td>{{ $jadwal->pic }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td> : </td>
                                    <td>{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d F Y') }}</td>
                                </tr>
                            </table>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center fw-bolder">
                                            <th class="align-middle" rowspan="2">NO</th>
                                            <th class="align-middle" rowspan="2">AREA</th>
                                            <th colspan="3">UP TRACK</th>
                                            <th colspan="3">DOWN TRACK</th>
                                        </tr>
                                        <tr class="text-center fw-bolder">
                                            <th>Lt-X</th>
                                            <th>Lt-Y</th>
                                            <th>Lt-Z</th>
                                            <th>Lt-X</th>
                                            <th>Lt-Y</th>
                                            <th>Lt-Z</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <td>1</td>
                                            <td>LBB-FTM</td>
                                            <td>{{ $LBB_FTM_UT_X ?? '' }}</td>
                                            <td>{{ $LBB_FTM_UT_Y ?? '' }}</td>
                                            <td>{{ $LBB_FTM_UT_Z ?? '' }}</td>
                                            <td>{{ $LBB_FTM_DT_X ?? '' }}</td>
                                            <td>{{ $LBB_FTM_DT_Y ?? '' }}</td>
                                            <td>{{ $LBB_FTM_DT_Z ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>FTM-CPR<br></td>
                                            <td>{{ $FTM_CPR_UT_X ?? '' }}</td>
                                            <td>{{ $FTM_CPR_UT_Y ?? '' }}</td>
                                            <td>{{ $FTM_CPR_UT_Z ?? '' }}</td>
                                            <td>{{ $FTM_CPR_DT_X ?? '' }}</td>
                                            <td>{{ $FTM_CPR_DT_Y ?? '' }}</td>
                                            <td>{{ $FTM_CPR_DT_Z ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>CPR-HJN</td>
                                            <td>{{ $CPR_HJN_UT_X ?? '' }}</td>
                                            <td>{{ $CPR_HJN_UT_Y ?? '' }}</td>
                                            <td>{{ $CPR_HJN_UT_Z ?? '' }}</td>
                                            <td>{{ $CPR_HJN_DT_X ?? '' }}</td>
                                            <td>{{ $CPR_HJN_DT_Y ?? '' }}</td>
                                            <td>{{ $CPR_HJN_DT_Z ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>HJN-BLA</td>
                                            <td>{{ $HJN_BLA_UT_X ?? '' }}</td>
                                            <td>{{ $HJN_BLA_UT_Y ?? '' }}</td>
                                            <td>{{ $HJN_BLA_UT_Z ?? '' }}</td>
                                            <td>{{ $HJN_BLA_DT_X ?? '' }}</td>
                                            <td>{{ $HJN_BLA_DT_Y ?? '' }}</td>
                                            <td>{{ $HJN_BLA_DT_Z ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>BLA-BLM</td>
                                            <td>{{ $BLA_BLM_UT_Y ?? '' }}</td>
                                            <td>{{ $BLA_BLM_UT_X ?? '' }}</td>
                                            <td>{{ $BLA_BLM_UT_Z ?? '' }}</td>
                                            <td>{{ $BLA_BLM_DT_X ?? '' }}</td>
                                            <td>{{ $BLA_BLM_DT_Y ?? '' }}</td>
                                            <td>{{ $BLA_BLM_DT_Z ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>BLM-ASN</td>
                                            <td>{{ $BLM_ASN_UT_Y ?? '' }}</td>
                                            <td>{{ $BLM_ASN_UT_X ?? '' }}</td>
                                            <td>{{ $BLM_ASN_UT_Z ?? '' }}</td>
                                            <td>{{ $BLM_ASN_DT_X ?? '' }}</td>
                                            <td>{{ $BLM_ASN_DT_Y ?? '' }}</td>
                                            <td>{{ $BLM_ASN_DT_Z ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>ASN-SNY</td>
                                            <td>{{ $ASN_SNY_UT_Y ?? '' }}</td>
                                            <td>{{ $ASN_SNY_UT_X ?? '' }}</td>
                                            <td>{{ $ASN_SNY_UT_Z ?? '' }}</td>
                                            <td>{{ $ASN_SNY_DT_X ?? '' }}</td>
                                            <td>{{ $ASN_SNY_DT_Y ?? '' }}</td>
                                            <td>{{ $ASN_SNY_DT_Z ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>SNY-IST</td>
                                            <td>{{ $SNY_IST_UT_Y ?? '' }}</td>
                                            <td>{{ $SNY_IST_UT_X ?? '' }}</td>
                                            <td>{{ $SNY_IST_UT_Z ?? '' }}</td>
                                            <td>{{ $SNY_IST_DT_X ?? '' }}</td>
                                            <td>{{ $SNY_IST_DT_Y ?? '' }}</td>
                                            <td>{{ $SNY_IST_DT_Z ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>IST-BNH</td>
                                            <td>{{ $IST_BNH_UT_Y ?? '' }}</td>
                                            <td>{{ $IST_BNH_UT_X ?? '' }}</td>
                                            <td>{{ $IST_BNH_UT_Z ?? '' }}</td>
                                            <td>{{ $IST_BNH_DT_X ?? '' }}</td>
                                            <td>{{ $IST_BNH_DT_Y ?? '' }}</td>
                                            <td>{{ $IST_BNH_DT_Z ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>BNH-STB</td>
                                            <td>{{ $BNH_STB_UT_Y ?? '' }}</td>
                                            <td>{{ $BNH_STB_UT_X ?? '' }}</td>
                                            <td>{{ $BNH_STB_UT_Z ?? '' }}</td>
                                            <td>{{ $BNH_STB_DT_X ?? '' }}</td>
                                            <td>{{ $BNH_STB_DT_Y ?? '' }}</td>
                                            <td>{{ $BNH_STB_DT_Z ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>11<br></td>
                                            <td>STB-DKA</td>
                                            <td>{{ $STB_DKA_UT_Y ?? '' }}</td>
                                            <td>{{ $STB_DKA_UT_X ?? '' }}</td>
                                            <td>{{ $STB_DKA_UT_Z ?? '' }}</td>
                                            <td>{{ $STB_DKA_DT_X ?? '' }}</td>
                                            <td>{{ $STB_DKA_DT_Y ?? '' }}</td>
                                            <td>{{ $STB_DKA_DT_Z ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>DKA-BHI</td>
                                            <td>{{ $DKA_BHI_UT_Y ?? '' }}</td>
                                            <td>{{ $DKA_BHI_UT_X ?? '' }}</td>
                                            <td>{{ $DKA_BHI_UT_Z ?? '' }}</td>
                                            <td>{{ $DKA_BHI_DT_X ?? '' }}</td>
                                            <td>{{ $DKA_BHI_DT_Y ?? '' }}</td>
                                            <td>{{ $DKA_BHI_DT_Z ?? '' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="table-responsive mt-5">
                                <div id="chart-ut" class="border rounded"></div>
                            </div>

                            <div class="table-responsive mt-5">
                                <div id="chart-dt" class="border rounded"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Export Excel -->
    <div class="modal fade" id="ModalExportExcel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdminTitle">Apakah anda yakin?</h5>
                </div>
                <div class="modal-body pt-3 mb-0">
                    <div class="p-2 text-center">
                        <h1 class="text-center align-middle text-success mt-2" style="font-size: 100px">
                            <i class="mdi mdi-file-excel mx-auto"></i>
                        </h1>
                        <div class="text-slate-500 mt-2">File excel akan didownload sesuai data yang ditampilkan pada
                            halaman ini.</div>
                        <form id="form_export_excel" action="{{ route('accelerometer.export.excel') }}" method="GET">
                            <input type="text" name="jadwal_id" value="{{ $jadwal->id }}" hidden>
                        </form>
                    </div>
                </div>

                <div class="modal-footer mt-2">
                    <button type="submit" formtarget="_blank" form="form_export_excel" onclick="closeModal()"
                        class="btn btn-success justify-content-center">
                        Download Excel
                    </button>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Export Excel -->
@endsection

@section('javascript')
    <script>
        let threshold_very_good_value = 83;
        let threshold_good_value = 88;
        let threshold_very_good = [];
        let threshold_good = [];
        let tanggal = <?php echo json_encode(date('d F Y', strtotime($jadwal->tanggal))); ?>;
        let examiner = <?php echo json_encode($jadwal->pic); ?>;
        let area = <?php echo json_encode($area); ?>;
        let acc_ut_x = <?php echo json_encode($acc_ut_x); ?>;
        let acc_ut_y = <?php echo json_encode($acc_ut_y); ?>;
        let acc_ut_z = <?php echo json_encode($acc_ut_z); ?>;

        let acc_dt_x = <?php echo json_encode($acc_dt_x); ?>;
        let acc_dt_y = <?php echo json_encode($acc_dt_y); ?>;
        let acc_dt_z = <?php echo json_encode($acc_dt_z); ?>;

        for (let i = 0; i < area.length; i++) {
            threshold_very_good.push(threshold_very_good_value);
            threshold_good.push(threshold_good_value);
        }

        Highcharts.chart('chart-ut', {
            title: {
                text: 'Accelerometer Up Track',
            },
            subtitle: {
                text: '(Tanggal: ' + tanggal + ' | Examiner: ' + examiner + ')',
            },
            xAxis: {
                categories: area,
            },
            yAxis: {
                title: {
                    text: 'Nilai Goyangan (dB)'
                }
            },
            plotOptions: {
                series: {
                    allowPointSelect: true,
                },
            },
            series: [{
                    type: 'line',
                    name: 'very good category',
                    showInLegend: false,
                    color: 'blue',
                    dashStyle: 'dash',
                    lineWidth: 2,
                    data: threshold_very_good,
                },
                {
                    type: 'line',
                    name: 'good category',
                    showInLegend: false,
                    color: 'black',
                    dashStyle: 'dash',
                    lineWidth: 2,
                    data: threshold_good,
                },
                {
                    type: 'line',
                    name: 'sumbu X',
                    showInLegend: true,
                    color: 'green',
                    data: acc_ut_x,
                },
                {
                    type: 'line',
                    name: 'sumbu Y',
                    showInLegend: true,
                    color: 'red',
                    data: acc_ut_y,
                },
                {
                    type: 'line',
                    name: 'sumbu Z',
                    showInLegend: true,
                    color: 'orange',
                    data: acc_ut_z,
                }
            ]
        });

        Highcharts.chart('chart-dt', {
            title: {
                text: 'Accelerometer Up Track'
            },
            subtitle: {
                text: '(Tanggal: ' + tanggal + ' | Examiner: ' + examiner + ')',
            },
            xAxis: {
                categories: area,
            },
            yAxis: {
                title: {
                    text: 'Nilai Goyangan (dB)'
                }
            },
            plotOptions: {
                series: {
                    allowPointSelect: true,
                },
            },
            series: [{
                    type: 'line',
                    name: 'very good category',
                    showInLegend: false,
                    color: 'blue',
                    dashStyle: 'dash',
                    lineWidth: 2,
                    data: threshold_very_good,
                },
                {
                    type: 'line',
                    name: 'good category',
                    showInLegend: false,
                    color: 'black',
                    dashStyle: 'dash',
                    lineWidth: 2,
                    data: threshold_good,
                },
                {
                    type: 'line',
                    name: 'sumbu X',
                    showInLegend: true,
                    color: 'green',
                    data: acc_dt_x,
                },
                {
                    type: 'line',
                    name: 'sumbu Y',
                    showInLegend: true,
                    color: 'red',
                    data: acc_dt_y,
                },
                {
                    type: 'line',
                    name: 'sumbu Z',
                    showInLegend: true,
                    color: 'orange',
                    data: acc_dt_z,
                }
            ]
        });

        function closeModal() {
            $("#ModalExportExcel").modal("hide");
        }
    </script>
@endsection
