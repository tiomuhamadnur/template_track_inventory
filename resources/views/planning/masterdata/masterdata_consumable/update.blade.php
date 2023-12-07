@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Consumable | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Data Consumable > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Consumable</h4>
                            <form class="forms-sample" action="{{ route('masterdata-consumable.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="id" hidden value="{{ $consumable->id }}">
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Input Nama Consumable" value="{{ $consumable->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" name="code" id="code"
                                        placeholder="Input Code Consumable" value="{{ $consumable->code }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="text" class="form-control" name="stock" id="stock"
                                        placeholder="Input Stock Consumable" value="{{ $consumable->stock }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="unit">Unit</label>
                                    <input type="text" class="form-control" name="unit" id="unit"
                                        placeholder="Input Unit Consumable" value="{{ $consumable->unit }}" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Lokasi Penyimpanan</label>
                                    <select class="form-control" id ="location_id" name="location_id" required>
                                        <option value="" disabled selected>- Pilih Lokasi Penyimpanan -</option>
                                        @foreach ($location as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $consumable->location->id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Detail Lokasi Penyimpanan</label>
                                    <select class="form-control" id="detail_location_id" name="detail_location_id" required>
                                        <option value="" disabled selected>- Pilih Detail Lokasi Penyimpanan -
                                        </option>
                                        @foreach ($detail_location as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $consumable->detail_location->id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('masterdata-consumable.index') }}"
                                    class="btn btn-outline-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
