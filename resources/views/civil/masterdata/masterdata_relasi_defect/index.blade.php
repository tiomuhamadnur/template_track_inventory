@extends('civil.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Data Relasi Defect | CPWTM</title>
@endsection

@section('sub-content')
    <h4>Master Data > Relasi Defect</h4>
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
                            <h4 class="card-title">Data Relasi Defect</h4>
                            <a href="#" class="btn btn-outline-dark btn-lg" type="button" data-bs-toggle="modal"
                                data-bs-target="#ModalAdd">
                                Add Data
                            </a>
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
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th class="text-center">
                                                Part
                                            </th>
                                            <th class="text-center">
                                                Detail Part
                                            </th>
                                            <th class="text-center">
                                                Defect
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($relasi_defect as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->part->name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->detail_part->name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->defect->name }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="{{ route('relasi-defect.edit', Crypt::encryptString($item->id)) }}"
                                                            type="button" class="btn btn-outline-warning mx-0">
                                                            Edit
                                                        </a>
                                                        <a type="button" href="javascript:;" data-bs-toggle="modal"
                                                            data-bs-target="#delete-confirmation-modal"
                                                            onclick="toggleModal('{{ $item->id }}')"
                                                            class="btn btn-outline-danger mx-0">
                                                            Delete
                                                        </a>
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

    <!-- Modal Add-->
    <div class="modal fade" id="ModalAdd" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Add Data</h4>
                </div>
                <div class="modal-body">
                    <form id="form_add" action="{{ route('relasi-defect.store') }}" method="POST">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label class="form-label">Part</label>
                            <select name="part_id" class="form-select" required>
                                <option value="">-pilih part-</option>
                                @foreach ($part as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Detail Part</label>
                            <select name="detail_part_id" class="form-select" required>
                                <option value="">-pilih detail part-</option>
                                @foreach ($detail_part as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Defect</label>
                            <select name="defect_id" class="form-select" required>
                                <option value="">-pilih defect-</option>
                                @foreach ($defect as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="float-end">
                        <button type="submit" form="form_add" class="btn btn-primary justify-content-center">
                            Submit
                        </button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Add-->

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
                        <form action="{{ route('relasi-defect.delete') }}" method="POST">
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
    <div id="import-file-modal" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('relasi-defect.import') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAdminTitle">Import File Excel Relasi Defect</h5>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('post')
                        <div class="row mb-4">
                            <div class="col">
                                <input type="file" name="file_excel" class="form-control" required>
                            </div>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary me-3">Import</button>
                            <button type="button" data-bs-dismiss="modal" class="btn btn-outline-danger">Cancel</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- END: Import Modal -->
@endsection

@section('javascript')
    <script>
        function toggleModal(id) {
            $('#id').val(id);
        }
    </script>
@endsection
