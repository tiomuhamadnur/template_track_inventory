@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title>Data Ultrasonic Test | CPWTM</title>
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
                            <h4 class="card-title">Data Ultrasonic Test (No. WO: {{ $work_order->nomor }} |
                                Tahun: {{ \Carbon\Carbon::parse($work_order->tanggal_start)->format('Y') }})</h4>
                            <div class="btn-group">
                                <a href="{{ route('ut.examination.index_wo_ut') }}" class="btn btn-outline-dark btn-lg mx-0"
                                    type="button" title="Back">
                                    <i class="ti-arrow-left"></i>
                                </a>
                                <a href="{{ route('ut.examination.index', Crypt::encryptString($work_order->id)) }}"
                                    class="btn btn-outline-dark btn-lg mx-0" type="button" title="Reset">
                                    <i class="ti-reload"></i>
                                </a>
                                <a href="{{ route('ut.examination.create', Crypt::encryptString($work_order->id)) }}"
                                    class="btn btn-outline-success btn-lg mx-0" type="button">Add Data</a>
                                <a href="#" class="btn btn-outline-warning btn-lg mx-0" type="button"
                                    data-bs-toggle="modal" data-bs-target="#ModalFilter" title="Filter data">
                                    <i class="ti-filter"></i>
                                </a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#ModalImport" type="button"
                                    class="btn btn-outline-primary btn-lg mx-0" title="Import from Excel">
                                    <i class="ti-import"></i>
                                </a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#ModalExportExcel" type="button"
                                    class="btn btn-outline-success btn-lg mx-0" title="Export to Excel">
                                    <i class="mdi mdi-file-excel text-success"></i>
                                </a>
                                <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#ModalExportPdf"
                                    class="btn btn-outline-success btn-lg mx-0" title="Export to PDF">
                                    <i class="mdi mdi-file-pdf text-danger"></i>
                                </a>
                            </div>
                            <div>
                                showing: <u class="fw-bolder">{{ $ut_examination->count() ?? 0 }}</u> data
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
                                                Tanggal
                                            </th>
                                            <th class="text-center">
                                                DAC (%)
                                            </th>
                                            <th class="text-center">
                                                Status
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($ut_examination->count() == 0)
                                            <tr>
                                                <td class="text-center fw-bolder" colspan="8">Belum ada data Ultrasonic
                                                    Test di No Work Order ini. Silahkan hubungi PIC terkait.
                                                </td>
                                            </tr>
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
                                                    <td class="text-center">
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

    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
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
    </div>
    <!-- END: Delete Confirmation Modal -->

    <!-- Modal Detail -->
    <div class="modal fade" id="ModalDetail" tabindex="-1" aria-hidden="true">
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
    </div>
    <!-- End Modal Detail -->

    <!-- Modal Filter-->
    <div class="modal fade" id="ModalFilter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="form_filter" action="{{ route('ut.examination.filter') }}" method="GET">
                        @csrf
                        @method('get')
                        <div class="form-group">
                            <input type="text" name="wo_id" value="{{ $work_order->id }}" hidden>
                            <label class="form-label">Area</label>
                            <select class="form-select" name="area_id">
                                <option disabled selected>- Pilih Area -</option>
                                @foreach ($area as $item)
                                    <option value="{{ $item->id }}">{{ $item->code }} ({{ $item->name }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Line</label>
                            <select class="form-select" name="line_id">
                                <option disabled selected>- Pilih Line -</option>
                                @foreach ($line as $item)
                                    <option value="{{ $item->id }}">{{ $item->code }} ({{ $item->name }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Wesel</label>
                            <select class="form-select" name="wesel_id">
                                <option disabled selected>- Pilih Wesel -</option>
                                @foreach ($wesel as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }} -
                                        ({{ $item->area->code }})
                                        - {{ $item->line->code }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="pull-right">
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

    <!-- Modal Import-->
    <div class="modal fade" id="ModalImport" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="form_import" action="{{ route('ut.examination.import') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <input type="text" name="wo_id" value="{{ $work_order->id }}" hidden>
                            <label class="form-label">No. Work Order</label>
                            <input type="text" class="form-control" value="{{ $work_order->nomor }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">File Excel</label>
                            <input type="file" class="form-control" name="file_excel" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="pull-right">
                        <button type="submit" form="form_import" class="btn btn-primary mx-1">
                            Import
                        </button>
                        <button type="button" class="btn btn-outline-danger mx-1" data-bs-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Import-->
@endsection

@section('javascript')
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
@endsection
