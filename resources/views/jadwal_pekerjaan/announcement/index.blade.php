@extends('jadwal_pekerjaan.layout.base')

@section('sub-title')
    <title>Annoucements | CPWTM</title>
@endsection

@section('sub-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <div>
                    </div>
                </div>
                <div class="col-lg-12 grid-margin stretch-card mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Annoucement</h4>
                            <div class="btn-group">
                                <a href="{{ route('announcement.index') }}" class="btn btn-outline-dark btn-lg mx-0"
                                    type="button" title="Refresh">
                                    <i class="ti-reload"></i>
                                </a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#ModalAddAnnouncement"
                                    class="btn btn-outline-success btn-lg mx-0" title="Tambah Annoucement"
                                    type="button">Add Data</a>
                            </div>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            {{-- <th class="text-center">
                                                Photo
                                            </th> --}}
                                            <th class="text-center">
                                                Title
                                            </th>
                                            <th class="text-center">
                                                Content
                                            </th>
                                            <th class="text-center">
                                                Start
                                            </th>
                                            <th class="text-center">
                                                End
                                            </th>
                                            <th class="text-center">
                                                Created By
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($announcement as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                {{-- <td class="text-wrap">
                                                    <img class="img-thumbnail" src="{{ asset('storage' . $item->photo) }}"
                                                        alt="Poster" style="width: 25px">
                                                </td> --}}
                                                <td class="text-wrap">
                                                    {{ $item->title }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->content }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->start }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->end }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->user->name }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a class="btn btn-outline-warning mx-0" href="javascript:;"
                                                            data-bs-toggle="modal" data-bs-target="#edit-modal">Edit</a>
                                                        <a class="btn btn-outline-danger mx-0" href="javascript:;"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#delete-confirmation-modal"
                                                            onclick="toggleModal('{{ $item->id }}')">Delete</a>
                                                    </div>
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
        </div>
    </div>

    <!-- Modal Form Add Announcement-->
    <div class="modal fade" id="ModalAddAnnouncement" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdminTitle">Form Announcement</h5>
                </div>
                <div class="modal-body">
                    <form id="form_add_announcement" action="{{ route('announcement.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label class="form-label">Submitter</label>
                            <input type="text" value="{{ auth()->user()->id }}" name="user_id" hidden>
                            <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Content</label>
                            <input type="text" class="form-control" name="content" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tanggal Pengumuman</label>
                            <div class="input-group">
                                <input placeholder="Tanggal Mulai" class="form-control me-1" type="text"
                                    onfocus="(this.type='date')" onblur="(this.type='text')" id="date" name="start"
                                    required>
                                <input placeholder="Tanggal Selesai" class="form-control ms-1" type="text"
                                    onfocus="(this.type='date')" onblur="(this.type='text')" id="date" name="end">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Photo</label>
                            <input type="file" class="form-control" name="photo">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button type="submit" form="form_add_announcement" class="btn btn-primary">
                            Submit
                        </button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-2">
                    <div class="p-2 text-center">
                        <div class="text-3xl mt-2">Apakah anda yakin?</div>
                        <div class="text-slate-500 mt-2">Data ini akan dihapus secara permanen.</div>
                    </div>
                    <div class="px-5 pb-8 text-center mt-3">
                        <form action="{{ route('announcement.delete') }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="text" name="id" id="id" hidden>
                            <button type="button" data-bs-dismiss="modal"
                                class="btn btn-outline-warning w-24 mr-1 me-2">Cancel</button>
                            <button type="submit" class="btn btn-danger w-24">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
@endsection

@section('javascript')
    <script type="text/javascript">
        function toggleModal(id) {
            $('#id').val(id);
        }
    </script>
@endsection
