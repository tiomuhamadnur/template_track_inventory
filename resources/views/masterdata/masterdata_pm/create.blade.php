@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Annual Jobs | TCSM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Annual Jobs > Create Data</h5>
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
                            <h4 class="card-title">Form Data Annual Jobs</h4>
                            <form class="forms-sample" action="{{ route('pm.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="exampleInputName1">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName1"
                                        placeholder="Input job name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Item (Part)</label>
                                    <input type="text" name="item" class="form-control" id="exampleInputName1"
                                        placeholder="Input item name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Detail</label>
                                    <input type="text" name="detail" class="form-control" id="exampleInputName1"
                                        placeholder="Input detail" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Frequency (per Year)</label>
                                    <input type="number" name="frekuensi" class="form-control" id="exampleInputName1"
                                        placeholder="Input frequency" min="1" required>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('pm.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
