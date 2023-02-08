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
                            <p class="card-subtitle card-subtitle-dash">Track Examination Team</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-12">
                        <div class="intro-y col-span-12 lg:col-span-6">
                                <div class="intro-y box p-2">
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Nama User</label>
                                        <input id="crud-form-1" type="text" class="form-control w-full" name="name"
                                            placeholder="Masukkan Nama User">
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Jabatan</label>
                                        <input id="crud-form-1" type="text" class="form-control w-full" name="jabatan"
                                            placeholder="Masukkan Jabatan User">
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Section</label>
                                        <input id="crud-form-1" type="text" class="form-control w-full" name="section"
                                            placeholder="Masukkan Section">
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Role</label>
                                        <select data-placeholder="Select line area" class="form-control w-full" name="role"
                                            id="crud-form-2">
                                            <option disabled selected>- Pilih Role -</option>
                                            <option value="Mainline">User</option>
                                            <option value="Depo">Admin</option>
                                            <option value="DAL">Superadmin</option>
                                        </select>
                                    </div>
                                    <div class="form-label mt-2">
                                        <div class="name">Foto Profil</div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input class="form-control" type="file" name="photo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right mt-5">
                                        {{-- <a href="{{ route('line.index') }}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a> --}}
                                        <button type="submit" class="btn btn-primary w-24">Save</button>
                                    </div>
                                </div>
                            </form>
                            <!-- END: Form Layout -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
