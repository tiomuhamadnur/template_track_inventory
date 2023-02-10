@extends('layout.form.form')

@section('head')
    <title>Data Summary Accelerometer_{{ $jadwal->tanggal }}_{{ $jadwal->pic }}</title>
@endsection

@section('body')
    <div class="body">
        <div class="page-wrapper p-t-45 p-b-50">
            <div class="wrapper wrapper--w790">
                <div class="">
                    <table class="table table-bordered border-dark rounded-3 bg-white">
                        <tbody>
                            <tr class="text-center align-content-center">
                                <th>
                                    <img src="{{ asset('build/assets/images/tcs.png') }}" style="height: 70px" alt="">
                                </th>
                                <th class="fw-bolder text-center align-middle">
                                    <h3>REPORT OF CLOSING ACTIVITY</h3>
                                    <h3>Accelerometer</h3>
                                </th>
                                <th>
                                    <img src="{{ asset('build/assets/images/tcs.PNG') }}" style="height: 70px"
                                        alt="">
                                </th>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-borderless rounded-3 bg-white">
                        <tbody>
                            <tr class="ms-lg-4">
                                <th style="width: 110px">
                                    <h5>PIC</h5>
                                </th>
                                <th class="text-center" style="width: 5px">
                                    <h5>
                                        :
                                    </h5>
                                </th>
                                <th>
                                    <h5>
                                        {{ $jadwal->pic }}
                                    </h5>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <h5>
                                        Section Head
                                    </h5>
                                </th>
                                <th class="text-center">
                                    <h5>
                                        :
                                    </h5>
                                </th>
                                <th>
                                    <h5>
                                        Hermawan Wisnu Wijanarko
                                    </h5>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <h5>
                                        Tanggal
                                    </h5>
                                </th>
                                <th class="text-center">
                                    <h5>
                                        :
                                    </h5>
                                </th>
                                <th>
                                    <h5>
                                        {{ $jadwal->tanggal }}
                                    </h5>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered border-dark rounded-3 bg-white">
                        <thead class="fw-bolder" style="background-color:#a2a2a2;">
                            <tr class="text-center">
                                <th class="align-middle" rowspan="2">NO</th>
                                <th class="align-middle" rowspan="2">AREA</th>
                                <th colspan="3">UP TRACK</th>
                                <th colspan="3">DOWN TRACK</th>
                            </tr>
                            <tr class="text-center">
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
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            window.print();
        });
    </script>
@endsection
