@extends('layout.form.form')

@section('head')
    <title>Form Data SC Examination</title>
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
                    <h2 class="title">Form Data SC Examination</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('wesel.examination.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-row">
                            <div class="name">Nama SC</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="wesel_id" class="form-select wesel_id" required autofocus>
                                        <option value="" selected disabled>- Pilih Nama Scissors Crossing -</option>
                                        @foreach ($wesel as $item)
                                            <option value="{{ $item->id }}">{{ $item->name ?? '' }}
                                                ({{ $item->area->code ?? '' }} -
                                                {{ $item->line->code ?? '' }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">PIC</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="pic"
                                        value="{{ auth()->user()->name }}" readonly required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Tanggal</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="date" name="tanggal" required>
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
                                name="TG_1" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>1</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_1" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>1'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_1A" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>1'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_1A" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-danger font-weight-bold" style="color: white"><b>2</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Back Gauge"
                                name="BG_2" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-danger font-weight-bold" style="color: white"><b>2'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Back Gauge"
                                name="BG_2A" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>3</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_3" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>3</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_3" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>3'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_3A" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>3'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_3A" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>4</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_4" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>4</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_4" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>4'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_4A" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>4'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_4A" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-danger font-weight-bold" style="color: white"><b>5</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Back Gauge"
                                name="BG_5" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-danger font-weight-bold"
                                style="color: white"><b>5'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Back Gauge"
                                name="BG_5A" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-danger font-weight-bold" style="color: white"><b>6</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Back Gauge"
                                name="BG_6" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-danger font-weight-bold"
                                style="color: white"><b>6'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Back Gauge"
                                name="BG_6A" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>7</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_7" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>7</b></span>
                            <input type="number" class="form-control" placeholder="  Cross Level" name="CL_7"
                                required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>7'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_7A" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>7'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_7A" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>8</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_8" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>8</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_8" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>8'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_8A" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>8'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_8A" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-danger font-weight-bold" style="color: white"><b>9</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Back Gauge"
                                name="BG_9" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-danger font-weight-bold"
                                style="color: white"><b>9'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Back Gauge"
                                name="BG_9A" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>10</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_10" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>10</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_10" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>10'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Track Gauge"
                                name="TG_10A" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>10'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Cross Level"
                                name="CL_10A" required>
                        </div>
                        <br>

                        <hr class="mt-5 mb-0">
                        <h3 class="mt-0 mb-0 fw-bolder text-center">STRING</h3>
                        <hr class="mt-0 mb-3">
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>1</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Longitudinal Level"
                                name="LL_1" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>1</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_1" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>1'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Longitudinal Level"
                                name="LL_1A" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>1'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_1A" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>3</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Longitudinal Level"
                                name="LL_3" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>3</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_3" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>3'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Longitudinal Level"
                                name="LL_3A" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>3'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_3A" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>8</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Longitudinal Level"
                                name="LL_8" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>8</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_8" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>8'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Longitudinal Level"
                                name="LL_8A" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>8'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_8A" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>10</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Longitudinal Level"
                                name="LL_10" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>10</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_10" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>10'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Longitudinal Level"
                                name="LL_10A" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>10'</b></span>
                            <input type="number" class="form-control" step=".1" placeholder="  Alignment"
                                name="AL_10A" required>
                        </div>
                        <br>


                        {{-- ================================================================================ --}}
                        <div class="form-row mt-5">
                            <div class="name">Foto Dokumentasi</div>
                            <div class="value">
                                <div class="mb-3">
                                    <img class="img-thumbnail" id="previewImage" src="#" alt="Preview"
                                        style="max-width: 250px; max-height: 250px; display: none;">
                                </div>
                                <div class="input-group">
                                    <input class="form-control" type="file" id="imageInput" name="photo"
                                        accept="image/*" required>
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
