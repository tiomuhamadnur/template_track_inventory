@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Data Spesifikasi Tools | CPWTM</title>
@endsection

@section('sub-content')
    <h4>Master Data > Data Tools > Data Spesifikasi Tools</h4>
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
                            <h4 class="card-title">Informasi & Spesifikasi Tools</h4>
                            <div class="btn-group">
                                <a href="" class="btn btn-primary btn-lg me-0"
                                    type="button">Back to
                                    List Tools</a>
                            </div>
                                <a href="{{ route('masterdata-spek-tools.create') }}" class="btn btn-primary btn-lg me-0"
                                type="button">Create
                                Entry</a>
                            <div class="">
                                <header>
                                    <h3 class="text-center">Spesifikasi RIFTEK</h3>
                                    <p class="text-center">Oleh:<strong> Hawasyi Akbar | Permanent Way RAMS</strong></p>
                                    <p class="text-center">Dibuat: 1 Januari 2023 | Terakhir diedit: 10 April 2024</p>
                                </header>

                                <article>
                                    <div class="col-12 d-flex justify-content-center" style="margin: 30px;">
                                        <img src="{{ asset('assets/images/dashboard/banner_img.png') }}" alt="Gambar Artikel">
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi.
                                        Mauris sit amet semper lacus. Nunc sed urna a metus bibendum scelerisque.
                                        Aliquam erat volutpat. Proin euismod risus vitae ante tristique commodo.
                                        Integer consectetur, nisl sit amet tempus feugiat, mauris felis luctus sapien,
                                        non malesuada neque orci in odio.
                                    </p>

                                    <p>
                                        Sed eu orci nec purus luctus venenatis. Fusce id orci at libero vulputate
                                        facilisis. Duis rhoncus hendrerit risus, vel ultricies mi tincidunt et.
                                        Curabitur condimentum, odio nec dapibus fermentum, justo elit fringilla risus,
                                        et ultricies justo quam sit amet lectus.
                                    </p>

                                    <p>
                                        Sed eu orci nec purus luctus venenatis. Fusce id orci at libero vulputate
                                        facilisis. Duis rhoncus hendrerit risus, vel ultricies mi tincidunt et.
                                        Curabitur condimentum, odio nec dapibus fermentum, justo elit fringilla risus,
                                        et ultricies justo quam sit amet lectus.
                                    </p>
                                </article>
                            </div>
                            <a href="" class="btn btn-primary">Edit Spesifikasi</a>
                        </div>
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
                        <form action="#" method="POST">
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
