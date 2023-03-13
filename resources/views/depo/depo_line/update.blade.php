@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Line | TCSM</title>
@endsection

@section('sub-content')
    <h5>Master Data Depo > Line > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Line</h4>
                            <form class="forms-sample" action="{{ route('depoline.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputName1">Line Name</label>
                                    <input type="text" name="id" value="{{ $line_depo->id }}" hidden>
                                    <input type="text" class="form-control" name="name" id="exampleInputName1"
                                        placeholder="Input Line Name" required value="{{ $line_depo->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Line Code</label>
                                    <input type="text" class="form-control" name="code" id="exampleInputEmail3"
                                        placeholder="Input Line Code" required value="{{ $line_depo->code }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Line Area</label>
                                    <input type="text" class="form-control" name="area" id="exampleInputEmail3"
                                        value="{{ $line_depo->area }}" readonly required>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('depoline.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
