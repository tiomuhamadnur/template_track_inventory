@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Data Mainline | CPWTM</title>
@endsection

@section('sub-content')
    <h4>Master Data Mainline > Data Track Bed</h4>
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
                            <h4 class="card-title">Data Track Bed</h4>
                            <a href="{{ route('mainline.create') }}" class="btn btn-outline-dark btn-lg" type="button">Add
                                Data</a>
                            <button class="btn btn-outline-dark btn-lg dropdown-toggle" type="button"
                                id="dropdownMenuIconButton1" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" style="margin-left: -10px;">
                                <i class="ti-link"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                                <a class="dropdown-item" href="#">Print</a>
                                <a class="dropdown-item" href="#">Export to Excel</a>
                                <a class="dropdown-item" href="#">Export to PDF</a>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#import-file-modal">Import Excel File</a>

                            </div>
                            <div class="table-responsive pt-3">
                                <table id="data-tables" class="table table-bordered">
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
                                                No. Span
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mainline as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->area->code }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->line->code }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->no_span }}
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-outline-primary"
                                                        data-bs-toggle="modal" data-bs-target="#ModalSpan"
                                                        data-no="{{ $loop->iteration }}" data-area="{{ $item->area->code }}"
                                                        data-line="{{ $item->line->code }}"
                                                        data-no_span="{{ $item->no_span }}"
                                                        data-kilometer="{{ $item->kilometer ?? '' }}"
                                                        data-panjang_span="{{ $item->panjang_span ?? '' }}"
                                                        data-jumlah_sleeper="{{ $item->jumlah_sleeper ?? '' }}"
                                                        data-spacing_sleeper="{{ $item->spacing_sleeper ?? '' }}"
                                                        data-jenis_sleeper="{{ $item->jenis_sleeper ?? '' }}"
                                                        data-joint="{{ $item->joint ?? '' }}">Show</button>
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


    <div class="col-lg-4 col-md-6">
        <!-- Modal -->
        <div class="modal fade" id="ModalSpan" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAdminTitle">Detail Span Mainline</h5>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <div class="row g-2">
                                <div class="col mb-1">
                                    <label for="nameWithTitle" class="form-label">No. Index</label>
                                    <input readonly type="text" id="no_modal" name="no" class="form-control">
                                </div>
                                <div class="col mb-1">
                                    <label for="" class="form-label">Area</label>
                                    <input readonly type="text" id="area_modal" class="form-control">
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label">Line</label>
                                    <input readonly type="text" id="line_modal" class="form-control">
                                </div>
                                <div class="col mb-1">
                                    <label for="dobWithTitle" class="form-label">Nomor Span</label>
                                    <input readonly type="text" id="no_span_modal" class="form-control">
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label">Chainage (m)</label>
                                    <input readonly type="text" id="kilometer_modal" class="form-control">
                                </div>
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label">Panjang Span</label>
                                    <input readonly type="text" id="panjang_span_modal" class="form-control">
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label">Jumlah Sleeper</label>
                                    <input readonly type="text" id="jumlah_sleeper_modal" class="form-control">
                                </div>
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label">Spacing Sleeper mm</label>
                                    <input readonly type="text" id="spacing_sleeper_modal" class="form-control">
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label">Jenis Sleeper</label>
                                    <input readonly type="text" id="jenis_sleeper_modal" class="form-control">
                                </div>
                                <div class="col mb-1">
                                    <label for="emailWithTitle" class="form-label">Joint</label>
                                    <input readonly type="text" id="joint_modal" class="form-control">
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">
                                Tutup
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- BEGIN: Import Modal -->
        <div id="import-file-modal" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('mainline.import') }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAdminTitle">Import File Excel Track
                                Bed</h5>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('post')
                            <div class="row mb-4">
                                <div class="col">
                                    <input type="file" name="file_excel" class="form-control">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary me-3">Import</button>
                                <button type="button" data-bs-dismiss="modal"
                                    class="btn btn-outline-secondary">Cancel</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- END: Import Modal -->
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#ModalSpan').on('show.bs.modal', function(e) {
                var no = $(e.relatedTarget).data('no');
                var area = $(e.relatedTarget).data('area');
                var line = $(e.relatedTarget).data('line');
                var no_span = $(e.relatedTarget).data('no_span');
                var kilometer = $(e.relatedTarget).data('kilometer');
                var panjang_span = $(e.relatedTarget).data('panjang_span');
                var jumlah_sleeper = $(e.relatedTarget).data('jumlah_sleeper');
                var spacing_sleeper = $(e.relatedTarget).data('spacing_sleeper');
                var jenis_sleeper = $(e.relatedTarget).data('jenis_sleeper');
                var joint = $(e.relatedTarget).data('joint');
                $('#no_modal').val(no);
                $('#area_modal').val(area);
                $('#line_modal').val(line);
                $('#no_span_modal').val(no_span);
                $('#kilometer_modal').val(kilometer);
                $('#panjang_span_modal').val(panjang_span);
                $('#jumlah_sleeper_modal').val(jumlah_sleeper);
                $('#spacing_sleeper_modal').val(spacing_sleeper);
                $('#jenis_sleeper_modal').val(jenis_sleeper);
                $('#joint_modal').val(joint);
            });
        });

        $('#data-tables').dataTable({
            dom: 'lrfitp',
            paging: 100,
            "columnDefs": [{
                "searchable": false,
                "targets": [0, 4],
            }]
        });
    </script>
@endsection
