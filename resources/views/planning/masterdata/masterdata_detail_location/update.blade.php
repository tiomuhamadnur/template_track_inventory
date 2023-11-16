@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Location | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Data Location > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Detail Location</h4>
                            <form class="forms-sample" action="{{ route('masterdata-detail-location.update') }}"
                                method="POST">
                                @csrf
                                @method('put')
                                <input type="text" name="id" value="{{ $detail_location->id }}" hidden>
                                <div class="form-group">
                                    <label for="exampleInputName1">Kode Detail Location</label>
                                    <input type="text" class="form-control" name="code"
                                        placeholder="Masukkan Kode Location" value="{{ $detail_location->code }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail3">Nama Detail Location</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Masukkan Nama Location" value="{{ $detail_location->name }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail3">Location</label>
                                    <select class="form-control" name="location_id" required>
                                        <option value="" disabled>- Pilih Lokasi Penyimpanan -</option>
                                        @foreach ($location as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($detail_location->location->id == $item->id) selected @endif>{{ $item->name }}
                                                ({{ $item->code }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('masterdata-detail-location.index') }}"
                                    class="btn btn-outline-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
