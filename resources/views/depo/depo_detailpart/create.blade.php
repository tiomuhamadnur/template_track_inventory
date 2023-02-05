@extends('depo.depo_layout.base')

@section('sub-title')
    <title>Add Data Part | TCSM</title>
@endsection

@section('sub-content')
    <h5>Master Data Depo > Detail Part > Create Data</h5>
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
                            <h4 class="card-title">Form Data Detail Part</h4>
                            <form class="forms-sample" action="{{ route('depodetail-part.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Detail Part Name</label>
                                    <input type="text" class="form-control" name="code" id="exampleInputEmail3"
                                        placeholder="Input Part Detail">
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
