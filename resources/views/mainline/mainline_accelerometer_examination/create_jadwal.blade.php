@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Jadwal Accelerometer | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Mainline > Accelerometer > Create Data Jadwal</h5>
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
                            <h4 class="card-title">Form Data Jadwal</h4>
                            <form class="forms-sample" action="{{ route('accelerometer.jadwal.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="exampleInputName1">Kegiatan</label>
                                    <input type="text" name="kegiatan" class="form-control" id="exampleInputName1"
                                        placeholder="Input Nama Kegiatan" value="Accelerometer" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal" id="exampleInputEmail3"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Examiner</label>
                                    <input type="text" class="form-control" placeholder="nama examiner" name="pic"
                                        id="exampleInputEmail3" required>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('accelerometer.create') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
