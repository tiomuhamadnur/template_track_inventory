@extends('transaksi_tools_material.transaksi_layout.base')

@section('sub-title')
    <title>Data My Transaction Tools | CPWTM</title>
@endsection

@section('sub-content')
    <h4>My Transaction > Tools</h4>
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
                            <h4 class="card-title">Data My Transaction Tools</h4>
                            <div class="btn-group">
                                <a href="{{ route('my-transaksi-tools.index') }}" class="btn btn-outline-dark btn-lg mx-0"
                                    type="button" title="Reset Filter">
                                    <i class="ti-reload"></i>
                                </a>
                                <a href="{{ route('masterdata-transaksi-tools.create') }}"
                                    class="btn btn-primary btn-lg me-0" type="button">Add Data
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
                            <div>
                                <button class="btn btn-outline-info btn-lg ms-0" type="button" id="deleteSubmit"
                                    style="display:none;" data-bs-toggle="modal"
                                    data-bs-target="#return-confirmation-modal">
                                    <i class="ti-back-right"></i>
                                    Return Tools
                                </button>
                            </div>
                            <div class="table-responsive pt-3">
                                <form id="return_form" method="post"
                                    action="{{ route('masterdata-transaksi-tools.return') }}">
                                    @csrf
                                    @method('put')
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="text-center">No</th>
                                                <th rowspan="2" class="text-center">
                                                    All <br>
                                                    <input type="checkbox"
                                                        @if ($transaksi_tools->count() == 0) hidden @elseif ($total_pinjam == 0) hidden @endif
                                                        class="mt-2" aria-label="Checkbox for following text input"
                                                        title="select all" id="selectAll">
                                                </th>
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
                                                        {{ ($transaksi_tools->currentPage() - 1) * $transaksi_tools->perPage() + $loop->index + 1 }}
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($item->status == 'pinjam')
                                                            <input @if ($item->user->id != auth()->user()->id) hidden @endif
                                                                type="checkbox" class="checkbox" name="id[]"
                                                                value="{{ $item->id }}"
                                                                aria-label="Checkbox for following text input">
                                                        @endif
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
                                                            <a href="#" type="button"
                                                                @if ($item->user->id != auth()->user()->id) hidden @endif
                                                                class="btn btn-outline-warning my-0" data-bs-toggle="modal"
                                                                data-bs-target="#return-one-confirmation-modal"
                                                                data-id="{{ $item->id }}"
                                                                @if ($item->status == 'selesai') hidden @endif>
                                                                <i class="ti-back-right"></i>
                                                                Return
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

    <!-- BEGIN: Return Confirmation Modal -->
    <div id="return-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-2">
                    <div class="p-2 text-center">
                        <div class="text-3xl mt-2 fw-bolder">Apakah anda yakin?</div>
                        <div class="text-slate-500 mt-2 text-wrap">Semua data tools yang dipilih akan dikembalikan,
                            pastikan anda menyimpannya di tempat yang sesuai.
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center mt-3">
                        <button type="button" data-bs-dismiss="modal"
                            class="btn btn-outline-warning w-24 mr-1 me-2">Cancel</button>
                        <button type="submit" id="return_submit" class="btn btn-success w-24">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Return Confirmation Modal -->

    <!-- BEGIN: Return satu-satu Confirmation Modal -->
    <div id="return-one-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-2">
                    <div class="p-2 text-center">
                        <div class="text-3xl mt-2 fw-bolder">Apakah anda yakin?</div>
                        <div class="text-slate-500 mt-2 text-wrap">Data tools ini akan dikembalikan,
                            pastikan anda menyimpannya di tempat yang sesuai.
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center mt-3">
                        <form method="post" action="{{ route('masterdata-transaksi-tools.return') }}">
                            @csrf
                            @method('put')
                            <input type="text" name="id[]" id="id_modal" hidden>
                            <button type="button" data-bs-dismiss="modal"
                                class="btn btn-outline-warning w-24 mr-1 me-2">Cancel</button>
                            <button type="submit" class="btn btn-success w-24">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Return satu-satu Confirmation Modal -->
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

            $('#return-one-confirmation-modal').on('show.bs.modal', function(e) {
                var id = $(e.relatedTarget).data('id');
                $('#id_modal').val(id);
            });
        });

        const checkboxes = document.querySelectorAll('.checkbox');
        const selectAll = document.getElementById('selectAll');
        const deleteSubmitBtn = document.getElementById('deleteSubmit');

        selectAll.addEventListener('change', () => {
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAll.checked;
            });

            if (selectAll.checked) {
                deleteSubmitBtn.style.display = 'block';
            } else {
                deleteSubmitBtn.style.display = 'none';
            }
        });

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const checked = document.querySelectorAll('.checkbox:checked');
                if (checked.length > 0) {
                    deleteSubmitBtn.style.display = 'block';
                } else {
                    deleteSubmitBtn.style.display = 'none';
                }

                const allChecked = document.querySelectorAll('.checkbox:checked').length === checkboxes
                    .length;
                selectAll.checked = allChecked;
            });
        });

        const returnSubmit = document.getElementById('return_submit');
        returnSubmit.addEventListener('click', () => {
            document.getElementById('return_form').submit();
        });
    </script>
@endsection
