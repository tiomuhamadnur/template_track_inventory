@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Detail Part | TCSM</title>
@endsection

@section('sub-content')
    <h5>Master Data Mainline > Detail Part > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Detail Part</h4>
                            <form class="forms-sample" action="{{ route('detail-part.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputName1">Detail Part Name</label>
                                    <input type="text" name="id" value="{{ $detail_part->id }}" hidden>
                                    <input type="text" class="form-control" name="name" autocomplete="off"
                                        id="exampleInputName1" placeholder="Input Part Detail"
                                        value="{{ $detail_part->name }}">
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('detail-part.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
