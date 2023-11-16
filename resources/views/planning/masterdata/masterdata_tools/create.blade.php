@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Tools | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Data Tools > Create Data</h5>
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
                            <h4 class="card-title">Form Data Tools</h4>
                            <form class="forms-sample" action="{{ route('masterdata-tools.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="exampleInputName1">Nama Tools</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Masukkan Nama Tools" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Kode Tools</label>
                                    <input type="text" class="form-control" name="code" id="code"
                                        placeholder="Masukkan Kode Tools" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Stock</label>
                                    <input type="number" class="form-control" name="stock" id="stock"
                                        placeholder="Masukkan Stocks Tools" min="0">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Unit</label>
                                    <input type="text" class="form-control" name="unit" id="unit"
                                        placeholder="Masukkan unit">
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
                                    <label class="form-label">Section</label>
                                    <select class="form-control" id="section_id" name="section_id" required>
                                        <option value="" disabled selected>- Pilih Section -</option>
                                        @foreach ($section as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Departement</label>
                                    <select class="form-control" id="departement_id" name="departement_id" required>
                                        <option value="" disabled selected>- Pilih Departement -</option>
                                    </select>
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

            $('#section_id').on('change', function() {
                var section_id = this.value;
                $.ajax({
                    url: '/getDepartement?section_id=' + section_id,
                    type: 'get',
                    success: function(res) {
                        $.each(res, function(key, value) {
                            $('#departement_id').html('<option selected value= "' +
                                value
                                .id + '">' + value.name + ' - (' + value.code +
                                ') </option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection
