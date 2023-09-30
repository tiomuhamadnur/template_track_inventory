@extends('layout.form.form')

@section('head')
    <title>Form Edit Data Temuan</title>
@endsection

@section('body')
    <div class="page-wrapper p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5 shadow">
                <div class="card-heading">
                    <h2 class="title">Form Edit Data Temuan Visual</h2>
                </div>
                <div class="card-body shadow">
                    <form action="{{ route('temuan-visual.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div>
                            <label class="label label--block mb-3">
                                <a href="#" class="btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#ModalDeleteTemuan" title="Hapus data temuan secara permanen">
                                    Hapus temuan?
                                </a>
                            </label>
                        </div>
                        <div class="form-row">
                            <input type="text" name="id" value="{{ $temuan_visual->id }}" required hidden>
                            <div class="name">Area</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="area_id" name="area_id" class="form-select" required>
                                        <option value="" disabled>- Pilih Area -</option>
                                        @foreach ($area as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($temuan_visual->area_id == $item->id) selected @endif>
                                                {{ $item->code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Sub Area</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="sub_area_id" name="sub_area_id" class="form-select select-data" required>
                                        <option value="" disabled>- Pilih Sub Area -</option>
                                        @foreach ($sub_area as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($temuan_visual->sub_area_id == $item->id) selected @endif>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Detail Area</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="detail_area_id" name="detail_area_id" class="form-select select-data"
                                        required>
                                        <option disabled value="">- Pilih Detail Area -</option>
                                        @foreach ($detail_area as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($temuan_visual->detail_area_id == $item->id) selected @endif>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Parts</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="part_id" name="part_id" class="form-select select-data" required>
                                        <option value="" disabled>- Pilih Nama Part -
                                        </option>
                                        @foreach ($part as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($temuan_visual->part_id == $item->id) selected @endif>
                                                {{ $item->name }}
                                            </option>
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
                                    <select id="detail_part_id" name="detail_part_id" class="form-select select-data"
                                        required>
                                        <option value="" disabled>- Pilih Detail Part -
                                        </option>
                                        @foreach ($detail_part as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($temuan_visual->detail_part_id == $item->id) selected @endif>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Defect</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="defect_id" name="defect_id" class="form-select select-data" required>
                                        <option value="" disabled>- Pilih Nama Defect -
                                        </option>
                                        @foreach ($defect as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($temuan_visual->defect_id == $item->id) selected @endif>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Remark</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="text" name="remark" value="{{ $temuan_visual->remark }}"
                                        placeholder="Catatan detail temuan (opsional)" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Classification of Defect</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="klasifikasi" id="klasifikasi" class="form-select" required>
                                        <option value="" disabled>
                                            - Pilih Klasifikasi -
                                        </option>
                                        {{-- <option value="Minor" @if ($temuan_visual->klasifikasi == 'Minor') selected @endif>
                                            Minor
                                        </option>
                                        <option value="Moderate" @if ($temuan_visual->klasifikasi == 'Moderate') selected @endif>
                                            Moderate
                                        </option>
                                        <option value="Major" @if ($temuan_visual->klasifikasi == 'Major') selected @endif>
                                            Major
                                        </option> --}}
                                        <option value="AA" @if ($temuan_visual->klasifikasi == 'AA') selected @endif>AA</option>
                                        <option value="A1" @if ($temuan_visual->klasifikasi == 'A1') selected @endif>A1</option>
                                        <option value="A2" @if ($temuan_visual->klasifikasi == 'A2') selected @endif>A2</option>
                                        <option value="B" @if ($temuan_visual->klasifikasi == 'B') selected @endif>B</option>
                                        <option value="C" @if ($temuan_visual->klasifikasi == 'C') selected @endif>C
                                        </option>
                                        <option value="S" @if ($temuan_visual->klasifikasi == 'S') selected @endif>S
                                            (Monitoring)</option>
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
                                        placeholder="auto complete" value="{{ $temuan_visual->prioritas }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Status</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="status" class="form-select" required>
                                        <option value="" disabled>
                                            - Pilih Status -
                                        </option>
                                        <option value="open" @if ($temuan_visual->status == 'open') selected @endif>
                                            Open
                                        </option>
                                        <option value="monitoring" @if ($temuan_visual->status == 'monitoring') selected @endif>
                                            Monitoring
                                        </option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">PIC Temuan</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="pic"
                                        value="{{ $temuan_visual->pic }}" readonly required>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Tanggal</div>
                            <div class="value">
                                <div class="input-group">
                                    <input placeholder="Pilih Tanggal Temuan" class="form-control" type="text"
                                        onfocus="(this.type='date')" onblur="(this.type='text')" id="date"
                                        name="tanggal" required value="{{ $temuan_visual->tanggal }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Foto Dokumentasi (Landscape)</div>
                            <div class="value">
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $temuan_visual->photo) }}"
                                        class="img-thumbnail border-1 border-dark shadow" alt="tidak ada photo"
                                        style="max-width: 250px; max-height: 250px;">
                                </div>
                                <div class="mb-3">
                                    <img class="img-thumbnail border-1 border-dark shadow" id="previewImage"
                                        src="#" alt="Preview"
                                        style="max-width: 250px; max-height: 250px; display: none;">
                                </div>
                                <div class="input-group">
                                    <input class="form-control" type="file" name="photo" id="imageInput"
                                        accept="image/*">
                                    @error('photo')
                                        <p class="bg-danger rounded-3 text-center text-white mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Justifikasi <span class="text-danger"><sup>*Tim Maintenance</sup></span>
                            </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="text"
                                        @if ($temuan_visual->justifikasi != '') value="{{ $temuan_visual->justifikasi }} (by: {{ $temuan_visual->pic_justifikasi }})" @endif
                                        placeholder="-" readonly>
                                    <label class="label label--block mt-2">
                                        Add Comment?
                                        <a href="#" class="btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#ModalAddJustifikasi"
                                            title="Tambahkan justifikasi oleh Tim Maintenance">
                                            Yes
                                        </a>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Eksekutor Perbaikan</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="eksekutor" class="form-select" required>
                                        <option value="" disabled>
                                            - Pilih Eksekutor Perbaikan -
                                        </option>
                                        <option value="In House" @if ($temuan_visual->eksekutor == 'In House') selected @endif>
                                            In House
                                        </option>
                                        <option value="Third Party" @if ($temuan_visual->status == 'Third Party') selected @endif>
                                            Third Party
                                        </option>
                                    </select>
                                    <div class="select-dropdown"></div>
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

    <!-- Modal Add Justifikasi-->
    <div class="modal fade" id="ModalAddJustifikasi" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bolder" id="modalAdminTitle">Form Justifikasi Tim Maintenance</h5>
                </div>
                <div class="modal-body">
                    <form id="form_jadwal" action="{{ route('temuan-visual.justifikasi') }}" method="POST">
                        @csrf
                        @method('post')
                        <div class="form-group mb-2">
                            <label class="form-label mb-0">Justifikasi</label>
                            <input type="text" name="id" value="{{ $temuan_visual->id }}" hidden required>
                            <input type="text" class="form-control" name="justifikasi" required autocomplete="off">
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label mb-0">PIC Justifikasi</label>
                            <input type="text" class="form-control" name="pic_justifikasi" required
                                autocomplete="off" value="{{ auth()->user()->name }}" readonly>
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
    <!-- End Modal Add Justtifikasi -->

    <!-- Modal Delete Temuan -->
    <div class="modal fade" id="ModalDeleteTemuan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fw-bolder" id="modalAdminTitle">Apakah anda yakin?</h4>
                </div>
                <div class="modal-body">
                    <form id="form_delete" action="{{ route('temuan-visual.delete') }}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="text-center mb-2">
                            <label class="form-label mb-0">Data temuan akan dihapus secara permanen.</label>
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" name="id" required autocomplete="off"
                                value="{{ $temuan_visual->id }}" hidden>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="pull-right">
                        <button type="submit" form="form_delete" class="btn btn-danger justify-content-center">
                            Delete
                        </button>
                        <button type="button" class="btn btn-outline-warning text-dark" data-bs-dismiss="modal">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Delete Temuan -->
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
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

        $('.select-data').select2();
    </script>
@endsection
