@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title> Update Profile | TCSM</title>
@endsection
@section('sub-content')
    <div class="row flex-grow">
        <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">Update Profile User</h4>
                            <p class="card-subtitle card-subtitle-dash">Track & Civil Structure Maintenance</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-12">

                            <div class="intro-y col-span-12 lg:col-span-6">
                                <div class="intro-y box p-2">
                                    <input id="crud-form-1" type="text" class="form-control w-full" name="id"
                                        required value=" FESF" hidden>
                                    <div class="text-center">

                                            <img class="img-thumbnail" style="height: 250px"
                                                src="{{ asset('storage/photo-profil/default.png') }}" alt="Photo Profil">
                                    </div>
                                    <div class="form-label mt-2">
                                        <div class="name">Ubah Foto Profil</div>
                                        <input class="form-control w-full" type="file" name="photo">
                                    </div>
                                    <div class="row g-2">
                                        <div class="col text-center">
                                            <label for="nameWithTitle" class="form-label">Section</label>
                                            <input readonly type="text" id="" name="no" value="Track & Civil Strutcure Maintenance"
                                                class="form-control text-center">
                                        </div>
                                    </div>
                                    <div class="row g-2 mt-3">
                                        <div class="col mb-1 text-center">
                                            <label for="nameWithTitle" class="form-label">Role </label>
                                            <input readonly type="text" id="" name="no" value="User"
                                                class="form-control text-center">
                                        </div>
                                        <div class="col mb-1 text-center">
                                            <label for="" class="form-label">Jabatan</label>
                                            <input readonly type="text" value="Technician" class="form-control text-center">
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col mb-1 text-center">
                                            <label for="nameWithTitle" class="form-label">E-mail</label>
                                            <input readonly type="text" id="" name="no" value="idede@jakartamrt.co.id"
                                                class="form-control text-center">
                                        </div>
                                        <div class="col mb-1 text-center">
                                            <label for="" class="form-label">Password</label>
                                            <input readonly type="password" value="xxxxx" class="form-control text-center" id="myPassword">
                                            <p class="mt-2" type="checkbox" onclick="showPassword()"><i class="mdi mdi-eye ">  Show Password</i></p>
                                        </div>
                                    </div>
                                    <div class="text-center mt-3 mb-5">
                                        <a href="/profile-changepass"
                                            class="btn btn-outline-primary w-24 mr-1">Change Password</a>
                                        <a href="/profile-update"
                                            class="btn btn-primary w-24 mr-1">Save</a>
                                    </div>
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
    function showPassword() {
        var x = document.getElementById("myPassword");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    </script>
@endsection

