@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Consumable | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Data Consumable > Create Data</h5>
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
                            <h4 class="card-title">Form Data Consumable</h4>
                            <form class="forms-sample" action="{{ route('masterdata-consumable.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="nam">Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Masukkan Nama Consumable" required autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" name="code" id="code"
                                        placeholder="Masukkan Kode Consumable" required autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="number" class="form-control" name="stock" id="stock"
                                        placeholder="Masukkan Stock" min="0" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail3">Safety Stock</label>
                                    <input type="number" class="form-control" name="safety_stock" id="safety_stock"
                                        placeholder="Masukkan Safety Stock" min="0" required>
                                </div>

                                <div class="form-group">
                                    <label for="unit">Unit</label>
                                    <input type="text" class="form-control" name="unit" id="unit"
                                        placeholder="Masukkan Unit" required autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Lokasi Penyimpanan</label>
                                    <select class="form-control" id ="location_id" name="location_id" required>
                                        <option value="" disabled selected>- Pilih Lokasi Penyimpanan -</option>
                                        @foreach ($location as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Detail Lokasi Penyimpanan</label>
                                    <select class="form-control" id="detail_location_id" name="detail_location_id" required>
                                        <option value="" disabled selected>- Pilih Detail Lokasi Penyimpanan -
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail3">Description</label>
                                    <input type="text" class="form-control" name="description" id="description"
                                        placeholder="Deskripsi Tools" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Tanggal Beli (Optional)</label>
                                    <input type="date" class="form-control" name="tgl_beli" id="tgl_beli"
                                        placeholder="Tanggal beli">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Vendor (Optional)</label>
                                    <input type="text" class="form-control" name="vendor" id="vendor"
                                        placeholder="Nama Vendor">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Tanggal Expired (Optional)</label>
                                    <input type="date" class="form-control" name="tgl_expired" id="tgl_expired"
                                        placeholder="Tanggal expired">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Photo</label>
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
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('masterdata-consumable.index') }}"
                                    class="btn btn-outline-danger">Cancel</a>
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
        $(document).ready(function() {
            $('#location_id').on('change', function() {
                var location_id = this.value;
                $.ajax({
                    url: '/getDetailLocation?location_id=' + location_id,
                    type: 'get',
                    success: function(res) {
                        $('#detail_location_id').html(
                            '<option value="" selected disabled>- Pilih Detail Lokasi Penyimpanan -</option>'
                        );
                        $.each(res, function(key, value) {
                            $('#detail_location_id').append('<option value= "' + value
                                .id + '">' + value.code + ' - (' + value.name +
                                ') </option>');
                        });
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
    </script>
@endsection
