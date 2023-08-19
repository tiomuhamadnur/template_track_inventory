@extends('jadwal_pekerjaan.layout.base')

@section('sub-title')
    <title>Man Power on Duty | CPWTM</title>
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
                                    type="button">Add Data</a>
                                <a href="{{ route('man.power.list') }}" class="btn btn-outline-warning btn-lg mx-0"
                                    title="List Jadwal Man Power" type="button">Edit Data</a>
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
                            <label class="form-label">Man Power</label>
                            <select class="form-select" id="user_id" name="user_id" required>
                                <option value="" disabled selected>- pilih man power -</option>
                            </select>
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

        $('#section').on('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var section = selectedOption.getAttribute("data-section");
            $.ajax({
                url: '/getPegawai?section=' + section,
                type: 'get',
                success: function(res) {
                    $('#user_id').html(
                        '<option value="" selected disabled>- pilih man power -</option>'
                    );
                    $.each(res, function(key, value) {
                        $('#user_id').append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    </script>
@endsection
