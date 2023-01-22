@extends('../layout/' . $layout)

@section('subhead')
    <title>Data Summary Temuan</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Data Summary Temuan</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('temuan.create') }}" class="btn btn-primary shadow-md mr-2">Add New Data</a>
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
                    </ul>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto">
            <table id="temuan" class="table table-report mt-2">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>DETAIL</th>
                        <th>DATE</th>
                        <th>AREA</th>
                        <th>LINE</th>
                        <th>SPAN</th>
                        <th>CHAINAGE</th>
                        <th>SLEEPER</th>
                        <th>DIR</th>
                        <th>PART</th>
                        <th>DETAIL PART</th>
                        <th>DEFECT</th>
                        <th>REMARK</th>
                        <th>CLASSIFICATION</th>
                        <th>PHOTO</th>
                        <th>STATUS</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($temuan as $item)
                        <tr>
                            <td>
                                <div>
                                    {{ $loop->iteration }}
                                </div>
                            </td>
                            <td>
                                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#show-detail-modal"
                                    class="btn btn-lg btn-success">
                                    Detail
                                </a>
                            </td>
                            <td>
                                <div>
                                    {{ $item->tanggal }}
                                </div>
                            </td>
                            <td>
                                <div>
                                    {{ $item->mainline->area->code }}
                                </div>
                            </td>
                            <td>
                                <div>
                                    {{ $item->mainline->line->code }}
                                </div>
                            </td>
                            <td>
                                <div>
                                    {{ $item->mainline->no_span }}
                                </div>
                            </td>
                            <td>
                                <div>
                                    {{ $item->mainline->kilometer }}
                                </div>
                            </td>
                            <td>
                                <div>
                                    {{ $item->no_sleeper }}
                                </div>
                            </td>
                            <td>
                                <div>
                                    {{ $item->direction }}
                                </div>
                            </td>
                            <td>
                                <div>
                                    {{ $item->part->name }}
                                </div>
                            </td>
                            <td>
                                <div>
                                    {{ $item->detail_part->name }}
                                </div>
                            </td>
                            <td>
                                <div>
                                    {{ $item->defect->name ?? '-' }}
                                </div>
                            </td>
                            <td>
                                <div>
                                    {{ $item->remark ?? '-' }}
                                </div>
                            </td>
                            <td>
                                <div>
                                    {{ $item->klasifikasi }}
                                </div>
                            </td>
                            <td class="item-center">
                                <div>
                                    @if ($item->photo != null)
                                        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#show-photo-modal"
                                            onclick="showPhotoModal('{{ asset('storage/' . $item->photo) }}')">
                                            <img class="thumbnail" style="height: 40px"
                                                src="{{ asset('storage/' . $item->photo) }}" alt="photo_temuan">
                                        </a>
                                    @else
                                        -
                                    @endif
                                </div>
                            </td>
                            <td>
                                <span
                                    class="text-xs px-1 rounded-full @if ($item->status == 'open') btn-sm bg-success @else btn-sm bg-danger @endif text-white mr-1">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td class="table-report__action w-56">
                                <div>
                                    <a class="flex items-center mr-3" href="{{ route('temuan.edit', $item->id) }}">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                        data-tw-target="#delete-confirmation-modal"
                                        onclick="toggleModal('{{ $item->id }}')">
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
                        <div class="text-slate-500 mt-2">Data ini akan dihapus secara permanen.</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <form action="{{ route('temuan.delete') }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="text" name="id" id="id" hidden>
                            <button type="button" data-tw-dismiss="modal"
                                class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                            <button type="submit" class="btn btn-danger w-24">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->

    <!-- BEGIN: Show Photo Modal -->
    <div id="show-photo-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        Dokumentasi Temuan
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <div class="items-center align-center" id="photo"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Show Photo Modal -->

    <!-- BEGIN: Show Detail Modal -->
    <div id="show-detail-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body p-10 text-center">
                    This is totally awesome superlarge modal!
                </div>
            </div>
        </div>
    </div>
    <!-- END: Show Detail Modal -->
@endsection

@section('script')
    <script type="text/javascript">
        function toggleModal(id) {
            $('#id').val(id);
        }

        function showPhotoModal(photo) {
            var photo_temuan = '<img class="thumbnail" style="width: 100%"src="' +
                photo + '" alt="photo_temuan">'
            document.getElementById("photo").innerHTML = photo_temuan;
        }

        $(document).ready(function() {
            $('#temuanx').DataTable({
                processing: true,
                paging: true,
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    className: 'btn btn-success hidden'
                }],
            });
        });
    </script>
@endsection
