@extends('layout.form.form')

@section('head')
    <title>Form Data Turn Out Examination</title>
@endsection

@section('body')
    <div class="page-wrapper p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Form Data Turn Out Examination</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('wesel.examination.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-row">
                            <div class="name">Nama Wesel</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="wesel_id" class="form-select" required autofocus>
                                        <option value="" selected disabled>- Pilih Nama Wesel -</option>
                                        @foreach ($wesel as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
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

                        <div class="form-row">
                            <div class="name">Detail Measurement</div>
                            <div class="value">
                                <div class="input-group">
                                    <a class="btn btn-primary rounded-pill" href="javascript:;" data-bs-toggle="modal"
                                        data-bs-target="#detail-measurement-modal">
                                        Show Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- ================================================================================ --}}


                        <hr class="mt-5 mb-0">
                        <h3 class="mt-0 mb-0 fw-bolder text-center">TRACK GAUGE</h3>
                        <hr class="mt-0 mb-3">

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>1</b></span>
                            <input type="number" class="form-control" placeholder="  Track Gauge" name="TG_1" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>1</b></span>
                            <input type="number" class="form-control" placeholder="  Cross Level" name="CL_1" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>2</b></span>
                            <input type="number" class="form-control" placeholder="  Track Gauge" name="TG_2" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>2</b></span>
                            <input type="number" class="form-control" placeholder="  Cross Level" name="CL_2" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>2'</b></span>
                            <input type="number" class="form-control" placeholder="  Track Gauge" name="TG_2A" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>2'</b></span>
                            <input type="number" class="form-control" placeholder="  Cross Level" name="CL_2A" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>2''</b></span>
                            <input type="number" class="form-control" placeholder="  Track Gauge" name="TG_2AA" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>2''</b></span>
                            <input type="number" class="form-control" placeholder="  Cross Level" name="CL_2AA" required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>3</b></span>
                            <input type="number" class="form-control" placeholder="  Track Gauge" name="TG_3" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>3</b></span>
                            <input type="number" class="form-control" placeholder="  Cross Level" name="CL_3"
                                required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>3'</b></span>
                            <input type="number" class="form-control" placeholder="  Track Gauge" name="TG_3A"
                                required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>3'</b></span>
                            <input type="number" class="form-control" placeholder="  Cross Level" name="CL_3A"
                                required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>4</b></span>
                            <input type="number" class="form-control" placeholder="  Cross Level (OPTIONAL)"
                                name="CL_4">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>4'</b></span>
                            <input type="number" class="form-control" placeholder="  Track Gauge (OPTIONAL)"
                                name="TG_4A">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>4'</b></span>
                            <input type="number" class="form-control" placeholder="  Cross Level (OPTIONAL)"
                                name="CL_4A">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>5</b></span>
                            <input type="number" class="form-control" placeholder="  Track Gauge" name="TG_5"
                                required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>5</b></span>
                            <input type="number" class="form-control" placeholder="  Cross Level" name="CL_5"
                                required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>5'</b></span>
                            <input type="number" class="form-control" placeholder="  Track Gauge" name="TG_5A"
                                required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>5'</b></span>
                            <input type="number" class="form-control" placeholder="  Cross Level" name="CL_5A"
                                required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>6'</b></span>
                            <input type="number" class="form-control" placeholder="  Track Gauge (OPTIONAL)"
                                name="TG_6A">
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>7</b></span>
                            <input type="number" class="form-control" placeholder="  Track Gauge" name="TG_7"
                                required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>7</b></span>
                            <input type="number" class="form-control" placeholder="  Cross Level" name="CL_7"
                                required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>7'</b></span>
                            <input type="number" class="form-control" placeholder="  Track Gauge" name="TG_7A"
                                required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>7'</b></span>
                            <input type="number" class="form-control" placeholder="  Cross Level" name="CL_7A"
                                required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-danger font-weight-bold" style="color: white"><b>8</b></span>
                            <input type="number" class="form-control" placeholder="  Back Gauge" name="BG_8"
                                required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>8</b></span>
                            <input type="number" class="form-control" placeholder="  Cross Level" name="CL_8"
                                required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-danger font-weight-bold"
                                style="color: white"><b>8'</b></span>
                            <input type="number" class="form-control" placeholder="  Back Gauge" name="BG_8A"
                                required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>8'</b></span>
                            <input type="number" class="form-control" placeholder="  Cross Level" name="CL_8A"
                                required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>10</b></span>
                            <input type="number" class="form-control" placeholder="  Track Gauge" name="TG_10"
                                required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>10</b></span>
                            <input type="number" class="form-control" placeholder="  Cross Level" name="CL_10"
                                required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-warning font-weight-bold"><b>10'</b></span>
                            <input type="number" class="form-control" placeholder="  Track Gauge" name="TG_10A"
                                required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-success font-weight-bold"><b>10'</b></span>
                            <input type="number" class="form-control" placeholder="  Cross Level" name="CL_10A"
                                required>
                        </div>

                        <hr class="mt-5 mb-0">
                        <h3 class="mt-0 mb-0 fw-bolder text-center">STRING</h3>
                        <hr class="mt-0 mb-3">
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>2</b></span>
                            <input type="number" class="form-control" placeholder="  Longitudinal Level" name="LL_2"
                                required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>2</b></span>
                            <input type="number" class="form-control" placeholder="  Alignment" name="AL_2"
                                required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>5</b></span>
                            <input type="number" class="form-control" placeholder="  Longitudinal Level" name="LL_5"
                                required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>5</b></span>
                            <input type="number" class="form-control" placeholder="  Alignment" name="AL_5"
                                required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>5'</b></span>
                            <input type="number" class="form-control" placeholder="  Longitudinal Level" name="LL_5A"
                                required>
                        </div>
                        <div class="input-group mb-0">
                            <span class="input-group-text bg-info font-weight-bold"><b>5'</b></span>
                            <span class="input-group-text bg-secondary font-weight-bold"><b>1/2</b></span>
                            <input type="number" class="form-control" placeholder="  Alignment" name="AL_5A_1per2"
                                required>
                        </div>
                        <div class="input-group mb-0">
                            <span class="input-group-text bg-info font-weight-bold"><b>5'</b></span>
                            <span class="input-group-text bg-secondary font-weight-bold"><b>1/4</b></span>
                            <input type="number" class="form-control" placeholder="  Alignment" name="AL_5A_1per4"
                                required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-info font-weight-bold"><b>5'</b></span>
                            <span class="input-group-text bg-secondary font-weight-bold"><b>3/4</b></span>
                            <input type="number" class="form-control" placeholder="  Alignment" name="AL_5A_3per4"
                                required>
                        </div>
                        <br>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>9</b></span>
                            <input type="number" class="form-control" placeholder="  Longitudinal Level" name="LL_9"
                                required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-info font-weight-bold"><b>9</b></span>
                            <input type="number" class="form-control" placeholder="  Alignment" name="AL_9"
                                required>
                        </div>




                        {{-- ================================================================================ --}}
                        <div class="form-row mt-5">
                            <div class="name">Foto Dokumentasi</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="file" name="photo" required>
                                    @error('photo')
                                        <p class="bg-danger rounded-3 text-center text-white mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <a href="{{ route('wesel.examination.index') }}" class="btn btn-warning rounded">Cancel</a>
                            <button class="btn btn-success ms-2" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
