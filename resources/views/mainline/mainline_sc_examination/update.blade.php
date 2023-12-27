@extends('layout.form.form')

@section('head')
    <title>Form Edit Data SC Examination</title>
    <style>
        .float {
            position: fixed;
            bottom: 20px;
            left: 20px;
            text-align: center;
        }
    </style>
@endsection

@section('body')
    <div class="page-wrapper p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Form Edit Data SC Examination</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('wesel.examination.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-row">
                            <input type="text" value="{{ $wesel->wesel->id }}" hidden name="wesel_id">
                            <input type="hidden" name="id" value="{{ $wesel->id }}" hidden>
                            <div class="name">Nama SC</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ $wesel->wesel->name }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">PIC</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="pic" value="{{ $wesel->pic }}"
                                        readonly required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Tanggal</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="date" value="{{ $wesel->tanggal }}" name="tanggal"
                                        required>
                                </div>
                            </div>
                        </div>
                        {{-- ================================================================================ --}}


                        <hr class="mt-5 mb-0">
                        <h3 class="mt-0 mb-0 fw-bolder text-center">TRACK GAUGE</h3>
                        <hr class="mt-0 mb-3">

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>1</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_1" required value="{{ $wesel->TG_1 }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>1</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_1" required value="{{ $wesel->CL_1 }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>1'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_1A" required value="{{ $wesel->TG_1A }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>1'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_1A" required value="{{ $wesel->CL_1A }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-danger font-weight-bold" style="color: white"><b>2</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Back Gauge"
                                name="BG_2" required value="{{ $wesel->BG_2 }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-danger font-weight-bold" style="color: white"><b>2'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Back Gauge"
                                name="BG_2A" required value="{{ $wesel->BG_2A }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>3</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_3" required value="{{ $wesel->TG_3 }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>3</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_3" required value="{{ $wesel->CL_3 }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>3'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_3A" required value="{{ $wesel->TG_3A }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>3'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_3A" required value="{{ $wesel->CL_3A }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>4</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_4" required value="{{ $wesel->TG_4 }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>4</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_4" required value="{{ $wesel->CL_4 }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>4'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_4A" required value="{{ $wesel->TG_4A }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>4'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_4A" required value="{{ $wesel->CL_4A }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-danger font-weight-bold" style="color: white"><b>5</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Back Gauge"
                                name="BG_5" required value="{{ $wesel->BG_5 }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-danger font-weight-bold"
                                style="color: white"><b>5'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Back Gauge"
                                name="BG_5A" required value="{{ $wesel->BG_5A }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-danger font-weight-bold" style="color: white"><b>6</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Back Gauge"
                                name="BG_6" required value="{{ $wesel->BG_6 }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-danger font-weight-bold"
                                style="color: white"><b>6'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Back Gauge"
                                name="BG_6A" required value="{{ $wesel->BG_6A }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>7</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_7" required value="{{ $wesel->TG_7 }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>7</b></span>
                            <input type="number" class="form-control" placeholder="  Cross Level" name="CL_7"
                                required value="{{ $wesel->CL_7 }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>7'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_7A" required value="{{ $wesel->TG_7A }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>7'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_7A" required value="{{ $wesel->CL_7A }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>8</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_8" required value="{{ $wesel->TG_8 }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>8</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_8" required value="{{ $wesel->CL_8 }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>8'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_8A" required value="{{ $wesel->TG_8A }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>8'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_8A" required value="{{ $wesel->CL_8A }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-danger font-weight-bold" style="color: white"><b>9</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Back Gauge"
                                name="BG_9" required value="{{ $wesel->BG_9 }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-danger font-weight-bold"
                                style="color: white"><b>9'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Back Gauge"
                                name="BG_9A" required value="{{ $wesel->BG_9A }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>10</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_10" required value="{{ $wesel->TG_10 }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>10</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_10" required value="{{ $wesel->CL_10 }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>10'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_10A" required value="{{ $wesel->TG_10A }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>10'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_10A" required value="{{ $wesel->CL_10A }}">
                        </div>
                        <br>

                        <hr class="mt-5 mb-0">
                        <h3 class="mt-0 mb-0 fw-bolder text-center">STRING</h3>
                        <hr class="mt-0 mb-3">
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>1</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Longitudinal Level"
                                name="LL_1" required value="{{ $wesel->LL_1 }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>1</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_1" required value="{{ $wesel->AL_1 }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>1'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Longitudinal Level"
                                name="LL_1A" required value="{{ $wesel->LL_1A }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>1'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_1A" required value="{{ $wesel->AL_1A }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>3</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Longitudinal Level"
                                name="LL_3" required value="{{ $wesel->LL_3 }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>3</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_3" required value="{{ $wesel->AL_3 }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>3'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Longitudinal Level"
                                name="LL_3A" required value="{{ $wesel->LL_3A }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>3'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_3A" required value="{{ $wesel->AL_3A }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>8</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Longitudinal Level"
                                name="LL_8" required value="{{ $wesel->LL_8 }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>8</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_8" required value="{{ $wesel->AL_8 }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>8'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Longitudinal Level"
                                name="LL_8A" required value="{{ $wesel->LL_8A }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>8'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_8A" required value="{{ $wesel->AL_8A }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>10</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Longitudinal Level"
                                name="LL_10" required value="{{ $wesel->LL_10 }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>10</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_10" required value="{{ $wesel->AL_10 }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>10'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Longitudinal Level"
                                name="LL_10A" required value="{{ $wesel->LL_10A }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>10'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_10A" required value="{{ $wesel->AL_10A }}">
                        </div>
                        <br>


                        {{-- ================================================================================ --}}
                        <div class="form-row mt-5">
                            <div class="name">Foto Dokumentasi</div>
                            <div class="value">
                                <div class="mb-3">
                                    <img class="img-thumbnail" src="{{ asset('storage/' . $wesel->photo) }}"
                                        alt="dokumentasi" style="max-width: 250px; max-height: 250px">
                                </div>
                                <div class="mb-3">
                                    <img class="img-thumbnail" id="previewImage" src="#" alt="Preview"
                                        style="max-width: 250px; max-height: 250px; display: none;">
                                </div>
                                <div class="input-group">
                                    <input class="form-control" type="file" id="imageInput" name="photo"
                                        accept="image/*">
                                    @error('photo')
                                        <p class="bg-danger rounded-3 text-center text-white mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="pull-right mt-4">
                            <a href="{{ route('sc.examination.index') }}" class="btn btn-danger rounded">Cancel</a>
                            <button class="btn btn-success ms-2" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <a href="#" class="float btn btn-primary btn-sm rounded-pill shadow ps-3 pe-3" href="javascript:;"
        data-bs-toggle="modal" data-bs-target="#detail-measurement-modal">
        Show Position
    </a>

    <!-- BEGIN: Detail Measurment Modal -->
    <div id="detail-measurement-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="p-2 text-center">
                        <div class="text-center align-middle">
                            <img class="img-thumbnail" src="{{ asset('assets/images/panduan.PNG') }}"
                                alt="Belum ada foto">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div style="font-size: 20px" class="p-0">
                        <a data-bs-dismiss="modal" class="btn btn-danger rounded-pill mt-0 mb-0">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Detail Measurment Modal -->
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

        $('.wesel_id').select2();
    </script>
@endsection
