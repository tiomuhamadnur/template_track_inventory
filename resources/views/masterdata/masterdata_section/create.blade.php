@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Section | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Section > Create Data</h5>
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
                            <h4 class="card-title">Form Data Section</h4>
                            <form class="forms-sample" action="{{ route('section.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="exampleInputName1">Section Name</label>
                                    <input type="text" class="form-control" name="name" autocomplete="off"
                                        placeholder="Input Section Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Section Code</label>
                                    <input type="text" class="form-control" name="code" autocomplete="off"
                                        placeholder="Input Section Code" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Department</label>
                                    <select class="form-control" name="departement_id" required>
                                        <option disable value="" selected>-Pilih Departement-</option>
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
