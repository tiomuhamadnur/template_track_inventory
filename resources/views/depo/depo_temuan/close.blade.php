@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Ubah Status Temuan | TCSM</title>
@endsection

@section('sub-content')
    <h5>Depo > Temuan > Status Temuan</h5>
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
                            <h4 class="card-title">Ubah Status Temuan</h4>
                            <form action="{{ route('temuan_depo.store.temuan') }}" method="POST"
                                enctype='multipart/form-data'>
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label class="form-label">PIC Close Temuan</label>
                                    <input type="text" value="{{ auth()->user()->name }}" name="pic_close"
                                        class="form-control" readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Part (Defect)</label>
                                    <input type="text"
                                        value="{{ $temuan_depo->part->name }} - {{ $temuan_depo->detail_part->name }} - ({{ $temuan_depo->defect->name ?? 'Lainnya' }})"
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Photo Setelah Perbaikan</label>
                                    <input type="file" class="form-control" name="photo_close" required>
                                    @error('photo_close')
                                        <p class="bg-danger rounded-3 text-center text-white mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Status Temuan</label>
                                    <input type="text" name="id" value="{{ $temuan_depo->id }}" hidden>
                                    <select class="form-select w-full" name="status">
                                        @if ($temuan_depo->status == 'open')
                                            <option class="text-success" value="open" selected>open</option>
                                            <option class="text-danger" value="close">close</option>
                                        @else
                                            <option class="text-success" value="open">open</option>
                                            <option class="text-danger" value="close" selected>close</option>
                                        @endif
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('temuan_depo.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
