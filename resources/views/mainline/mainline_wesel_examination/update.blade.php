@extends('layout.form.form')

@section('head')
    <title>Form Edit Data Turn Out Examination</title>
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
                    <h2 class="title">Form Edit Data Turn Out Examination</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('wesel.examination.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{ $wesel->id }}" hidden>
                        <input type="hidden" name="wesel_id" value="{{ $wesel->wesel->id }}" hidden>
                        <div class="form-row">
                            <div class="name">Nama Wesel</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="text" value="{{ $wesel->wesel->name }}" readonly
                                        required>
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
                                    <input class="form-control" type="date" name="tanggal" value="{{ $wesel->tanggal }}"
                                        required readonly>
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
                            <span class="input-group-text bg-warning font-weight-bold"><b>2</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_2" required value="{{ $wesel->TG_2 }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>2</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_2" required value="{{ $wesel->CL_2 }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>2'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_2A" required value="{{ $wesel->TG_2A }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>2''</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_2AA" required value="{{ $wesel->TG_2AA }}">
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
                            <span class="input-group-text bg-warning font-weight-bold"><b>5</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_5" required value="{{ $wesel->TG_5 }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>5</b></span>
                            <input type="number" class="form-control" placeholder="  Cross Level" name="CL_5"
                                required value="{{ $wesel->CL_5 }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>5'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_5A" required value="{{ $wesel->TG_5A }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>5'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_5A" required value="{{ $wesel->CL_5A }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>7</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_7" required value="{{ $wesel->TG_7 }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>7</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_7" required value="{{ $wesel->CL_7 }}">
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
                            <span class="input-group-text bg-danger font-weight-bold" style="color: white"><b>8</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Back Gauge"
                                name="BG_8" required value="{{ $wesel->BG_8 }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>8</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_8" required value="{{ $wesel->CL_8 }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-danger font-weight-bold"
                                style="color: white"><b>8'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Back Gauge"
                                name="BG_8A" required value="{{ $wesel->BG_8A }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>8'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_8A" required value="{{ $wesel->CL_8A }}">
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

                        <hr class="mt-5 mb-0">
                        <h3 class="mt-0 mb-0 fw-bolder text-center">STRING</h3>
                        <hr class="mt-0 mb-3">
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>2</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Longitudinal Level"
                                name="LL_2" required value="{{ $wesel->LL_2 }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>2</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_2" required value="{{ $wesel->AL_2 }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>5</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Longitudinal Level"
                                name="LL_5" required value="{{ $wesel->LL_5 }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>5</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_5" required value="{{ $wesel->AL_5 }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>5'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Longitudinal Level"
                                name="LL_5A" required value="{{ $wesel->LL_5A }}">
                        </div>
                        <div class="input-group mb-0">
                            <span class="input-group-text bg-info font-weight-bold"><b>5'</b></span>
                            <span class="input-group-text bg-secondary font-weight-bold"><b>1/2</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_5A_1per2" required value="{{ $wesel->AL_5A_1per2 }}">
                        </div>
                        <div class="input-group mb-0">
                            <span class="input-group-text bg-info font-weight-bold"><b>5'</b></span>
                            <span class="input-group-text bg-secondary font-weight-bold"><b>1/4</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_5A_1per4" required value="{{ $wesel->AL_5A_1per4 }}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-info font-weight-bold"><b>5'</b></span>
                            <span class="input-group-text bg-secondary font-weight-bold"><b>3/4</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_5A_3per4" required value="{{ $wesel->AL_5A_3per4 }}">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>9</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Longitudinal Level"
                                name="LL_9" required value="{{ $wesel->LL_9 }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>9</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_9" required value="{{ $wesel->AL_9 }}">
                        </div>




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
                            <a href="{{ route('wesel.examination.index') }}" class="btn btn-danger rounded">Cancel</a>
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
