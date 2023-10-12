@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Tools | TCSM</title>
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
                                    <label for="exampleInputName1">Tools Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Masukkan Nama Tools">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Tools Code</label>
                                    <input type="text" class="form-control" name="code" id="code"
                                        placeholder="Masukkan Kode Tools">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Tools Stocks</label>
                                    <input type="number" class="form-control" name="stocks" id="stocks"
                                        placeholder="Masukkan Stocks Tools">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Tools Satuan</label>
                                    <input type="text" class="form-control" name="satuan" id="satuan"
                                        placeholder="Masukkan Satuan Tools">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Location</label>
                                    <select class="form-control" name="location_id">
                                        <option disable selected>-Pilih Location-</option>
                                        @foreach ($location as $item)
                                        <option value={{ $item->id }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label class="form-label">Section</label>
                                    <select class="form-control" name="section_id">
                                        <option disable selected>-Pilih Section-</option>
                                        @foreach ($section as $item)
                                        <option value={{ $item->id }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Departement</label>
                                    <select class="form-control" name="departement_id">
                                        <option disable selected>-Pilih Departement-</option>
                                        @foreach ($departement as $item)
                                        <option value={{ $item->id }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('masterdata-tools') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
