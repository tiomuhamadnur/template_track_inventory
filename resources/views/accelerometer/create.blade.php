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
                                    <select name="jadwal_id" id="jadwal_id" class="form-select">
                                        <option disabled="disabled" selected="selected">- Pilih jadwal Kegiatan -</option>
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

                        {{-- <div class="form-row">
                            <div class="name">PIC</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="pic" id="pic">
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-row">
                            <div class="name">Line</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="line_id" id="line_id" class="form-select">
                                        <option disabled="disabled" selected="selected">- Pilih Nama Line -</option>
                                        <option value="1">UT (Up Track)</option>
                                        <option value="2">DT (Down Track)</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Area</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="area_id" id="area_id" class="form-select">
                                        <option disabled="disabled" selected="selected">- Pilih Nama Area -</option>
                                        @foreach ($area as $item)
                                            <option value="{{ $item->id }}">{{ $item->code }} - ({{ $item->name }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="card bg-primary">
                            <h3 class="fw-bolder text-center rounded-3 m-2" id="line">LINE</h3>
                        </div>

                        <div class="flex card border border-primary rounded mb-5">
                            <div class="col m-4">
                                <div class="form-row m-b-55">
                                    <div class="name" id="area">AREA</div>
                                    <div class="value">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" id="sumbu_x" name="sumbu_x"
                                                        placeholder="Lt-X">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" id="sumbu_y" name="sumbu_y"
                                                        placeholder="Lt-Y">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" id="sumbu_z" name="sumbu_z"
                                                        placeholder="Lt-Z">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="form-row m-b-55">
                                    <div class="name">FTM-CPR</div>
                                    <div class="value">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_x"
                                                        placeholder="Lt-X">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_y"
                                                        placeholder="Lt-Y">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_z"
                                                        placeholder="Lt-Z">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row m-b-55">
                                    <div class="name">CPR-HJN</div>
                                    <div class="value">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_x"
                                                        placeholder="Lt-X">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_y"
                                                        placeholder="Lt-Y">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_z"
                                                        placeholder="Lt-Z">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row m-b-55">
                                    <div class="name">HJN-BLA</div>
                                    <div class="value">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_x"
                                                        placeholder="Lt-X">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_y"
                                                        placeholder="Lt-Y">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_z"
                                                        placeholder="Lt-Z">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row m-b-55">
                                    <div class="name">BLA-BLM</div>
                                    <div class="value">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_x"
                                                        placeholder="Lt-X">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_y"
                                                        placeholder="Lt-Y">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_z"
                                                        placeholder="Lt-Z">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row m-b-55">
                                    <div class="name">BLM-ASN</div>
                                    <div class="value">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_x"
                                                        placeholder="Lt-X">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_y"
                                                        placeholder="Lt-Y">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_z"
                                                        placeholder="Lt-Z">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row m-b-55">
                                    <div class="name">ASN-SNY</div>
                                    <div class="value">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_x"
                                                        placeholder="Lt-X">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_y"
                                                        placeholder="Lt-Y">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_z"
                                                        placeholder="Lt-Z">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row m-b-55">
                                    <div class="name">SNY-IST</div>
                                    <div class="value">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_x"
                                                        placeholder="Lt-X">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_y"
                                                        placeholder="Lt-Y">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_z"
                                                        placeholder="Lt-Z">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row m-b-55">
                                    <div class="name">IST-BNH</div>
                                    <div class="value">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_x"
                                                        placeholder="Lt-X">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_y"
                                                        placeholder="Lt-Y">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_z"
                                                        placeholder="Lt-Z">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row m-b-55">
                                    <div class="name">BNH-STB</div>
                                    <div class="value">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_x"
                                                        placeholder="Lt-X">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_y"
                                                        placeholder="Lt-Y">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_z"
                                                        placeholder="Lt-Z">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row m-b-55">
                                    <div class="name">STB-DKA</div>
                                    <div class="value">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_x"
                                                        placeholder="Lt-X">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_y"
                                                        placeholder="Lt-Y">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_z"
                                                        placeholder="Lt-Z">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row m-b-55">
                                    <div class="name">DKA-BHI</div>
                                    <div class="value">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_x"
                                                        placeholder="Lt-X">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_y"
                                                        placeholder="Lt-Y">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group-desc">
                                                    <input class="form-control" type="text" name="sumbu_z"
                                                        placeholder="Lt-Z">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                            </div>
                        </div>

                        {{-- <div class="form-row mt-5">
                            <div class="name">Foto Dokumentasi</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="file" name="photo">
                                </div>
                            </div>
                        </div> --}}

                        <div>
                            <a href="{{ route('accelerometer.index') }}" class="btn btn-danger rounded">Cancel</a>
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
                if (line_id == 1) {
                    document.getElementById("line").innerHTML = "UP TRACK";
                } else if (line_id == 2) {
                    document.getElementById("line").innerHTML = "DOWN TRACK";
                }
            });

            $('#jadwal_id').on('change', function() {
                var jadwal_id = this.value;
                $.ajax({
                    url: '/getPICAccelerometer?jadwal_id=' + jadwal_id,
                    type: 'get',
                    success: function(res) {
                        if (res.length > 0) {
                            $.each(res, function(key, value) {
                                $('#pic').val(value.pic);
                            });
                        } else {
                            $('#pic').val('');
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
