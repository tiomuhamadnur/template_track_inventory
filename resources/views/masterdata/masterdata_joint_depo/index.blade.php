@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Data Joint Depo | CPWTM</title>
@endsection

@section('sub-content')
    <h4>Master Data > Joint Depo</h4>
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
                            <h4 class="card-title">Data Joint Depo</h4>
                            <div class="btn-group">
                                <a href="{{ route('joint.depo.index') }}" class="btn btn-outline-dark btn-lg mx-0"
                                    type="button" title="Reset Filter">
                                    <i class="ti-reload"></i>
                                </a>
                                <a href="{{ route('joint.create') }}" class="btn btn-outline-primary btn-lg me-0"
                                    type="button">Add
                                    Data</a>
                                <a href="#" class="btn btn-outline-warning btn-lg ms-0 me-0" type="button"
                                    data-bs-toggle="modal" data-bs-target="#ModalFilter" title="Filter data">
                                    <i class="ti-filter"></i>
                                </a>
                                <button class="btn btn-outline-dark btn-lg dropdown-toggle ms-0" type="button"
                                    id="dropdownMenuIconButton1" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ti-link"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#ModalExportExcel">Export to Excel</a>
                                </div>
                            </div>
                            <form action="{{ route('joint.depo.export.excel') }}" method="GET" id="form_export_excel">
                                @csrf
                                @method('get')
                                <input type="text" name="area_id" value="{{ $area_id ?? '' }}" hidden>
                                <input type="text" name="line_id" value="{{ $line_id ?? '' }}" hidden>
                                <input type="text" name="tipe" value="{{ $tipe ?? '' }}" hidden>
                                <input type="text" name="wesel_id" value="{{ $wesel_id ?? '' }}" hidden>
                            </form>
                            {{-- <div>
                                showing: <u class="fw-bolder">{{ $joint->count() ?? 0 }}</u> data
                            </div> --}}
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
                                                Name
                                            </th>
                                            <th class="text-center">
                                                Tipe
                                            </th>
                                            <th class="text-center">
                                                Direction
                                            </th>
                                            <th class="text-center">
                                                Wesel
                                            </th>
                                            <th class="text-center">
                                                Chainage (m)
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($joint as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->area->code ?? '-' }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->line->code ?? '-' }}
                                                </td>
                                                <td class="text-center fw-bolder">
                                                    {{ $item->name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->tipe }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->direction ?? '-' }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->wesel->name ?? '-' }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->kilometer ?? '-' }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="{{ route('joint.edit', Crypt::encryptString($item->id)) }}"
                                                            type="button" class="btn btn-outline-warning mx-0"
                                                            target="_blank">Edit</a>
                                                        <a class="btn btn-outline-danger mx-0" href="javascript:;"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#delete-confirmation-modal"
                                                            onclick="toggleModal('{{ $item->id }}')">Delete</a>
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
                        <form action="{{ route('joint.delete') }}" method="POST">
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

    <!-- BEGIN: Import Modal -->
    <div id="import-file-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-2">
                    <div class="p-2 text-center">
                        <form action="{{ route('joint.import') }}" method="POST" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAdminTitle">Import File Excel Joint</h5>
                            </div>
                            <div class="modal-body">
                                @csrf
                                @method('post')
                                <div class="row mb-4">
                                    <div class="col">
                                        <input type="file" name="file_excel" class="form-control" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mx-3">Import</button>
                                    <button type="button" data-bs-dismiss="modal"
                                        class="btn btn-outline-danger">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Import Modal -->

    <!-- Modal Filter-->
    <div class="modal fade" id="ModalFilter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="form_filter" action="{{ route('joint.depo.filter') }}" method="GET">
                        @csrf
                        @method('get')
                        <div class="form-group">
                            <label class="form-label">Area</label>
                            <input type="text" name="area_id" value="1" hidden>
                            <input type="text" class="form-control" value="Depo" readonly>
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
                            <label class="form-label">Tipe Joint</label>
                            <select class="form-select" name="tipe">
                                <option disabled selected>- Pilih Tipe Joint -</option>
                                <option value="NJ">NJ (Normal Joint)</option>
                                <option value="W">W (Welding)</option>
                                <option value="GIJ">GIJ (Glued Rail Joint)</option>
                                <option value="IRJ">IRJ (Insulated Rail Joint)</option>
                                <option value="EJ">EJ (Expansion Joint)</option>
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
                    <div class="float-end">
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
                    <div class="float-end">
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
    <!-- End Export Excel-->
@endsection

@section('javascript')
    <script type="text/javascript">
        function toggleModal(id) {
            $('#id').val(id);
        }

        $('#data-tables').dataTable({
            dom: 'lfitp',
            paging: true,
            "columnDefs": [{
                "searchable": false,
                "targets": [0, 1, 7, 8]
            }]
        });

        function closeModal() {
            $("#ModalExportExcel").modal("hide");
        }
    </script>
@endsection
