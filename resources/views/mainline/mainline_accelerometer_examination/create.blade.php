@extends('layout.form.form')

@section('head')
    <title>Form Data Accelerometer</title>
@endsection

@section('body')
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Form Data Accelerometer</h2>
                </div>
                <div class="card-body">
                    <form id="data" action="{{ route('accelerometer.store') }}" method="POST">
                        @csrf
                        @method('post')
                        <div class="form-row">
                            <div class="name">Tanggal</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="jadwal_id" id="jadwal_id" class="form-select" required>
                                        <option disabled selected value="">- pilih tanggal realisasi kegiatan -
                                        </option>
                                        @foreach ($jadwal as $item)
                                            <option value="{{ $item->id }}">
                                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}
                                                ({{ $item->pic }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="select-dropdown"></div>
                                    <label class="label label--block mt-2">Buat jadwal baru?
                                        <a href="#" class="btn-sm btn-warning rounded mt-2" data-bs-toggle="modal"
                                            data-bs-target="#ModalCreateJadwal"
                                            title="Buat tanggal kegiatan accelerometer baru">Yes</a>
                                    </label>

                                </div>
                            </div>
                        </div>

                        <div id="banner" class="card border-danger mb-3" style="display: none">
                            <h3 class="fw-bolder text-center rounded m-2 text-danger">DATA SUDAH TERISI</h3>
                        </div>

                        <div id="form" style="display: block">
                            <div class="card bg-success">
                                <h3 class="fw-bolder text-center rounded-3 m-2 text-white">UP TRACK</h3>
                            </div>

                            <div class="flex card border border-success rounded mb-5">
                                <div class="col p-4 text-center">
                                    @foreach ($area as $item)
                                        <div class="form-row mb-1 mt-1 text-center">
                                            <div class="name">{{ $item->code }}</div>
                                            <input type="text" name="area_id[]" value="{{ $item->id }}" required
                                                hidden>
                                            <input type="text" name="line_id[]" value="1" required hidden>
                                            <div class="value">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="input-group-desc">
                                                            <input class="form-control" type="number" min="0"
                                                                step=".1" name="sumbu_x[]" required placeholder="Lt-X"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="input-group-desc">
                                                            <input class="form-control" type="number" min="0"
                                                                step=".1" name="sumbu_y[]" required placeholder="Lt-Y"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="input-group-desc">
                                                            <input class="form-control" type="number" min="0"
                                                                step=".1" name="sumbu_z[]" required placeholder="Lt-Z"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="card bg-warning mt-5">
                                <h3 class="fw-bolder text-center rounded-3 m-2">DOWN TRACK</h3>
                            </div>

                            <div class="flex card border border-warning rounded mb-5">
                                <div class="col p-4 text-center">
                                    @foreach ($area as $item)
                                        <div class="form-row mb-1 mt-1 text-center">
                                            <div class="name">{{ $item->code }}</div>
                                            <input type="text" name="area_id[]" value="{{ $item->id }}" required
                                                hidden>
                                            <input type="text" name="line_id[]" value="2" required hidden>
                                            <div class="value">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="input-group-desc">
                                                            <input class="form-control" type="number" min="0"
                                                                step=".1" name="sumbu_x[]" required placeholder="Lt-X"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="input-group-desc">
                                                            <input class="form-control" type="number" min="0"
                                                                step=".1" name="sumbu_y[]" required
                                                                placeholder="Lt-Y" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="input-group-desc">
                                                            <input class="form-control" type="number" min="0"
                                                                step=".1" name="sumbu_z[]" required
                                                                placeholder="Lt-Z" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="pull-right mt-3">
                            <a href="{{ route('accelerometer.index') }}" class="btn btn-danger rounded">Close</a>
                            <button class="btn btn-success ms-2" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Create Jadwal-->
    <div class="modal fade" id="ModalCreateJadwal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bolder" id="modalAdminTitle">Form Tambah Jadwal Accelerometer</h5>
                </div>
                <div class="modal-body">
                    <form id="form_jadwal" action="{{ route('accelerometer.jadwal.store') }}" method="POST">
                        @csrf
                        @method('post')
                        <div class="form-group mb-2">
                            <label class="form-label mb-0">Kegiatan</label>
                            <input type="text" class="form-control" value="Accelerometer" name="kegiatan" required
                                readonly>
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label mb-0">Tanggal</label>
                            <input placeholder="Tanggal Pelaksanaan" class="form-control me-1" type="text"
                                onfocus="(this.type='date')" onblur="(this.type='text')" id="date" name="tanggal"
                                required>
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label mb-0">Examiner</label>
                            <input type="text" class="form-control" name="pic" placeholder="nama personil"
                                required autocomplete="off">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="pull-right">
                        <button type="submit" form="form_jadwal" class="btn btn-primary justify-content-center">
                            Submit
                        </button>
                        <button type="button" class="btn btn-outline-danger text-dark" data-bs-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Create Jadwal-->
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#jadwal_id').on('change', function() {
                var jadwal_id = this.value;
                var form = document.getElementById("form");
                var banner = document.getElementById("banner");

                $.ajax({
                    url: '/getValueAccelerometer?jadwal_id=' + jadwal_id,
                    type: 'get',
                    success: function(res) {
                        if (res.length > 0) {
                            form.style.display = "none";
                            banner.style.display = "block";
                        } else {
                            form.style.display = "block";
                            banner.style.display = "none";
                        }
                    }
                });
            });

        });
    </script>
@endsection
