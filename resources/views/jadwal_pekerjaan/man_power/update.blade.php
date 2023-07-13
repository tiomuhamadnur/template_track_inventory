@extends('jadwal_pekerjaan.layout.base')

@section('sub-title')
    <title>List Jadwal Man Power on Duty | CPWTM</title>
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
                            <h4 class="card-title">List Jadwal Man Power on Duty <span
                                    class="text-danger fw-bolder">({{ $bulan ?? '' }} {{ $tahun ?? '' }})</span>
                            </h4>
                            <div class="btn-group">
                                <a href="{{ route('man.power.index') }}" class="btn btn-outline-dark btn-lg mx-0"
                                    type="button" title="Back">
                                    <i class="ti-arrow-left"></i>
                                </a>
                                <a href="{{ route('man.power.list') }}" class="btn btn-outline-primary btn-lg mx-0"
                                    type="button" title="Reset Filter">
                                    <i class="ti-reload"></i>
                                </a>
                                <a href="#" class="btn btn-outline-warning btn-lg ms-0 me-0" type="button"
                                    data-bs-toggle="modal" data-bs-target="#ModalFilter" title="Filter data">
                                    <i class="ti-filter"></i>
                                </a>
                            </div>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th class="text-center">
                                                Nama Man Power
                                            </th>
                                            <th class="text-center">
                                                Tanggal
                                            </th>
                                            <th class="text-center">
                                                Shift
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($man_power as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-wrap fw-bolder">
                                                    {{ $item->user->name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->start }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->shift }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a class="btn btn-outline-warning mx-0" href="javascript:;"
                                                            data-bs-toggle="modal" data-bs-target="#edit-modal"
                                                            onclick="editModal('{{ $item->id }}', '{{ $item->user->name }}', '{{ $item->start }}', '{{ $item->shift }}')">Edit</a>
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

    <!-- Modal Form Edit Jadwal Man Power on Duty-->
    <div class="modal fade" id="edit-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdminTitle">Edit Jadwal Man Power on Duty</h5>
                </div>
                <div class="modal-body">
                    <form id="form_add_jadwal" action="{{ route('man.power.update') }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <input type="text" name="id" id="id_edit_modal" hidden>
                            <label class="form-label">Man Power</label>
                            <input type="text" class="form-control" value="" id="name_edit_modal" readonly>
                            {{-- <select class="form-select" name="user_id" required>
                                <option value="" disabled selected>- pilih man power -</option>
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select> --}}
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tanggal</label>
                            <div class="input-group">
                                <input placeholder="Pilih Tanggal" class="form-control me-1" type="text"
                                    onfocus="(this.type='date')" onblur="(this.type='text')" id="date" name="start"
                                    required>
                                {{-- <input placeholder="Tanggal Akhir" class="form-control ms-1" type="text"
                                    onfocus="(this.type='date')" onblur="(this.type='text')" id="date" name="end"> --}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Shift (current: <span id="shift_edit_modal"></span>)</label>
                            <select class="form-select" name="shift" id="shift_edit_modal" required>
                                <option value="" disabled selected>- pilih shift -</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="NS">Non Shift</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button type="submit" form="form_add_jadwal" class="btn btn-primary">
                            Create
                        </button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            Cancel
                        </button>
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
                        <form action="{{ route('man.power.delete') }}" method="POST">
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
                    <form id="form_filter" action="{{ route('man.power.filter') }}" method="GET">
                        <div class="form-group">
                            <label class="form-label">Tahun</label>
                            <select class="form-select" name="tahun" required>
                                <option value="" disabled selected>- pilih tahun -</option>
                                @php
                                    $tahun = \Carbon\Carbon::now()->format('Y');
                                    $tahun = $tahun - 1;
                                @endphp
                                @for ($i = 0; $i <= 10; $i++)
                                    <option value="{{ $tahun }}">{{ $tahun }}</option>
                                    @php
                                        $tahun++;
                                    @endphp
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Bulan</label>
                            <select class="form-select" name="bulan" required>
                                <option value="" disabled selected>- pilih bulan -</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
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
@endsection

@section('javascript')
    <script>
        function toggleModal(id) {
            $('#id').val(id);
        }

        function editModal(id, user_name, date, shift) {
            $('#id_edit_modal').val(id);
            $('#name_edit_modal').val(user_name);
            $('#date').val(date);
            document.getElementById("shift_edit_modal").innerHTML = shift;
        }
    </script>
@endsection
