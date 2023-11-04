@extends('layout.form.form')

@section('head')
    <title>Form Data Temuan</title>
@endsection

@section('body')
    <div class="page-wrapper p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5 shadow">
                <div class="card-heading">
                    <h2 class="title">Form Data Temuan Visual Baru</h2>
                </div>
                <div class="card-body shadow">
                    <form action="{{ route('temuan-visual.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-row">
                            <div class="name">Area</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="area_id" name="area_id" class="form-select" required>
                                        <option value="" selected disabled>- Pilih Area -</option>
                                        @foreach ($area as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Sub Area</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="sub_area_id" name="sub_area_id" class="form-select" required>
                                        <option value="" selected disabled>- Pilih Sub Area -</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Detail Area</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="detail_area_id" name="detail_area_id" class="form-select" required>
                                        <option selected disabled value="">- Pilih Detail Area -</option>
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
                            <div class="name">Classification of Defect</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="klasifikasi" id="klasifikasi" class="form-select" required>
                                        <option value="" disabled selected>- Pilih
                                            Klasifikasi -
                                        </option>
                                        {{-- <option value="Minor">Minor</option>
                                        <option value="Moderate">Moderate</option>
                                        <option value="Major">Major</option> --}}
                                        <option value="AA">AA</option>
                                        <option value="A1">A1</option>
                                        <option value="A2">A2</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="S">S (Monitoring)</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Level Priority</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="text" name="prioritas" id="prioritas" class="form-control" readonly
                                        placeholder="auto complete">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Remark</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea name="remark" placeholder="Catatan detail temuan (opsional)" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">PIC Temuan</div>
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
                                    <input placeholder="Pilih Tanggal Temuan" class="form-control" type="text"
                                        onfocus="(this.type='date')" onblur="(this.type='text')" id="date"
                                        name="tanggal" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Foto Dokumentasi (Landscape)</div>
                            <div class="value">
                                <div class="mb-3">
                                    <img class="img-thumbnail border-1 border-dark shadow" id="previewImage"
                                        src="#" alt="Preview"
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

                        <div class="pull-right mt-2">
                            <a href="{{ route('temuan-visual.index') }}" class="btn btn-danger shadow">
                                Cancel
                            </a>
                            <button class="btn btn-success ms-2 shadow" type="submit">
                                Submit
                            </button>
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
            $('#area_id').on('change', function() {
                var area_id = this.value;
                $.ajax({
                    url: '/civil/get-sub-area?area_id=' + area_id,
                    type: 'get',
                    success: function(res) {
                        $('#sub_area_id').html(
                            '<option value="" selected disabled>- Pilih Sub Area -</option>'
                        );
                        $.each(res, function(key, value) {
                            $('#sub_area_id').append('<option value="' + value
                                .id + '">' + value.name + ' - (' +
                                value.code +
                                ')</option>');
                        });
                    }
                });
            });

            $('#sub_area_id').on('change', function() {
                var area_id = document.getElementById('area_id').value;
                var sub_area_id = this.value;
                $.ajax({
                    url: '/civil/get-detail-area?area_id=' + area_id + '&sub_area_id=' +
                        sub_area_id,
                    type: 'get',
                    success: function(res) {
                        $('#detail_area_id').html(
                            '<option value="" selected disabled>- Pilih Detail Area -</option>'
                        );
                        $.each(res, function(key, value) {
                            $('#detail_area_id').append('<option value="' + value
                                .id + '">' + value.name + ' - (' +
                                value.code +
                                ')</option>');
                        });
                    }
                });
            });

            $('#part_id').on('change', function() {
                var part_id = this.value;
                $.ajax({
                    url: '/civil/get-detail-part?part_id=' + part_id,
                    type: 'get',
                    success: function(res) {
                        $('#detail_part_id').html(
                            '<option value="" selected disabled>- Pilih Detail Part -</option>'
                        );
                        $.each(res, function(key, value) {
                            $('#detail_part_id').append('<option value="' + value
                                .id + '">' + value.name +
                                '</option>');
                        });
                    }
                });
            });

            $('#detail_part_id').on('change', function() {
                var detail_part_id = this.value;
                var part_id = document.getElementById("part_id").value;
                $.ajax({
                    url: '/civil/get-defect?detail_part_id=' + detail_part_id + '&part_id=' +
                        part_id,
                    type: 'get',
                    success: function(res) {
                        $('#defect_id').html(
                            '<option value="" selected disabled>- Pilih Nama Defect -</option>'
                        );
                        $.each(res, function(key, value) {
                            $('#defect_id').append('<option value="' + value
                                .id + '">' + value.name +
                                '</option>');
                        });
                        $('#defect_id').append('<option value="">Lainnya</option>')
                    }
                });
            });

            $('#klasifikasi').on('change', function() {
                var klasifikasi = this.value;
                var prioritas = '';
                if (klasifikasi == 'B') {
                    prioritas = 'Medium';
                } else if (klasifikasi == 'C') {
                    prioritas = 'Low';
                } else if (klasifikasi == 'S') {
                    prioritas = 'Monitoring';
                } else {
                    prioritas = 'High';
                }
                $('#prioritas').val(prioritas);
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
