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
                                        <a href="{{ route('accelerometer.jadwal.create') }}"
                                            class="btn-sm btn-warning rounded mt-2"
                                            title="Buat tanggal kegiatan accelerometer baru">Yes</a>
                                    </label>

                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-row">
                            <div class="name">Line</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="line_id" id="line_id" class="form-select" required>
                                        <option value="" selected disabled>- pilih nama line -</option>
                                        <option value="1">UT (Up Track)</option>
                                        <option value="2">DT (Down Track)</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div> --}}

                        <div id="banner" class="card bg-danger" style="display: none">
                            <h3 class="fw-bolder text-center rounded m-2 text-white mb-3">DATA SUDAH TERISI</h3>
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
                                                                step=".1" name="sumbu_y[]" required placeholder="Lt-Y"
                                                                autocomplete="off">
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
