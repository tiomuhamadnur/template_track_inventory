@extends('layout.form.form')

@section('head')
    <title>Form Data Buffer/Wheel Stop Examination</title>
@endsection

@section('body')
    <div class="page-wrapper p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Form Data Buffer/Wheel Stop Examination</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('buffer.examination.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-row">
                            <div class="name">Nama Buffer/Wheel Stop</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="buffer_stop_id" class="form-select" required autofocus>
                                        <option value="" selected disabled>- Pilih buffer/wheel stop -</option>
                                        @foreach ($buffer_stop as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                ({{ $item->area->code }})
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

                        <div class="form-row">
                            <div class="name">
                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#detail-measurement-modal"
                                    class="bg-primary rounded-pill text-white px-3 py-1" style="text-decoration:none"
                                    onclick="toggleModal('Visual?', 'Check that buffer stop preserved is in good condition (no damage, no rust).')">
                                    Visual?
                                </a>
                            </div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="visual" class="form-select">
                                        <option value="" selected disabled>- none -</option>
                                        <option value="Pass">Pass</option>
                                        <option value="Fail">Fail</option>
                                        <option value="N/A">N/A</option>
                                    </select>
                                    <input type="text" name="visual_remark" class="form-control" placeholder="remark">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">
                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#detail-measurement-modal"
                                    class="bg-primary rounded-pill text-white px-3 py-1" style="text-decoration:none"
                                    onclick="toggleModal('Quantity?', 'Check the quantity of buffer stop.')">
                                    Quantity?
                                </a>
                            </div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="quantity" class="form-select">
                                        <option value="" selected disabled>- none -</option>
                                        <option value="Pass">Pass</option>
                                        <option value="Fail">Fail</option>
                                        <option value="N/A">N/A</option>
                                    </select>
                                    <input type="text" name="quantity_remark" class="form-control" placeholder="remark">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">
                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#detail-measurement-modal"
                                    class="bg-primary rounded-pill text-white px-3 py-1" style="text-decoration:none"
                                    onclick="toggleModal('Position?', 'Check that buffer stop are correctly positioned , mounting, aligned, leveled in accordance with approved construction drawing.')">
                                    Position?
                                </a>
                            </div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="position" class="form-select">
                                        <option value="" selected disabled>- none -</option>
                                        <option value="Pass">Pass</option>
                                        <option value="Fail">Fail</option>
                                        <option value="N/A">N/A</option>
                                    </select>
                                    <input type="text" name="position_remark" class="form-control" placeholder="remark">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">
                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#detail-measurement-modal"
                                    class="bg-primary rounded-pill text-white px-3 py-1" style="text-decoration:none"
                                    onclick="toggleModal('Torque?', 'Bolt tightening torque (friction clamp). The value torque accordance with manufacturer standard.')">
                                    Torque?
                                </a>
                            </div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="torque" class="form-select">
                                        <option value="" selected disabled>- none -</option>
                                        <option value="Pass">Pass</option>
                                        <option value="Fail">Fail</option>
                                        <option value="N/A">N/A</option>
                                    </select>
                                    <input type="text" name="torque_remark" class="form-control"
                                        placeholder="remark">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
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

                        <div class="form-row">
                            <div class="name">Remark</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea name="remark" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <div>
                            <a href="{{ route('buffer.examination.index') }}" class="btn btn-warning rounded">Cancel</a>
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
                <div class="modal-header">
                    <div class="text-center align-middle">
                        <h3 class="fw-bolder" id="judul"></h3>
                    </div>
                </div>
                <div class="modal-body p-4">
                    <div class="p-2 text-center">
                        <div class="text-center align-middle">
                            <h4 class="fw-bolder" id="detail"></h4>
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
    <script type="text/javascript">
        function toggleModal(judul, detail) {
            document.getElementById("judul").innerHTML = judul;
            document.getElementById("detail").innerHTML = detail;
        }
    </script>
@endsection
