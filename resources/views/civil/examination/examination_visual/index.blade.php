@extends('civil.examination.examination_layout.base')

@section('sub-title')
    <title>Data Temuan Visual | CPWTM</title>
    <style>
        .float {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }
    </style>
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
                            <h4 class="card-title">Data Temuan Visual</h4>
                            <div class="btn-group">
                                <a href="{{ route('temuan-visual.index') }}" class="btn btn-outline-dark btn-lg mx-0"
                                    type="button" title="Reset Filter">
                                    <i class="ti-reload"></i>
                                </a>
                                <a href="{{ route('temuan-visual.create') }}" class="btn btn-outline-success btn-lg mx-0"
                                    type="button">
                                    Add Data
                                </a>
                                <a href="#" class="btn btn-outline-warning btn-lg mx-0" type="button"
                                    data-bs-toggle="modal" data-bs-target="#ModalFilter" title="Filter data">
                                    <i class="ti-filter"></i>
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
                            {{-- <div>
                                showing: <u class="fw-bolder">{{ $temuan_visual->count() ?? 0 }}</u> data
                            </div> --}}
                            <form action="{{ route('temuan-visual.export') }}" hidden method="GET" id="form_export_excel">
                                @csrf
                                @method('get')
                                <input type="text" name="area_id" value="{{ $area_id ?? '' }}" hidden>
                                <input type="text" name="sub_area_id" value="{{ $sub_area_id ?? '' }}" hidden>
                                <input type="text" name="detail_area_id" value="{{ $detail_area_id ?? '' }}" hidden>
                                <input type="text" name="part_id" value="{{ $part_id ?? '' }}" hidden>
                                <input type="text" name="detail_part_id" value="{{ $detail_part_id ?? '' }}" hidden>
                                <input type="text" name="defect_id" value="{{ $defect_id ?? '' }}" hidden>
                                <input type="text" name="status" value="{{ $status ?? '' }}" hidden>
                                <input type="text" name="klasifikasi" value="{{ $klasifikasi ?? '' }}" hidden>
                                <input type="text" name="tanggal_awal" value="{{ $tanggal_awal ?? '' }}" hidden>
                                <input type="text" name="tanggal_akhir" value="{{ $tanggal_akhir ?? '' }}" hidden>
                            </form>
                            <form action="{{ route('temuan-visual.export.pdf') }}" hidden target="_blank" method="GET"
                                id="form_export_pdf">
                                @csrf
                                @method('get')
                                <input type="text" name="area_id" value="{{ $area_id ?? '' }}" hidden>
                                <input type="text" name="sub_area_id" value="{{ $sub_area_id ?? '' }}" hidden>
                                <input type="text" name="detail_area_id" value="{{ $detail_area_id ?? '' }}" hidden>
                                <input type="text" name="part_id" value="{{ $part_id ?? '' }}" hidden>
                                <input type="text" name="detail_part_id" value="{{ $detail_part_id ?? '' }}" hidden>
                                <input type="text" name="defect_id" value="{{ $defect_id ?? '' }}" hidden>
                                <input type="text" name="status" value="{{ $status ?? '' }}" hidden>
                                <input type="text" name="klasifikasi" value="{{ $klasifikasi ?? '' }}" hidden>
                                <input type="text" name="tanggal_awal" value="{{ $tanggal_awal ?? '' }}" hidden>
                                <input type="text" name="tanggal_akhir" value="{{ $tanggal_akhir ?? '' }}" hidden>
                            </form>
                            {{ $temuan_visual->links('vendor.pagination.bootstrap-5') }}
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th class="text-center text-wrap">
                                                No Ticket
                                            </th>
                                            <th class="text-center">
                                                Area
                                            </th>
                                            <th class="text-center text-wrap">
                                                Sub Area <br>
                                                (Detail Area)
                                            </th>
                                            <th class="text-center">
                                                Part
                                            </th>
                                            <th class="text-center text-wrap">
                                                Detail Part <br>
                                                (Defect)
                                            </th>
                                            <th class="text-center text-wrap">
                                                Classification <br>
                                                (Priority)
                                            </th>
                                            <th class="text-center">
                                                Status
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
                                        @foreach ($temuan_visual as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ ($temuan_visual->currentPage() - 1) * $temuan_visual->perPage() + $loop->index + 1 }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->ticket_number ?? '-' }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->area->code }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->sub_area->name }} <br>
                                                    ({{ $item->detail_area->name ?? '-' }})
                                                </td>
                                                <td class="text-center text-wrap">
                                                    {{ $item->part->name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->detail_part->name }} <br>
                                                    ({{ $item->defect->name ?? 'Lainnya' }})
                                                </td>
                                                <td class="text-center">
                                                    <span
                                                        class="badge @if ($item->prioritas == 'High') bg-danger
                                                        @elseif($item->prioritas == 'Medium') bg-warning
                                                        @elseif($item->prioritas == 'Low') bg-primary
                                                        @else
                                                        bg-secondary @endif">
                                                        {{ $item->klasifikasi }} <br>
                                                        ({{ $item->prioritas }})
                                                    </span>
                                                </td>
                                                <td
                                                    class="text-center fw-bolder @if ($item->status == 'close') text-success @else text-danger @endif">
                                                    {{ $item->status }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->tanggal }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-outline-primary ms-0"
                                                            data-bs-toggle="modal" data-bs-target="#ModalTemuan"
                                                            data-id="{{ $item->id }}"
                                                            data-area="{{ $item->area->code }}"
                                                            data-sub_area="{{ $item->sub_area->name }}"
                                                            data-detail_area="{{ $item->detail_area->name }}"
                                                            data-part="{{ $item->part->name }}"
                                                            data-detail_part="{{ $item->detail_part->name ?? '-' }}"
                                                            data-defect="{{ $item->defect->name ?? 'Lainnya' }}"
                                                            data-klasifikasi="{{ $item->klasifikasi }}"
                                                            data-prioritas="{{ $item->prioritas }}"
                                                            data-status="{{ $item->status }}"
                                                            data-remark="{{ $item->remark ?? '-' }}"
                                                            data-pic="{{ $item->pic }}"
                                                            data-tanggal="{{ $item->tanggal }}"
                                                            data-photo="{{ asset('storage/' . $item->photo) }}"
                                                            data-pic_rfi="{{ $item->pic_rfi ?? '' }}"
                                                            data-tanggal_rfi="{{ $item->tanggal_rfi ?? '' }}"
                                                            data-pic_close="{{ $item->pic_close ?? '' }}"
                                                            data-tanggal_close="{{ $item->tanggal_close ?? '' }}"
                                                            data-photo_close="{{ asset('storage/' . $item->photo_close) }}"
                                                            data-justifikasi="{{ $item->justifikasi ?? '' }}"
                                                            data-pic_justifikasi="{{ $item->pic_justifikasi ?? '' }}"
                                                            data-eksekutor="{{ $item->eksekutor ?? '-' }}"
                                                            data-href="{{ '/temuan-visual' . '/' . Crypt::encryptString($item->id) . '/close_temuan' }}"
                                                            data-href-ubah="{{ '/temuan-visual' . '/' . Crypt::encryptString($item->id) . '/edit' }}"
                                                            data-href-rfi="{{ route('rfi.civil.create', Crypt::encryptString($item->id)) }}">
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
        <div class="bg-white shadow badge text-black border border-dark border-2 float" style="width:200px;">
            <div class="row px-auto py-1">
                <h4 class="fw-bolder mb-2">Keterangan:</h4>
                <div class="mx-auto text-wrap">
                    <span class="badge bg-danger mb-1">High</span>
                    <span class="badge bg-warning">Medium</span>
                    <span class="badge bg-primary">Low</span>
                    <span class="badge bg-secondary">Monitoring</span>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Detail -->
    <div class="modal fade" id="ModalTemuan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalAdminTitle">Detail Temuan</h3>
                    <div class="col--1 text-center">
                        <img class="img-xs rounded-circle img-thumbnail" id="photo_pic_modal"
                            style="width: 70px; height: 70px;" src="" alt="Examiner">
                        <p class="ml-5 fw-bolder" id="pic_modal">Examiner</p>
                    </div>
                </div>
                <form action="#" method="POST">
                    <div class="modal-body">
                        <div class="mb-4 text-center align-middle">
                            {{-- KONTEN PHOTO DOKUMENTASI TEMUAN --}}
                            <div class="mx-auto" style="width: 70%">
                                <p class="fw-bolder mb-0">Sebelum Perbaikan</p>
                                <img id="photo_modal" class="img-thumbnail lazyload" alt="Tidak ada photo dokumentasi">
                            </div>
                        </div>
                        <div class="mb-4 text-center align-middle">
                            {{-- KONTEN PHOTO DOKUMENTASI TEMUAN CLOSE --}}
                            <div class="mx-auto" style="width: 70%">
                                <p class="fw-bolder mb-0">Setelah Perbaikan</p>
                                <img id="photo_close_modal" class="img-thumbnail lazyload"
                                    alt="Belum ada dokumentasi perbaikan">
                            </div>
                        </div>
                        <div class="border border-2 border-dark rounded-3 p-3">
                            <h3 class="fw-bolder mb-3 text-center">DATA EXAMINATION</h3>
                            <div class="row g-2 mb-2">
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label mb-0">Status</label>
                                    <input readonly type="text" id="status_modal" class="form-control">
                                </div>
                            </div>
                            <div class="row g-2 mb-2">
                                <div class="col mb-1">
                                    <label for="nameWithTitle" class="form-label mb-0">Tanggal Temuan</label>
                                    <input readonly type="text" id="tanggal_modal" name="no"
                                        class="form-control">
                                </div>
                                <div class="col mb-1">
                                    <label for="" class="form-label mb-0">Area</label>
                                    <input readonly type="text" id="area_modal" class="form-control">
                                </div>
                            </div>
                            <div class="row g-2 mb-2">
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label mb-0">Sub Area</label>
                                    <input readonly type="text" id="sub_area_modal" class="form-control">
                                </div>
                                <div class="col mb-1">
                                    <label for="dobWithTitle" class="form-label mb-0">Detail Area</label>
                                    <input readonly type="text" id="detail_area_modal" class="form-control">
                                </div>
                            </div>
                            <div class="row g-2 mb-2">
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label mb-0">Part</label>
                                    <input readonly type="text" id="part_modal" class="form-control">
                                </div>
                                <div class="col mb-1">
                                    <label for="dobWithTitle" class="form-label mb-0">Detail Part</label>
                                    <input readonly type="text" id="detail_part_modal" class="form-control">
                                </div>
                            </div>
                            <div class="row g-2 mb-2">
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label mb-0">Defect</label>
                                    <input readonly type="text" id="defect_modal" class="form-control">
                                </div>
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label mb-0">Classification</label>
                                    <input readonly type="text" id="klasifikasi_modal" class="form-control">
                                </div>
                            </div>
                            <div class="row g-2 mb-2">
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label mb-0">Remark</label>
                                    <input readonly type="text" id="remark_modal" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="border border-2 border-dark rounded-3 p-3 mt-5">
                            <h3 class="fw-bolder mb-3 text-center">DATA MAINTENANCE</h3>
                            <div class="row g-2 mb-2">
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label mb-0">Eksekutor Perbaikan</label>
                                    <input readonly type="text" id="eksekutor_modal" class="form-control">
                                </div>
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label mb-0">PIC Perbaikan</label>
                                    <input readonly type="text" id="rfi_modal" class="form-control">
                                </div>
                            </div>
                            <div class="row g-2 mb-2">
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label mb-0">Justifikasi <sup
                                            class="text-danger">*Tim Maintenance</sup></label>
                                    <input readonly type="text" id="justifikasi_modal" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" id="ubah_temuan_modal" class="btn btn-outline-warning"
                            @if (auth()->user()->role != 'Admin') hidden @endif>
                            Ubah Data Temuan
                        </a>
                        <a href="#" id="rfi_temuan_modal" target="_blank" onclick="closeModal()"
                            class="btn btn-outline-success">
                            Request For Inspection
                        </a>
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
                    <form id="form_filter" action="{{ route('temuan-visual.filter') }}" method="GET">
                        @csrf
                        @method('get')
                        <div class="form-group">
                            <label class="form-label mb-0">Area</label>
                            <select class="form-select" name="area_id">
                                <option disabled selected>- Pilih Area -</option>
                                @foreach ($area as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $area_id) selected @endif>
                                        {{ $item->code }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label mb-0">Sub Area</label>
                            <select class="form-select" name="sub_area_id">
                                <option disabled selected>- Pilih Sub Area -</option>
                                @foreach ($sub_area as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $sub_area_id) selected @endif>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label mb-0">Detail Area</label>
                            <select class="form-select" name="detail_area_id">
                                <option disabled selected>- Pilih Detail Area -</option>
                                @foreach ($detail_area as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $detail_area_id) selected @endif>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label mb-0">Part</label>
                            <select class="form-select" name="part_id">
                                <option disabled selected>- Pilih Part -</option>
                                @foreach ($part as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $part_id) selected @endif>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label mb-0">Detail Part</label>
                            <select class="form-select" name="detail_part_id">
                                <option disabled selected>- Pilih Detail Part -</option>
                                @foreach ($detail_part as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $detail_part_id) selected @endif>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label mb-0">Defect</label>
                            <select class="form-select" name="defect_id">
                                <option disabled selected>- Pilih Defect -</option>
                                @foreach ($defect as $item)
                                    <option value="{{ $item->id }}"
                                        @if ($item->id == $defect_id) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label mb-0">Status</label>
                            <select class="form-select" name="status">
                                <option disabled selected>- Status -</option>
                                <option value="open" @if ($status == 'open') selected @endif>Open</option>
                                <option value="close" @if ($status == 'close') selected @endif>Close</option>
                                <option value="rfi" @if ($status == 'rfi') selected @endif>RFI</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label mb-0">Classification</label>
                            <select class="form-select" name="klasifikasi">
                                <option disabled selected>- Classification -</option>
                                {{-- <option value="Minor">Minor</option>
                                <option value="Moderate">Moderate</option>
                                <option value="Mayor">Mayor</option> --}}
                                <option value="AA" @if ($klasifikasi == 'AA') selected @endif>AA</option>
                                <option value="A1" @if ($klasifikasi == 'A1') selected @endif>A1</option>
                                <option value="A2" @if ($klasifikasi == 'A2') selected @endif>A2</option>
                                <option value="B" @if ($klasifikasi == 'B') selected @endif>B</option>
                                <option value="C" @if ($klasifikasi == 'C') selected @endif>C</option>
                                <option value="S" @if ($klasifikasi == 'S') selected @endif>S (Monitoring)
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label mb-0">Tanggal</label>
                            <div class="input-group">
                                <input placeholder="Tanggal Awal" class="form-control me-1" type="text"
                                    onfocus="(this.type='date')" onblur="(this.type='text')" id="date"
                                    name="tanggal_awal" value="{{ $tanggal_awal }}">
                                <input placeholder="Tanggal Akhir" class="form-control ms-1" type="text"
                                    onfocus="(this.type='date')" onblur="(this.type='text')" id="date"
                                    name="tanggal_akhir" value="{{ $tanggal_akhir }}">
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

    <!-- Modal Export Pdf -->
    <div class="modal fade" id="ModalExportPdf" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdminTitle">Apakah anda yakin?</h5>
                </div>
                <div class="modal-body pt-3 mb-0">
                    <div class="p-2 text-center">
                        <h1 class="text-center align-middle text-danger mt-2" style="font-size: 100px">
                            <i class="mdi mdi-file-pdf mx-auto"></i>
                        </h1>
                        <div class="text-slate-500 mt-2">File PDF akan didownload sesuai data yang difilter!</div>
                    </div>
                </div>

                <div class="modal-footer mt-2">
                    <div class="pull-right">
                        <button type="submit" formtarget="_blank" form="form_export_pdf" onclick="closeModal()"
                            class="btn btn-success justify-content-center">
                            Download PDF
                        </button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Report -->
    {{-- <div class="modal fade" id="ModalReport" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form action="{{ route('temuan_mainline.report') }}" method="GET">
                    @csrf
                    @method('get')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAdminTitle">
                            <a href="{{ route('closing_report.check') }}" onclick="closeModal()" target="_blank"
                                class="text-danger">
                                <i class="mdi mdi-file-pdf"></i>
                            </a>
                            Generate Report Form Track Patrol on Foot
                        </h5>
                    </div>
                    <div class="modal-body pt-3 mb-0">
                        <div class="form-group align-middle">
                            <label class="form-label">Examiner</label>
                            <input class="form-control p-1" type="text" name="examiner" placeholder="Nama examiner"
                                required>
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
                        <div class="pull-right">
                            <button type="submit" formtarget="_blank" onclick="closeModal()"
                                class="btn btn-primary justify-content-center">
                                Generate
                            </button>
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                                Tutup
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    <!-- End Modal Report -->
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#ModalTemuan').on('show.bs.modal', function(e) {
                var id = $(e.relatedTarget).data('id');
                var tanggal = $(e.relatedTarget).data('tanggal');
                var area = $(e.relatedTarget).data('area');
                var sub_area = $(e.relatedTarget).data('sub_area');
                var detail_area = $(e.relatedTarget).data('detail_area');
                var part = $(e.relatedTarget).data('part');
                var detail_part = $(e.relatedTarget).data('detail_part');
                var defect = $(e.relatedTarget).data('defect');
                var klasifikasi = $(e.relatedTarget).data('klasifikasi');
                var prioritas = $(e.relatedTarget).data('prioritas');
                var remark = $(e.relatedTarget).data('remark');
                var pic = $(e.relatedTarget).data('pic');
                var pic_close = $(e.relatedTarget).data('pic_close');
                var tanggal_close = $(e.relatedTarget).data('tanggal_close');
                var pic_rfi = $(e.relatedTarget).data('pic_rfi');
                var tanggal_rfi = $(e.relatedTarget).data('tanggal_rfi');
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
                var justifikasi = $(e.relatedTarget).data('justifikasi');
                var pic_justifikasi = $(e.relatedTarget).data('pic_justifikasi');
                var eksekutor = $(e.relatedTarget).data('eksekutor');
                var photo = $(e.relatedTarget).data('photo');
                var photo_close = $(e.relatedTarget).data('photo_close');
                var href = $(e.relatedTarget).data('href');
                var href_ubah_temuan = $(e.relatedTarget).data('href-ubah');
                var href_rfi = $(e.relatedTarget).data('href-rfi');

                $('#tanggal_modal').val(tanggal);
                $('#area_modal').val(area);
                $('#sub_area_modal').val(sub_area);
                $('#detail_area_modal').val(detail_area);
                $('#part_modal').val(part);
                $('#detail_part_modal').val(detail_part);
                $('#defect_modal').val(defect);
                $('#klasifikasi_modal').val(klasifikasi + ' (' + prioritas + ')');
                $('#remark_modal').val(remark);
                $('#eksekutor_modal').val(eksekutor);
                document.getElementById("pic_modal").innerHTML = pic;
                if (pic_close == '') {
                    $('#status_modal').val(status);
                    $('#rfi_modal').val('-');
                } else {
                    $('#status_modal').val(status + ' (by: ' + pic_close + ' - at: ' + tanggal_close + ')');
                    $('#rfi_modal').val(pic_rfi + ' (at: ' + tanggal_rfi + ')');
                }
                if (status == 'open') {
                    photo_close = 'status-masih-open-tidak-ada-photo-perbaikan'
                }
                if (justifikasi == '') {
                    $('#justifikasi_modal').val('-');
                } else {
                    $('#justifikasi_modal').val(justifikasi + ' (by: ' + pic_justifikasi + ')');
                }
                document.getElementById("photo_modal").src = photo;
                document.getElementById("photo_close_modal").src = photo_close;
                document.getElementById("ubah_temuan_modal").href = href_ubah_temuan;
                document.getElementById("rfi_temuan_modal").href = href_rfi;
                if (status == 'close') {
                    document.getElementById("rfi_temuan_modal").style.display = 'none';
                    document.getElementById("ubah_temuan_modal").style.display = 'none';
                } else {
                    document.getElementById("rfi_temuan_modal").style.display = 'block';
                    document.getElementById("ubah_temuan_modal").style.display = 'block';
                }
            });
        });

        function closeModal() {
            $("#ModalTemuan").modal("hide");
            $("#ModalReport").modal("hide");
            $("#ModalExportExcel").modal("hide");
            $("#ModalExportPdf").modal("hide");
        }
    </script>
@endsection
