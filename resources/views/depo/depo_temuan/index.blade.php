@extends('depo.depo_layout.base')

@section('sub-title')
    <title>Data Temuan Depo | CPWTM</title>
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
                            <h4 class="card-title">Data Temuan Depo</h4>
                            <div class="btn-group">
                                <a href="{{ route('temuan_depo.index') }}" class="btn btn-outline-dark btn-lg mx-0"
                                    type="button" title="Reset Filter">
                                    <i class="ti-reload"></i>
                                </a>
                                <a href="{{ route('temuan_depo.create') }}" class="btn btn-outline-success btn-lg mx-0"
                                    type="button">Add Data</a>
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
                                <a href="#" class="btn btn-outline-danger btn-lg mx-0" type="button"
                                    data-bs-toggle="modal" data-bs-target="#ModalReport" title="Generate Report">
                                    <i class="ti-printer"></i></a>
                            </div>
                            <div>
                                showing: <u class="fw-bolder">{{ $temuan_depo->count() ?? 0 }}</u> data
                            </div>
                            <form action="{{ route('temuan_depo.export') }}" method="GET" id="form_export_excel">
                                @csrf
                                @method('get')
                                <input type="text" name="line_id" value="{{ $line_id ?? '' }}" hidden>
                                <input type="text" name="part_id" value="{{ $part_id ?? '' }}" hidden>
                                <input type="text" name="status" value="{{ $status ?? '' }}" hidden>
                                <input type="text" name="klasifikasi" value="{{ $klasifikasi ?? '' }}" hidden>
                                <input type="text" name="tanggal_awal" value="{{ $tanggal_awal ?? '' }}" hidden>
                                <input type="text" name="tanggal_akhir" value="{{ $tanggal_akhir ?? '' }}" hidden>
                            </form>
                            <form action="{{ route('temuan_depo.export.pdf') }}" target="_blank" method="GET"
                                id="form_export_pdf">
                                @csrf
                                @method('get')
                                <input type="text" name="line_id" value="{{ $line_id ?? '' }}" hidden>
                                <input type="text" name="part_id" value="{{ $part_id ?? '' }}" hidden>
                                <input type="text" name="status" value="{{ $status ?? '' }}" hidden>
                                <input type="text" name="klasifikasi" value="{{ $klasifikasi ?? '' }}" hidden>
                                <input type="text" name="tanggal_awal" value="{{ $tanggal_awal ?? '' }}" hidden>
                                <input type="text" name="tanggal_akhir" value="{{ $tanggal_akhir ?? '' }}" hidden>
                            </form>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th class="text-center">
                                                Line
                                            </th>
                                            <th class="text-center text-wrap">
                                                Chainage
                                            </th>
                                            <th class="text-center">
                                                Part
                                            </th>
                                            <th class="text-center">
                                                Detail Part <br>
                                                (Defect)
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
                                        @foreach ($temuan_depo as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->line->code }}
                                                </td>
                                                <td class="text-center">
                                                    <span
                                                        class="badge @if ($item->status == 'open') bg-danger
                                                        @elseif ($item->status == 'monitoring') bg-warning
                                                    @else
                                                    bg-success @endif">
                                                        {{ $item->kilometer . ' m' }}
                                                    </span>
                                                </td>
                                                <td class="text-center text-wrap">
                                                    {{ $item->part->name }}
                                                </td>
                                                <td class="text-center text-wrap">
                                                    {{ $item->detail_part->name }} <br>
                                                    ({{ $item->defect->name ?? 'Lainnya' }})
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->tanggal }}
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-outline-primary ms-0"
                                                        data-bs-toggle="modal" data-bs-target="#ModalTemuan"
                                                        data-line="{{ $item->line->code }}"
                                                        data-tanggal="{{ $item->tanggal }}"
                                                        data-part="{{ $item->part->name }}"
                                                        data-detail_part="{{ $item->detail_part->name }}"
                                                        data-kilometer="{{ $item->kilometer }}"
                                                        data-direction="{{ $item->direction }}"
                                                        data-defect="{{ $item->defect->name ?? 'Lainnya' }}"
                                                        data-klasifikasi="{{ $item->klasifikasi }}"
                                                        data-pic="{{ $item->pic }}"
                                                        data-remark="{{ $item->remark ?? '-' }}"
                                                        data-status="{{ $item->status }}"
                                                        data-justifikasi="{{ $item->justifikasi ?? '-' }}"
                                                        data-photo="{{ asset('storage/' . $item->photo) }}"
                                                        data-photo_close="{{ asset('storage/' . $item->photo_close) }}"
                                                        data-pic_close="{{ $item->pic_close ?? '' }}"
                                                        data-tanggal_close="{{ $item->tanggal_close ?? '' }}"
                                                        data-tanggal_rfi="{{ $item->tanggal_rfi ?? '' }}"
                                                        data-pic_rfi="{{ $item->pic_rfi ?? '' }}"
                                                        data-href="{{ '/temuan_depo' . '/' . Crypt::encryptString($item->id) . '/close_temuan' }}"
                                                        data-href-ubah="{{ '/temuan_depo' . '/' . Crypt::encryptString($item->id) . '/edit' }}"
                                                        data-href-rfi="{{ '/rfi-depo' . '/' . Crypt::encryptString($item->id) . '/rfi' }}">
                                                        Detail
                                                    </button>
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
                <div class="btn-group">
                    <span class="badge bg-danger">Open</span>
                    <span class="badge bg-warning">Monitoring</span>
                    <span class="badge bg-success">Closed</span>
                </div>
            </div>
        </div>
    </div>


    {{-- MODALS DETAIL --}}
    <div class="col-lg-4 col-md-6">
        <!-- Modal -->
        <div class="modal fade" id="ModalTemuan" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modalAdminTitle">Detail Temuan Depo</h3>
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
                            </div>
                            <div class="row g-2">
                                <div class="col mb-1">
                                    <label for="" class="form-label">Area</label>
                                    <input readonly type="text" value="Depo" class="form-control">
                                </div>
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label">Line</label>
                                    <input readonly type="text" id="line_modal" class="form-control">
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
                                    <label for="emailWithTitle" class="form-label">Chainage (m)</label>
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
                            <div class="row g-2">
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label">Justifikasi Tim Maintenance</label>
                                    <input readonly type="text" id="justifikasi_modal" class="form-control">
                                </div>
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label">Pic Perbaikan</label>
                                    <input readonly type="text" id="rfi_modal" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" id="ubah_temuan_modal" class="btn btn-outline-warning"
                                @if (auth()->user()->role != 'Admin') hidden @endif>
                                Ubah Data Temuan
                            </a>
                            <a href="#" id="rfi_temuan_modal" target="_blank" class="btn btn-outline-success"
                                onclick="closeModal()">
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
    </div>


    {{-- MODALS FILTER --}}
    <div class="col-lg-2 col-md-4">
        <!-- Modal -->
        <div class="modal fade" id="ModalFilter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="{{ route('temuan_depo.filter') }}" id="form_filter" method="GET">
                            @csrf
                            @method('get')
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
                                    <option value="monitoring">Monitoring</option>
                                    <option value="close">Close</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Classification</label>
                                <select class="form-select" name="klasifikasi">
                                    <option disabled selected>- Classification -</option>
                                    <option value="Minor">Minor</option>
                                    <option value="Moderate">Moderate</option>
                                    <option value="Mayor">Mayor</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tanggal</label>
                                <div class="input-group">
                                    <input placeholder="Tanggal Awal" class="form-control me-1" type="text"
                                        onfocus="(this.type='date')" onblur="(this.type='text')" id="date"
                                        name="tanggal_awal">
                                    <input placeholder="Tanggal Akhir" class="form-control ms-1" type="text"
                                        onfocus="(this.type='date')" onblur="(this.type='text')" id="date"
                                        name="tanggal_akhir">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
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

        {{-- MODALS GENERATE REPORT --}}
        <div class="col-lg-2 col-md-4">
            <!-- Modal -->
            <div class="modal fade" id="ModalReport" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <form action="{{ route('temuan_depo.report') }}" method="GET">
                            @csrf
                            @method('get')
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAdminTitle">Generate Report Activity Depo</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group align-middle">
                                    <label class="form-label">Pilih Tanggal Kegiatan</label>
                                    <input class="form-control p-1" type="date" name="tanggal" required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" formtarget="_blank" class="btn btn-primary justify-content-center"
                                    onclick="closeModal()">
                                    Generate
                                </button>
                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                                    Tutup
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#ModalTemuan').on('show.bs.modal', function(e) {
                var tanggal = $(e.relatedTarget).data('tanggal');
                var line = $(e.relatedTarget).data('line');
                var kilometer = $(e.relatedTarget).data('kilometer');
                var part = $(e.relatedTarget).data('part');
                var detail_part = $(e.relatedTarget).data('detail_part');
                var direction = $(e.relatedTarget).data('direction');
                var defect = $(e.relatedTarget).data('defect');
                var klasifikasi = $(e.relatedTarget).data('klasifikasi');
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
                var photo = $(e.relatedTarget).data('photo');
                var photo_close = $(e.relatedTarget).data('photo_close');
                var href = $(e.relatedTarget).data('href');
                var href_ubah_temuan = $(e.relatedTarget).data('href-ubah');
                var href_rfi = $(e.relatedTarget).data('href-rfi');

                $('#tanggal_modal').val(tanggal);
                $('#line_modal').val(line);
                $('#kilometer_modal').val(kilometer);
                $('#part_modal').val(part);
                $('#detail_part_modal').val(detail_part);
                $('#direction_modal').val(direction);
                $('#defect_modal').val(defect);
                $('#klasifikasi_modal').val(klasifikasi);
                $('#remark_modal').val(remark);
                document.getElementById("pic_modal").innerHTML = pic;
                if (pic_close == '') {
                    $('#status_modal').val(status);
                } else {
                    $('#status_modal').val(status + ' (by: ' + pic_close + ' - at: ' + tanggal_close + ')');
                    $('#rfi_modal').val(pic_rfi + ' (' + tanggal_rfi + ')');
                }
                $('#justifikasi_modal').val(justifikasi);
                document.getElementById("photo_modal").src = photo;
                document.getElementById("photo_close_modal").src = photo_close;
                // document.getElementById("close_temuan_modal").href = href;
                document.getElementById("ubah_temuan_modal").href = href_ubah_temuan;
                document.getElementById("rfi_temuan_modal").href = href_rfi;
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
