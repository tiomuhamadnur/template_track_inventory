@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Relasi Tools | Planning</title>
@endsection

@section('sub-content')
    <h5>Master Data > Data Relasi Tools > Create Data</h5>
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
                            <h4 class="card-title">Form Data Relasi Tools</h4>
                            <form class="forms-sample" action="{{ route('masterdata-relasi-tools.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label class="form-label">Tools</label>
                                    <select class="form-control" name="tools_id">
                                        <option disabled selected>- Pilih Tools -</option>
                                        @foreach ($tools as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Location</label>
                                    <select class="form-control" name="location_id">
                                        <option disabled selected>- Pilih Lokasi Penyimpanan -</option>
                                        @foreach ($location as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Detail Location</label>
                                    <select class="form-control" name="detail_location_id">
                                        <option disabled selected>- Pilih Detail Lokasi Penyimpanan -</option>
                                        @foreach ($detail_location as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="#" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
