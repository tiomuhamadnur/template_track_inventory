@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Area | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Master Data Mainline > Area > Create Data</h5>
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
                            <form class="forms-sample" action="{{ route('area.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="exampleInputName1">Area Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName1"
                                        placeholder="Input Area Name" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Area Code</label>
                                    <input type="text" class="form-control" name="code" id="exampleInputEmail3"
                                        placeholder="Input Area Code" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Location</label>
                                    <select class="form-control" name="area" required>
                                        <option disable value="" selected>-Pilih Location-</option>
                                        <option value="Mainline">Mainline</option>
                                        <option value="Depo">Depo</option>
                                        <option value="DAL">DAL</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Apakah ini Stasiun?</label>
                                    <select class="form-control" name="stasiun" required>
                                        <option disable value="" selected>-Pilih salah satu-</option>
                                        <option value="true">Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('area.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
