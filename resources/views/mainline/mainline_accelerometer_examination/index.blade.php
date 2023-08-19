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
                            <h4 class="card-title">Data Realisasi Accelerometer</h4>
                            <div class="btn-group">
                                <a href="{{ route('accelerometer.index') }}" class="btn btn-outline-dark btn-lg mx-0"
                                    type="button" title="Reset Filter">
                                    <i class="ti-reload"></i>
                                </a>
                                <a href="{{ route('accelerometer.create') }}" class="btn btn-outline-success btn-lg mx-0"
                                    type="button">Add Data</a>
                                <a href="#" class="btn btn-outline-warning btn-lg mx-0" type="button"
                                    data-bs-toggle="modal" data-bs-target="#ModalFilter" title="Filter data">
                                    <i class="ti-filter"></i>
                                </a>
                            </div>

                            <table>
                                <tr>
                                    <td>Tahun</td>
                                    <td> : </td>
                                    <td>{{ $tahun ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Bulan</td>
                                    <td> : </td>
                                    <td>{{ date('F', mktime(0, 0, 0, $bulan, 1)) }}</td>
                                </tr>
                            </table>

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
                                        @if ($jadwal_accelerometer->count() == 0)
                                            <tr>
                                                <td class="text-center fw-bolder" colspan="6">
                                                    Belum ada data accelerometer pada <span
                                                        class="text-danger">{{ date('F', mktime(0, 0, 0, $bulan, 1)) }}
                                                        {{ $tahun ?? '' }}</span>
                                                </td>
                                            </tr>
                                        @else
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
                                                            <a class="btn btn-outline-danger ms-0" href="javascript:;"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#delete-confirmation-modal"
                                                                title="Hapus Data"
                                                                onclick="toggleModal('{{ $item->id }}')">Delete
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

    <!-- Modal Filter-->
    <div class="modal fade" id="ModalFilter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="form_filter" action="{{ route('accelerometer.filter') }}" method="GET">
                        @php
                            $bulan = \Carbon\Carbon::now()->format('m');
                            $tahun = \Carbon\Carbon::now()->format('Y');
                        @endphp
                        <div class="form-group">
                            <label class="form-label">Tahun</label>
                            <select class="form-select" name="tahun" required>
                                @for ($i = $tahun - 4; $i <= $tahun; $i++)
                                    <option value="{{ $i }}" @if ($i == $tahun) selected @endif>
                                        {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Bulan</label>
                            <select class="form-select" name="bulan" required>
                                <option value="1" @if ($bulan == 1) selected @endif>Januari</option>
                                <option value="2" @if ($bulan == 2) selected @endif>Februari</option>
                                <option value="3" @if ($bulan == 3) selected @endif>Maret</option>
                                <option value="4" @if ($bulan == 4) selected @endif>April</option>
                                <option value="5" @if ($bulan == 5) selected @endif>Mei</option>
                                <option value="6" @if ($bulan == 6) selected @endif>Juni</option>
                                <option value="7" @if ($bulan == 7) selected @endif>Juli</option>
                                <option value="8" @if ($bulan == 8) selected @endif>Agustus</option>
                                <option value="9" @if ($bulan == 9) selected @endif>September
                                </option>
                                <option value="10" @if ($bulan == 10) selected @endif>Oktober</option>
                                <option value="11" @if ($bulan == 11) selected @endif>November
                                </option>
                                <option value="12" @if ($bulan == 12) selected @endif>Desember
                                </option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="pull-right">
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
    <!-- End Modal Filter-->
@endsection

@section('javascript')
    <script type="text/javascript">
        function toggleModal(id) {
            $('#id').val(id);
        }
    </script>
@endsection
