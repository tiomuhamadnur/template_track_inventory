@extends('layout.form.form')

@section('head')
    <title>Form Pemeriksaan Wesel {{ $wesel->wesel->name ?? '' }} ({{ $wesel->tanggal ?? '' }})</title>

    <style>
        .rotate {
            padding-top: 3px;
            padding-bottom: 0px;
            padding-right: 0px;
            color: black;
            font-weight: bold;
            /* FF3.5+ */
            -moz-transform: rotate(-90.0deg);
            /* Opera 10.5 */
            -o-transform: rotate(-90.0deg);
            /* Saf3.1+, Chrome */
            -webkit-transform: rotate(-90.0deg);
            /* IE6,IE7 */
            filter: progid: DXImageTransform.Microsoft.BasicImage(rotation=0.083);
            /* IE8 */
            -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)";
            /* Standard */
            transform: rotate(-90.0deg);
        }
    </style>
@endsection

@section('body')
    <div class="body">
        <div class="page-wrapper p-t-20 p-b-50">
            <div class="wrapper ms-4">
                <div style="width: 28cm">

                    <div class="row align-items-start">
                        <div class="col-4">
                            <p>
                            <p style="font-size: 12px;">Form 2</p>
                            The turnout track irregularity maintenance <br>
                            ledger (Standard Turnout)
                            </p>
                            <br>
                            <table class="table-bordered" style="font-size:10px; text-align: center;" border="double"
                                bordercolor="#ff0000">
                                <tr>
                                    <td style="width: 80px;">The reference date</td>
                                    <td style="width: 140px;">
                                        <div class="mt-0 mb-0 mx-0 font-weight-bold"
                                            style="font-size: 18px; font-weight: bold;">
                                            {{ $wesel->tanggal ?? '' }}
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-4">
                            <img src="{{ asset('assets/images/standard-toleransi.PNG') }}" style="width:300px;"
                                class="mt-4" alt="No Photo">
                        </div>

                        <div class="col-4">
                            <img src="{{ asset('assets/images/panduan2.PNG') }}" style="text-align:left; width:350px;"
                                class="mt-4" alt="No Photo">
                        </div>
                    </div>


                    <table class="table-bordered" style="text-align: center; font-size:8px;">
                        <tr>
                            <td style="width: 120px; height: 20px;">The constructed <br> date</td>
                            <td style="width: 170px"></td>
                            <td style="width: 90px">The design <br> drawing No.</td>
                            <td style="width: 120px"></td>
                            <td style="width: 82px">Frequency of <br> regular</td>
                            <td style="width: 120px">
                                <div class="text-danger">1 or 2 / year</div>
                            </td>
                        </tr>
                    </table>

                    <table class="table-bordered" style="text-align: center; font-size:8px;">
                        <tr>
                            <td style="width: 60px;" rowspan="2">Name of <br> line</td>
                            <td style="width: 60px;" rowspan="2">
                                <div class="mt-0 mb-0 mx-0 font-weight-bold" style="font-size: 12px; font-weight: bold;">
                                    {{ $wesel->wesel->line->code ?? '' }}
                                </div>
                            </td>
                            <td style="width: 60px;" rowspan="2">Guideway <br> type</td>
                            <td style="width: 90px;" rowspan="2"></td>
                            <td style="width: 50px;" rowspan="2">Name of <br> station</td>
                            <td style="width: 112px;" rowspan="2">
                                <div class="mt-0 mb-0 mx-0 font-weight-bold" style="font-size: 12px; font-weight: bold;">
                                    {{ $wesel->wesel->area->code ?? '' }}
                                </div>
                            </td>
                            <td style="width: 50px;" rowspan="2">Turnout <br> No.</td>
                            <td style="width: 70px;" rowspan="2">
                                <div class="mt-0 mb-0 mx-0 font-weight-bold" style="font-size: 12px; font-weight: bold;">
                                    {{ $wesel->wesel->name ?? '' }}
                                </div>
                            </td>
                            <td style="width: 50px;" style="width: 70px;" rowspan="2">Turnout <br> type</td>
                            <td style="width: 150px;">
                                <div class="text-danger">No.
                                    {{ $wesel->wesel->tipe ?? '' }} / {{ $wesel->wesel->direction ?? '' }}</div>
                            </td>
                        <tr>
                            <td style="width: 150px;">
                                Standard Turnout <br> (Heelles switch)
                            </td>
                        </tr>
                        </tr>
                    </table>

                    <table class="table-bordered" style="text-align:center; font-size:10px;" border="0.5">
                        <tbody>
                            <tr style="height: 19.6167px;">
                                <td style="width: 180px;" rowspan="5">
                                    Examination <br>
                                    type <br>
                                    (Unit: mm)
                                </td>
                                <td style="width: 200px; height: 19.6167px;" colspan="14">
                                    Track Gauge
                                </td>
                                <td style="width: 200px; height: 19.6167px;" colspan="14">
                                    Cross level
                                </td>
                                <td style="width: 90px; height: 19.6167px;" colspan="6">
                                    Alignment
                                </td>
                                <td style="width: 60px; height: 19.6167px;" colspan="4">
                                    Longitudinal level
                                </td>
                                <td style="width: 30px; height: 19.6167px;" colspan="2">
                                    Back Gauge
                                </td>
                                <td style="width: 28px; height: 42.6167px;" colspan="2" rowspan="2">
                                    Gap of longitudinal position between
                                </td>
                                <td style="width: 70px; height: 65.6167px;" rowspan="3">
                                    Gap under fixing between tongue rail and stock rail
                                </td>
                                <td style="width: 70px; height: 65.6167px;" rowspan="3">
                                    Gap under contact between tongue rail and stock rail
                                </td>
                                <td style="width: 200px; height: 65.6167px;" rowspan="3">
                                    Remarks
                                </td>
                            </tr>
                            <tr style="height: 23px;">
                                <td style="width: 15px; height: 46px;" rowspan="2">1</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">2</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">2'</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">2''</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">3</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">3'</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">4'</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">5</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">5'</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">6'</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">7</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">7'</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">10</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">10'</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">1</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">2</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">3</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">3'</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">4</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">4'</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">5</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">5'</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">7</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">7'</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">8</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">8'</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">10</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">10'</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">2</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">5</td>
                                <td style="width: 45px; height: 23px;" colspan="3">5'</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">9</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">2</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">5</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">5'</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">9</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">8</td>
                                <td style="width: 15px; height: 46px;" rowspan="2">8'</td>
                            </tr>
                            <tr style="height: 23px;">
                                <td style="font-size:10px; width: 15px; height: 23px;">1/4</td>
                                <td style="font-size:10px; width: 15px; height: 23px;">1/2</td>
                                <td style="font-size:10px; width: 15px; height: 23px;">3/4</td>
                                <td style="width: 14px; height: 23px;">L</td>
                                <td style="width: 14px; height: 23px;">R</td>
                            </tr>
                            <tr style="height: 23px;">
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->TG_1 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->TG_2 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->TG_2A ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->TG_2AA ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->TG_3 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->TG_3A ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->TG_4A ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->TG_5 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->TG_5A ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->TG_6A ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->TG_7 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->TG_7A ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->TG_10 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->TG_10A ?? '' }}
                                    </div>
                                </td>

                                {{-- CROSS LEVEL --}}
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->CL_1 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->CL_2 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->CL_3 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->CL_3A ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->CL_4 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->CL_4A ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->CL_5 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->CL_5A ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->CL_7 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->CL_7A ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->CL_8 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->CL_8A ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->CL_10 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->CL_10A ?? '' }}
                                    </div>
                                </td>

                                {{-- ALIGNMENT --}}
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->AL_2 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->AL_5 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->AL_5A_1per4 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->AL_5A_1per2 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->AL_5A_3per4 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->AL_9 ?? '' }}
                                    </div>
                                </td>

                                {{-- LONGITUDINAL LEVEL --}}
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->LL_2 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->LL_5 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->LL_5A ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->LL_9 ?? '' }}
                                    </div>
                                </td>

                                {{-- BACK GAUGE --}}
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->BG_8 ?? '' }}
                                    </div>
                                </td>
                                <td style="height: 46px;" rowspan="2">
                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                        {{ $wesel->BG_8A ?? '' }}
                                    </div>
                                </td>

                                <td style="height: 46px;" rowspan="2">&nbsp;&nbsp;</td>
                                <td style="height: 46px;" rowspan="2">&nbsp;&nbsp;</td>
                                <td style="height: 46px;" rowspan="2">&nbsp;&nbsp;</td>
                                <td style="height: 46px;" rowspan="2">&nbsp;&nbsp;</td>
                                <td style="text-align: left; height: 23px;">Design Value</td>
                            </tr>
                            <tr style="height: 23px;">
                                <td style="text-align: left">Service Criteria</td>
                            </tr>
                            <tr style="height: 23px;">
                                <td>
                                    <div class="text-danger" style="font-size: 10px">Manual measurement / Apparatus</div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: left">Measurement</td>
                            </tr>
                            <tr style="height: 23px;">
                                <td></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td bgcolor="orange"></td>
                                <td style="text-align: left">Irregularity</td>
                            </tr>
                            <tr style="height: 23px;">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: left">Maintenance dimensions</td>
                            </tr>

                            {{-- BAGIAN 2 AWAL --}}
                            <tr style="height: 23px;">
                                <td>
                                    <div class="text-danger" style="font-size: 10px">Manual measurement / Apparatus</div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="height: 23px;">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="height: 23px;">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            {{-- BAGIAN 2 AKHIR --}}

                            {{-- BAGIAN 2 AWAL --}}
                            <tr style="height: 23px;">
                                <td>
                                    <div class="text-danger" style="font-size: 10px">Manual measurement / Apparatus</div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="height: 23px;">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="height: 23px;">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            {{-- BAGIAN 2 AKHIR --}}

                            {{-- BAGIAN 3 AWAL --}}
                            <tr style="height: 23px;">
                                <td>
                                    <div class="text-danger" style="font-size: 10px">Manual measurement / Apparatus</div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="height: 23px;">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="height: 23px;">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            {{-- BAGIAN 3 AKHIR --}}

                            {{-- BAGIAN 4 AWAL --}}
                            <tr style="height: 23px;">
                                <td>
                                    <div class="text-danger" style="font-size: 10px">Manual measurement / Apparatus</div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="height: 23px;">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="height: 23px;">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            {{-- BAGIAN 4 AKHIR --}}

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
            $('.rotate').css('height', $('.rotate').width());
            window.print();
        });
    </script>
@endsection
