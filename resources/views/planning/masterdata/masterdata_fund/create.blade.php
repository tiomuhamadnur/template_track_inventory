@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Fund | P & C</title>
@endsection

@section('sub-content')
    <h5>Budgeting > Data Fund > Create Data</h5>
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
                            <h4 class="card-title">Form Data Fund</h4>
                            <form class="forms-sample" action="{{ route('masterdata-fund.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="exampleInputName1">Nama Fund</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Masukkan Nama Fund" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Kegiatan</label>
                                    <input type="text" class="form-control" name="kegiatan" id="code"
                                        placeholder="Masukkan Detail Kegiatan Fund" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Intial Value</label>
                                    <input type="number" class="form-control" name="init_value" id="stock"
                                        placeholder="Masukkan Value Fund (Rp.)" min="0">
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('masterdata-fund.index') }}" class="btn btn-outline-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
