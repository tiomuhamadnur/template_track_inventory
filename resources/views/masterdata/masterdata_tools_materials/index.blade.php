@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Data Tools & Materials | CPWTM</title>
@endsection

@section('sub-content')
    <h4>Master Data > Tools & Materials </h4>
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
                            <h4 class="card-title">Data Tools & Materials (Temporary)</h4>
                            <a href="#" id="button_add" class="btn btn-outline-dark btn-lg" onclick="showForm()"
                                type="button">Add
                                Data</a>
                            <div class="row" id="form_add" style="display: none">
                                <form action="{{ route('tools.store') }}" method="POST">
                                    @csrf
                                    @method('post')
                                    <div class="btn-group mx-2">
                                        <input class="form-control form-control-sm me-2" name="name" type="text"
                                            placeholder="Name" autocomplete="off" required>
                                        <input class="form-control form-control-sm me-2" name="unit" type="text"
                                            placeholder="Unit (ex: pc, set, sht, etc)" required>
                                        <button type="submit" class="text-white btn btn-primary me-0">Save</button>
                                        <a href="{{ route('tools.index') }}" class="text-white btn btn-danger">Cancel</a>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th class="text-center">
                                                Name
                                            </th>
                                            <th class="text-center">
                                                Qty.
                                            </th>
                                            <th class="text-center">
                                                Unit
                                            </th>
                                            <th class="text-center">
                                                Initials <br>
                                                Checking
                                            </th>
                                            <th class="text-center">
                                                Ending <br>
                                                Checking
                                            </th>
                                            <th class="text-center">
                                                Remarks
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tools as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->name }}
                                                </td>
                                                <td class="text-wrap text-center">
                                                    {{ $item->qty }}
                                                </td>
                                                <td class="text-wrap text-center">
                                                    {{ $item->unit }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->initial_check }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->ending_check }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->remark }}
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

    <!-- BEGIN: Delete Confirmation Modal -->
    {{-- <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-2">
                    <div class="p-2 text-center">
                        <div class="text-3xl mt-2">Apakah anda yakin?</div>
                        <div class="text-slate-500 mt-2">Data ini akan dihapus secara permanen.</div>
                    </div>
                    <div class="px-5 pb-8 text-center mt-3">
                        <form action="{{ route('pm.delete') }}" method="POST">
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
    </div> --}}
    <!-- END: Delete Confirmation Modal -->
@endsection

@section('javascript')
    <script type="text/javascript">
        function showForm() {
            var form = document.getElementById("form_add");
            var button = document.getElementById("button_add");
            form.style.display = "block";
            button.style.display = "none";
        }
    </script>
@endsection
