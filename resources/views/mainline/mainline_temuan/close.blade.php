@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title>Ubah Status Temuan | TCSM</title>
@endsection

@section('sub-content')
    <h5>Mainline > Temuan > Status Temuan</h5>
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
                            <a class="btn btn-danger float-end fw-bolder text-white" href="javascript:;"
                                data-bs-toggle="modal" data-bs-target="#delete-confirmation-modal"
                                title="Hapus data temuan?">Hapus temuan?</a>
                            <form action="{{ route('temuan_mainline.store.temuan') }}" method="POST"
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
                                        value="{{ $temuan->part->name }} - {{ $temuan->detail_part->name }} - ({{ $temuan->defect->name ?? 'Lainnya' }})"
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
                                    <input type="text" name="id" value="{{ $temuan->id }}" hidden>
                                    <select class="form-select w-full" name="status">
                                        @if ($temuan->status == 'open')
                                            <option class="text-success" value="open" selected>open</option>
                                            <option class="text-danger" value="close">close</option>
                                        @else
                                            <option class="text-success" value="open">open</option>
                                            <option class="text-danger" value="close" selected>close</option>
                                        @endif
                                    </select>
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
