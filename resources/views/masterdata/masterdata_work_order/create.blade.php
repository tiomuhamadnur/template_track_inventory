@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Work Order | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Work Order > Create Data</h5>
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
                            <h4 class="card-title">Form Data Work Order</h4>
                            <form class="forms-sample" action="{{ route('wo.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="exampleInputName1">No Work Order</label>
                                    <input type="text" name="nomor" class="form-control" id="exampleInputName1"
                                        autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nama Pekerjaan</label>
                                    <select class="form-select" name="job_id" required>
                                        <option value="" selected>- pilih pekerjaan -</option>
                                        @foreach ($job as $item)
                                            <option value="{{ $item->id }}">{{ $item->section }} - {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Tanggal</label>
                                    <input type="date" name="tanggal_start" class="form-control" id="exampleInputName1"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Description <span
                                            class="text-danger">(optional)</span></label>
                                    <input type="text" name="description" class="form-control" id="exampleInputName1"
                                        autocomplete="off">
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('wo.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
