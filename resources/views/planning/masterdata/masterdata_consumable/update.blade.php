@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Consumable | TCSM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Data Consumable > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Consumable</h4>
                            <form class="forms-sample" action="{{ route('masterdata-consumable.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputName1">Nama Consumable</label>
                                    <input type="text" name="id" hidden value="{{ $consumable->id }}">
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Input Nama Consumable" value="{{ $consumable->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Code Consumable</label>
                                    <input type="text" class="form-control" name="code" id="exampleInputEmail3"
                                        placeholder="Input Code Consumable" value="{{ $consumable->code }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail3">Stock Consumable</label>
                                    <input type="text" class="form-control" name="stock" id="exampleInputEmail3"
                                        placeholder="Input Stock Consumable" value="{{ $consumable->stock }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail3">Unit Consumable</label>
                                    <input type="text" class="form-control" name="unit" id="exampleInputEmail3"
                                        placeholder="Input Unit Consumable" value="{{ $consumable->unit }}" required>
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
