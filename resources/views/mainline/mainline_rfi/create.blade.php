@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title>Request For Inspection | CPWTM</title>
@endsection

@section('sub-content')
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
                            <h4 class="card-title">Form Request For Inspection</h4>
                            <form action="{{ route('rfi.mainline.store') }}" method="POST" enctype='multipart/form-data'>
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label class="form-label">Submitter</label>
                                    <input type="text" value="{{ auth()->user()->name }}" class="form-control" readonly>
                                    <input type="text" name="user_id" value="{{ auth()->user()->id }}" hidden>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Area (No. Span)</label>
                                    <input type="text"
                                        value="{{ $temuan->mainline->area->code }} ({{ $temuan->mainline->no_span }})"
                                        class="form-control" readonly>
                                    <input type="text" value="{{ $temuan->id }}" name="temuan_mainline_id" hidden
                                        required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Part (Defect)</label>
                                    <input type="text"
                                        value="{{ $temuan->part->name }} - {{ $temuan->detail_part->name }} - ({{ $temuan->defect->name ?? 'Lainnya' }})"
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tanggal Perbaikan</label>
                                    <input type="date" class="form-control" name="tanggal"
                                        value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Photo Sebelum Perbaikan</label>
                                    <br>
                                    <img src="{{ asset('storage/' . $temuan->photo) }}" style="height: 150px"
                                        class="img-thumbnail" alt="Tidak ada photo dokumentasi">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Photo Setelah Perbaikan</label>
                                    <div class="mb-2">
                                        <img class="img-thumbnail" id="previewImage" src="#" alt="Preview"
                                            style="height: 150px; display: none;">
                                    </div>
                                    <input type="file" class="form-control" name="photo_close" accept="image/*"
                                        id="imageInput" required>
                                    @error('photo_close')
                                        <p class="bg-danger rounded-3 text-center text-white mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Remark (Optional)</label>
                                    <input type="text" class="form-control" name="remark">
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
@endsection

@section('javascript')
    <script>
        const imageInput = document.getElementById('imageInput');
        const previewImage = document.getElementById('previewImage');

        imageInput.addEventListener('change', function(event) {
            const selectedFile = event.target.files[0];

            if (selectedFile) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                }

                reader.readAsDataURL(selectedFile);
            }
        });
    </script>
@endsection
