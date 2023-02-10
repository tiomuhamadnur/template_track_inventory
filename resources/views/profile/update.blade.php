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
                                <div class="row">
                                    <div class="text-center mb-3">
                                        @if (auth()->user()->photo != null)
                                            <img class="img-thumbnail" style="height: 250px"
                                                src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Photo Profil">
                                        @else
                                            <img class="img-thumbnail" style="height: 250px"
                                                src="{{ asset('storage/photo-profil/default.png') }}" alt="Photo Profil">
                                        @endif
                                    </div>
                                    <div class="col">
                                        <form action="{{ route('profile.update.photo') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="form-label mt-2">
                                                <div class="name mb-2">Ubah Foto Profil</div>
                                                <input class="form-control w-full" type="file" name="photo" required>
                                                @error('photo')
                                                    <p class="bg-danger rounded-3 text-center text-white mt-1">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="mt-3 mb-5 btn-group">
                                                <button type="submit" class="btn btn-primary w-24 mr-1">Submit</button>
                                                <a href="{{ route('profile') }}" class="btn btn-danger w-24 mr-1">Cancel</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col">
                                        <form action="{{ route('profile.update.password') }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="form-label mt-2">
                                                <div class="name mb-2">Ubah Password</div>
                                                <input class="form-control w-full mb-2" type="password" name="old_password"
                                                    placeholder="Old Password" required>
                                                <input class="form-control w-full mb-2" type="password" name="new_password"
                                                    placeholder="New Password" required>
                                                <input class="form-control w-full mb-2" type="password"
                                                    name="confirm_new_password" placeholder="Confirm New Password" required>
                                                @if (session('status'))
                                                    <p class="bg-danger rounded-3 text-center text-white mt-1">
                                                        {{ session('status') }}
                                                    </p>
                                                @endif
                                            </div>
                                            <div class="mt-3 mb-5">
                                                <button type="submit" class="btn btn-warning w-24 mr-1 me-2">Ubah</button>
                                            </div>
                                        </form>
                                    </div>
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
