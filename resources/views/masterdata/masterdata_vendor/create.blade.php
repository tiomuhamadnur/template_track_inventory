@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Vendor | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Vendor > Create Data</h5>
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
                            <h4 class="card-title">Form Data Vendor</h4>
                            <form class="forms-sample" action="{{ route('vendor.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="exampleInputName1">Nama</label>
                                    <input type="text" class="form-control" name="name" autocomplete="off"
                                        placeholder="input nama perusahaan" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" autocomplete="off"
                                        placeholder="input alamat" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">No Telp</label>
                                    <input type="text" class="form-control" name="no_hp" autocomplete="off"
                                        placeholder="input nomor telepon" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">PIC</label>
                                    <input type="text" class="form-control" name="pic" autocomplete="off"
                                        placeholder="input PIC perusahaan" required>
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
