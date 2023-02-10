@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title> Profile | TCSM</title>
@endsection
@section('sub-content')
    <h4>Profil User</h4>
    <div class="row">
        <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-start">
                            <div>
                                <h4 class="card-title card-title-dash">Profile User</h4>
                                <p class="card-subtitle card-subtitle-dash">Track & Civil Structure Maintenance</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-12">
                            <div class="intro-y col-span-12 lg:col-span-6">
                                <div class="intro-y box p-2">
                                    <input id="crud-form-1" type="text" class="form-control w-full" name="id"
                                        required value="" hidden>
                                    <div class="text-center">
                                        @if (auth()->user()->photo != null)
                                            <img class="img-thumbnail" style="height: 250px"
                                                src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Photo Profil">
                                        @else
                                            <img class="img-thumbnail" style="height: 250px"
                                                src="{{ asset('storage/photo-profil/default.png') }}" alt="Photo Profil">
                                        @endif
                                        <div>
                                            <br>
                                            <h3 class="mb-3 fw-bolder">{{ auth()->user()->name }}</h3>
                                            <button class="btn btn-outline-warning btn-rounded btn-fw btn-sm">Track Patrol
                                                on Foot</button>
                                            <button class="btn btn-outline-warning btn-rounded btn-fw btn-sm">Rail Joint
                                                Gap</button>
                                            <button class="btn btn-outline-warning btn-rounded btn-fw btn-sm">Turn Out
                                                Examination</button>


                                        </div>
                                        <div class="row g-2 mt-3">
                                            <div class="col mb-1">
                                                <label for="nameWithTitle" class="form-label">Section </label>
                                                <input readonly type="text" value="{{ auth()->user()->section }}"
                                                    class="form-control text-center">
                                            </div>
                                            <div class="col mb-1">
                                                <label for="" class="form-label">Jabatan</label>
                                                <input readonly type="text" value="{{ auth()->user()->jabatan }}"
                                                    class="form-control text-center">
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col mb-1">
                                                <label for="nameWithTitle" class="form-label">Role</label>
                                                <input readonly type="text" value="{{ auth()->user()->role }}"
                                                    class="form-control text-center">
                                            </div>
                                            <div class="col mb-1">
                                                <label for="" class="form-label">Email</label>
                                                <input readonly type="text" value="{{ auth()->user()->email }}"
                                                    class="form-control text-center">
                                            </div>
                                        </div>
                                        <div class="text-center mt-3 mb-5">
                                            <a href="/profile-update" class="btn btn-warning w-24 mr-1">Edit
                                                Profile</a>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h4 class="card-title card-title-dash">Recent Activities</h4>
                                            <p class="mb-0">1 Temuan Uploaded</p>
                                        </div>
                                        <ul class="bullet-line-list">
                                            <li>
                                                <div class="d-flex justify-content-between">
                                                    <div><a href="/temuan_mainline"><span class="text-light-green">Anda
                                                                Mengupload Temuan FTM-CPR</span></a></div>
                                                    <p>Just now</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between">
                                                    <div><a href="/temuan_mainline"><span class="text-light-green">Anda
                                                                Mengupload Temuan LBB-FTM</span></a></div>
                                                    <p>Just now</p>
                                                </div>
                                            </li>
                                        </ul>
                                        {{-- <div class="list align-items-center pt-3">
                                                        <div class="wrapper w-100">
                                                          <p class="mb-0">
                                                            <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                                          </p>
                                                        </div>
                                                      </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
