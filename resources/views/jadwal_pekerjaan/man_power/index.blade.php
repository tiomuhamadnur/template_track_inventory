@extends('jadwal_pekerjaan.layout.base')

@section('sub-title')
    <title>
        Man Power on Duty | CPWTM</title>
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
                            <h4 class="card-title">Detail Man Power on Duty</h4>
                            <div class="btn-group">
                                <a href="{{ route('man.power.index') }}" class="btn btn-outline-dark btn-lg mx-0"
                                    type="button" title="Refresh">
                                    <i class="ti-reload"></i>
                                </a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#ModalAddJadwal"
                                    class="btn btn-outline-success btn-lg mx-0" title="Tambah Jadwal Man Power"
                                    type="button" @if (auth()->user()->role != 'Admin') hidden @endif>Add Data</a>
                                <a href="{{ route('man.power.list') }}" class="btn btn-outline-warning btn-lg mx-0"
                                    title="List Jadwal Man Power" type="button"
                                    @if (auth()->user()->role != 'Admin') hidden @endif>Edit Data</a>
                                <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#ModalExportPdf"
                                    class="btn btn-outline-secondary btn-lg mx-0" title="Export to PDF">
                                    <i class="mdi mdi-file-pdf text-danger"></i>
                                </a>
                            </div>
                            <div class="table-responsive pt-3">
                                <span class="badge fw-bolder" style="background-color: #059c00; font-size:15px;">Shift
                                    1</span>
                                <span class="badge fw-bolder" style="background-color: #ff9500; font-size:15px;">Shift
                                    2</span>
                                <span class="badge fw-bolder" style="background-color: #0800ff; font-size:15px;">Shift
                                    3</span>
                                <span class="badge fw-bolder" style="background-color: #8e8e8e; font-size:15px;">Non
                                    Shift</span>
                                <div id='calendar' class="mt-2"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Form Add Jadwal Man Power on Duty-->
    <div class="modal fade" id="ModalAddJadwal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdminTitle">Form Jadwal Man Power on Duty</h5>
                </div>
                <div class="modal-body">
                    <form id="form_add_jadwal" action="{{ route('man.power.store') }}" method="POST">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label class="form-label">Section</label>
                            <select class="form-select" id="section" name="section" required>
                                <option value="" disabled selected>- pilih section -</option>
                                @foreach ($section as $item)
                                    <option value="{{ $item->code }}" data-section="{{ $item->name }}">
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tanggal</label>
                            <input placeholder="Pilih Tanggal" class="form-control me-1" type="text"
                                onfocus="(this.type='date')" onblur="(this.type='text')" id="date" name="start"
                                required>
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
                        <div class="form-group">
                            <label class="form-label btn-group">Man Power @error('user_id')
                                    <span class="text-danger ms-2"> {{ $message }}
                                    </span>
                                @enderror
                            </label>
                            @for ($i = 1; $i < 6; $i++)
                                <select class="form-select mb-1" name="user_id[]">
                                    <option value="" disabled selected>- Man power {{ $i }} -</option>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}"><span
                                                class="text-danger">({{ $item->jabatan }})</span> {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            @endfor
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="float-end">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" form="form_add_jadwal" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Form Export Jadwal-->
    <div class="modal fade" id="ModalExportPdf" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdminTitle">Form Export PDF Jadwal Shift</h5>
                </div>
                <div class="modal-body">
                    <form id="form_export_pdf_jadwal" action="{{ route('man.power.export_pdf') }}" method="GET">
                        @csrf
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
                                    $tahun_ini = \Carbon\Carbon::now()->format('Y');
                                    $bulan = \Carbon\Carbon::now()->format('m');
                                    $tahun = $tahun - 2;
                                @endphp
                                @for ($i = 0; $i <= 3; $i++)
                                    <option value="{{ $tahun }}" @if ($tahun_ini == $tahun) selected @endif>
                                        {{ $tahun }}</option>
                                    @php
                                        $tahun++;
                                    @endphp
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Bulan</label>
                            <select class="form-select" name="bulan" required>
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
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" form="form_export_pdf_jadwal" class="btn btn-primary">
                            Export
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Form Export Jadwal-->
@endsection

@section('javascript')
    <script>
        let data_jadwal = <?php echo json_encode($data); ?>;
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                eventOrder: 'shift,title',
                titleFormat: {
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric',
                },
                buttonText: {
                    list: 'detail',
                },
                headerToolbar: {
                    top: 'title',
                    right: 'today,dayGridMonth,listWeek'
                },
                footerToolbar: {
                    center: 'prev next',
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

        // $('#section').on('change', function() {
        //     var selectedOption = this.options[this.selectedIndex];
        //     var section = selectedOption.getAttribute("data-section");
        //     $.ajax({
        //         url: '/getPegawai?section=' + section,
        //         type: 'get',
        //         success: function(res) {
        //             $('#user_id').html(
        //                 '<option value="" selected disabled>- pilih man power -</option>'
        //             );
        //             $.each(res, function(key, value) {
        //                 $('#user_id').append('<option value="' + value
        //                     .id + '">' + value.name + '</option>');
        //             });
        //         }
        //     });
        // });
    </script>
@endsection
