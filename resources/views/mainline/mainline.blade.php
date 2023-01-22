@extends('../layout/' . $layout)

@section('subhead')
    <title>Data Mainline</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-5">Data Mainline</h2>
    <div class="grid grid-cols-12 gap-6 mt-2">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('mainline.create') }}" class="btn btn-primary shadow-md mr-2">Add New Data</a>
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-lucide="plus"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to PDF
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" class="flex items-center text-danger" href="javascript:;"
                                data-tw-toggle="modal" data-tw-target="#import-file-modal">
                                <i data-lucide="file-plus" class="w-4 h-4 mr-2"></i> Import Excel File
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table id="mainline" class="table table-report mt-2">
                <thead>
                    <tr>
                        <th class="whitespace">NO</th>
                        <th>AREA</th>
                        <th>LINE</th>
                        <th>NO. SPAN</th>
                        <th>CHAINAGE</th>
                        <th>PANJANG SPAN (mm)</th>
                        <th>JUMLAH SLEEPER</th>
                        <th>SPACING SLEEPER (mm)</th>
                        <th>JENIS SLEEPER</th>
                        <th>JOINT</th>
                    </tr>
                </thead>
                <tbody id="body">

                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
    </div>

    <!-- BEGIN: Import Modal -->
    <div id="import-file-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('mainline.import') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            @csrf
                            @method('post')
                            <div>
                                <label for="crud-form-1" class="form-label mt-3 mb-3">Import File Excel</label>
                                <input id="crud-form-1" type="file" class="form-control" name="file_excel">
                            </div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal"
                                class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                            <button type="submit" class="btn btn-primary w-24">Import</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END: Import Modal -->
@endsection


@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mainline').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                select: true,
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    className: 'btn btn-success hidden'
                }],
                ajax: '{{ route('mainline.json') }}',
                columns: [{
                        data: 'id',
                    },
                    {
                        data: 'area_code',
                    },
                    {
                        data: 'line_code',
                    },
                    {
                        data: 'no_span',
                    },
                    {
                        data: 'kilometer',
                    },
                    {
                        data: 'panjang_span',
                    },
                    {
                        data: 'jumlah_sleeper',
                    },
                    {
                        data: 'spacing_sleeper',
                    },
                    {
                        data: 'jenis_sleeper',
                    },
                    {
                        data: 'joint',
                    },
                ],

            });

            // $.ajax({
            //     url: '{{ route('mainline.json') }}',
            //     type: 'get',
            //     success: function(response) {
            //         $.each(response, function(key, value) {
            //             $('#body').append("<tr>\
            //                     <td>" + value.id + "</td>\
            //                     <td>" + value.area.code + "</td>\
            //                     <td>" + value.line.code + "</td>\
            //                     <td>" + value.no_span + "</td>\
            //                     <td>" + value.kilometer + "</td>\
            //                     <td>" + value.panjang_span + "</td>\
            //                     <td>" + value.jumlah_sleeper + "</td>\
            //                     <td>" + value.spacing_sleeper + "</td>\
            //                     <td>" + value.jenis_sleeper + "</td>\
            //                     <td>" + value.joint + "</td>\
            //                     </tr>");
            //         });
            //     }
            // });
        });
    </script>
@endsection
