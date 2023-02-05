@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Line | TCSM</title>
@endsection

@section('sub-content')
    <h5>Master Data Mainline > Line > Create Data</h5>
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
                            <h4 class="card-title">Form Data Line</h4>
                            <form class="forms-sample" action="{{ route('masterdata_linemainline.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="exampleInputName1">Line Name</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputName1"
                                        placeholder="Input Line Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Line Code</label>
                                    <input type="text" class="form-control" name="code" id="exampleInputEmail3"
                                        placeholder="Input Line Code">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Line Area</label>
                                    <select class="form-control" name="area">
                                        <option disable selected>-Pilih Line-</option>
                                        <option value="">Mainline</option>
                                        <option value="">Depo</option>
                                        <option value="">DAL</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('masterdata_linemainline.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
