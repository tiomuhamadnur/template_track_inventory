@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Location | TCSM</title>
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
                            <h4 class="card-title">Form Edit Data Detail Location</h4>
                            <form class="forms-sample" action="{{ route('masterdata-detail-location.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputName1">Kode Location</label>
                                    <input type="text" name="id" hidden value="{{ $detail_location->id }} hidden">
                                    <input type="text" class="form-control" name="code" id="code"
                                        placeholder="Masukkan Kode Location" value="{{ $detail_location->code }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Nama Location</label>
                                    <input type="text" name="id" hidden value="{{ $detail_location->id }}">
                                    <input type="text" class="form-control" name="name" id="bane"
                                        placeholder="Masukkan Nama Location" value="{{ $detail_location->name }}" required>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('masterdata-detail-location.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection