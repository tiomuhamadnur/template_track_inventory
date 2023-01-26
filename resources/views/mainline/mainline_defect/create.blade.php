@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title>Add Data Defect | TCSM</title>
@endsection

@section('sub-content')
    <h5>Master Data Mainline > Defect > Create Data</h5>
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
                            <h4 class="card-title">Form Data Defect</h4>
                            <form class="forms-sample" action="{{ route('defect.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="exampleInputName1">Defect Name</label>
                                    <input type="text" class="form-control" name="name" autocomplete="off"
                                        id="exampleInputName1" placeholder="Input Defect Name">
                                </div>
                                {{-- <div class="form-group">
                                    <label class="form-label">Detail Part</label>
                                    <select class="form-control" name="detail" id="">
                                        <option disable value="">-Pilih Detail Part-</option>
                                        <option value="">Crack</option>
                                        <option value="">Dorceng</option>
                                        <option value="">Rusak</option>
                                    </select>
                                </div> --}}
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('defect.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
