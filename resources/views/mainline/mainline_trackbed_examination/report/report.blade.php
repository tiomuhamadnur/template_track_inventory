@extends('layout.form.form')

@section('head')
    <title>Form Trackbed Examination</title>
@endsection

@section('body')
    <div class="body">
        <div class="page-wrapper p-t-30 p-b-50">
            <div class="wrapper ms-5">
                <div style="width: 210mm; height: 250mm;">
                    <div class="text-center mb-1">
                        <h3 class="fw-bolder">
                            Table of Form Trackbed Examination
                        </h3>
                    </div>
                    <div class="mb-1">
                        <table>
                            <tr>
                                <td>Area</td>
                                <td style="width: 15px" class="text-center"> : </td>
                                <td>{{ $location ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td style="width: 15px" class="text-center"> : </td>
                                <td>{{ $tanggal ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Examiner</td>
                                <td style="width: 15px" class="text-center"> : </td>
                                <td>{{ $examiner ?? '' }}</td>
                            </tr>
                        </table>
                    </div>
                    <table class="table table-bordered border-dark text-center" style="width: 100%; font-size:12px;">
                        <thead>
                            <tr class="align-middle" style="background-color:rgb(193, 255, 193);">
                                <th style="width: 4%">No.</th>
                                <th class="text-wrap" style="width: 15%">The section of station</th>
                                <th style="width: 10%">Name of Line</th>
                                <th class="text-nowrap" style="width: 6%">No. Span</th>
                                <th style="width: 6%">No. Sleeper</th>
                                <th class="text-wrap" style="width: 20%">Kind of Trackbed Defect</th>
                                <th>Measurement</th>
                                <th style="width: 10%">Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($temuan as $item)
                                <tr>
                                    <td class="py-0">{{ $loop->iteration }}</td>
                                    <td class="py-0">{{ $item->mainline->area->code ?? '' }}</td>
                                    <td class="py-0">{{ $item->mainline->line->code ?? '' }}</td>
                                    <td class="py-0">{{ $item->mainline->no_span ?? '-' }}</td>
                                    <td class="py-0">{{ $item->no_sleeper ?? '-' }} ({{ $item->direction ?? '-' }})</td>
                                    <td class="py-0">{{ $item->defect->name ?? '-' }}</td>
                                    <td class="py-0">{{ $item->remark ?? '-' }}</td>
                                    <td class="py-0">NOT OK</td>
                                </tr>
                            @endforeach

                            @for ($i = 1; $i <= 15; $i++)
                                <tr>
                                    <td class="py-0" style="height: 5mm"> </td>
                                    <td class="py-0"></td>
                                    <td class="py-0"></td>
                                    <td class="py-0"></td>
                                    <td class="py-0"></td>
                                    <td class="py-0"></td>
                                    <td class="py-0"></td>
                                    <td class="py-0"></td>
                                </tr>
                            @endfor
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
