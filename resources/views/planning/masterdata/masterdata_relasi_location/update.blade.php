@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Relasi Location | P & C</title>
@endsection

@section('sub-content')
    <h5>Master Data > Data Relasi Location > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Relasi Location</h4>
                            <form class="forms-sample" action="{{ route('masterdata-relasi-location.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label class="form-label">Lokasi Penyimpanan</label>
                                    <input type="text" name="id" hidden value="{{ $trans_location->id }}">
                                    <select class='form-select' name="location_id" id="location_id">
                                        <option selected value="{{ $trans_location->location->id }}">
                                            {{ $trans_location->location->name }}</option>
                                        @foreach ($location as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Detail Lokasi Penyimpanan</label>
                                    <select class='form-select' name="detail_location_id" id="detail_location_id">
                                        <option selected value="{{ $trans_location->detail_location->id }}">
                                            {{ $trans_location->detail_location->name }}</option>
                                        @foreach ($detail_location as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('masterdata-relasi-location.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection