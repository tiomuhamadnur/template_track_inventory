@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Tools | TCSM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Data Tools > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Line</h4>
                            <form class="forms-sample" action="{{ route('masterdata-tools.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputName1">Nama Tools</label>
                                    <input type="text" name="id" hidden value="{{ $tools->id }}">
                                    <input type="text" class="form-control" name="name" id="exampleInputName1"
                                        placeholder="Input Nama Tools" value="{{ $tools->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Kode Tools</label>
                                    <input type="text" class="form-control" name="code" id="exampleInputEmail3"
                                        placeholder="Input Code Tools" value="{{ $tools->code }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Stock Tools</label>
                                    <input type="text" class="form-control" name="stock" id="exampleInputEmail3"
                                        placeholder="Input Code Tools" value="{{ $tools->stock }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Satuan Tools</label>
                                    <input type="text" class="form-control" name="unit" id="exampleInputEmail3"
                                        placeholder="Input Code Tools" value="{{ $tools->unit }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Lokasi Penyimpanan</label>
                                    <select class="form-control" id ="location_id" name="location_id">
                                        <option disabled selected>- Pilih Lokasi Penyimpanan -</option>
                                        @foreach ($location as $item)
                                            <option value={{ $item->id }} @if($tools->location_id == $item->id) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Detail Lokasi Penyimpanan</label>
                                    <select class="form-control" id ="detail_location_id" name="detail_location_id">
                                        <option disabled selected>- Pilih Lokasi Penyimpanan -</option>
                                        @foreach ($detail_location as $item)
                                            <option value={{ $item->id }} @if($tools->detail_location_id == $item->id) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Section</label>
                                    <select class="form-control" id ="section_id" name="section_id">
                                        <option disabled selected>- Pilih Section -</option>
                                        @foreach ($section as $item)
                                            <option value={{ $item->id }} @if($tools->section_id == $item->id) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('masterdata-tools') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
