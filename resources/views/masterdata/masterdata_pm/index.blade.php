@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Data Annual Jobs | CPWTM</title>
@endsection

@section('sub-content')
    <h4>Master Data > Annual Jobs </h4>
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
                            <h4 class="card-title">Data Annual Jobs</h4>
                            <a href="{{ route('pm.create') }}" class="btn btn-outline-dark btn-lg" type="button">Add
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
                            </div>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th class="text-center">
                                                Logo
                                            </th>
                                            <th class="text-center">
                                                Section
                                            </th>
                                            <th class="text-center text-wrap">
                                                Name
                                            </th>
                                            <th class="text-center">
                                                Item <br>
                                                (Part)
                                            </th>
                                            <th class="text-center text-wrap">
                                                Detail
                                            </th>
                                            <th class="text-center">
                                                Frequency <br>
                                                (per Year)
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pm as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center">
                                                    <img src="{{ asset('storage/' . $item->logo ?? '') }}" alt="logo"
                                                        style="height: 40px; width:40px">
                                                </td>
                                                <td class="text-wrap text-center">
                                                    {{ $item->section }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->name }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->item }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->detail }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->frekuensi }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="{{ route('pm.edit', Crypt::encryptString($item->id)) }}"
                                                            type="button" class="btn btn-outline-warning mx-0">Edit</a>
                                                        <a class="btn btn-outline-danger mx-0 disabled" href="javascript:;"
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
                        <form action="{{ route('pm.delete') }}" method="POST">
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
    <script type="text/javascript">
        function toggleModal(id) {
            $('#id').val(id);
        }
    </script>
@endsection
