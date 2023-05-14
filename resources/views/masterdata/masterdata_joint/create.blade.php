@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Joint | TCSM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Joint > Create Data</h5>
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
                            <h4 class="card-title">Form Data Joint</h4>
                            <form class="forms-sample" action="{{ route('joint.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="exampleInputName1">Joint Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName1"
                                        placeholder="Input joint name" required>
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
                                    <label for="exampleInputEmail3">Wesel (optional)</label>
                                    <select name="wesel_id" class="form-select">
                                        <option value="" selected disabled>- Pilih wesel -</option>
                                        @foreach ($wesel as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }} -
                                                {{ $item->area->code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Tipe</label>
                                    <select name="tipe" class="form-select" required>
                                        <option value="" selected disabled>- Pilih tipe -</option>
                                        <option value="NJ">NJ (Normal Joint)</option>
                                        <option value="W">W (Welding)</option>
                                        <option value="GIJ">GIJ (Glued Insulated Joint)</option>
                                        <option value="IRJ">IRJ (Insulated Rail Joint)</option>
                                        <option value="EJ">EJ (Expansion Joint)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Direction</label>
                                    <select name="direction" class="form-select" required>
                                        <option value="" selected disabled>- Pilih direction -</option>
                                        <option value="R">R (Right)</option>
                                        <option value="L">L (Left)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Chainage (meter)</label>
                                    <input type="text" name="kilometer" class="form-control"
                                        placeholder="Input chainage">
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('joint.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
