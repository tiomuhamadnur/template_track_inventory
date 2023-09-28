@extends('civil.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Relasi Defect | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Relasi Defect > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Relasi Defect</h4>
                            <form class="forms-sample" id="form-edit" action="{{ route('relasi-defect.update') }}"
                                method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label class="form-label">Part</label>
                                    <input type="text" name="id" value="{{ $relasi_defect->id }}" hidden required>
                                    <select name="part_id" class="form-select" required>
                                        <option value="">-pilih part-</option>
                                        @foreach ($part as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $relasi_defect->part_id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Detail Part</label>
                                    <select name="detail_part_id" class="form-select" required>
                                        <option value="">-pilih detail part-</option>
                                        @foreach ($detail_part as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $relasi_defect->detail_part_id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Defect</label>
                                    <select name="defect_id" class="form-select" required>
                                        <option value="">-pilih defect-</option>
                                        @foreach ($defect as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $relasi_defect->defect_id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                            <div class="float-start">
                                <button type="submit" form="form-edit" class="btn btn-success me-2">Submit</button>
                                <a href="{{ route('relasi-defect.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
