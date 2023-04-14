@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title>Request For Inspection | TCSM</title>
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
                            <h4 class="card-title">Request For Inspection</h4>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th class="text-center text-wrap">
                                                Name Submitter
                                            </th>
                                            <th class="text-center">
                                                Location <br> (No. Span)
                                            </th>
                                            <th class="text-center text-wrap">
                                                Part <br>
                                                Detail Part <br>
                                                (Defect)
                                            </th>
                                            <th class="text-center text-wrap">
                                                Tanggal Perbaikan
                                            </th>
                                            <th class="text-center text-wrap">
                                                Remark
                                            </th>
                                            <th class="text-center text-wrap">
                                                Detail
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_rfi as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->user->name }}
                                                </td>
                                                <td class="text-center text-wrap">
                                                    {{ $item->temuan_mainline->mainline->area->code }} <br>
                                                    ({{ $item->temuan_mainline->mainline->no_span }})
                                                </td>
                                                <td class="text-center text-wrap">
                                                    {{ $item->temuan_mainline->part->name ?? '-' }} <br>
                                                    {{ $item->temuan_mainline->detail_part->name ?? '-' }} <br>
                                                    ({{ $item->temuan_mainline->defect->name ?? '-' }})
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->tanggal }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->remark ?? '-' }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#ModalTemuan"
                                                        type="button" class="btn btn-outline-dark mx-0"
                                                        data-photo="{{ asset('storage/' . $item->temuan_mainline->photo) }}"
                                                        data-photo_close="{{ asset('storage/' . $item->temuan_mainline->photo_close) }}">
                                                        Show
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="javascript:;" data-bs-toggle="modal"
                                                            data-bs-target="#approve-confirmation-modal"
                                                            data-id_approve="{{ $item->id }}" type="button"
                                                            class="btn btn-success mx-0 text-white"
                                                            @if (auth()->user()->jabatan != 'Section Head') hidden @endif>Approve</a>
                                                        <a href="javascript:;" data-bs-toggle="modal"
                                                            data-bs-target="#edit-rfi-modal"
                                                            data-id_rfi="{{ $item->id }}"
                                                            data-remark_rfi="{{ $item->remark }}"
                                                            data-id_temuan_mainline="{{ $item->temuan_mainline_id }}"
                                                            type="button" class="btn btn-primary mx-0 text-white"
                                                            @if (auth()->user()->id != $item->user_id) hidden @endif>Edit</a>
                                                        <a href="javascript:;" data-bs-toggle="modal"
                                                            data-bs-target="#delete-confirmation-modal"
                                                            data-id="{{ $item->id }}" type="button"
                                                            class="btn btn-danger mx-0 text-white"
                                                            @if (auth()->user()->jabatan != 'Section Head') hidden @endif>Reject</a>
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
    <div class="modal fade" id="ModalTemuan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalAdminTitle">Detail Progress Perbaikan</h3>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="mb-4 text-center align-middle">
                            {{-- KONTEN PHOTO DOKUMENTASI TEMUAN --}}
                            <div class="border mx-auto" style="width: 70%">
                                <p class="fw-bolder mb-0">Sebelum Perbaikan</p>
                                <img src="" id="photo_modal" class="img-thumbnail"
                                    alt="Tidak ada photo dokumentasi">
                            </div>
                        </div>
                        <div class="mb-4 text-center align-middle">
                            {{-- KONTEN PHOTO DOKUMENTASI TEMUAN CLOSE --}}
                            <div class="border mx-auto" style="width: 70%">
                                <p class="fw-bolder mb-0">Setelah Perbaikan</p>
                                <img src="" id="photo_close_modal" class="img-thumbnail"
                                    alt="Belum ada dokumentasi perbaikan">
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

    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-2">
                    <div class="p-2 text-center">
                        <h3 class="fw-bolder text-5xl mt-2">Apakah anda yakin?</h3>
                        <div class="text-slate-500 mt-4">Jika di-reject, maka data Request For Inspection (RFI) ini akan
                            dihapus secara permanen.
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center mt-3">
                        <form action="{{ route('rfi.mainline.delete') }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="text" name="id_rfi" id="id_modal" value="" hidden>
                            <button type="button" data-bs-dismiss="modal"
                                class="btn btn-outline-warning w-24 mr-1 me-2">Cancel</button>
                            <button type="submit" class="btn btn-danger w-24">Reject RFI</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->

    <!-- BEGIN: Approve Confirmation Modal -->
    <div id="approve-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-2">
                    <div class="p-2 text-center">
                        <h3 class="fw-bolder text-5xl mt-2">Apakah anda yakin?</h3>
                        <div class="text-slate-500 mt-4">Jika di-approve, maka status temuan ini akan close.
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center mt-3">
                        <form action="{{ route('rfi.mainline.approve') }}" method="POST">
                            @csrf
                            @method('put')
                            <input type="text" name="id_rfi" id="id_approve_modal" value="" hidden>
                            <button type="button" data-bs-dismiss="modal"
                                class="btn btn-outline-warning w-24 mr-1 me-2">Cancel</button>
                            <button type="submit" class="btn btn-success w-24">Approve RFI</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Approve Confirmation Modal -->

    <!-- BEGIN: Edit RFI Modal -->
    <div id="edit-rfi-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="fw-bolder">Form Ubah Data RFI</h3>
                </div>
                <div class="modal-body p-2">
                    <div class="px-5 pb-8 mt-3">
                        <form action="{{ route('rfi.mainline.update') }}" id="form_update_rfi" method="POST"
                            enctype='multipart/form-data'>
                            @csrf
                            @method('put')
                            <input type="text" name="id_rfi" id="id_rfi_modal" hidden>
                            <input type="text" name="id_temuan_mainline" id="id_temuan_mainline_modal" hidden>
                            <div class="col mb-3">
                                <label class="form-label text-left">Photo Setelah Perbaikan</label>
                                <input type="file" name="photo_close" class="form-control" required>
                            </div>
                            <div class="col mb-3">
                                <label class="form-label text-left">Remark (Optional)</label>
                                <input type="text" name="remark" id="remark_rfi_modal" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal"
                        class="btn btn-outline-warning w-24 mr-1 me-2">Cancel</button>
                    <button type="submit" form="form_update_rfi" class="btn btn-success w-24">Ubah</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Edit RFI Modal -->
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#ModalTemuan').on('show.bs.modal', function(e) {
                var photo = $(e.relatedTarget).data('photo');
                var photo_close = $(e.relatedTarget).data('photo_close');

                document.getElementById("photo_modal").src = photo;
                document.getElementById("photo_close_modal").src = photo_close;
            });

            $('#delete-confirmation-modal').on('show.bs.modal', function(e) {
                var id = $(e.relatedTarget).data('id');
                $('#id_modal').val(id);
            });

            $('#approve-confirmation-modal').on('show.bs.modal', function(e) {
                var id = $(e.relatedTarget).data('id_approve');
                $('#id_approve_modal').val(id);
            });

            $('#edit-rfi-modal').on('show.bs.modal', function(e) {
                var id = $(e.relatedTarget).data('id_rfi');
                var remark = $(e.relatedTarget).data('remark_rfi');
                var id_temuan_mainline = $(e.relatedTarget).data('id_temuan_mainline');
                $('#id_rfi_modal').val(id);
                $('#id_temuan_mainline_modal').val(id_temuan_mainline);
                $('#remark_rfi_modal').val(remark);
            });
        });
    </script>
@endsection
