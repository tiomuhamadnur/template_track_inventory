@extends('civil.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Relasi Area | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Relasi Area > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Relasi Area</h4>
                            <form class="forms-sample" id="form-edit" action="{{ route('relasi-area.update') }}"
                                method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label class="form-label">Area</label>
                                    <input type="text" name="id" value="{{ $relasi_area->id }}" hidden required>
                                    <select name="area_id" class="form-select" required>
                                        <option value="">-pilih area-</option>
                                        @foreach ($area as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $relasi_area->area_id) selected @endif>{{ $item->code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Sub Area</label>
                                    <select name="sub_area_id" class="form-select" required>
                                        <option value="">-pilih sub area-</option>
                                        @foreach ($sub_area as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $relasi_area->sub_area_id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Detail Area</label>
                                    <select name="detail_area_id" class="form-select" required>
                                        <option value="">-pilih detail area-</option>
                                        @foreach ($detail_area as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $relasi_area->detail_area_id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                            <div class="float-start">
                                <button type="submit" form="form-edit" class="btn btn-success me-2">Submit</button>
                                <a href="{{ route('relasi-area.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
