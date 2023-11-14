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
                                    <input type="number" class="form-control" name="stock" id="stock"
                                        placeholder="Masukkan Stocks Tools">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Tools Satuan</label>
                                    <input type="text" class="form-control" name="unit" id="unit"
                                        placeholder="Masukkan Satuan Tools">
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
