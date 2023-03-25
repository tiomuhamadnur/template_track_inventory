@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Data Lengkung | TCSM</title>
@endsection

@section('sub-content')
    <h4>Master Data > Lengkung</h4>
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
                            <h4 class="card-title">Data Lengkung</h4>
                            <div class="btn-group">
                                <a href="{{ route('lengkung.index') }}" class="btn btn-outline-dark btn-lg mx-0"
                                    type="button" title="Reload halaman">
                                    <i class="ti-reload"></i>
                                </a>
                                <a href="{{ route('lengkung.create') }}" class="btn btn-outline-dark btn-lg" type="button"
                                    title="Tambah data lengkung">Add
                                    Data
                                </a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#import-file-modal"
                                    class="btn btn-outline-dark btn-lg" type="button"
                                    title="Import file Excel data lengkung" style="margin-left: -10px;">
                                    Import
                                </a>
                                <button class="btn btn-outline-dark btn-lg dropdown-toggle" type="button"
                                    id="dropdownMenuIconButton1" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" style="margin-left: -10px;">
                                    - Pilih area -
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                                    <a @php $area='Mainline' @endphp class="dropdown-item"
                                        href="{{ route('lengkung.filter', $area) }}">Mainline</a>
                                    <a @php $area='Depo' @endphp class="dropdown-item"
                                        href="{{ route('lengkung.filter', $area) }}">Depo</a>
                                    <a @php $area='DAL' @endphp class="dropdown-item"
                                        href="{{ route('lengkung.filter', $area) }}">DAL</a>
                                </div>
                            </div>

                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center fw-bolder">
                                                No
                                            </th>
                                            <th class="text-center fw-bolder">
                                                Name
                                            </th>
                                            <th class="text-center fw-bolder">
                                                Area
                                            </th>
                                            <th class="text-center fw-bolder">
                                                Line
                                            </th>
                                            <th class="text-center fw-bolder">
                                                Type
                                            </th>
                                            <th class="text-center text-wrap fw-bolder">
                                                BTC (m)
                                            </th>
                                            <th class="text-center text-wrap fw-bolder">
                                                BCC (m)
                                            </th>
                                            <th class="text-center text-wrap fw-bolder">
                                                IP (m)
                                            </th>
                                            <th class="text-center text-wrap fw-bolder">
                                                ECC (m)
                                            </th>
                                            <th class="text-center text-wrap fw-bolder">
                                                ETC (m)
                                            </th>
                                            <th class="text-center text-wrap fw-bolder">
                                                Radius (m)
                                            </th>
                                            <th class="text-center text-wrap fw-bolder">
                                                Versin (mm)
                                            </th>
                                            <th class="text-center text-wrap fw-bolder">
                                                Cant (mm)
                                            </th>
                                            <th class="text-center text-wrap fw-bolder">
                                                TCL (m)
                                            </th>
                                            <th class="text-center text-wrap fw-bolder">
                                                Twist (mm)
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lengkung as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->name }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->area->code }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->line->code }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->tipe }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->btc ?? '-' }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->bcc ?? '-' }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->ip ?? '-' }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->ecc ?? '-' }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->etc ?? '-' }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->radius ?? '-' }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->versin ?? '-' }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->cant ?? '-' }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->tcl ?? '-' }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->twist ?? '-' }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="{{ route('lengkung.edit', Crypt::encryptString($item->id)) }}"
                                                            type="button" class="btn btn-outline-warning mx-0">Edit</a>
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
                        <form action="{{ route('lengkung.delete') }}" method="POST">
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
                        <form action="{{ route('lengkung.import') }}" method="POST" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAdminTitle">Import File Excel Lengkung</h5>
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
                                        class="btn btn-outline-secondary">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Import Modal -->
@endsection

@section('javascript')
    <script type="text/javascript">
        function toggleModal(id) {
            $('#id').val(id);
        }
    </script>
@endsection
