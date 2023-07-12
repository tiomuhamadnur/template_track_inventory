@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Annual Jobs | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Annual Jobs > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Annual Jobs</h4>
                            <form class="forms-sample" action="{{ route('pm.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label class="form-label">Section</label>
                                    <select class="form-select" name="section" required>
                                        <option value="{{ $pm->section }}" selected>{{ $pm->section }}</option>
                                        @foreach ($section as $item)
                                            <option value="{{ $item->code }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName1"
                                        placeholder="Input job name" value="{{ $pm->name }}" required>
                                    <input type="text" name="id" value="{{ $pm->id }}" hidden required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Item (Part)</label>
                                    <input type="text" name="item" class="form-control" id="exampleInputName1"
                                        placeholder="Input item name" value="{{ $pm->item }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Detail</label>
                                    <input type="text" name="detail" class="form-control" id="exampleInputName1"
                                        placeholder="Input detail" value="{{ $pm->detail }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Frequency (per Year)</label>
                                    <input type="number" name="frekuensi" class="form-control" id="exampleInputName1"
                                        placeholder="Input frequency" min="1" value="{{ $pm->frekuensi }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Logo</label>
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $pm->logo ?? '') }}" alt="logo"
                                            style="height: 60px; width:60px">
                                    </div>
                                    <input type="file" name="logo" class="form-control" id="exampleInputName1">
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('pm.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
