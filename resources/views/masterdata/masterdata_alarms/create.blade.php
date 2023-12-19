@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Alarms | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Alarms > Create Data</h5>
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
                            <h4 class="card-title">Form Data Alarms</h4>
                            <form class="forms-sample" action="{{ route('alarms.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="exampleInputName1">Title</label>
                                    <input type="text" class="form-control" name="title" autocomplete="off"
                                        placeholder="input title alarm" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Day</label>
                                    <select name="day" class="form-select" required>
                                        <option value="" selected>- pilih hari -</option>
                                        @foreach ($namaHari as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Time</label>
                                    <input type="time" class="form-control" name="time" autocomplete="off"
                                        placeholder="input time" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">End Point (URL)</label>
                                    <input type="text" class="form-control" name="endpoint" autocomplete="off"
                                        placeholder="input end point URL API" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Description</label>
                                    <input type="text" class="form-control" name="description" autocomplete="off"
                                        placeholder="input description" required>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('alarms.index') }}" class="btn btn-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
