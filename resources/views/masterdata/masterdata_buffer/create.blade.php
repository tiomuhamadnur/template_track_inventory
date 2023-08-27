@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Buffer/Wheel Stop | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Buffer/Wheel Stop > Create Data</h5>
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
                            <h4 class="card-title">Form Data Buffer/Wheel Stop</h4>
                            <form class="forms-sample" action="{{ route('buffer.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="exampleInputName1">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName1"
                                        placeholder="Input name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Area</label>
                                    <select name="area_id" class="form-select" required>
                                        <option value="" selected disabled>- Pilih area -</option>
                                        @foreach ($area as $item)
                                            <option value="{{ $item->id }}">{{ $item->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Line</label>
                                    <select name="line_id" class="form-select" required>
                                        <option value="" selected disabled>- Pilih line -</option>
                                        @foreach ($line as $item)
                                            <option value="{{ $item->id }}">{{ $item->code }} ({{ $item->name }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Tipe</label>
                                    <select name="tipe" class="form-select" required>
                                        <option value="" selected disabled>- Pilih tipe -</option>
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
