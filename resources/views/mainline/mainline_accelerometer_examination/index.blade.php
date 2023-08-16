@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title>Accelerometer | CPWTM</title>
@endsection

@section('sub-content')
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
                            <h4 class="card-title">Data Realisasi Accelerometer (Tahun: {{ $tahun }})</h4>
                            <a href="{{ route('accelerometer.create') }}" class="btn btn-outline-dark btn-lg"
                                type="button">Add
                                Data
                            </a>
                            <div>
                                showing: <u class="fw-bolder">{{ $jadwal_accelerometer->count() ?? 0 }}</u> data
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
                                                Examiner
                                            </th>
                                            <th class="text-center">
                                                Summary
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
                                                <td class="text-center fw-bolder">
                                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->kegiatan }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->pic }}
                                                </td>
                                                <td class="text-center">
                                                    <form action="{{ route('accelerometer.report') }}" method="get">
                                                        <input type="text" name="jadwal_id" hidden
                                                            value="{{ Crypt::encryptString($item->id) }}">
                                                        <button class="btn btn-outline-success rounded text-dark"
                                                            type="submit" title="Show summary Accelerometer">
                                                            <i class="mdi mdi-file-document p-1"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="{{ route('accelerometer.summary.index', Crypt::encryptString($item->id)) }}"
                                                            class="btn btn-outline-warning me-0" title="Ubah Data">
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-outline-danger ms-0"
                                                            @if (auth()->user()->role != 'Admin') hidden @endif
                                                            href="javascript:;" data-bs-toggle="modal"
                                                            data-bs-target="#delete-confirmation-modal" title="Hapus Data"
                                                            onclick="toggleModal('{{ $item->id }}')">Delete
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
                            <div class="pull-right">
                                <button type="button" data-bs-dismiss="modal"
                                    class="btn btn-outline-warning w-24 mr-1 me-2">Cancel</button>
                                <button type="submit" class="btn btn-danger w-24">Delete</button>
                            </div>
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
