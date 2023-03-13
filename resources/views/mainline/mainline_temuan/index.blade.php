@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title>Data Temuan Mainline | TCSM</title>
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
                            <h4 class="card-title">Data Temuan Mainline</h4>
                            <div class="btn-group">
                                <a href="{{ route('temuan_mainline.index') }}" class="btn btn-outline-dark btn-lg mx-0"
                                    type="button" title="Reload halaman">
                                    <i class="ti-reload"></i>
                                </a>
                                <a href="{{ route('temuan_mainline.create') }}" class="btn btn-outline-success btn-lg mx-0"
                                    type="button">Add Data</a>
                                <a href="#" class="btn btn-outline-warning btn-lg mx-0" type="button"
                                    data-bs-toggle="modal" data-bs-target="#ModalFilter" title="Filter data">
                                    <i class="ti-filter"></i>
                                </a>
                                <button type="submit" form="form_export_excel" class="btn btn-outline-success btn-lg mx-0"
                                    title="Export to Excel">
                                    <i class="ti-download"></i>
                                </button>
                                <button type="submit" form="form_export_pdf" class="btn btn-outline-success btn-lg mx-0"
                                    title="Export to PDF">
                                    <i class="ti-clip"></i>
                                </button>
                                <a href="#" class="btn btn-outline-danger btn-lg mx-0" type="button"
                                    data-bs-toggle="modal" data-bs-target="#ModalReport" title="Generate Closing Report">
                                    <i class="ti-printer"></i></a>
                            </div>
                            <form action="{{ route('temuan_mainline.export') }}" method="GET" id="form_export_excel">
                                @csrf
                                @method('get')
                                <input type="text" name="area_id" value="{{ $area_id ?? '' }}" hidden>
                                <input type="text" name="line_id" value="{{ $line_id ?? '' }}" hidden>
                                <input type="text" name="part_id" value="{{ $part_id ?? '' }}" hidden>
                                <input type="text" name="status" value="{{ $status ?? '' }}" hidden>
                            </form>
                            <form action="{{ route('temuan_mainline.export.pdf') }}" target="_blank" method="GET"
                                id="form_export_pdf">
                                @csrf
                                @method('get')
                                <input type="text" name="area_id" value="{{ $area_id ?? '' }}" hidden>
                                <input type="text" name="line_id" value="{{ $line_id ?? '' }}" hidden>
                                <input type="text" name="part_id" value="{{ $part_id ?? '' }}" hidden>
                                <input type="text" name="status" value="{{ $status ?? '' }}" hidden>
                            </form>
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
                                            <th class="text-center">
                                                No. Span <br> (No. Sleeper)
                                            </th>
                                            <th class="text-center">
                                                Part
                                            </th>
                                            <th class="text-center">
                                                Detail Part
                                            </th>
                                            <th class="text-center">
                                                Date
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($temuan as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->mainline->area->code }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->mainline->line->code }}
                                                </td>
                                                <td class="text-center">
                                                    <span
                                                        class="badge @if ($item->status == 'open') bg-success
                                                    @else
                                                    bg-danger @endif">
                                                        {{ $item->mainline->no_span }} <br>
                                                        ({{ $item->no_sleeper }})
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->part->name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->detail_part->name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->tanggal }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-outline-primary ms-0"
                                                            onclick="showPhotoModal('{{ asset('storage/' . $item->photo) }}')"
                                                            data-bs-toggle="modal" data-bs-target="#ModalTemuan"
                                                            data-id="{{ $item->id }}"
                                                            data-area="{{ $item->mainline->area->code }}"
                                                            data-line="{{ $item->mainline->line->code }}"
                                                            data-no_span="{{ $item->mainline->no_span }}"
                                                            data-no_sleeper="{{ $item->no_sleeper }}"
                                                            data-tanggal="{{ $item->tanggal }}"
                                                            data-part="{{ $item->part->name }}"
                                                            data-detail_part="{{ $item->detail_part->name }}"
                                                            data-kilometer="{{ $item->mainline->kilometer }}"
                                                            data-direction="{{ $item->direction ?? '-' }}"
                                                            data-defect="{{ $item->defect->name ?? '-' }}"
                                                            data-klasifikasi="{{ $item->klasifikasi }}"
                                                            data-pic="{{ $item->pic }}"
                                                            data-remark="{{ $item->remark ?? '-' }}"
                                                            data-status="{{ $item->status }}"
                                                            data-photo="{{ asset('storage/' . $item->photo) }}"
                                                            data-photo_close="{{ asset('storage/' . $item->photo_close) }}"
                                                            data-href="{{ '/temuan_mainline' . '/' . Crypt::encryptString($item->id) . '/close_temuan' }}">
                                                            Detail
                                                        </button>
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


    {{-- MODALS DETAIL --}}
    <div class="col-lg-4 col-md-6 mt-4">
        <!-- Modal -->
        <div class="modal fade" id="ModalTemuan" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modalAdminTitle">Detail Temuan Mainline</h3>
                        <div class="col--1 text-center">
                            <img class="img-xs rounded-circle img-thumbnail" id="photo_pic_modal"
                                style="width: 70px; height: 70px;" src="" alt="Examiner">
                            <p class="ml-5 fw-bolder" id="pic_modal">Examiner</p>
                        </div>
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
                            <div class="row g-2">
                                <div class="col mb-1">
                                    <label for="nameWithTitle" class="form-label">Tanggal Temuan</label>
                                    <input readonly type="text" id="tanggal_modal" name="no"
                                        class="form-control">
                                </div>
                                <div class="col mb-1">
                                    <label for="" class="form-label">Area</label>
                                    <input readonly type="text" value="Mainline" class="form-control">
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label">Line</label>
                                    <input readonly type="text" id="line_modal" class="form-control">
                                </div>
                                <div class="col mb-1">
                                    <label for="dobWithTitle" class="form-label">Location</label>
                                    <input readonly type="text" id="area_modal" class="form-control">
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label">Part</label>
                                    <input readonly type="text" id="part_modal" class="form-control">
                                </div>
                                <div class="col mb-1">
                                    <label for="dobWithTitle" class="form-label">Detail Part</label>
                                    <input readonly type="text" id="detail_part_modal" class="form-control">
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label">No. Span</label>
                                    <input readonly type="text" id="no_span_modal" class="form-control">
                                </div>
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label">No. Sleeper</label>
                                    <input readonly type="text" id="no_sleeper_modal" class="form-control">
                                </div>
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label">Chainage</label>
                                    <input readonly type="text" id="kilometer_modal" class="form-control">
                                </div>
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label">Line Direction</label>
                                    <input readonly type="text" id="direction_modal" class="form-control">
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label">Defect</label>
                                    <input readonly type="text" id="defect_modal" class="form-control">
                                </div>
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label">Classification of Defect</label>
                                    <input readonly type="text" id="klasifikasi_modal" class="form-control">
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label">Remark</label>
                                    <input readonly type="text" id="remark_modal" class="form-control">
                                </div>
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label">Status</label>
                                    <input readonly type="text" id="status_modal" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" id="close_temuan_modal" class="btn btn-outline-warning"
                                @if (auth()->user()->role != 'Admin') hidden @endif>
                                Ubah Status
                            </a>
                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">
                                Tutup
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Filter-->
        <div class="modal fade" id="ModalFilter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAdminTitle">Filter Data</h5>
                    </div>
                    <form action="{{ route('temuan_mainline.filter') }}" method="GET">
                        @csrf
                        @method('get')
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Area</label>
                                <select class="form-select" name="area_id">
                                    <option disabled selected>- Pilih Area -</option>
                                    @foreach ($area as $item)
                                        <option value="{{ $item->id }}">{{ $item->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Line</label>
                                <select class="form-select" name="line_id">
                                    <option disabled selected>- Pilih Line -</option>
                                    @foreach ($line as $item)
                                        <option value="{{ $item->id }}">{{ $item->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Part</label>
                                <select class="form-select" name="part_id">
                                    <option disabled selected>- Pilih Part -</option>
                                    @foreach ($part as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select class="form-select" name="status">
                                    <option disabled selected>- Status -</option>
                                    <option value="open">Open</option>
                                    <option value="close">Close</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary justify-content-center">
                                Filter
                            </button>
                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">
                                Tutup
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Report -->
        <div class="modal fade" id="ModalReport" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <form action="{{ route('temuan_mainline.report') }}" method="GET">
                        @csrf
                        @method('get')
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAdminTitle">Generate Report Activity</h5>
                        </div>
                        <div class="modal-body pt-3 mb-0">
                            <div class="form-group align-middle">
                                <label class="form-label">Examiner</label>
                                <input class="form-control p-1" type="text" name="examiner"
                                    placeholder="Nama examiner" required>
                            </div>
                            <div class="form-group align-middle">
                                <label class="form-label">Pilih Area</label> <br>
                                <div class="btn-group align-middle">
                                    <select name="area_rencana_start" class="form-select" required>
                                        <option value="" disabled selected>-Pilih area start-</option>
                                        @foreach ($area_rencana as $item)
                                            <option value="{{ $item->code }}">{{ $item->code }}</option>
                                        @endforeach
                                    </select>
                                    <div class="mx-3">
                                        <p>to</p>
                                    </div>
                                    <select name="area_rencana_finish" class="form-select" required>
                                        <option value="" disabled selected>-Pilih area finish-</option>
                                        @foreach ($area_rencana as $item)
                                            <option value="{{ $item->code }}">{{ $item->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group align-middle">
                                <label class="form-label">Pilih Tanggal Kegiatan</label>
                                <input class="form-control p-1" type="date" name="tanggal" required>
                            </div>
                        </div>

                        <div class="modal-footer mt-2">
                            <button type="submit" formtarget="_blank" class="btn btn-primary justify-content-center">
                                Generate
                            </button>
                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">
                                Tutup
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @section('javascript')
        <script>
            $(document).ready(function() {
                $('#ModalTemuan').on('show.bs.modal', function(e) {
                    var id = $(e.relatedTarget).data('id');
                    var tanggal = $(e.relatedTarget).data('tanggal');
                    var area = $(e.relatedTarget).data('area');
                    var line = $(e.relatedTarget).data('line');
                    var no_span = $(e.relatedTarget).data('no_span');
                    var no_sleeper = $(e.relatedTarget).data('no_sleeper');
                    var kilometer = $(e.relatedTarget).data('kilometer');
                    var part = $(e.relatedTarget).data('part');
                    var detail_part = $(e.relatedTarget).data('detail_part');
                    var direction = $(e.relatedTarget).data('direction');
                    var defect = $(e.relatedTarget).data('defect');
                    var klasifikasi = $(e.relatedTarget).data('klasifikasi');
                    var remark = $(e.relatedTarget).data('remark');
                    var pic = $(e.relatedTarget).data('pic');
                    $.ajax({
                        url: '/getAvatar?pic=' + pic,
                        type: 'get',
                        success: function(res) {
                            $.each(res, function(key, value) {
                                document.getElementById("photo_pic_modal").src = value;
                            });
                        }
                    });
                    var status = $(e.relatedTarget).data('status');
                    var photo = $(e.relatedTarget).data('photo');
                    var photo_close = $(e.relatedTarget).data('photo_close');
                    var href = $(e.relatedTarget).data('href');

                    $('#tanggal_modal').val(tanggal);
                    $('#area_modal').val(area);
                    $('#line_modal').val(line);
                    $('#no_span_modal').val(no_span);
                    $('#no_sleeper_modal').val(no_sleeper);
                    $('#kilometer_modal').val(kilometer);
                    $('#part_modal').val(part);
                    $('#detail_part_modal').val(detail_part);
                    $('#direction_modal').val(direction);
                    $('#defect_modal').val(defect);
                    $('#klasifikasi_modal').val(klasifikasi);
                    $('#remark_modal').val(remark);
                    document.getElementById("pic_modal").innerHTML = pic;
                    $('#status_modal').val(status);
                    document.getElementById("photo_modal").src = photo;
                    document.getElementById("photo_close_modal").src = photo_close;
                    document.getElementById("close_temuan_modal").href = href;
                });
            });
        </script>
    @endsection
