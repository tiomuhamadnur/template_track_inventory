@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Data Detail Location | CPWTM</title>
@endsection

@section('sub-content')
    <h4>Master Data > Data Detail Location</h4>
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
                            <h4 class="card-title">Data Detail Location</h4>
                            <a href="{{ route('masterdata-detail-location.create') }}" class="btn btn-primary btn-lg"
                                type="button">Add
                                Data</a>
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
                                            <th class="text-center">
                                                Kode Detail Location
                                            </th>
                                            <th class="text-center">
                                                Nama Detail Location
                                            </th>
                                            <th class="text-center">
                                                Lokasi Penyimpanan
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detail_location as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->code }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->location->name }}
                                                </td>

                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="{{ route('masterdata-detail-location.edit', $item->id) }}"
                                                            type="button" class="btn btn-outline-warning mx-0">Edit</a>
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
                        <form action="{{ route('masterdata-location.delete') }}" method="POST">
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
