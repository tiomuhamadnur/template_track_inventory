@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Relasi Defect | TCSM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Relasi Defect > Create Data</h5>
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
                            <h4 class="card-title">Form Data Relasi Part & Defect</h4>
                            <form class="forms-sample" action="{{ route('masterdata_transDefect.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label class="form-label">Part</label>
                                    <select class="form-control" name="part_id">
                                        <option disabled selected>- Pilih Part -</option>
                                        {{-- @foreach ($part as $item) --}}
                                            <option value="#">#</option>
                                        {{-- @endforeach --}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Detail Part</label>
                                    <select class="form-control" name="detail_part_id">
                                        <option disabled selected>- Pilih Detail Part -</option>
                                        {{-- @foreach ($detail_part as $item) --}}
                                            <option value="#">#</option>
                                        {{-- @endforeach --}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Defect Group</label>
                                    <select class="form-control" name="defect_id">
                                        <option disabled selected>- Pilih Defect -</option>
                                        {{-- @foreach ($defect as $item) --}}
                                            <option value="#">#</option>
                                        {{-- @endforeach --}}
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('masterdata_transDefect.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
