@extends('masterdata.masterdata_layout.profile.base')

@section('sub-title')
    <title> Profile | CPWTM</title>
@endsection
@section('sub-content')
    <div class="row">
        <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-start">
                            <div>
                                <h4 class="card-title card-title-dash">Profile User</h4>
                                <p class="card-subtitle card-subtitle-dash mb-0">
                                    {{ auth()->user()->departement->name ?? '-' }}</p>
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
                                            @if ($pic->count() > 0)
                                                @foreach ($pic as $item)
                                                    <button type="button" title="Update progress pekerjaan"
                                                        class="btn btn-outline-warning btn-rounded btn-fw btn-sm mb-1"
                                                        data-bs-toggle="modal" data-bs-target="#ModalUpdatePIC"
                                                        data-id="{{ $item->id }}" data-nama_job="{{ $item->job->name }}"
                                                        data-progress="{{ $item->progress }}"
                                                        data-frekuensi={{ $item->job->frekuensi }}>
                                                        {{ $item->job->name }}
                                                        @if ($item->progress == null or $item->progress == 0)
                                                            @php
                                                                $persentase = 0;
                                                            @endphp
                                                        @else
                                                            @php
                                                                $persentase = ($item->progress / $item->job->frekuensi) * 100;
                                                            @endphp
                                                        @endif
                                                        <br>
                                                        {{ number_format($persentase, 1, '.', ',') }}%
                                                        ({{ $item->progress }}/{{ $item->job->frekuensi }})
                                                    </button>
                                                @endforeach
                                            @else
                                                <button class="btn btn-outline-warning btn-rounded btn-fw btn-sm">
                                                    {{ auth()->user()->jabatan ?? '' }}
                                                    {{ auth()->user()->section->name ?? '' }}
                                                </button>
                                            @endif

                                        </div>
                                        <div class="row g-2 mt-3">
                                            <div class="col mb-1">
                                                <label for="nameWithTitle" class="form-label">Section </label>
                                                <input readonly type="text"
                                                    value="{{ auth()->user()->section->name ?? '-' }}"
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Update Progress PIC -->
        <div class="modal fade" id="ModalUpdatePIC" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header fw-bolder">
                        <h4>Update progress PIC</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('profile.update.progress.pic') }}" id="form_update_pic" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label class="form-label">Nama PIC</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nama Pekerjaan</label>
                                <input type="text" name="id" id="id" required hidden>
                                <input type="text" class="form-control" id="nama_job" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label" id="progress_label">Progress</label>
                                <input type="number" class="form-control" name="progress" id="progress" value=""
                                    min="0">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="pull-right">
                            <button type="submit" form="form_update_pic" class="btn btn-primary justify-content-center">
                                Update
                            </button>
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('javascript')
        <script>
            $(document).ready(function() {
                $('#ModalUpdatePIC').on('show.bs.modal', function(e) {
                    var id = $(e.relatedTarget).data('id');
                    var nama_job = $(e.relatedTarget).data('nama_job');
                    var progress = $(e.relatedTarget).data('progress');
                    var frekuensi = $(e.relatedTarget).data('frekuensi');

                    $('#id').val(id);
                    $('#nama_job').val(nama_job);
                    document.getElementById("progress_label").innerHTML = 'Progress (current:' + progress +
                        '  |  target:' + frekuensi + ')';
                    $('#progress').val(progress);
                    document.getElementById("progress").max = frekuensi;
                });
            });
        </script>
    @endsection
