@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Relasi Tools | Planning</title>
@endsection

@section('sub-content')
    <h5>Master Data > Data Relasi Tools > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Relasi Tools</h4>
                            <form class="forms-sample" action="{{ route('masterdata-relasi-tools.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label class="form-label">Nama Tools</label>
                                    <input type="text" name="id" hidden value="{{ $trans_tools->id }}">
                                    <select class='form-select' name="tools_id" id="tools_id">
                                        <option selected value="{{ $trans_tools->tools->id }}">
                                            {{ $trans_tools->tools->name }}</option>
                                        @foreach ($tools as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Lokasi Penyimpanan</label>
                                    <select class='form-select' name="location_id" id="location_id">
                                        <option selected value="{{ $trans_tools->location->id }}">
                                            {{ $trans_tools->location->name }}</option>
                                        @foreach ($location as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Detail Lokasi Penyimpanan</label>
                                    <select class='form-select' name="detail_location_id" id="detail_location_id">
                                        <option selected value="{{ $trans_tools->detail_location->id }}">
                                            {{ $trans_tools->detail_location->name }}</option>
                                        @foreach ($detail_location as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('masterdata-relasi-tools.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
