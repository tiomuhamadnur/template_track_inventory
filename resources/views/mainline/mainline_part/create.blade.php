@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Part | TCSM</title>
@endsection

@section('sub-content')
    <h5>Master Data Mainline > Part > Create Data</h5>
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
                            <h4 class="card-title">Form Data Part</h4>
                            <form class="forms-sample" action="{{ route('part.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="exampleInputName1">Part Name</label>
                                    <input type="text" class="form-control" name="name" autocomplete="off"
                                        placeholder="Input Part Name">
                                </div>
                                {{-- <div class="form-group">
                                    <label for="exampleInputEmail3">Part Code</label>
                                    <input type="email" class="form-control" id="exampleInputEmail3"
                                        placeholder="Input Part Code">
                                </div> --}}
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('part.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
