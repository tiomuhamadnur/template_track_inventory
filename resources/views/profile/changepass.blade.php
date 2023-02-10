
@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title> Change Password | TCSM</title>
@endsection
@section('sub-content')
    <h4>Change Password</h4>
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
                            <h4 class="card-title">User Change Password</h4>

                                {{-- @csrf
                                @method('post') --}}
                                <div class="form-group">
                                    <label for="exampleInputName1">Old Password</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName1"
                                        placeholder="Input Old Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">New Password</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName1"
                                        placeholder="Input New Password">
                                </div>
                                <button type="" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="/profile-update"><button class="btn btn-light">Cancel</button></a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection




