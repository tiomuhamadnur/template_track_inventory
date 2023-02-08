@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title> Management User | TCSM</title>
@endsection
@section('sub-content')
    <div class="row flex-grow">
        <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">Management User</h4>
                            <p class="card-subtitle card-subtitle-dash">Track Examination Team</p>
                        </div>
                        <div>
                            <a href="/usermanage-create"><button class="btn btn-primary btn-sm text-white mb-0 me-0" type="button">Add new User</button></a>
                        </div>
                    </div>
                    <div class="table-responsive  mt-1">
                        <table class="table select-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Section</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <div class="form-check form-check-flat mt-0 text-center">
                                            1.
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex ">
                                            <img src="{{ asset('assets/images/faces/dede.jpg') }}" alt="">
                                            <div>
                                                <h6>Dede Irfan</h6>
                                                <p>Technician</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        Track Examination
                                    </td>
                                    <td>
                                        <div class="badge badge-opacity-warning">User</div>
                                    </td>
                                    <td>
                                        <a href="/usermanage-update"><button class="btn-sm btn-outline-warning btn-sm" type="button">Edit</button></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-check form-check-flat mt-0 text-center">
                                            2.
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex ">
                                            <img src="{{ asset('assets/images/faces/dede.jpg') }}" alt="">
                                            <div>
                                                <h6>Hermawan Wisnu Wijanarko</h6>
                                                <p>Section Head</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        Track Examination
                                    </td>
                                    <td>
                                        <div class="badge badge-opacity-success">Admin</div>
                                    </td>
                                    <td>
                                        <a href="/usermanage-update"><button class="btn-sm btn-outline-warning btn-sm" type="button">Edit</button></a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
