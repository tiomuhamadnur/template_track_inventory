@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title> Update User | TCSM</title>
@endsection
@section('sub-content')
    <div class="row flex-grow">
        <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">Update Management User</h4>
                            <p class="card-subtitle card-subtitle-dash">Track & Civil Structure Maintenance</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-12">
                        <form action="{{ route('usermanage.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="intro-y col-span-12 lg:col-span-6">
                                <div class="intro-y box p-2">
                                    <div>
                                        <input id="crud-form-1" type="text" class="form-control w-full" name="id"
                                            required value="{{ $user->id }}" hidden>
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Nama User</label>
                                        <input id="crud-form-1" type="text" class="form-control w-full" name="name"
                                            placeholder="Masukkan Nama User" required value="{{ $user->name }}">
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Email</label>
                                        <input id="crud-form-1" type="email" class="form-control w-full" name="email"
                                            placeholder="Masukkan Nama User" required value="{{ $user->email }}">
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Jabatan</label>
                                        <select class="form-select w-full" name="jabatan">
                                            <option value="{{ $user->jabatan }}" selected>{{ $user->jabatan }}
                                            </option>
                                            <option value="Departement Head">Departement Head</option>
                                            <option value="Section Head">Section Head</option>
                                            <option value="Technician">Technician</option>
                                            <option value="Staff">Staff</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Section</label>
                                        <select class="form-select w-full" name="section">
                                            <option value="{{ $user->section }}" selected>{{ $user->section }}
                                            </option>
                                            <option value="Track Examination">Track Examination</option>
                                            <option value="Track Maintenance">Track Maintenance</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Departement</label>
                                        <input id="crud-form-1" type="text" class="form-control w-full"
                                            name="departement" placeholder="Masukkan Nama Departement"
                                            value="{{ $user->departement }}" readonly>
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Role</label>
                                        <select class="form-select w-full" name="role">
                                            <option value="{{ $user->role }}" selected>{{ $user->role }}
                                            </option>
                                            <option value="User">User</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-label mt-2">
                                        <div class="name">Foto Profil</div>
                                        <input class="form-control w-full" type="file" name="photo">
                                    </div>
                                    <div class="text-right mt-5">
                                        <a href="{{ route('usermanage.index') }}"
                                            class="btn btn-outline-warning w-24 mr-1">Cancel</a>
                                        <button type="submit" class="btn btn-primary w-24">Save</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
