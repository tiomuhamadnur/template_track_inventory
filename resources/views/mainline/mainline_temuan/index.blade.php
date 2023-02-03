@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title>Data Temuan Mainline | TCSM</title>
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
                        <h4 class="card-title">Data Temuan Mainline</h4>
                        <a href="#" class="btn btn-outline-dark btn-lg" type="button"><i class="ti-reload"></i></a>
                        <a href="/mainline-create" class="btn btn-outline-dark btn-lg" type="button">Add Data</a>
                        <a href="#" class="btn btn-outline-warning btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#ModalFilter"><i class="ti-filter"></i></a>
                        <a href="#" class="btn btn-outline-success btn-lg" type="button"><i class="ti-download"></i></a>
                        <a href="#" class="btn btn-outline-danger btn-lg" type="button"><i class="ti-printer"></i></a>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th class="text-center">
                                            Area
                                        </th>
                                        <th class="text-center">
                                            Line
                                        </th>
                                        <th class="text-center">
                                            No. Span
                                        </th>
                                        <th class="text-center">
                                            Part
                                        </th>
                                        <th class="text-center">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                        <tr>
                                            <td class="text-center">

                                            </td>
                                            <td class="text-center">

                                            </td>
                                            <td class="text-center">

                                            </td>
                                            <td class="text-center">

                                            </td>
                                            <td class="text-center">

                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-outline-primary"
                                                    data-bs-toggle="modal" data-bs-target="#ModalDok">Documentation</button>
                                                <button type="button" class="btn btn-outline-primary"
                                                    data-bs-toggle="modal" data-bs-target="#ModalTemuan">Detail</button>
                                            </td>
                                        </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- MODALS DETAIL --}}
<div class="col-lg-4 col-md-6">
    <!-- Modal -->
    <div class="modal fade" id="ModalTemuan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdminTitle">Detail Temuan Mainline</h5>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="col mb-1">
                                <label for="nameWithTitle" class="form-label">Tanggal Temuan</label>
                                <input readonly type="text" id="no_modal" name="no" class="form-control">
                            </div>
                            <div class="col mb-1">
                                <label for="" class="form-label">Area</label>
                                <input readonly type="text" id="area_modal" class="form-control">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label">Line</label>
                                <input readonly type="text" id="line_modal" class="form-control">
                            </div>
                            <div class="col mb-1">
                                <label for="dobWithTitle" class="form-label">Nomor Span</label>
                                <input readonly type="text" id="no_span_modal" class="form-control">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label">Part</label>
                                <input readonly type="text" id="kilometer_modal" class="form-control">
                            </div>
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label">Chaniage (m)</label>
                                <input readonly type="text" id="panjang_span_modal" class="form-control">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label">Line Direction</label>
                                <input readonly type="text" id="jumlah_sleeper_modal" class="form-control">
                            </div>
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label">Defect</label>
                                <input readonly type="text" id="spacing_sleeper_modal" class="form-control">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label">Remark</label>
                                <input readonly type="text" id="jenis_sleeper_modal" class="form-control">
                            </div>
                            <div class="col mb-1">
                                <label for="emailWithTitle" class="form-label">Status</label>
                                <input readonly type="text" id="joint_modal" class="form-control">
                            </div>
                        </div>
                            {{-- <img src="{{ asset('assets/images/auth/lockscreen-bg.jpg')}}" style="width: 50px;height: 50px;"> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary">
                            Edit
                        </button>
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- MODALS VIEW DOC --}}
<div class="col-lg-2 col-md-4">
    <!-- Modal -->
    <div class="modal fade" id="ModalDok" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdminTitle">Dokumentasi Temuan Mainline</h5>
                </div>
                <div class="modal-body">
                    <div class="px-5 pb-8 text-center">
                        <div class="items-center align-center" id="photo">
                            <img src="{{ asset('assets/images/dashboard/profile-card.jpg') }}" alt="">
                        </div>
                    </div>
                </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">
                            Tutup
                        </button>
                    </div>
            </div>
        </div>
    </div>
</div>
{{-- MODALS FILTER --}}
<div class="col-lg-2 col-md-4">
    <!-- Modal -->
    <div class="modal fade" id="ModalFilter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdminTitle">Filter Data</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Area</label>
                        <select class="form-control" name="area_id">
                            <option disabled selected>- Pilih Area -</option>
                                <option value="KKK">
                                </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Line</label>
                        <select class="form-control" name="line_id">
                            <option disabled selected>- Pilih Line -</option>
                                <option value="">
                                </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Part</label>
                        <select class="form-control" name="line_id">
                            <option disabled selected>- Pilih Part -</option>
                                <option value="">
                                </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="line_id">
                            <option disabled selected>- Pilih Status -</option>
                                <option value="">
                                </option>
                        </select>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary justify-content-center" data-bs-dismiss="modal">
                            Filter
                        </button>
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">
                            Tutup
                        </button>
                    </div>
            </div>
        </div>
    </div>

</div>

@endsection

