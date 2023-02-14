@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Buffer/Wheel Stop | TCSM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Buffer/Wheel Stop > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Buffer/Wheel Stop</h4>
                            <form class="forms-sample" action="{{ route('buffer.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputName1">Name</label>
                                    <input type="text" name="id" value="{{ $buffer_stop->id }}" hidden required>
                                    <input type="text" name="name" class="form-control" id="exampleInputName1"
                                        placeholder="Input name" required value="{{ $buffer_stop->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Area</label>
                                    <select name="area_id" class="form-select" required>
                                        <option value="{{ $buffer_stop->area->id }}" selected>{{ $buffer_stop->area->code }}
                                        </option>
                                        @foreach ($area as $item)
                                            <option value="{{ $item->id }}">{{ $item->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Line</label>
                                    <select name="line_id" class="form-select" required>
                                        <option value="{{ $buffer_stop->line->id }}" selected>{{ $buffer_stop->line->code }}
                                            ({{ $buffer_stop->line->name }})
                                        </option>
                                        @foreach ($line as $item)
                                            <option value="{{ $item->id }}">{{ $item->code }} ({{ $item->name }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Tipe</label>
                                    <select name="tipe" class="form-select" required>
                                        <option value="{{ $buffer_stop->tipe }}" selected>{{ $buffer_stop->tipe }}
                                        </option>
                                        <option value="Buffer Stop">Buffer Stop</option>
                                        <option value="Wheel Stop">Wheel Stop</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('buffer.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
