@extends('layout.form.form')

@section('head')
    <title>Form Data Temuan</title>
@endsection

@section('body')
    <div class="page-wrapper p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Form Data Temuan Baru Depo</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('temuan_depo.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-row">
                            <div class="name">Line</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="line" name="line_id" class="form-select" required>
                                        <option value="" disabled="disabled" selected="selected">- Pilih Nama Line -
                                        </option>
                                        @foreach ($line_depo as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }} ({{ $item->code }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Chainage (m)</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="kilometer"
                                        placeholder="masukan chainage dalam meter" required>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Parts</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="part_id" name="part_id" class="form-select" required>
                                        <option value="" disabled="disabled" selected="selected">- Pilih Nama Part -
                                        </option>
                                        @foreach ($part as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Detail Part</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="detail_part_id" name="detail_part_id" class="form-select" required>
                                        <option value="" disabled="disabled" selected="selected">- Pilih Detail Part -
                                        </option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Defect</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="defect_id" name="defect_id" class="form-select" required>
                                        <option value="" disabled="disabled" selected="selected">- Pilih Nama Defect -
                                        </option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Direction</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="direction" class="form-select">
                                        <option value="" disabled="disabled" selected="selected">- Pilih Direction -
                                        </option>
                                        <option value="L">L (Left)</option>
                                        <option value="R">R (Right)</option>
                                    </select>
                                    <div class="select-dropdown"></div>
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

                        <div class="form-row">
                            <div class="name">Classification of Defect</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="klasifikasi" class="form-select" required>
                                        <option value="" disabled="disabled" selected="selected">- Pilih Klasifikasi -
                                        </option>
                                        <option value="Minor">Minor</option>
                                        <option value="Moderate">Moderate</option>
                                        <option value="Mayor">Mayor</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Staff</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="pic"
                                        value="{{ auth()->user()->name }}" readonly required>
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
                            <div class="name">Foto Dokumentasi</div>
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
                        </div>

                        <div>
                            <a href="{{ route('temuan_depo.index') }}" class="btn btn-warning rounded">Cancel</a>
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
            $('#area').on('change', function() {
                var area = this.value;
                $.ajax({
                    url: '/getLocation?area=' + area,
                    type: 'get',
                    success: function(res) {
                        $('#location').html(
                            '<option selected disabled>- Pilih Nama Location -</option>');
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
                            '<option selected disabled>- Pilih Nama Line -</option>');
                        $.each(res, function(key, value) {
                            $('#line').append('<option value="' + value
                                .id + '">' + value.code + ' - (' + value.name +
                                ')</option>');
                        });
                    }
                });
            });

            $('#line').on('change', function() {
                var line = document.getElementById("line").value;
                var location = document.getElementById("location").value;
                $.ajax({
                    url: '/getSpan?location=' + location + '&line=' + line,
                    type: 'get',
                    success: function(res) {
                        $('#mainline_id').html(
                            '<option selected disabled>- Pilih Nomor Span -</option>');
                        $.each(res, function(key, value) {
                            $('#mainline_id').append('<option value="' + value
                                .id + '">' + value.no_span + ' - (KM: ' + value
                                .kilometer +
                                ')</option>');
                        });
                    }
                });
            });

            $('#part_id').on('change', function() {
                var part_id = this.value;
                $.ajax({
                    url: '/getDetailPart?part_id=' + part_id,
                    type: 'get',
                    success: function(res) {
                        $('#detail_part_id').html(
                            '<option selected disabled>- Pilih Detail Part -</option>');
                        $.each(res, function(key, value) {
                            $('#detail_part_id').append('<option value="' + value
                                .detail_part_id + '">' + value.detail_part_name +
                                '</option>');
                        });
                    }
                });
            });

            $('#detail_part_id').on('change', function() {
                var detail_part_id = this.value;
                var part_id = document.getElementById("part_id").value;
                $.ajax({
                    url: '/getDefect?detail_part_id=' + detail_part_id + '&part_id=' + part_id,
                    type: 'get',
                    success: function(res) {
                        $('#defect_id').html(
                            '<option selected disabled>- Pilih Nama Defect -</option>');
                        $.each(res, function(key, value) {
                            $('#defect_id').append('<option value="' + value
                                .defect_id + '">' + value.defect_name +
                                '</option>');
                        });
                        $('#defect_id').append('<option value="">Lainnya</option>')
                    }
                });
            });
        });
    </script>
@endsection
