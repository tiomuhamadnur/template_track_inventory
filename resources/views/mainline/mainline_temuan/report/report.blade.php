@extends('layout.form.form')

@section('head')
    <title>Data Summary Track Patrol</title>
@endsection

@section('body')
    <div class="body">
        <div class="page-wrapper p-t-45 p-b-50">
            <div class="wrapper ms-5">
                <div style="width: 28cm">
                    <h5>Form 8-2</h5>
                    <div class="row mb-2">
                        <div class="text-center" style="width: 22cm">
                            <h4>The record Table for track patrol on foot</h4>
                        </div>
                        <div style="width: 5.5cm; font-size: 10px">
                            Record No.
                            <hr>
                            Track Maintenance Section of
                            <hr>
                        </div>
                    </div>
                    <div class="row mb-1" style="padding-left: 3mm">
                        <table class="table table-bordered border-dark rounded-3 bg-white mt-0 me-2"
                            style="width: 8.5cm; font-size: 10px;">
                            <thead>
                                <tr>
                                    <th class="text fw-light"
                                        style="width: 2.2cm; height:7mm; background-color:rgb(193, 255, 193); padding: 1px">
                                        The
                                        reference date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle"
                                        style="height: 4mm; background-color:rgb(193, 255, 193); padding: 1px">The
                                        date</td>
                                    <td>{{ $tanggal ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td class="align-middle"
                                        style="background-color:rgb(193, 255, 193); padding: 1px; height:13mm">
                                        Frequancy of regular examination</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-center align-middle"
                                        style="background-color:rgb(193, 255, 193); padding: 1px">The section</td>
                                </tr>

                                <tr>
                                    <td style="height: 4mm; padding: 1px" colspan="2">
                                        {{ $area_rencana_start ?? '' }} - {{ $area_rencana_finish ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered border-dark rounded-3 bg-white"
                            style="width: 13cm; height:6.2cm; font-size: 10px;">
                            <tbody>
                                <tr>
                                    <td class="fs-4 text-center align-middle">
                                        Route Map <br>
                                        (every pattern)
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col ms-0 mb-0">
                            <table class="table-bordered border-dark rounded-3 bg-white mt-0 ms-0"
                                style="width: 5cm; font-size: 10px;">
                                <thead style="height: 8mm">
                                    <tr>
                                        <th class="text-center align-middle fw-light"
                                            style="background-color:rgb(193, 255, 193);">TMDH
                                        </th>
                                        <th class="text-center align-middle fw-light"
                                            style="background-color:rgb(193, 255, 193);">TMSH
                                        </th>
                                        <th class="text-center align-middle fw-light"
                                            style="background-color:rgb(193, 255, 193);">TMS
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-center align-middle" style="height: 1.4cm">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table-bordered border-dark rounded-3 bg-white mt-2 ms-0"
                                style="width: 5cm; height:3.82cm; font-size: 10px;">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle fw-light"
                                            style="background-color:rgb(193, 255, 193); height:6mm">The objectives of track
                                            patrol</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <table class="table table-bordered border-dark rounded-3 bg-white mt-0"
                        style="font-size: 10px; width:27cm;">
                        <thead>
                            <tr>
                                <td style="width: 2.2cm; background-color:rgb(193, 255, 193); padding: 1px">The reference
                                    date</td>
                                <td style="width:6.5cm"></td>
                                <td rowspan="12"></td>
                                <td rowspan="12" style="width: 13cm" class="fs-4 text-center align-middle">
                                    Route Map
                                    <br>
                                    (every pattern)
                                </td>
                                <td rowspan="12"></td>
                                <td style="width: 1.5cm; background-color:rgb(193, 255, 193)"
                                    class="text-center align-middle">TMDH</td>
                                <td style="width: 1.5cm; background-color:rgb(193, 255, 193)"
                                    class="text-center align-middle">TMSH</td>
                                <td style="width: 1.5cm; background-color:rgb(193, 255, 193)"
                                    class="text-center align-middle">TMS</td>
                            </tr>
                            <tr>
                                <td style="background-color:rgb(193, 255, 193); padding: 1px" class="align-middle">The date
                                </td>
                                <td class="align-middle fw-bolder" style="padding:2px">{{ $tanggal ?? '' }}</td>
                                <td rowspan="2"></td>
                                <td rowspan="2"></td>
                                <td rowspan="2"></td>
                            </tr>
                            <tr>
                                <td style="background-color:rgb(193, 255, 193); padding: 1px">Frequancy of regular
                                    examination</td>
                                <td class="align-middle">One (1) / month</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center align-middle"
                                    style="background-color:rgb(193, 255, 193); padding: 1px">The
                                    section</td>
                                <td colspan="3" class="text-center align-middle"
                                    style="background-color:rgb(193, 255, 193); padding: 1px">The
                                    objectives of track patrol</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="3"></td>
                            </tr>
                        </thead>
                    </table> --}}
                    <table class="table table-bordered border-dark rounded-3 bg-white fw-lighter mb-0 mt-0"
                        style="font-size: 10px; width:27cm">
                        <thead class="text-center align-middle" style="background-color:rgb(193, 255, 193)">
                            <tr>
                                <th rowspan="2" style="padding: 1px">The section of station<br>(X1 to X2)</th>
                                <th rowspan="2" style="padding: 1px">Name of<br>line</th>
                                <th rowspan="2" style="padding: 1px">Guideway<br>type</th>
                                <th rowspan="2" style="padding: 1px">Kilometer<br></th>
                                <th rowspan="2" style="padding: 1px">Left<br>or<br>Right</th>
                                <th rowspan="2" style="padding: 1px">Inside<br>or<br>Outside</th>
                                <th colspan="3" style="padding: 1px; width: 8.5cm">The defect and the result of
                                    examination</th>
                                <th rowspan="2" style="padding: 1px">The<br>quantity</th>
                                <th rowspan="2" style="padding: 1px">Unit</th>
                                <th rowspan="2" style="padding: 1px">Judge</th>
                                <th rowspan="2" style="padding: 1px; width: 4.5cm">Remarks</th>
                            </tr>
                            <tr>
                                <th style="padding: 1px">The types of<br>components</th>
                                <th style="padding: 1px">The types of materials</th>
                                <th style="width: 3.3cm; padding: 1px">The defect and/or<br>the result</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($temuan as $item)
                                <tr>
                                    <td>{{ $item->mainline->area->code ?? '' }}</td>
                                    <td>{{ $item->mainline->line->code ?? '' }}</td>
                                    <td>{{ $item->mainline->no_span ?? '' }}</td>
                                    <td>{{ $item->mainline->kilometer ?? '' }}</td>
                                    <td>{{ $item->direction ?? '' }}</td>
                                    <td></td>
                                    <td>{{ $item->part->name ?? '' }}</td>
                                    <td>{{ $item->detail_part->name ?? '' }}</td>
                                    <td>{{ $item->defect->name ?? '' }}</td>
                                    <td>1</td>
                                    <td>pcs</td>
                                    <td>Not OK</td>
                                    <td>{{ $item->remark ?? '' }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
                        </tbody>
                    </table>
                    <div class="position-relative" style="width: 27cm">
                        <table class="float-end table table-bordered border-dark rounded-3 bg-white fw-lighter mt-0"
                            style="font-size: 10px; width:9.5cm">
                            <thead>
                                <tr>
                                    <td rowspan="2" style="width: 3.5cm; background-color:rgb(193, 255, 193)"
                                        class="text-center align-middle">Examiner</td>
                                    <td>{{ $examiner ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                            </thead>
                        </table>
                    </div>
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
