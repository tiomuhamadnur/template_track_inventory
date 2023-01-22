@extends('layout.form.form')

@section('head')
    <title>Form Data Temuan</title>
@endsection

@section('body')
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Form Data Temuan Baru</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('temuan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-row">
                            <div class="name">Area</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="area" class="form-select">
                                        <option disabled="disabled" selected="selected">- Pilih Nama Area -</option>
                                        <option value="Mainline">Mainline</option>
                                        <option value="Depo">Depo</option>
                                        <option value="DAL">DAL</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Location</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="location" class="form-select">
                                        <option disabled="disabled" selected="selected">- Pilih Nama Location -
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
                                        <option disabled="disabled" selected="selected">- Pilih Nama Line -</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">No Span</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="mainline_id" name="mainline_id" class="form-select">
                                        <option disabled="disabled" selected="selected">- Pilih Nomor Span -</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Parts</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="part_id" name="part_id" class="form-select">
                                        <option disabled="disabled" selected="selected">- Pilih Nama Part -</option>
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
                                    <select id="detail_part_id" name="detail_part_id" class="form-select">
                                        <option disabled="disabled" selected="selected">- Pilih Detail Part -</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Defect</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="defect_id" name="defect_id" class="form-select">
                                        <option disabled="disabled" selected="selected">- Pilih Nama Defect -
                                        </option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">No Sleeper</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="number" min="1" name="no_sleeper">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Direction</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="direction" class="form-select">
                                        <option disabled="disabled" selected="selected">- Pilih Direction -</option>
                                        <option value="L">L (Left)</option>
                                        <option value="R">R (Right)</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-row">
                            <div class="name">Defect</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="defect_id" class="form-select">
                                        <option disabled="disabled" selected="selected">- Pilih Nama Defect -
                                        </option>
                                        @foreach ($defect as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div> --}}

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
                                    <select name="klasifikasi" class="form-select">
                                        <option disabled="disabled" selected="selected">- Pilih Klasifikasi -
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
                                    <input class="form-control" type="text" name="pic">
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Tanggal</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="date" name="tanggal">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Foto Dokumentasi</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="file" name="photo">
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-row m-b-55">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="first_name">
                                            <label class="label--desc">first name</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="last_name">
                                            <label class="label--desc">last name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row p-t-20">
                            <label class="label label--block">Are you an existing customer?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" checked="checked" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div> --}}

                        <div>
                            <a href="{{ route('temuan.index') }}" class="btn btn-danger rounded">Cancel</a>
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
