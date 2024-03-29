@extends('layout.form.form')

@section('head')
    <title>Form Data Temuan</title>
@endsection

@section('body')
    <div class="page-wrapper p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5 shadow">
                <div class="card-heading">
                    <h2 class="title">Form Data Temuan Baru Mainline</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('temuan_mainline.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-row">
                            <div class="name">Area</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="area" class="form-select" required>
                                        <option value="" selected disabled>- Pilih Nama Area -</option>
                                        <option value="Mainline">Mainline</option>
                                        <option value="DAL">DAL</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Location</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="location" class="form-select" required>
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
                                    <select id="line" class="form-select" required>
                                        <option selected disabled value="">- Pilih Nama Line -</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">No Span</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="mainline_id" name="mainline_id" class="form-select mainline_id" required>
                                        <option value="" selected disabled>- Pilih Nomor Span -
                                        </option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Parts</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="part_id" name="part_id" class="form-select" required>
                                        <option value="" selected disabled>- Pilih Nama Part -
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
                                        <option value="" selected disabled>- Pilih Detail Part -
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
                                        <option value="" selected disabled>- Pilih Nama Defect -
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
                                    <input class="form-control" type="number" min="1" name="no_sleeper"
                                        placeholder="isi nomor sleeper">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Direction</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="direction" class="form-select" required>
                                        <option value="" selected disabled>- Pilih Direction -
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
                                        <option value="" disabled selected>- Pilih
                                            Klasifikasi -
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
                            <div class="name">PIC</div>
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
                                    <input placeholder="Tanggal Pelaksanaan" class="form-control" type="text"
                                        onfocus="(this.type='date')" onblur="(this.type='text')" id="date"
                                        name="tanggal" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Foto Dokumentasi (Landscape)</div>
                            <div class="value">
                                <div class="mb-3">
                                    <img class="img-thumbnail" id="previewImage" src="#" alt="Preview"
                                        style="max-width: 250px; max-height: 250px; display: none;">
                                </div>
                                <div class="input-group">
                                    <input class="form-control" type="file" name="photo" id="imageInput"
                                        accept="image/*" required>
                                    @error('photo')
                                        <p class="bg-danger rounded-3 text-center text-white mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="pull-right">
                            <a href="{{ route('temuan_mainline.index') }}" class="btn btn-warning rounded">Cancel</a>
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
                var line = document.getElementById("line").value;
                var location = document.getElementById("location").value;
                $.ajax({
                    url: '/getSpan?location=' + location + '&line=' + line,
                    type: 'get',
                    success: function(res) {
                        $('#mainline_id').html(
                            '<option value="" selected disabled>- Pilih Nomor Span -</option>'
                        );
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
                            '<option value="" selected disabled>- Pilih Detail Part -</option>'
                        );
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
                            '<option value="" selected disabled>- Pilih Nama Defect -</option>'
                        );
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

        const imageInput = document.getElementById('imageInput');
        const previewImage = document.getElementById('previewImage');

        imageInput.addEventListener('change', function(event) {
            const selectedFile = event.target.files[0];

            if (selectedFile) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                }

                reader.readAsDataURL(selectedFile);
            }
        });

        $('.mainline_id').select2();
    </script>
@endsection
