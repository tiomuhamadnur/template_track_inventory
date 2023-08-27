@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Work Order | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Work Order > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Work Order</h4>
                            <form class="forms-sample" action="{{ route('wo.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputName1">No Work Order</label>
                                    <input type="text" name="nomor" value="{{ $work_order->nomor }}"
                                        class="form-control" id="exampleInputName1" autocomplete="off">
                                    <input type="text" name="id" value="{{ $work_order->id }}" hidden>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nama Pekerjaan</label>
                                    <select class="form-select" name="job_id" required>
                                        <option value="{{ $work_order->job->id }}" selected>{{ $work_order->job->section }}
                                            - {{ $work_order->job->name }}</option>
                                        @foreach ($job as $item)
                                            <option value="{{ $item->id }}">{{ $item->section }} - {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Date Start</label>
                                    <input type="date" name="tanggal_start" value="{{ $work_order->tanggal_start }}"
                                        class="form-control" id="exampleInputName1" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Description <span
                                            class="text-danger">(optional)</span></label>
                                    <input type="text" name="description" value="{{ $work_order->description }}"
                                        class="form-control" id="exampleInputName1" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Status</label>
                                    <select class="form-select" name="status" required>
                                        <option value="open" @if ($work_order->status == 'open') selected @endif>Open
                                        </option>
                                        <option value="close" @if ($work_order->status == 'close') selected @endif>Close
                                        </option>
                                    </select>
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
