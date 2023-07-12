@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Shift | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Shift > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Shift</h4>
                            <form class="forms-sample" action="{{ route('shift.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputName1">Shift Name</label>
                                    <input type="text" hidden value="{{ $shift->id }}" name="id">
                                    <input type="text" class="form-control" name="name" autocomplete="off"
                                        placeholder="input shift name" value="{{ $shift->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Shift Code</label>
                                    <input type="text" class="form-control" name="code" autocomplete="off"
                                        placeholder="input shift code" value="{{ $shift->code }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Waktu Mulai (WIB)</label>
                                    <input type="time" class="form-control" name="start" value="{{ $shift->start }}"
                                        placeholder="waktu mulai shift" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Waktu Selesai (WIB)</label>
                                    <input type="time" class="form-control" name="end" value="{{ $shift->end }}"
                                        placeholder="waktu selesai shift" required>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('shift.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
