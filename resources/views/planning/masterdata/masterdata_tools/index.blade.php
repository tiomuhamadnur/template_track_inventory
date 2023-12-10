@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Data Tools | CPWTM</title>
@endsection

@section('sub-content')
    <h4>Master Data > Data Tools</h4>
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
                            <h4 class="card-title">Data Tools</h4>
                            <div class="btn-group">
                                <a href="{{ route('masterdata-tools.create') }}" class="btn btn-primary btn-lg me-0"
                                    type="button">Add
                                    Data</a>
                                <button class="btn btn-outline-dark btn-lg dropdown-toggle ms-0 me-0" type="button"
                                    id="dropdownMenuIconButton2" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ti-link"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton2">
                                    <a class="dropdown-item" href="#">Print</a>
                                    <a class="dropdown-item" href="#">Export to Excel</a>
                                    <a class="dropdown-item" href="#">Export to PDF</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#import-file-modal">Import Excel File</a>
                                </div>

                                {{-- <button class="btn btn-outline-dark btn-lg dropdown-toggle ms-0" type="button"
                                    id="dropdownMenuIconButton1" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ti-filter"></i>
                                </button> --}}

                                {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                                    <a class="dropdown-item" href="/masterdata-tools/filter?section_id=1">PW RAMS Tools</a>
                                    <a class="dropdown-item" href="/masterdata-tools/filter?section_id=2">PW MAINT Tools</a>
                                    <a class="dropdown-item" href="/masterdata-tools/filter?section_id=3">Civil RAMS
                                        Tools</a>
                                    <a class="dropdown-item" href="/masterdata-tools/filter?section_id=4">Civil MAINT
                                        Tools</a>
                                </div> --}}

                            </div>
                            <div>
                                <form class="col-sm-2" method="GET" action="{{ route('masterdata-tools') }}">
                                    <div class="input-group">
                                        <input type="search" name="search" class="form-control form-control-dark"
                                            placeholder="Cari" aria-label="Search">
                                        <button class="btn btn-primary" style="padding: 9.4px"
                                            type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th class="text-center text-wrap">
                                                Nama Tools
                                            </th>
                                            <th class="text-center">
                                                Lokasi Penyimpanan
                                            </th>
                                            <th class="text-center">
                                                Section
                                            </th>
                                            <th class="text-center">
                                                Stock
                                            </th>
                                            <th class="text-center text-wrap">
                                                Expired Date
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($message))
                                            <p>{{ $message }}</p>
                                        @else
                                            @foreach ($tools as $item)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="text-center fw-bolder text-wrap">
                                                        {{ $item->name }}
                                                        </a>
                                                    </td>
                                                    <td class="text-center text-wrap">
                                                        {{ $item->location->name ?? '-' }} <br> <br>
                                                        ({{ $item->detail_location->name ?? '-' }})
                                                    </td>
                                                    <td class="text-center text-wrap">
                                                        {{ $item->section->name }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $item->stock }} {{ $item->unit }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $item->tgl_expired }}
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group-vertical">
                                                            <a href="{{ route('masterdata-tools.edit', $item->id) }}"
                                                                type="button" class="btn btn-outline-warning my-0">
                                                                Edit
                                                            </a>
                                                            <a href="javascript:;" type="button"
                                                                class="btn btn-outline-success my-0" data-bs-toggle="modal"
                                                                data-bs-target="#ModalDetail"
                                                                data-name="{{ $item->name }}"
                                                                data-code="{{ $item->code }}"
                                                                data-location="{{ $item->location->name ?? '-' }}"
                                                                data-detail_location="{{ $item->detail_location->name ?? '-' }}"
                                                                data-section="{{ $item->section->name ?? '-' }}"
                                                                data-departement="{{ $item->departement->name ?? '-' }}"
                                                                data-stock="{{ $item->stock }} {{ $item->unit }}"
                                                                data-photo="{{ asset('storage/' . $item->photo) }}"
                                                                data-tgl_beli="{{ $item->tgl_beli ?? '-' }}"
                                                                data-tgl_sertifikasi="{{ $item->tgl_sertifikasi ?? '-' }}"
                                                                data-tgl_expired="{{ $item->tgl_expired }}"
                                                                data-vendor="{{ $item->vendor ?? '-' }}"
                                                                data-description="{{ $item->description ?? '-' }}">
                                                                Detail
                                                            </a>
                                                            <a class="btn btn-outline-danger my-0 disabled"
                                                                href="javascript:;" data-bs-toggle="modal"
                                                                data-bs-target="#delete-confirmation-modal" onclick="#">
                                                                Delete
                                                            </a>
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

    <!-- Modal Detail -->
    <div class="modal fade" id="ModalDetail" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalAdminTitle">Detail Tools</h3>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="mb-4 text-center align-middle">
                            {{-- KONTEN PHOTO DOKUMENTASI TEMUAN --}}
                            <div class="border mx-auto" style="width: 70%">
                                <p class="fw-bolder mb-0">Photo Tools</p>
                                <img id="photo_modal" class="img-thumbnail lazyload" alt="Tidak ada photo tools">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-1">
                                <label for="nameWithTitle" class="form-label">Name</label>
                                <input readonly type="text" id="name_modal" class="form-control">
                            </div>
                            <div class="col mb-1">
                                <label for="" class="form-label">Code</label>
                                <input readonly type="text" id="code_modal" class="form-control">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label">Departement</label>
                                <input readonly type="text" id="departement_modal" class="form-control">
                            </div>
                            <div class="col mb-1">
                                <label for="dobWithTitle" class="form-label">Section</label>
                                <input readonly type="text" id="section_modal" class="form-control">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label">Location</label>
                                <input readonly type="text" id="location_modal" class="form-control">
                            </div>
                            <div class="col mb-1">
                                <label for="dobWithTitle" class="form-label">Detail Location</label>
                                <input readonly type="text" id="detail_location_modal" class="form-control">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label">Stock</label>
                                <input readonly type="text" id="stock_modal" class="form-control">
                            </div>
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label">Description</label>
                                <input readonly type="text" id="description_modal" class="form-control">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label">Tanggal Beli</label>
                                <input readonly type="text" id="tgl_beli_modal" class="form-control">
                            </div>
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label">Tanggal Sertifikasi</label>
                                <input readonly type="text" id="tgl_sertifikasi_modal" class="form-control">
                            </div>
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label">Tanggal Expired</label>
                                <input readonly type="text" id="tgl_expired_modal" class="form-control">
                            </div>
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label">Vendor</label>
                                <input readonly type="text" id="vendor_modal" class="form-control">
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
                        <form action="#" method="POST">
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
                <form action="{{ route('masterdata-tools.import') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAdminTitle">Import File Excel Data Tools</h5>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('post')
                        <div class="row mb-4">
                            <div class="col">
                                <input type="file" name="file_excel" accept=".xls, .xlsx, .csv" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="float-end mb-3">
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
        $(document).ready(function() {
            $('#ModalDetail').on('show.bs.modal', function(e) {
                var name = $(e.relatedTarget).data('name');
                var code = $(e.relatedTarget).data('code');
                var departement = $(e.relatedTarget).data('departement');
                var section = $(e.relatedTarget).data('section');
                var location = $(e.relatedTarget).data('location');
                var detail_location = $(e.relatedTarget).data('detail_location');
                var stock = $(e.relatedTarget).data('stock');
                var tgl_beli = $(e.relatedTarget).data('tgl_beli');
                var tgl_sertifikasi = $(e.relatedTarget).data('tgl_sertifikasi');
                var tgl_expired = $(e.relatedTarget).data('tgl_expired');
                var vendor = $(e.relatedTarget).data('vendor');
                var description = $(e.relatedTarget).data('description');
                var photo = $(e.relatedTarget).data('photo');


                $('#name_modal').val(name);
                $('#code_modal').val(code);
                $('#departement_modal').val(departement);
                $('#section_modal').val(section);
                $('#location_modal').val(location);
                $('#detail_location_modal').val(detail_location);
                $('#stock_modal').val(stock);
                $('#tgl_beli_modal').val(tgl_beli);
                $('#tgl_sertifikasi_modal').val(tgl_sertifikasi);
                $('#tgl_expired_modal').val(tgl_expired);
                $('#vendor_modal').val(vendor);
                $('#description_modal').val(description);
                document.getElementById("photo_modal").src = photo;
            });
        });
    </script>
@endsection
