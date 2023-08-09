@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title> Add User | CPWTM</title>
@endsection
@section('sub-content')
    <div class="row flex-grow">
        <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">Management User</h4>
                            <p class="card-subtitle card-subtitle-dash">Civil Permanent Way Technology Maintenance</p>
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
                                            placeholder="Masukkan Email" required>
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Jabatan</label>
                                        <select class="form-select w-full" name="jabatan" required>
                                            <option disabled selected value="">- Pilih Jabatan -</option>
                                            <option value="Departement Head">Departement Head</option>
                                            <option value="Section Head">Section Head</option>
                                            <option value="Engineer">Engineer</option>
                                            <option value="Technician">Technician</option>
                                            <option value="Staff">Staff</option>
                                            <option value="Guest">Guest</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Section</label>
                                        <select class="form-select w-full" name="section" required>
                                            <option disabled value="" selected>- Pilih Section -</option>
                                            @foreach ($section as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                            <option value="Guest">Guest</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Departement</label>
                                        <select class="form-select w-full" name="departement" required>
                                            <option disabled selected value="">- Pilih Departement -</option>
                                            @foreach ($departement as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                            <option value="Guest">Guest</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Role</label>
                                        <select class="form-select w-full" name="role" required>
                                            <option disabled selected value="">- Pilih Role -</option>
                                            <option value="User">User</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Guest">Guest</option>
                                        </select>
                                    </div>
                                    <div class="form-label mt-2">
                                        <div class="name">Foto Profil</div>
                                        <input class="form-control w-full" type="file" name="photo" required>
                                    </div>
                                    <div class="text-right mt-5">
                                        <a href="{{ route('usermanage.index') }}"
                                            class="btn btn-outline-danger w-24 mr-1">Cancel</a>
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
