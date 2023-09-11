@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title>Form/Report Generator | CPWTM</title>
@endsection

@section('sub-content')
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
                            <h4 class="card-title">Form/Report Generator</h4>
                            <div class="btn-group">
                                <a href="{{ route('closing_report.index') }}" class="btn btn-outline-dark btn-lg mx-0"
                                    type="button" title="Refresh">
                                    <i class="ti-reload"></i>
                                </a>
                                <a href="{{ route('closing_report.check') }}" target="_blank"
                                    class="btn btn-outline-success btn-lg mx-0" type="button">Create Closing Report</a>
                            </div>
                            <div class="table-responsive pt-3">
                                <form class="forms-sample" action="{{ route('generate.form') }}" method="GET">
                                    @csrf
                                    @method('get')
                                    <div class="form-group">
                                        <label for="exampleInputName1">Kegiatan</label>
                                        <select name="kegiatan_id" id="kegiatan_id" class="form-select kegiatan_id"
                                            required>
                                            <option value="">- pilih nama kegiatan -</option>
                                            @foreach ($kegiatan as $item)
                                                <option value="{{ $item->id }}">({{ $item->section }})
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Examiner</label>
                                        <input type="text" class="form-control" placeholder="nama examiner"
                                            name="examiner" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Lokasi Kegiatan</label>
                                        <input type="text" class="form-control" placeholder="ex: LBB-FTM (UT&DT)"
                                            name="location" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" required>
                                    </div>
                                    <div class="float-start mt-3">
                                        <button type="submit" formtarget="_blank"
                                            class="btn btn-lg btn-primary text-white fw-bolder">Generate</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
@endsection
