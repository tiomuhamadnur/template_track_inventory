@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Tools | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Data Tools > Edit Data</h5>
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <div>
                    </div>
                </div>
                <div class="col-lg-12 grid-margin stretch-card mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Form Edit Data Tools</h4>
                            <form class="forms-sample" action="{{ route('masterdata-tools.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="name">Nama Tools</label>
                                    <input type="text" name="id" hidden value="{{ $tools->id }}">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Input Nama Tools" value="{{ $tools->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="code">Kode Tools</label>
                                    <input type="text" class="form-control" name="code" id="code"
                                        placeholder="Input Code Tools" value="{{ $tools->code }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="number" class="form-control" name="stock" id="stock"
                                        placeholder="Stock" value="{{ $tools->stock }}" min="0" required>
                                </div>
                                <div class="form-group">
                                    <label for="unit">Unit</label>
                                    <input type="text" class="form-control" name="unit" id="unit"
                                        placeholder="unit" value="{{ $tools->unit }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Lokasi Penyimpanan</label>
                                    <select class="form-control" id ="location_id" name="location_id">
                                        <option disabled selected>- Pilih Lokasi Penyimpanan -</option>
                                        @foreach ($location as $item)
                                            <option value={{ $item->id }}
                                                @if ($tools->location->id == $item->id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Detail Lokasi Penyimpanan</label>
                                    <select class="form-control" id ="detail_location_id" name="detail_location_id">
                                        <option disabled selected>- Pilih Lokasi Penyimpanan -</option>
                                        @foreach ($detail_location as $item)
                                            <option value={{ $item->id }}
                                                @if ($tools->detail_location->id == $item->id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Section</label>
                                    <select class="form-control" id="section_id" name="section_id">
                                        <option disabled selected>- Pilih Section -</option>
                                        @foreach ($section as $item)
                                            <option value={{ $item->id }}
                                                @if ($tools->section->id == $item->id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Departement</label>
                                    <select class="form-control" id="departement_id" name="departement_id">
                                        <option disabled selected>- Pilih Departement -</option>
                                        @foreach ($departement as $item)
                                            <option value={{ $item->id }}
                                                @if ($tools->departement->id == $item->id) selected @endif>{{ $item->name }} -
                                                ({{ $item->code }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Description</label>
                                    <input type="text" class="form-control" name="description" id="description"
                                        placeholder="Deskripsi Tools" value="{{ $tools->description }}" autocomplete="off"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Tanggal Beli (Optional)</label>
                                    <input type="date" class="form-control" name="tgl_beli" id="tgl_beli"
                                        placeholder="Tanggal beli (optional)" value="{{ $tools->tgl_beli }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Vendor (Optional)</label>
                                    <input type="text" class="form-control" name="vendor" id="vendor"
                                        placeholder="Nama Vendor" value="{{ $tools->vendor }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Tanggal Sertifikasi</label>
                                    <input type="date" class="form-control" name="tgl_sertifikasi" id="tgl_sertifikasi"
                                        placeholder="Tanggal sertifikasi" required value="{{ $tools->tgl_sertifikasi }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Tanggal Expired</label>
                                    <input type="date" class="form-control" name="tgl_expired" id="tgl_expired"
                                        placeholder="Tanggal expired" required value="{{ $tools->tgl_expired }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Photo</label>
                                    <div class="mb-2">
                                        <img class="img-thumbnail" src="{{ asset('storage/' . $tools->photo) }}"
                                            alt="Preview" style="max-width: 250px; max-height: 250px;">
                                    </div>
                                    <div class="mb-3">
                                        <img class="img-thumbnail" id="previewImage" src="#" alt="Preview"
                                            style="max-width: 250px; max-height: 250px; display: none;">
                                    </div>
                                    <div class="input-group">
                                        <input class="form-control" type="file" name="photo" id="imageInput"
                                            accept="image/*">
                                        @error('photo')
                                            <div>
                                                <p class="bg-danger rounded-3 text-center text-white mt-1">
                                                    {{ $message }}
                                                </p>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('masterdata-tools') }}" class="btn btn-outline-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
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
    </script>
@endsection
