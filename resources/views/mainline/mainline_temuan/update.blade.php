@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title>Ubah Data Temuan | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Mainline > Temuan > Ubah Data Temuan</h5>
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
                            <h4 class="card-title">Ubah Data Temuan</h4>
                            <a class="btn btn-danger float-end fw-bolder text-white" href="javascript:;"
                                data-bs-toggle="modal" data-bs-target="#delete-confirmation-modal"
                                title="Hapus data temuan?">Hapus temuan?</a>
                            <form action="{{ route('temuan_mainline.update') }}" method="POST"
                                enctype='multipart/form-data'>
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label class="form-label">Line</label>
                                    <input type="text" value="{{ $temuan->mainline->line->code }}" class="form-control"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">No. Span</label>
                                    <input type="text" value="{{ $temuan->mainline->no_span }}" class="form-control"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Part</label>
                                    <input type="text"
                                        value="{{ $temuan->part->name }} - ({{ $temuan->detail_part->name }})"
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label">Status Temuan</label>
                                    <input type="text" value="{{ $temuan->status }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Defect</label>
                                    <input type="text" name="id" value="{{ $temuan->id }}" hidden>
                                    <select class="form-select" name="defect_id" required>
                                        <option value="{{ $temuan->defect->id ?? '' }}" selected>
                                            {{ $temuan->defect->name ?? 'Lainnya' }}
                                        </option>
                                        @foreach ($defect as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Direction</label>
                                    <select class="form-select" name="direction" required>
                                        <option value="{{ $temuan->direction ?? '' }}" selected>
                                            {{ $temuan->direction ?? '' }}
                                        </option>
                                        <option value="L">L</option>
                                        <option value="R">R</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">No. Sleeper</label>
                                    <input type="number" name="no_sleeper" value="{{ $temuan->no_sleeper }}"
                                        class="form-control" min="0">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" value="{{ $temuan->tanggal }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Foto Dokumentasi</label>
                                    <input class="form-control" type="file" name="photo">
                                    @error('photo')
                                        <p class="bg-danger rounded-3 text-center text-white mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Remark</label>
                                    <input type="text" name="remark" value="{{ $temuan->remark ?? '' }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Klasifikasi</label>
                                    <select class="form-select" name="klasifikasi" required>
                                        <option value="{{ $temuan->klasifikasi ?? '' }}" selected>
                                            {{ $temuan->klasifikasi ?? '' }}
                                        </option>
                                        <option value="Minor">
                                            Minor
                                        </option>
                                        <option value="Moderate">
                                            Moderate
                                        </option>
                                        <option value="Mayor">
                                            Mayor
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label fw-bolder">Justifikasi (Diisi Tim Track Maintenance)</label>
                                    <input type="text" name="justifikasi" value="{{ $temuan->justifikasi ?? '' }}"
                                        class="form-control">
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('temuan_mainline.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-2">
                    <div class="p-2 text-center">
                        <div class="text-3xl mt-2">Apakah anda yakin?</div>
                        <div class="text-slate-500 mt-2">Data ini akan dihapus secara permanen.</div>
                    </div>
                    <div class="px-5 pb-8 text-center mt-3">
                        <form action="{{ route('temuan_mainline.delete') }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="text" name="id" value="{{ $temuan->id }}" hidden>
                            <button type="button" data-bs-dismiss="modal"
                                class="btn btn-outline-warning w-24 mr-1 me-2">Cancel</button>
                            <button type="submit" class="btn btn-danger w-24">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
@endsection
