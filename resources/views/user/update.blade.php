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
                            <p class="card-subtitle card-subtitle-dash">Civil Permanent Way Maintenance</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-12">
                        <form action="{{ route('usermanage.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="intro-y col-span-12 lg:col-span-6">
                                <div class="intro-y box p-2">
                                    <input id="crud-form-1" type="text" class="form-control w-full" name="id"
                                        required value="{{ $user->id }}" hidden>
                                    <div class="text-center">
                                        @if ($user->photo != null)
                                            <img class="img-thumbnail" style="height: 250px"
                                                src="{{ asset('storage/' . $user->photo) }}" alt="Photo Profil">
                                        @else
                                            <img class="img-thumbnail" style="height: 250px"
                                                src="{{ asset('storage/photo-profil/default.png') }}" alt="Photo Profil">
                                        @endif
                                    </div>
                                    <div class="form-label mt-2">
                                        <div class="name">Ubah Foto Profil</div>
                                        <input class="form-control w-full" type="file" name="photo">
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
                                            <option value="Engineer">Engineer</option>
                                            <option value="Technician">Technician</option>
                                            <option value="Staff">Staff</option>
                                            <option value="Guest">Guest</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Section</label>
                                        <select class="form-select w-full" name="section">
                                            <option value="{{ $user->section }}" selected>{{ $user->section }}
                                            </option>
                                            <option value="Permanent Way RAMS">Permanent Way RAMS</option>
                                            <option value="Permanent Way Maintenance">Permanent Way Maintenance</option>
                                            <option value="Guest">Guest</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Departement</label>
                                        <select class="form-select w-full" name="departement">
                                            <option value="{{ $user->departement }}" selected>{{ $user->departement }}
                                            </option>
                                            <option value="Civil Permanent Way">Civil Permanent Way</option>
                                            <option value="Guest">Guest</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Role</label>
                                        <select class="form-select w-full" name="role">
                                            <option value="{{ $user->role }}" selected>{{ $user->role }}
                                            </option>
                                            <option value="User">User</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Guest">Guest</option>
                                        </select>
                                    </div>
                                    <div class="form-label mt-2">
                                        <label for="crud-form-1" class="form-label mt-2">Reset Password</label>
                                        <br>
                                        <a href="#" data-bs-toggle="modal" type="button"
                                            data-bs-target="#reset-confirmation-modal" data-id="{{ $user->id }}"
                                            class="btn btn-danger btn-sm rounded" title="Reset password default">
                                            <i class="mdi mdi-refresh mr-1"></i>
                                            Reset
                                        </a>
                                    </div>
                                    <div class="form-label mt-2">
                                        <label for="crud-form-1" class="form-label mt-2">Ban User</label>
                                        <br>
                                        <a href="{{ route('ban.user', $user->id) }}" class="btn btn-warning btn-sm rounded"
                                            title="Ban akun ini?">
                                            <i class="mdi mdi-block-helper mr-1"></i>
                                            Ban Akun Ini
                                        </a>
                                    </div>
                                    <div class="text-right mt-5">
                                        <a href="{{ route('usermanage.index') }}"
                                            class="btn btn-outline-warning w-24 mr-1">Close</a>
                                        <button type="submit" class="btn btn-primary w-24">Save</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div>
        <div class="modal fade" id="reset-confirmation-modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="modalAdminTitle">Apakah anda yakin?</h2>
                    </div>
                    <form action="{{ route('reset.password') }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <input type="text" id="id_modal" name="id" hidden>
                            <div class="form-group text-center">
                                <div class="text-danger" style="font-size: 100px">
                                    <i class="mdi mdi-refresh"></i>
                                </div>
                                <div>
                                    <h4>Password akan direset ke setelan default!</h4>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary justify-content-center">
                                    Reset
                                </button>
                                <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">
                                    Tutup
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @section('javascript')
        <script>
            $(document).ready(function() {
                $('#reset-confirmation-modal').on('show.bs.modal', function(e) {
                    var id = $(e.relatedTarget).data('id');
                    $('#id_modal').val(id);
                });
            });
        </script>
    @endsection
