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
                            <h4 class="card-title">Data Ultrasonic Test by Work Order (Tahun: {{ $tahun ?? '' }})</h4>
                            <div class="btn-group">
                                <a href="{{ route('ut.examination.index_wo_ut') }}" class="btn btn-outline-dark btn-lg mx-0"
                                    type="button" title="Reset Filter">
                                    <i class="ti-reload"></i>
                                </a>
                                <a href="#" class="btn btn-outline-warning btn-lg mx-0" type="button"
                                    data-bs-toggle="modal" data-bs-target="#ModalFilter" title="Filter data">
                                    <i class="ti-filter"></i> Filter
                                </a>
                            </div>
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
                                                    hubungi Admin atau PIC terkait.
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
                                                        {{ \Carbon\Carbon::parse($item->tanggal_start)->format('F Y') }}
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

    <!-- Modal Filter-->
    <div class="modal fade" id="ModalFilter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>
                        Filter Work Order NDT by Year
                    </h4>
                </div>
                <div class="modal-body">
                    <form id="form_filter" action="{{ route('ut.examination.filter_wo_ut') }}" method="GET">
                        <div class="form-group">
                            @php
                                $tahun_ini = $tahun - 5;
                            @endphp
                            <label class="form-label">Tahun</label>
                            <select class="form-select" name="tahun">
                                <option disabled selected>- Pilih Tahun -</option>
                                @for ($i = $tahun_ini; $i <= $tahun + 5; $i++)
                                    <option value="{{ $i }}" @if ($i == $tahun) selected @endif>
                                        {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="float-end">
                        <button type="submit" form="form_filter" class="btn btn-primary mx-1">
                            Filter
                        </button>
                        <button type="button" class="btn btn-outline-danger mx-1" data-bs-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Filter-->
@endsection
