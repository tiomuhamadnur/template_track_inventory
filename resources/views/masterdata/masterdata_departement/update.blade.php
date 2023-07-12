@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Departement | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Departement > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Departement</h4>
                            <form class="forms-sample" action="{{ route('departement.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputName1">Departement Name</label>
                                    <input type="text" hidden value="{{ $departement->id }}" name="id">
                                    <input type="text" class="form-control" name="name" autocomplete="off"
                                        placeholder="Input Departement Name" value="{{ $departement->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Departement Code</label>
                                    <input type="text" class="form-control" name="code" autocomplete="off"
                                        placeholder="Input Departement Code" value="{{ $departement->code }}" required>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('departement.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
