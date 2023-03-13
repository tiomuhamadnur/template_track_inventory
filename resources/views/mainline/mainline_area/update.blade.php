@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Area | TCSM</title>
@endsection

@section('sub-content')
    <h5>Master Data Mainline > Area > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Area</h4>
                            <form class="forms-sample" action="{{ route('area.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputName1">Area Name</label>
                                    <input type="text" hidden value="{{ $area->id }}" name="id">
                                    <input type="text" class="form-control" name="name" autocomplete="off"
                                        placeholder="Input Area Name" value="{{ $area->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Area Code</label>
                                    <input type="text" class="form-control" name="code" id="exampleInputEmail3"
                                        placeholder="Input Area Code" autocomplete="off" value="{{ $area->code }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Location</label>
                                    <select class="form-control" name="area" required>
                                        <option @if ($area->area == 'Mainline') selected @endif value="Mainline">Mainline
                                        </option>
                                        <option @if ($area->area == 'Depo') selected @endif value="Depo">Depo
                                        </option>
                                        <option @if ($area->area == 'DAL') selected @endif value="DAL">DAL
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Apakah ini Stasiun?</label>
                                    <select class="form-control" name="stasiun" required>
                                        @if ($area->stasiun == 'true')
                                            <option selected value="true">Yes</option>
                                            <option value="false">No</option>
                                        @elseif($area->stasiun == 'false')
                                            <option value="true">Yes</option>
                                            <option selected value="false">No</option>
                                        @endif
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
