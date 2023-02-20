@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Relasi Defect | TCSM</title>
@endsection

@section('sub-content')
    <h5>Master Data Mainline > Relasi Defect > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Relasi Part & Defect</h4>
                            <form class="forms-sample" action="{{ route('transDefect.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label class="form-label">Part</label>
                                    <input type="text" value="{{ $trans_defect->id }}" name="id" hidden>
                                    <select class="form-select" name="part_id">
                                        <option selected value="{{ $trans_defect->part->id }}">
                                            {{ $trans_defect->part->name }}</option>
                                        @foreach ($part as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Detail Part</label>
                                    <select class="form-select" name="detail_part_id">
                                        <option selected value="{{ $trans_defect->detail_part->id }}">
                                            {{ $trans_defect->detail_part->name }}</option>
                                        @foreach ($detail_part as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Defect Group</label>
                                    <select class="form-select" name="defect_id">
                                        <option selected value="{{ $trans_defect->defect->id }}">
                                            {{ $trans_defect->defect->name }}</option>
                                        @foreach ($defect as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('transDefect.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
