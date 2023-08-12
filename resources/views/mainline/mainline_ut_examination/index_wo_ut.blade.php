@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title>Data Work Order Ultrasonic Test | CPWTM</title>
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
                            <h4 class="card-title">Data Ultrasonic Test by Work Order</h4>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th class="text-center">
                                                No Work Order
                                            </th>
                                            <th class="text-center">
                                                Pekerjaan
                                            </th>
                                            <th class="text-center">
                                                Tahun
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($wo_ut->count() == 0)
                                            <tr>
                                                <td colspan="5" class="text-center fw-bolder">
                                                    Belum ada data Work Order untuk pekerjaan Ultrasonic Test, silahkan
                                                    hubungi PIC terkait.
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($wo_ut as $item)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="text-center text-wrap">
                                                        {{ $item->nomor }}
                                                    </td>
                                                    <td class="text-center text-wrap">
                                                        {{ $item->job->name }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ \Carbon\Carbon::parse($item->tanggal_start)->format('Y') }}
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a href="{{ route('ut.examination.index', Crypt::encryptString($item->id)) }}"
                                                                type="button"
                                                                class="btn btn-outline-success mx-0">Detail</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
