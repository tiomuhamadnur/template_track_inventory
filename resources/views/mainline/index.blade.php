@extends('../layout/' . $layout)

@section('subhead')
    <title>Data Track Bed</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-5">Data Track Bed</h2>
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
                            <a href="{{ route('mainline.export') }}" class="dropdown-item">
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
                        <th>PANJANG SPAN (m)</th>
                        <th>JUMLAH SLEEPER</th>
                        <th>SPACING SLEEPER (mm)</th>
                        <th>JENIS SLEEPER</th>
                        <th>JOINT</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mainline as $item)
                        <tr class="intro-x">
                            <td class="w-40">
                                <div>
                                    {{ $loop->iteration }}
                                </div>
                            </td>
                            <td class="w-40">
                                <div class="flex justify-center items-center">
                                    {{ $item->area->code }}
                                </div>
                            </td>
                            <td class="w-40">
                                <div class="flex justify-center items-center">
                                    {{ $item->line->code }}
                                </div>
                            </td>
                            <td class="w-40">
                                <div class="flex justify-center items-center">
                                    {{ $item->no_span }}
                                </div>
                            </td>
                            <td class="w-40">
                                <div class="flex justify-center items-center">
                                    {{ $item->kilometer }}
                                </div>
                            </td>
                            <td class="w-40">
                                <div class="flex justify-center items-center">
                                    {{ $item->panjang_span ?? '-' }}
                                </div>
                            </td>
                            <td class="w-40">
                                <div class="flex justify-center items-center">
                                    {{ $item->jumlah_sleeper ?? '-' }}
                                </div>
                            </td>
                            <td class="w-40">
                                <div class="flex justify-center items-center">
                                    {{ $item->spacing_sleeper ?? '-' }}
                                </div>
                            </td>
                            <td class="w-40">
                                <div class="flex justify-center items-center">
                                    {{ $item->jenis_sleeper ?? '-' }}
                                </div>
                            </td>
                            <td class="w-40">
                                <div class="flex justify-center items-center">
                                    {{ $item->joint ?? '-' }}
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="{{ route('mainline.edit', $item->id) }}">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    <a class="flex items-center text-danger"
                                        href="{{ route('mainline.delete', $item->id) }}">
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Apakah anda yakin?</div>
                        <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process
                            cannot be undone.</div>
                    </div>
                    <input type="text" name="id" id="id">
                    <p id="nama"></p>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="button" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->

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
                                <label for="crud-form-1" class="form-label mt-3 mb-3">Import File Excel Track Bed</label>
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
    <script>
        $(document).ready(function() {
            $('#mainline').DataTable({
                processing: true,
                paging: true,
                select: true,
            });
        });
    </script>
@endsection
