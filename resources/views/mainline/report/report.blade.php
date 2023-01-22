@extends('layout.form.form')

@section('head')
    <title>Data Summary Temuan</title>
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
                                    <img src="{{ asset('build/assets/images/mrtj.png') }}" style="height: 70px" alt="">
                                </th>
                                <th class="fw-bolder text-center align-middle">
                                    <h3>REPORT OF CLOSING ACTIVITY</h3>
                                    <h3>Temuan Track Patrol on Foot</h3>
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
                                        Tio Muhamad Nur
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
                                        01/01/2023
                                    </h5>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                    <table id="mainline" class="table table-bordered border-dark rounded-3 bg-white">
                        <thead>
                            <tr>
                                <th class="whitespace">NO</th>
                                <th>AREA</th>
                                <th>LINE</th>
                                <th>NO. SPAN</th>
                                <th>KM</th>
                                <th>PANJANG SPAN (m)</th>
                                <th>JUMLAH SLEEPER</th>
                                <th>SPACING SLEEPER (mm)</th>
                                <th>JENIS SLEEPER</th>
                                <th>JOINT</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mainline as $item)
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div>
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>
                                    <td class="w-40">
                                        <div class="flex justify-center items-center">
                                            {{ $item->area->code }}
                                        </div>
                                    </td>
                                    <td class="w-40">
                                        <div class="flex justify-center items-center">
                                            {{ $item->line->code }}
                                        </div>
                                    </td>
                                    <td class="w-40">
                                        <div class="flex justify-center items-center">
                                            {{ $item->no_span }}
                                        </div>
                                    </td>
                                    <td class="w-40">
                                        <div class="flex justify-center items-center">
                                            {{ $item->kilometer }}
                                        </div>
                                    </td>
                                    <td class="w-40">
                                        <div class="flex justify-center items-center">
                                            {{ $item->panjang_span ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="w-40">
                                        <div class="flex justify-center items-center">
                                            {{ $item->jumlah_sleeper ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="w-40">
                                        <div class="flex justify-center items-center">
                                            {{ $item->spacing_sleeper ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="w-40">
                                        <div class="flex justify-center items-center">
                                            {{ $item->jenis_sleeper ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="w-40">
                                        <div class="flex justify-center items-center">
                                            {{ $item->joint ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3"
                                                href="{{ route('mainline.edit', $item->id) }}">
                                                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                            </a>
                                            <a class="flex items-center text-danger"
                                                href="{{ route('mainline.delete', $item->id) }}">
                                                <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
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
            $('#mainline').DataTable({
                processing: true,
                paging: false,
                select: true,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excel',
                        className: 'btn btn-success'
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-danger'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-warning'
                    },
                ],
            });
        });
    </script>
@endsection
