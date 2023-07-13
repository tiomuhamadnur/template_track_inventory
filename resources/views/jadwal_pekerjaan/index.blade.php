@extends('jadwal_pekerjaan.layout.base')

@section('sub-title')
    <title>Jadwal Pekerjaan | CPWTM</title>
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
                            <h4 class="card-title">Detail Jadwal Pekerjaan</h4>
                            <div class="btn-group">
                                <a href="{{ route('jadwal.pekerjaan.index') }}" class="btn btn-outline-dark btn-lg mx-0"
                                    type="button" title="Refresh">
                                    <i class="ti-reload"></i>
                                </a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#ModalAddJadwal"
                                    class="btn btn-outline-primary btn-lg mx-0" title="Tambah Jadwal Pekerjaan"
                                    type="button">Add Data</a>
                                <a href="{{ route('jadwal.pekerjaan.create') }}" class="btn btn-outline-success btn-lg mx-0"
                                    title="Edit atau Hapus Jadwal Pekerjaan" type="button">Edit Data</a>
                                <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#ModalExportPdf"
                                    class="btn btn-outline-secondary btn-lg mx-0" title="Export to PDF">
                                    <i class="mdi mdi-file-pdf text-danger"></i>
                                </a>
                                {{-- <a href="{{ route('jadwal.pekerjaan.list') }}" class="btn btn-outline-warning btn-lg mx-0"
                                    title="List Jadwal Pekerjaan" type="button">All Data</a> --}}
                            </div>
                            <div class="table-responsive pt-3">
                                {{-- <span class="badge fw-bolder" style="background-color: #059c00; font-size:15px;">Permanent
                                    Way RAMS</span>
                                <span class="badge fw-bolder" style="background-color: #ff9500; font-size:15px;">Permanent
                                    Way Maintenance</span> --}}
                                <div id='calendar' class="mt-2"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Form Add Jadwal Pekerjaan-->
    <div class="modal fade" id="ModalAddJadwal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdminTitle">Form Jadwal Pekerjaan</h5>
                </div>
                <div class="modal-body">
                    <form id="form_add_jadwal" action="{{ route('jadwal.pekerjaan.store') }}" method="POST">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label class="form-label">Section</label>
                            <select class="form-select" name="section" required>
                                <option value="" disabled selected>- pilih section -</option>
                                @foreach ($section as $item)
                                    <option value="{{ $item->code }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama Pekerjaan</label>
                            <select class="form-select" name="job_id" required>
                                <option value="" disabled selected>- pilih pekerjaan -</option>
                                @foreach ($pekerjaan as $item)
                                    <option value="{{ $item->id }}">({{ $item->section }}) - {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Lokasi</label>
                            <input type="text" class="form-control" name="location" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tanggal</label>
                            <div class="input-group">
                                <input placeholder="Tanggal Pekerjaan" class="form-control me-1" type="text"
                                    onfocus="(this.type='date')" onblur="(this.type='text')" id="date" name="start"
                                    required>
                                {{-- <input placeholder="Tanggal Akhir" class="form-control ms-1" type="text"
                                    onfocus="(this.type='date')" onblur="(this.type='text')" id="date" name="end"> --}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Shift</label>
                            <select class="form-select" name="shift" required>
                                <option value="" disabled selected>- pilih shift -</option>
                                @foreach ($shift as $item)
                                    <option value="{{ $item->code }}">{{ $item->name }}</option>
                                @endforeach
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

    <!-- Modal Form Export Pekerjaan-->
    <div class="modal fade" id="ModalExportPdf" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdminTitle">Form Export PDF Jadwal Pekerjaan</h5>
                </div>
                <div class="modal-body">
                    <form id="form_export_pdf_jadwal" action="{{ route('jadwal.pekerjaan.export_pdf') }}"
                        method="GET">
                        @csrf
                        @method('get')
                        <div class="form-group">
                            <label class="form-label">Section</label>
                            <select class="form-select" name="section" required>
                                <option value="" disabled selected>- pilih section -</option>
                                @foreach ($section as $item)
                                    <option value="{{ $item->code }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tahun</label>
                            <select class="form-select" name="tahun" required>
                                <option value="" disabled selected>- pilih tahun -</option>
                                @php
                                    $tahun = \Carbon\Carbon::now()->format('Y');
                                    $tahun = $tahun - 2;
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
                    <div class="btn-group">
                        <button type="submit" form="form_export_pdf_jadwal" class="btn btn-primary">
                            Export
                        </button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        let data_jadwal = <?php echo json_encode($data); ?>;
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'title',
                    center: 'prev,next',
                    right: 'today,dayGridMonth,listMonth'
                    // right: 'today,dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                initialDate: new Date().toJSON().slice(0, 10),
                navLinks: true, // can click day/week names to navigate views
                businessHours: true, // display business hours
                editable: false,
                selectable: false,
                events: data_jadwal,
            });

            calendar.render();
        });
    </script>
@endsection
