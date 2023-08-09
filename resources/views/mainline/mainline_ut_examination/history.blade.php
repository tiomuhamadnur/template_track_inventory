@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title>History Joint Welding ({{ $joint->name ?? '' }}) | CPWTM</title>
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
                            <h4 class="card-title">Data History Ultrasonic Test (Joint Welding: {{ $joint->name ?? '-' }})
                            </h4>
                            <div class="btn-group">
                                <a href="{{ URL::previous() }}" class="btn btn-outline-dark btn-lg mx-0" type="button"
                                    title="Back">
                                    <i class="ti-arrow-left"></i>
                                    Back
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
                                                Area
                                            </th>
                                            <th class="text-center">
                                                Line
                                            </th>
                                            <th class="text-center text-wrap">
                                                No Joint (W)
                                            </th>
                                            <th class="text-center text-wrap">
                                                No Work Order
                                            </th>
                                            <th class="text-center text-wrap">
                                                Tanggal
                                            </th>
                                            <th class="text-center text-wrap">
                                                DAC (%)
                                            </th>
                                            <th class="text-center">
                                                Status
                                            </th>
                                            <th class="text-center text-wrap">
                                                Depth (mm)
                                            </th>
                                            <th class="text-center text-wrap">
                                                Length (mm)
                                            </th>
                                            <th class="text-center text-wrap">
                                                Operator
                                            </th>
                                            {{-- <th class="text-center">
                                                Action
                                            </th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($ut_examination->count() == 0)
                                            <tr>Belum ada data Ultrasonic Test</tr>
                                        @else
                                            @foreach ($ut_examination as $item)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="text-center text-wrap">
                                                        {{ $item->joint->area->code }}
                                                    </td>
                                                    <td class="text-center text-wrap">
                                                        {{ $item->joint->line->code }}
                                                    </td>
                                                    <td class="text-center text-wrap">
                                                        {{ $item->joint->name }}
                                                    </td>
                                                    <td class="text-center text-wrap">
                                                        {{ $item->wo->nomor }}
                                                    </td>
                                                    <td class="text-center text-wrap">
                                                        {{ $item->tanggal }}
                                                    </td>
                                                    <td
                                                        class="text-center @if ($item->dac >= 60) text-danger fw-bolder @endif">
                                                        {{ $item->dac }}
                                                    </td>
                                                    <td
                                                        class="text-center @if ($item->dac >= 60) text-danger fw-bolder @endif">
                                                        {{ $item->status }}
                                                    </td>
                                                    <td class="text-center text-wrap">
                                                        {{ $item->depth }}
                                                    </td>
                                                    <td class="text-center text-wrap">
                                                        {{ $item->length }}
                                                    </td>
                                                    <td class="text-center text-wrap">
                                                        {{ $item->operator }}
                                                    </td>
                                                    {{-- <td class="text-center">
                                                        <div class="btn-group">
                                                            <a href="javascript:;" class="btn btn-outline-success mx-0 mb-0"
                                                                data-bs-toggle="modal" data-bs-target="#ModalDetail"
                                                                data-area="{{ $item->joint->area->code }}"
                                                                data-line="{{ $item->joint->line->code }}"
                                                                data-joint="{{ $item->joint->name }}"
                                                                data-no_span="{{ $item->joint->mainline->no_span ?? '-' }}"
                                                                @if ($item->joint->mainline_id != null) data-chainage="{{ $item->joint->mainline->kilometer ?? '-' }}"
                                                                @else
                                                                data-chainage="{{ $item->joint->kilometer ?? '-' }}" @endif
                                                                data-direction="{{ $item->joint->direction }}"
                                                                data-tanggal="{{ $item->tanggal }}"
                                                                data-dac="{{ $item->dac }}"
                                                                data-depth="{{ $item->depth }}"
                                                                data-length="{{ $item->length }}"
                                                                data-status="{{ $item->status }}"
                                                                data-operator="{{ $item->operator }}"
                                                                data-remark="{{ $item->remark ?? '-' }}">Detail</a>
                                                            <a href="{{ route('ut.examination.history', Crypt::encryptString($item->joint->id)) }}"
                                                                class="btn btn-outline-warning mx-0 mb-0">History</a>
                                                            <a class="btn btn-outline-danger mx-0 mb-0" href="javascript:;"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#delete-confirmation-modal"
                                                                onclick="toggleModal('{{ $item->id }}')">Delete</a>
                                                        </div>
                                                    </td> --}}
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

    <!-- BEGIN: Delete Confirmation Modal -->
    {{-- <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-2">
                    <div class="p-2 text-center">
                        <div class="text-3xl mt-2">Apakah anda yakin?</div>
                        <div class="text-slate-500 mt-2">Data ini akan dihapus secara permanen.</div>
                    </div>
                    <div class="px-5 pb-8 text-center mt-3">
                        <form action="{{ route('ut.examination.delete') }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="text" name="id" id="id" hidden>
                            <button type="button" data-bs-dismiss="modal"
                                class="btn btn-outline-warning w-24 mr-1 me-2">Cancel</button>
                            <button type="submit" class="btn btn-danger w-24">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- END: Delete Confirmation Modal -->

    <!-- Modal Detail -->
    {{-- <div class="modal fade" id="ModalDetail" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalAdminTitle">Detail Hasil Ultrasonic Test <br>(Joint Welding: <span
                            id="joint_judul"></span>)</h4>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label mb-0">Joint Welding</label>
                                <input readonly type="text" id="joint_modal" class="form-control">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-1">
                                <label for="nameWithTitle" class="form-label mb-0">Area</label>
                                <input readonly type="text" id="area_modal" class="form-control">
                            </div>
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label mb-0">Line</label>
                                <input readonly type="text" id="line_modal" class="form-control">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label mb-0">No. Span</label>
                                <input readonly type="text" id="no_span_modal" class="form-control">
                            </div>
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label mb-0">Chainage (m)</label>
                                <input readonly type="text" id="chainage_modal" class="form-control">
                            </div>
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label mb-0">Direction</label>
                                <input readonly type="text" id="direction_modal" class="form-control">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label mb-0">Tanggal</label>
                                <input readonly type="text" id="tanggal_modal" class="form-control">
                            </div>
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label mb-0">Status</label>
                                <input readonly type="text" id="status_modal" class="form-control">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label mb-0">DAC (%)</label>
                                <input readonly type="text" id="dac_modal" class="form-control">
                            </div>
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label mb-0">Depth (mm)</label>
                                <input readonly type="text" id="depth_modal" class="form-control">
                            </div>
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label mb-0">Length (mm)</label>
                                <input readonly type="text" id="length_modal" class="form-control">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label mb-0">Operator</label>
                                <input readonly type="text" id="operator_modal" class="form-control">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label mb-0">Remark</label>
                                <input readonly type="text" id="remark_modal" class="form-control">
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
    </div> --}}
    <!-- End Modal Detail -->
@endsection

{{-- @section('javascript')
    <script type="text/javascript">
        function toggleModal(id) {
            $('#id').val(id);
        }

        $('#ModalDetail').on('show.bs.modal', function(e) {
            var tanggal = $(e.relatedTarget).data('tanggal');
            var area = $(e.relatedTarget).data('area');
            var line = $(e.relatedTarget).data('line');
            var no_span = $(e.relatedTarget).data('no_span');
            var chainage = $(e.relatedTarget).data('chainage');
            var direction = $(e.relatedTarget).data('direction');
            var remark = $(e.relatedTarget).data('remark');
            var joint = $(e.relatedTarget).data('joint');
            var status = $(e.relatedTarget).data('status');
            var dac = $(e.relatedTarget).data('dac');
            var length = $(e.relatedTarget).data('length');
            var depth = $(e.relatedTarget).data('depth');
            var operator = $(e.relatedTarget).data('operator');

            $('#tanggal_modal').val(tanggal);
            $('#area_modal').val(area);
            $('#line_modal').val(line);
            $('#no_span_modal').val(no_span);
            $('#chainage_modal').val(chainage);
            $('#direction_modal').val(direction);
            $('#remark_modal').val(remark);
            $('#joint_modal').val(joint);
            $('#status_modal').val(status);
            $('#dac_modal').val(dac);
            $('#length_modal').val(length);
            $('#depth_modal').val(depth);
            $('#operator_modal').val(operator);
            document.getElementById("joint_judul").innerHTML = joint;
        });
    </script>
@endsection --}}
