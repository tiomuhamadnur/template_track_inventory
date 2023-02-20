@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Defect | TCSM</title>
@endsection

@section('sub-content')
    <h5>Master Data Mainline > Defect > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Defect</h4>
                            <form class="forms-sample" action="{{ route('defect.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputName1">Defect Name</label>
                                    <input type="text" name="id" value="{{ $defect->id }}" hidden>
                                    <input type="text" class="form-control" name="name" autocomplete="off"
                                        id="exampleInputName1" placeholder="Input Defect Name" value="{{ $defect->name }}">
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('defect.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
