@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title>Accelerometer | TCSM</title>
@endsection

@section('sub-content')
    <h4>Mainline > Accelerometer</h4>
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
                            <h4 class="card-title">Data Accelerometer</h4>
                            <a href="{{ route('accelerometer.create') }}" class="btn btn-outline-dark btn-lg"
                                type="button">Add
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
                                                Tanggal
                                            </th>
                                            <th class="text-center">
                                                Kegiatan
                                            </th>
                                            <th class="text-center">
                                                PIC
                                            </th>
                                            <th class="text-center">
                                                Report
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jadwal_accelerometer as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('accelerometer.summary.index', Crypt::encryptString($item->id)) }}"
                                                        class="btn btn-warning rounded"
                                                        title="Lihat Detail Summary di tanggal {{ $item->tanggal }}!">
                                                        {{ $item->tanggal }}
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->kegiatan }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->pic }}
                                                </td>
                                                <td>
                                                    <div>
                                                        <form action="{{ route('accelerometer.report') }}" method="get">
                                                            @csrf
                                                            @method('get')
                                                            <input type="text" name="jadwal_id" hidden
                                                                value="{{ $item->id }}">
                                                            <button class="btn btn-success rounded text-white"
                                                                type="submit" title="Export Laporan Kegiatan"
                                                                formtarget="_blank">
                                                                <i class="mdi mdi-file-document"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-outline-warning">Edit</button>
                                                    <a class="btn btn-outline-danger" href="javascript:;"
                                                        data-bs-toggle="modal" data-bs-target="#delete-confirmation-modal"
                                                        onclick="toggleModal('{{ $item->id }}')">Delete</a>
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
                        <form action="{{ route('accelerometer.jadwal.delete') }}" method="POST">
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
