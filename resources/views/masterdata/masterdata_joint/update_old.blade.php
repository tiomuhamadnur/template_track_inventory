@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Joint | TCSM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Joint > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Joint</h4>
                            <form class="forms-sample" action="{{ route('joint.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputName1">Joint Name</label>
                                    <input type="text" name="id" value="{{ $joint->id }}" required hidden>
                                    <input type="text" name="name" class="form-control" id="exampleInputName1"
                                        placeholder="Input joint name" required value="{{ $joint->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Area</label>
                                    <select name="area_id" class="form-select" required>
                                        <option value="{{ $joint->area->id }}" selected>{{ $joint->area->code }}</option>
                                        @foreach ($area as $item)
                                            <option value="{{ $item->id }}">{{ $item->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Line</label>
                                    <select name="line_id" class="form-select" required>
                                        <option value="{{ $joint->line->id }}" selected>{{ $joint->line->code }}</option>
                                        @foreach ($line as $item)
                                            <option value="{{ $item->id }}">{{ $item->code }} ({{ $item->name }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Wesel (optional)</label>
                                    <select name="wesel_id" class="form-select">
                                        <option value="{{ $joint->wesel->id ?? '' }}" selected>
                                            {{ $joint->wesel->name ?? '' }}</option>
                                        @foreach ($wesel as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Tipe</label>
                                    <select name="tipe" class="form-select" required>
                                        <option value="{{ $joint->tipe }}" selected>{{ $joint->tipe }}</option>
                                        <option value="NJ">NJ (Normal Joint)</option>
                                        <option value="W">W (Welding)</option>
                                        <option value="GIJ">GIJ (Glued Insulated Joint)</option>
                                        <option value="IRJ">IRJ (Insulated Rail Joint)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Chainage (meter)</label>
                                    <input type="text" name="kilometer" class="form-control" id="exampleInputName1"
                                        placeholder="Input chainage" value="{{ $joint->kilometer }}">
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
