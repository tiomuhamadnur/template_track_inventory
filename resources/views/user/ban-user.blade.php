@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title> List Banned User | CPWTM</title>
@endsection
@section('sub-content')
    <div class="row flex-grow">
        <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">List Banned User</h4>
                            <p class="card-subtitle card-subtitle-dash">{{ auth()->user()->departement->name ?? '-' }}</p>
                        </div>
                        <div>
                            <a href="{{ route('usermanage.index') }}"><button
                                    class="btn btn-primary btn-sm text-white mb-0 me-0" type="button">Back</button></a>
                        </div>
                    </div>
                    <div class="table-responsive  mt-1">
                        <table class="table select-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Section</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($user as $item)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-flat mt-0 text-center">
                                                {{ $loop->iteration }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex ">
                                                @if ($item->photo != null)
                                                    <img src="{{ asset('storage/' . $item->photo) }}" alt="IMG">
                                                @else
                                                    <img src="{{ asset('storage/photo-profil/default.png') }}"
                                                        alt="IMG">
                                                @endif
                                                <div>
                                                    <h6>{{ $item->name }}</h6>
                                                    <p>{{ $item->jabatan }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $item->email }}
                                        </td>
                                        <td>
                                            {{ $item->section }}
                                        </td>
                                        <td>
                                            @if ($item->role == 'Admin')
                                                <div class="badge badge-opacity-warning">{{ $item->role }}</div>
                                            @else
                                                <div class="badge badge-opacity-success">{{ $item->role }}</div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('unban.user', $item->id) }}"
                                                class="btn-sm btn-outline-success btn-sm" type="button"
                                                title="Unban akun ini">Unban</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
