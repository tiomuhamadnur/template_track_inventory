@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title> Dashboard | TCSM</title>
@endsection
@section('sub-content')
    <div class="row flex-grow">
        <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">Preventive Work Person In Charge</h4>
                            <p class="card-subtitle card-subtitle-dash">Track Examination Team</p>
                        </div>
                        <div>
                            <button class="btn btn-primary btn-sm text-white mb-0 me-0" type="button"><i
                                    class="mdi mdi-account-plus"></i>Add new PIC</button>
                        </div>
                    </div>
                    <div class="table-responsive  mt-1">
                        <table class="table select-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>PM</th>
                                    <th>Progress</th>
                                    <th>Status</th>
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
                                            <img src="{{ asset('assets/images/faces/tio.jpg') }}" alt="">
                                            <div>
                                                <h6>Tio Muhamad Nur</h6>
                                                <p>Technician</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h6>Sleeper Examination</h6>
                                    </td>
                                    <td>
                                        <div>
                                            <div
                                                class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                <p class="text-success">100%</p>
                                                <p>1/1</p>
                                            </div>
                                            <div class="progress progress-md">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="badge badge-opacity-success">Completed</div>
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
                                                <h6>Dede Irfan</h6>
                                                <p>Technician</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h6>Track Patrol on Foot</h6>
                                    </td>
                                    <td>
                                        <div>
                                            <div
                                                class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                <p class="text-success">%</p>
                                                <p>1/12</p>
                                            </div>
                                            <div class="progress progress-md">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 8.3%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="badge badge-opacity-warning">On Pogress</div>
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
