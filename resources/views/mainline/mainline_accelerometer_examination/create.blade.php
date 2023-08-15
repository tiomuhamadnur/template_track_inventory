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
                            <div class="name">Jadwal</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="jadwal_id" id="jadwal_id" class="form-select" required>
                                        <option disabled selected value="">- Pilih jadwal Kegiatan -</option>
                                        @foreach ($jadwal as $item)
                                            <option value="{{ $item->id }}">{{ $item->tanggal }}</option>
                                        @endforeach
                                    </select>
                                    <div class="select-dropdown"></div>
                                    <label class="label label--block mt-2">Buat tanggal baru?
                                        <a href="{{ route('accelerometer.jadwal.create') }}"
                                            class="btn-sm btn-warning rounded mt-2"
                                            title="Buat tanggal kegiatan accelerometer baru">Yes</a>
                                    </label>

                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">PIC</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="text" value="{{ auth()->user()->name }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Line</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="line_id" id="line_id" class="form-select" required>
                                        <option value="" selected disabled>- Pilih Nama Line -</option>
                                        <option value="1">UT (Up Track)</option>
                                        <option value="2">DT (Down Track)</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div id="banner" class="card bg-primary">
                            <h3 class="fw-bolder text-center rounded-3 m-2" id="line">LINE</h3>
                        </div>

                        <div id="form" class="flex card border border-primary rounded mb-5">
                            <div class="col p-4 text-center">
                                @foreach ($area as $item)
                                    <div class="form-row mb-1 mt-1 text-center">
                                        <div class="name">{{ $item->code }}</div>
                                        <input type="text" name="area_id[]" value="{{ $item->id }}" required hidden>
                                        <div class="value">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="input-group-desc">
                                                        <input class="form-control" type="number" min="0"
                                                            step=".1" name="sumbu_x[]" required placeholder="Lt-X">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="input-group-desc">
                                                        <input class="form-control" type="number" min="0"
                                                            step=".1" name="sumbu_y[]" required placeholder="Lt-Y">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="input-group-desc">
                                                        <input class="form-control" type="number" min="0"
                                                            step=".1" name="sumbu_z[]" required placeholder="Lt-Z">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="pull-right mt-3">
                            <a href="{{ route('accelerometer.index') }}" class="btn btn-warning rounded">Cancel</a>
                            <button class="btn btn-success ms-2" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#line_id').on('change', function() {
                var line_id = this.value;
                var jadwal_id = document.getElementById("jadwal_id").value;
                var form = document.getElementById("form");
                var banner = document.getElementById("banner");

                $.ajax({
                    url: '/getValueAccelerometer?jadwal_id=' + jadwal_id + '&line_id=' + line_id,
                    type: 'get',
                    success: function(res) {
                        if (res.length > 0) {
                            document.getElementById("line").innerHTML = "DATA SUDAH TERISI";
                            form.style.display = "none";
                            banner.classList.add('bg-danger');
                            form.classList.add('border-danger');
                        } else {
                            form.style.display = "block";
                            if (line_id == 1) {
                                document.getElementById("line").innerHTML = "UP TRACK";
                                banner.classList.toggle('bg-success');
                                form.classList.toggle('border-success');
                            } else if (line_id == 2) {
                                document.getElementById("line").innerHTML = "DOWN TRACK";
                                banner.classList.toggle('bg-warning');
                                form.classList.toggle('border-warning');
                            }
                        }
                    }
                });
            });

            $('#area_id').on('change', function() {
                var jadwal_id = document.getElementById("jadwal_id").value;
                var line_id = document.getElementById("line_id").value;
                var area_id = this.value;
                $.ajax({
                    url: '/getValueAccelerometer?jadwal_id=' + jadwal_id + '&line_id=' + line_id +
                        '&area_id=' + area_id,
                    type: 'get',
                    success: function(res) {
                        if (res.length > 0) {
                            $.each(res, function(key, value) {
                                $('#sumbu_x').val(value.sumbu_x);
                                $('#sumbu_y').val(value.sumbu_y);
                                $('#sumbu_z').val(value.sumbu_z);
                            });
                        } else {
                            $('#sumbu_x').val('');
                            $('#sumbu_y').val('');
                            $('#sumbu_z').val('');
                        }
                    }
                });

                if (area_id == 4) {
                    document.getElementById("area").innerHTML = "LBB-FTM";
                } else if (area_id == 6) {
                    document.getElementById("area").innerHTML = "FTM-CPR";
                } else if (area_id == 8) {
                    document.getElementById("area").innerHTML = "CPR-HJN";
                } else if (area_id == 10) {
                    document.getElementById("area").innerHTML = "HJN-BLA";
                } else if (area_id == 12) {
                    document.getElementById("area").innerHTML = "BLA-BLM";
                } else if (area_id == 14) {
                    document.getElementById("area").innerHTML = "BLM-ASN";
                } else if (area_id == 16) {
                    document.getElementById("area").innerHTML = "ASN-SNY";
                } else if (area_id == 18) {
                    document.getElementById("area").innerHTML = "SNY-IST";
                } else if (area_id == 20) {
                    document.getElementById("area").innerHTML = "IST-BNH";
                } else if (area_id == 22) {
                    document.getElementById("area").innerHTML = "BNH-STB";
                } else if (area_id == 24) {
                    document.getElementById("area").innerHTML = "STB-DKA";
                } else if (area_id == 26) {
                    document.getElementById("area").innerHTML = "DKA-BHI";
                }
            });

        });
    </script>
@endsection
