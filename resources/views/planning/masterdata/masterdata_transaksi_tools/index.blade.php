@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Data Transaksi Tools | P & C</title>
@endsection

@section('sub-content')
    <h4>Master Data > Transaksi Tools</h4>
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
                                <a href="{{ route('masterdata-transaksi-tools.create') }}"
                                    class="btn btn-primary btn-lg me-0" type="button">Add Data
                                </a>
                                <button class="btn btn-outline-dark btn-lg dropdown-toggle ms-0" type="button"
                                    id="dropdownMenuIconButton1" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" style="margin-left: -10px;">
                                    <i class="ti-link"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                                    <a class="dropdown-item" href="#">Print</a>
                                    <a class="dropdown-item" href="#">Export to Excel</a>
                                    <a class="dropdown-item" href="#">Export to PDF</a>
                                </div>
                            </div>
                            <div class="table-responsive pt-3">
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
                                                        <a class="btn btn-outline-danger my-0 disabled" href="javascript:;"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#delete-confirmation-modal"
                                                            onclick="#">Delete</a>
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

            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="ModalDetail" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-lg" role="document">
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
