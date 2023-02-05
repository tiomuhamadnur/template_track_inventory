@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Mainline | TCSM</title>
@endsection

@section('sub-content')
    <h5>Master Data Mainline > Part > Create Data</h5>
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
                            <h4 class="card-title">Form Data Part</h4>
                            <form class="forms-sample" action="{{ route('masterdata_trackbed.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label class="form-label">Area</label>
                                    <select class="form-control" name="area_id">
                                        <option disabled selected>- Pilih Area -</option>
                                        {{-- @foreach ($area as $item) --}}
                                            <option value="#">#
                                            </option>
                                        {{-- @endforeach --}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Line</label>
                                    <select class="form-control" name="line_id">
                                        <option disabled selected>- Pilih Line -</option>
                                        {{-- @foreach ($line as $item) --}}
                                            <option value="#">#
                                            </option>
                                        {{-- @endforeach --}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">No. Span</label>
                                    <input type="text" name="no_span" class="form-control"
                                        placeholder="Input Span Number">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Chainage</label>
                                    <input type="text" class="form-control" name="kilometer"
                                        placeholder="Input Chainage (Km)">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Panjang Span</label>
                                    <input type="text" name="panjang_span" class="form-control"
                                        placeholder="Input Panjang Span (m)">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Jumlah Sleeper</label>
                                    <input type="text" name="jumlah_sleeper" class="form-control"
                                        placeholder="Input Jumlah Sleeper (pcs)">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Spacing Sleeper</label>
                                    <input type="text" name="spacing_sleeper" class="form-control"
                                        placeholder="Input Nilai Spacing Sleeper">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Jenis Sleeper</label>
                                    <input type="text" name="jenis_sleeper" class="form-control"
                                        placeholder="Input Jenis Sleeper">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Joint</label>
                                    <input type="text" name="joint" class="form-control" placeholder="Input Joint">
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('masterdata_trackbed.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
