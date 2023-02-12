@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Turn Out | TCSM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Turn Out/Scissors Crossing > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Turn Out/Scissors Crossing</h4>
                            <form class="forms-sample" action="{{ route('wesel.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputName1">Wesel Name</label>
                                    <input type="text" name="id" value="{{ $wesel->id }}" hidden>
                                    <input type="text" name="name" class="form-control" id="exampleInputName1"
                                        placeholder="Input wesel name" required value="{{ $wesel->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Area</label>
                                    <select name="area_id" class="form-select" required>
                                        <option value="{{ $wesel->area->id }}" selected>{{ $wesel->area->code }}
                                        </option>
                                        @foreach ($area as $item)
                                            <option value="{{ $item->id }}">{{ $item->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Line</label>
                                    <select name="line_id" class="form-select" required>
                                        <option value="{{ $wesel->line->id }}" selected>{{ $wesel->line->code }}
                                            ({{ $wesel->line->name }})</option>
                                        @foreach ($line as $item)
                                            <option value="{{ $item->id }}">{{ $item->code }} ({{ $item->name }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Tipe</label>
                                    <select name="tipe" class="form-select" required>
                                        <option value="{{ $wesel->tipe }}" selected>{{ $wesel->tipe }}</option>
                                        <option value="1:8">1:8</option>
                                        <option value="1:10">1:10</option>
                                        <option value="scissors crossing">Scissors Crossing</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Chainage (meter)</label>
                                    <input type="text" name="kilometer" class="form-control" id="exampleInputName1"
                                        placeholder="Input chainage" value="{{ $wesel->kilometer ?? '' }}">
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Update</button>
                                <a href="{{ route('wesel.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
