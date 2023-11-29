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
                            <form class="forms-sample" action="" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputName1">Nama Tools</label>
                                    <input type="text" name="id" hidden value="">
                                    <input type="text" class="form-control" name="name" id="exampleInputName1"
                                        placeholder="Input Nama Tools" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Kode Tools</label>
                                    <input type="text" class="form-control" name="code" id="exampleInputEmail3"
                                        placeholder="Input Code Tools" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Stock</label>
                                    <input type="number" class="form-control" name="stock" id="exampleInputEmail3"
                                        placeholder="Stock" value="" min="0" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Unit</label>
                                    <input type="text" class="form-control" name="unit" id="exampleInputEmail3"
                                        placeholder="unit" value="" required>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="" class="btn btn-outline-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
