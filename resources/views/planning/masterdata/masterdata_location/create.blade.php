@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Location | Planning</title>
@endsection

@section('sub-content')
    <h5>Master Data > Data Location > Create Data</h5>
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
                            <h4 class="card-title">Form Data Location</h4>
                            <form class="forms-sample" action="{{ route('masterdata-location.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="code">Location Code</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Masukkan Kode Location">
                                </div>
                                <div class="form-group">
                                    <label for="cpde">Location Name</label>
                                    <input type="text" class="form-control" name="code" id="code"
                                        placeholder="Masukkan Nama Location">
                                </div>

                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{{ route('masterdata-location.index') }}}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
