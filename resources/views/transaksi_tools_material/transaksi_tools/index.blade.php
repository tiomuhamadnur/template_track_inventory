@extends('transaksi_tools_material.transaksi_layout.base')

@section('sub-title')
    <title>Data Transaksi Tools | CPWTM</title>
@endsection

@section('sub-content')
    <h4>Transaksi > Tools</h4>
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
                            <h4 class="card-title">Data Transaksi Tools</h4>
                            <div class="btn-group">
                                <a href="{{ route('masterdata-transaksi-tools.index') }}"
                                    class="btn btn-outline-dark btn-lg mx-0" type="button" title="Reset Filter">
                                    <i class="ti-reload"></i>
                                </a>
                                <a href="#" class="btn btn-outline-warning btn-lg mx-0" type="button"
                                    data-bs-toggle="modal" data-bs-target="#ModalFilter" title="Filter data">
                                    <i class="ti-filter"></i>
                                </a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#ModalExportExcel" type="button"
                                    class="btn btn-outline-success btn-lg mx-0" title="Export to Excel">
                                    <i class="mdi mdi-file-excel text-success"></i>
                                </a>
                            </div>
                            {{ $transaksi_tools->links('vendor.pagination.bootstrap-5') }}
                            <div class="table-responsive pt-1">
                                <form id="return_form" method="post"
                                    action="{{ route('masterdata-transaksi-tools.return') }}">
                                    @csrf
                                    @method('put')
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="text-center">No</th>
                                                <th rowspan="2" class="text-center text-wrap">Peminjam</th>
                                                <th rowspan="2" class="text-center">Tools</th>
                                                <th rowspan="2" class="text-center">Qty.</th>
                                                <th colspan="2" class="text-center">Waktu</th>
                                                <th rowspan="2" class="text-center">Status</th>
                                                <th rowspan="2" class="text-center">Action</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center text-wrap">Pinjam</th>
                                                <th class="text-center text-wrap">Kembali</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaksi_tools as $item)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="text-center fw-bolder text-wrap">
                                                        {{ $item->user->name }}
                                                    </td>
                                                    <td class="text-center fw-bolder text-wrap">
                                                        {{ $item->tools->name }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $item->qty }} {{ $item->tools->unit }}
                                                    </td>
                                                    <td class="text-center text-wrap">
                                                        {{ $item->tanggal_pinjam }}
                                                    </td>
                                                    <td class="text-center text-wrap">
                                                        {{ $item->tanggal_kembali ?? '-' }}
                                                    </td>
                                                    <td class="text-center">
                                                        <span
                                                            class="badge @if ($item->status == 'pinjam') bg-danger
                                                        @elseif($item->status == 'selesai') bg-success
                                                        @else
                                                        bg-info @endif">
                                                            {{ $item->status }}
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group-vertical">
                                                            <a href="#" type="button"
                                                                class="btn btn-outline-success my-0" data-bs-toggle="modal"
                                                                data-bs-target="#ModalDetail"
                                                                data-status="{{ $item->status ?? '-' }}"
                                                                data-responsible="{{ $item->responsible->name ?? '-' }}"
                                                                data-remark="{{ $item->remark ?? '-' }}">
                                                                Detail
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <form action="{{ route('masterdata-transaksi-tools.export_excel') }}" id="form_export_excel" method="GET" hidden>
        @csrf
        @method('get')
        <input type="hidden" name="user_id" value="{{ $user_id ?? '' }}">
        <input type="hidden" name="status" value="{{ $status ?? '' }}">
        <input type="hidden" name="tanggal_awal" value="{{ $tanggal_awal ?? '' }}">
        <input type="hidden" name="tanggal_akhir" value="{{ $tanggal_akhir ?? '' }}">
    </form>

    <!-- Modal Detail -->
    <div class="modal fade" id="ModalDetail" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalAdminTitle">Detail Transaksi</h3>
                </div>
                <form action="#" method="POST">
                    <div class="modal-body">
                        <div class="border border-2 border-dark rounded-3 p-3">
                            <div class="row g-2 mb-2">
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label mb-0">Status</label>
                                    <input readonly type="text" id="status_modal" class="form-control">
                                </div>
                            </div>
                            <div class="row g-2 mb-2">
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label mb-0">Penanggung Jawab</label>
                                    <input readonly type="text" id="responsible_modal" class="form-control">
                                </div>
                            </div>
                            <div class="row g-2 mb-2">
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label mb-0">Remark</label>
                                    <input readonly type="text" id="remark_modal" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Detail -->

    <!-- Modal Filter-->
    <div class="modal fade" id="ModalFilter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="form_filter" action="{{ route('masterdata-transaksi-tools.filter') }}" method="GET">
                        @csrf
                        @method('get')
                        <div class="form-group">
                            <label class="form-label">Peminjam</label>
                            <select class="form-select" name="user_id">
                                <option disabled selected>- pilih nama peminjam -</option>
                                @foreach ($peminjam as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }} -
                                        ({{ $item->section->code }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option disabled selected>- pilih status -</option>
                                <option value="pinjam">Pinjam</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tanggal Pinjam</label>
                            <div class="input-group">
                                <input placeholder="tanggal awal" class="form-control me-1" type="text"
                                    onfocus="(this.type='date')" onblur="(this.type='text')" id="date"
                                    name="tanggal_awal">
                                <input placeholder="tanggal akhir" class="form-control ms-1" type="text"
                                    onfocus="(this.type='date')" onblur="(this.type='text')" id="date"
                                    name="tanggal_akhir">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="pull-right">
                        <button type="submit" form="form_filter" class="btn btn-primary justify-content-center">
                            Filter
                        </button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Filter-->

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
                        <div class="text-slate-500 mt-2">File excel akan didownload sesuai data yang difilter!</div>
                    </div>
                </div>

                <div class="modal-footer mt-2">
                    <div class="pull-right">
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
    </div>
    <!-- End Modal Export Excel -->
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#ModalDetail').on('show.bs.modal', function(e) {
                var status = $(e.relatedTarget).data('status');
                var responsible = $(e.relatedTarget).data('responsible');
                var remark = $(e.relatedTarget).data('remark');

                $('#status_modal').val(status);
                $('#responsible_modal').val(responsible);
                $('#remark_modal').val(remark);
            });
        });
    </script>
@endsection
