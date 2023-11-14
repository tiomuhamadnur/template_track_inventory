@extends('layout.form.form')

@section('head')
    <title>Form Data Ultrasonic Test</title>
@endsection

@section('body')
    <div class="page-wrapper p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Form Data Ultrasonic Test Welding Joint</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('ut.examination.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-row">
                            <div class="name">No. Work Order</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="text" name="wo_id" value="{{ $work_order->id }}" hidden>
                                    <input type="text" class="form-control" value="{{ $work_order->nomor }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Apakah area Turnout?</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="is_wesel" class="form-select" required>
                                        <option value="" selected disabled>- Apakah Joint di Wesel/Turnout? -</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div id="non_wesel_container" style="display: none">
                            <div class="form-row">
                                <div class="name">Area</div>
                                <div class="value">
                                    <div class="input-group">
                                        <select id="area" class="form-select">
                                            <option value="" selected disabled>- Pilih Nama Area -</option>
                                            <option value="Mainline">Mainline</option>
                                            <option value="DAL">DAL</option>
                                            <option value="Depo">Depo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="name">Location</div>
                                <div class="value">
                                    <div class="input-group">
                                        <select id="location" class="form-select">
                                            <option value="" selected disabled>- Pilih Nama Location -
                                            </option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="name">Line</div>
                                <div class="value">
                                    <div class="input-group">
                                        <select id="line" class="form-select">
                                            <option selected disabled value="">- Pilih Nama Line -</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="name">Direction</div>
                                <div class="value">
                                    <div class="input-group">
                                        <select id="direction" name="direction" class="form-select">
                                            <option value="" selected disabled>- Pilih Direction -
                                            </option>
                                            <option value="L">L (Left)</option>
                                            <option value="R">R (Right)</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="wesel_container" style="display: none">
                            <div class="form-row">
                                <div class="name">Turnout</div>
                                <div class="value">
                                    <div class="input-group">
                                        <select id="wesel" class="form-select">
                                            <option selected disabled value="">- Pilih Nama Turnout -</option>
                                            @foreach ($wesel as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }} -
                                                    ({{ $item->area->code }})
                                                    - ({{ $item->line->code }})</option>
                                            @endforeach
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">No. Joint (Welding)</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="joint_id" name="joint_id" class="form-select" required>
                                        <option value="" selected disabled>- Pilih No Welding Joint -
                                        </option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Tanggal</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="date" name="tanggal" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">DAC (%)</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="number" name="dac" min="0"
                                        value="0" step=".1" placeholder="Distance Amplitude Curve (0.00)"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Depth (mm)</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="number" name="depth"
                                        placeholder="Kedalaman Defect" min="0" value="0" step=".1">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Length (mm)</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="number" name="length"
                                        placeholder="Panjang Defect" min="0" value="0" step=".1">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Operator</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="operator"
                                        placeholder="Nama Examiner" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Remark</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea name="remark" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-row">
                            <div class="name">Foto Dokumentasi (Landscape)</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="file" name="photo" required>
                                    @error('photo')
                                        <p class="bg-danger rounded-3 text-center text-white mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}

                        <div class="btn-group mx-2 pull-right">
                            <a href="{{ route('ut.examination.index', Crypt::encryptString($work_order->id)) }}"
                                class="btn btn-warning rounded">Cancel</a>
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
            $('#is_wesel').on('change', function() {
                var is_wesel = this.value;
                var wesel_container = document.getElementById("wesel_container");
                var non_wesel_container = document.getElementById("non_wesel_container");
                if (is_wesel == 'yes') {
                    wesel_container.style.display = "block";
                    non_wesel_container.style.display = "none";
                } else if (is_wesel == 'no') {
                    wesel_container.style.display = "none";
                    non_wesel_container.style.display = "block";
                }
            });

            $('#area').on('change', function() {
                var area = this.value;
                $.ajax({
                    url: '/getLocation?area=' + area,
                    type: 'get',
                    success: function(res) {
                        $('#location').html(
                            '<option value="" selected disabled>- Pilih Nama Location -</option>'
                        );
                        $.each(res, function(key, value) {
                            $('#location').append('<option value="' + value
                                .id + '">' + value.code + ' - (' + value.name +
                                ')</option>');
                        });
                    }
                });
            });

            $('#location').on('change', function() {
                var area = document.getElementById("area").value;
                $.ajax({
                    url: '/getLine?area=' + area,
                    type: 'get',
                    success: function(res) {
                        $('#line').html(
                            '<option value="" selected disabled>- Pilih Nama Line -</option>'
                        );
                        $.each(res, function(key, value) {
                            $('#line').append('<option value="' + value
                                .id + '">' + value.code + ' - (' + value.name +
                                ')</option>');
                        });
                    }
                });
            });

            $('#line').on('change', function() {
                var line_id = this.value;
                var area_id = document.getElementById("location").value;
                $.ajax({
                    url: '/get-no-joint?area_id=' + area_id + '&line_id=' + line_id + '&direction=',
                    type: 'get',
                    success: function(res) {
                        $('#joint_id').html(
                            '<option value="" selected disabled>- Pilih No Welding Joint -</option>'
                        );
                        $.each(res, function(key, value) {
                            $('#joint_id').append('<option value="' + value
                                .id + '">' + value.name + ' - (' + value
                                .direction + ')' +
                                '</option>');
                        });
                    }
                });
            });

            $('#direction').on('change', function() {
                var direction = this.value;
                var area_id = document.getElementById("location").value;
                var line_id = document.getElementById("line").value;
                $.ajax({
                    url: '/get-no-joint?area_id=' + area_id + '&direction=' + direction +
                        '&line_id=' + line_id,
                    type: 'get',
                    success: function(res) {
                        $('#joint_id').html(
                            '<option value="" selected disabled>- Pilih No Welding Joint -</option>'
                        );
                        $.each(res, function(key, value) {
                            $('#joint_id').append('<option value="' + value
                                .id + '">' + value.name + ' - (' + value
                                .direction + ')' +
                                '</option>');
                        });
                    }
                });
            });

            $('#wesel').on('change', function() {
                var wesel_id = this.value;
                $.ajax({
                    url: '/get-no-joint-wesel?wesel_id=' + wesel_id,
                    type: 'get',
                    success: function(res) {
                        $('#joint_id').html(
                            '<option value="" selected disabled>- Pilih No Welding Joint -</option>'
                        );
                        $.each(res, function(key, value) {
                            $('#joint_id').append('<option value="' + value
                                .id + '">' + value.name + ' - (' + value
                                .direction + ')' +
                                '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection
