@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Vendor | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Vendor > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Vendor</h4>
                            <form class="forms-sample" action="{{ route('vendor.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputName1">Name</label>
                                    <input type="text" hidden value="{{ $vendor->id }}" name="id">
                                    <input type="text" class="form-control" name="name" autocomplete="off"
                                        placeholder="input shift name" value="{{ $vendor->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" autocomplete="off"
                                        placeholder="input alamat" value="{{ $vendor->alamat }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">PIC</label>
                                    <input type="text" class="form-control" name="pic" autocomplete="off"
                                        placeholder="input shift code" value="{{ $vendor->pic }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">No Telp</label>
                                    <input type="text" class="form-control" name="no_hp" autocomplete="off"
                                        placeholder="input shift code" value="{{ $vendor->no_hp }}" required>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('vendor.index') }}" class="btn btn-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
