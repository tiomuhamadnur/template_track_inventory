@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Area | TCSM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Area > Create Data</h5>
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
                            <h4 class="card-title">Form Data Area</h4>
                            <form class="forms-sample" action="{{ route('masterdata_area.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="exampleInputName1">Area Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName1"
                                        placeholder="Input Area Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Area Code</label>
                                    <input type="text" class="form-control" name="code" id="exampleInputEmail3"
                                        placeholder="Input Area Code">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Location</label>
                                    <select class="form-control" name="area">
                                        <option disable value="">-Pilih Area-</option>
                                        <option value="">Mainline</option>
                                        <option value="">Depo</option>
                                        <option value="">DAL</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
