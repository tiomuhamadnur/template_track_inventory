@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Section | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Section > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Section</h4>
                            <form class="forms-sample" action="{{ route('section.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputName1">Section Name</label>
                                    <input type="text" hidden value="{{ $section->id }}" name="id">
                                    <input type="text" class="form-control" name="name" autocomplete="off"
                                        placeholder="Input Section Name" value="{{ $section->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Section Code</label>
                                    <input type="text" class="form-control" name="code" autocomplete="off"
                                        placeholder="Input Section Code" value="{{ $section->code }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Department</label>
                                    <select class="form-control" name="departement_id" required>
                                        <option disable value="{{ $section->departement->id }}" selected>
                                            {{ $section->departement->name }} ({{ $section->departement->code }})</option>
                                        @foreach ($departement as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }} ({{ $item->code }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('section.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
