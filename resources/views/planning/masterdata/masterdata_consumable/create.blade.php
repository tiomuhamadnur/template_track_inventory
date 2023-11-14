@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Consumable | TCSM</title>
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
                            <form class="forms-sample" action="{{ route('masterdata-consumable.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="exampleInputName1">Consumable Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Masukkan Nama Consumable">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Consumable Code</label>
                                    <input type="text" class="form-control" name="code" id="code"
                                        placeholder="Masukkan Kode Consumable">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Consumable Stocks</label>
                                    <input type="number" class="form-control" name="stock" id="stock"
                                        placeholder="Masukkan Stocks Consumable">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Satuan</label>
                                    <input type="text" class="form-control" name="unit" id="unit"
                                        placeholder="Masukkan Satuan Consumable">
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('masterdata-consumable.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
