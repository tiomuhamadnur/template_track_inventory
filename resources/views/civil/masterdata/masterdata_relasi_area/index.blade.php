@extends('civil.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Data Relasi Area | CPWTM</title>
@endsection

@section('sub-content')
    <h4>Master Data > Relasi Area</h4>
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
                            <h4 class="card-title">Data Relasi Area</h4>
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
                                                Sub Area
                                            </th>
                                            <th class="text-center">
                                                Detail Area
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($relasi_area as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->area->name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->sub_area->name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->detail_area->name }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="{{ route('relasi-area.edit', Crypt::encryptString($item->id)) }}"
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
                    <form id="form_add" action="{{ route('relasi-area.store') }}" method="POST">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label class="form-label">Area</label>
                            <select name="area_id" class="form-select" required>
                                <option value="">-pilih area-</option>
                                @foreach ($area as $item)
                                    <option value="{{ $item->id }}">{{ $item->code }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Sub Area</label>
                            <select name="sub_area_id" class="form-select" required>
                                <option value="">-pilih sub area-</option>
                                @foreach ($sub_area as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Detail Area</label>
                            <select name="detail_area_id" class="form-select" required>
                                <option value="">-pilih detail area-</option>
                                @foreach ($detail_area as $item)
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

    <!-- Modal Update-->
    {{-- <div class="modal fade" id="ModalUpdate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Update Data</h4>
                </div>
                <div class="modal-body">
                    <form id="form_update" action="{{ route('detail-area.update') }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label class="form-label">Detail Area/Ruangan</label>
                            <input type="text" name="id" id="id_update" hidden required>
                            <input type="text" name="name" id="name_update" class="form-control"
                                placeholder="nama detail area/ruangan/segment" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Code Detail Area</label>
                            <input type="text" name="code" id="code_update" class="form-control"
                                placeholder="code detail area (optional)" autocomplete="off">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="float-end">
                        <button type="submit" form="form_update" class="btn btn-primary justify-content-center">
                            Submit
                        </button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Modal Update-->

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
                        <form action="{{ route('relasi-area.delete') }}" method="POST">
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
@endsection

@section('javascript')
    <script>
        function toggleModal(id) {
            $('#id').val(id);
        }

        $(document).ready(function() {
            $('#ModalUpdate').on('show.bs.modal', function(e) {
                var id = $(e.relatedTarget).data('id');
                var name = $(e.relatedTarget).data('name');
                var code = $(e.relatedTarget).data('code');
                $('#id_update').val(id);
                $('#name_update').val(name);
                $('#code_update').val(code);
            });
        });
    </script>
@endsection
