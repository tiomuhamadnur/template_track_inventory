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
                                <button class="btn btn-outline-dark btn-lg dropdown-toggle ms-0" type="button"
                                    id="dropdownMenuIconButton1" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ti-filter"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                                    <a class="dropdown-item" href="/masterdata-tools/filter?section_id=1">PW RAMS Tools</a>
                                    <a class="dropdown-item" href="/masterdata-tools/filter?section_id=2">PW MAINT Tools</a>
                                    <a class="dropdown-item" href="/masterdata-tools/filter?section_id=3">Civil RAMS
                                        Tools</a>
                                    <a class="dropdown-item" href="/masterdata-tools/filter?section_id=4">Civil MAINT
                                        Tools</a>
                                </div>
                            </div>
                            <div>
                                <form class="col-sm-2" method="GET" action="{{ route('masterdata-tools') }}">
                                    <div class="input-group">
                                        <input type="search" name="search" class="form-control form-control-dark"
                                            placeholder="Cari Data..." aria-label="Search">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                            {{-- <button class="btn btn-outline-dark btn-lg dropdown-toggle" type="button"
                                id="dropdownMenuIconButton1" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" style="margin-left: -10px;">
                                <i class="ti-link"></i>
                            </button> --}}
                            {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                                <a class="dropdown-item" href="#">Print</a>
                                <a class="dropdown-item" href="#">Export to Excel</a>
                                <a class="dropdown-item" href="#">Export to PDF</a>
                            </div> --}}
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
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tools as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center fw-bolder text-wrap">
                                                    {{ $item->name }}
                                                </td>
                                                <td class="text-center text-wrap">
                                                    {{ $item->location->name ?? '-' }} <br>
                                                    ({{ $item->detail_location->name ?? '-' }})
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->section->name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->stock }} {{ $item->unit }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="{{ route('masterdata-tools.edit', $item->id) }}"
                                                            type="button" class="btn btn-outline-warning mx-0">Edit</a>
                                                        <a href="#" type="button"
                                                            class="btn btn-outline-success mx-0">Detail</a>
                                                        <a class="btn btn-outline-danger mx-0 disabled" href="javascript:;"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#delete-confirmation-modal"
                                                            onclick="#">Delete</a>
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
@endsection
