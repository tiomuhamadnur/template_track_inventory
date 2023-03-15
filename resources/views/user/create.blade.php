@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title> Add User | TCSM</title>
@endsection
@section('sub-content')
    <div class="row flex-grow">
        <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">Management User</h4>
                            <p class="card-subtitle card-subtitle-dash">Track & Civil Structure Maintenance</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-12">
                        <form action="{{ route('usermanage.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="intro-y col-span-12 lg:col-span-6">
                                <div class="intro-y box p-2">
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Nama User</label>
                                        <input id="crud-form-1" type="text" class="form-control w-full" name="name"
                                            placeholder="Masukkan Nama User" required>
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Email</label>
                                        <input id="crud-form-1" type="email" class="form-control w-full" name="email"
                                            placeholder="Masukkan Nama User" required>
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Jabatan</label>
                                        <select class="form-select w-full" name="jabatan">
                                            <option disabled selected>- Pilih Jabatan -</option>
                                            <option value="Departement Head">Departement Head</option>
                                            <option value="Section Head">Section Head</option>
                                            <option value="Engineer">Engineer</option>
                                            <option value="Technician">Technician</option>
                                            <option value="Staff">Staff</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Section</label>
                                        <select class="form-select w-full" name="section">
                                            <option disabled selected>- Pilih Section -</option>
                                            <option value="Track Examination">Track Examination</option>
                                            <option value="Track Maintenance">Track Maintenance</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Departement</label>
                                        <input id="crud-form-1" type="text" class="form-control w-full"
                                            name="departement" placeholder="Masukkan Nama Departement"
                                            value="Track Civil Structure" readonly>
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Role</label>
                                        <select class="form-select w-full" name="role">
                                            <option disabled selected>- Pilih Role -</option>
                                            <option value="User">User</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-label mt-2">
                                        <div class="name">Foto Profil</div>
                                        <input class="form-control w-full" type="file" name="photo" required>
                                    </div>
                                    <div class="text-right mt-5">
                                        <a href="{{ route('usermanage.index') }}"
                                            class="btn btn-outline-primary w-24 mr-1">Cancel</a>
                                        <button type="submit" class="btn btn-primary w-24">Save</button>
                                    </div>
                                </div>
                        </form>
                        <!-- END: Form Layout -->
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
