@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Location | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Data Location > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Location</h4>
                            <form class="forms-sample" action="{{ route('masterdata-location.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="code">Kode Location</label>
                                    <input type="text" name="id" value="{{ $location->id }}" hidden>
                                    <input type="text" class="form-control" name="code"
                                        placeholder="Masukkan Kode Location" value="{{ $location->code }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Location</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Masukkan Nama Location" value="{{ $location->name }}" required>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('masterdata-location.index') }}" class="btn btn-outline-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
