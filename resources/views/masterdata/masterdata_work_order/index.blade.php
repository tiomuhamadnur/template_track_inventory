@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Data Work Order | CPWTM</title>
@endsection

@section('sub-content')
    <h4>Master Data > Work Order</h4>
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
                            <h4 class="card-title">Data Work Order</h4>
                            <div class="btn-group">
                                <a href="{{ route('wo.create') }}" class="btn btn-outline-dark btn-lg me-0"
                                    type="button">Add
                                    Data
                                </a>
                                <a href="#" class="btn btn-outline-warning btn-lg ms-0 me-0" type="button"
                                    data-bs-toggle="modal" data-bs-target="#ModalFilter" title="Filter data">
                                    <i class="ti-filter"></i>
                                </a>
                                <button class="btn btn-outline-dark btn-lg dropdown-toggle ms-0" type="button"
                                    id="dropdownMenuIconButton1" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" style="margin-left: -10px;">
                                    <i class="ti-link"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                                    <a class="dropdown-item" href="#">Print</a>
                                    <a class="dropdown-item" href="#">Export to Excel</a>
                                    <a class="dropdown-item" href="#">Export to PDF</a>
                                </div>
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
                                                Nomor Work Order
                                            </th>
                                            <th class="text-center">
                                                Job
                                            </th>
                                            <th class="text-center">
                                                Date Start
                                            </th>
                                            <th class="text-center">
                                                Date Close
                                            </th>
                                            <th class="text-center">
                                                Status
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($work_order as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->nomor }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->job->name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->tanggal_start }}
                                                </td>
                                                <td class="text-center">
                                                    @if ($item->status == 'close')
                                                        {{ $item->tanggal_close ?? '-' }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->status }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="{{ route('wo.edit', Crypt::encryptString($item->id)) }}"
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
                        <form action="{{ route('wo.delete') }}" method="POST">
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

    <!-- Modal Filter-->
    <div class="modal fade" id="ModalFilter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="form_filter" action="{{ route('wo.filter') }}" method="GET">
                        <div class="form-group">
                            @php
                                $tahun_ini = $tahun - 5;
                            @endphp
                            <label class="form-label">Tahun</label>
                            <select class="form-select" name="tahun">
                                <option disabled selected>- Pilih Tahun -</option>
                                @for ($i = $tahun_ini; $i <= $tahun + 5; $i++)
                                    <option value="{{ $i }}" @if ($i == $tahun) selected @endif>
                                        {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Bulan</label>
                            <select class="form-select" name="bulan" required>
                                <option value="" disabled selected>- Pilih Bulan -</option>
                                <option value="1" @if ($bulan == 1) selected @endif>Januari
                                </option>
                                <option value="2" @if ($bulan == 2) selected @endif>Februari
                                </option>
                                <option value="3" @if ($bulan == 3) selected @endif>Maret</option>
                                <option value="4" @if ($bulan == 4) selected @endif>April</option>
                                <option value="5" @if ($bulan == 5) selected @endif>Mei</option>
                                <option value="6" @if ($bulan == 6) selected @endif>Juni</option>
                                <option value="7" @if ($bulan == 7) selected @endif>Juli</option>
                                <option value="8" @if ($bulan == 8) selected @endif>Agustus
                                </option>
                                <option value="9" @if ($bulan == 9) selected @endif>September
                                </option>
                                <option value="10" @if ($bulan == 10) selected @endif>Oktober
                                </option>
                                <option value="11" @if ($bulan == 11) selected @endif>November
                                </option>
                                <option value="12" @if ($bulan == 12) selected @endif>Desember
                                </option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="float-end">
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
