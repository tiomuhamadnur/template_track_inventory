@extends('../layout/' . $layout)

@section('subhead')
    <title>Data Summary Temuan</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Data Summary Temuan</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('temuan.index') }}" class="btn btn-outline-primary mr-2 tooltip" title="Refresh Data">
                <span class="w-5 h-5 flex items-center justify-center">
                    <i class="w-4 h-4" data-lucide="refresh-cw"></i>
                </span>
            </a>
            <a href="{{ route('temuan.create') }}" class="btn btn-primary mr-2 tooltip" title="Tambah Data">Add New
                Data</a>
            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#filter-modal"
                class="btn btn-warning mr-2 tooltip" title="Filter">
                <span class="w-5 h-5 flex items-center justify-center">
                    <i class="w-4 h-4" data-lucide="filter"></i>
                </span>
                Filter
            </a>
            <form action="{{ route('temuan.export') }}" method="GET">
                @csrf
                @method('get')
                <input type="text" name="area_id" value="{{ $area_id ?? '' }}" hidden>
                <input type="text" name="line_id" value="{{ $line_id ?? '' }}" hidden>
                <input type="text" name="part_id" value="{{ $part_id ?? '' }}" hidden>
                <input type="text" name="status" value="{{ $status ?? '' }}" hidden>
                <button type="submit" class="btn btn-success mr-2 tooltip" title="Export to Excel">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-lucide="send"></i>
                    </span>
                    Export
                </button>
            </form>
            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#report-modal" class="btn btn-danger mr-2 tooltip"
                title="Generate Report">
                <span class="w-5 h-5 flex items-center justify-center">
                    <i class="w-4 h-4" data-lucide="file-text"></i>
                </span>
                Report
            </a>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto">
            <table id="temuan" class="table table-report mt-2">
                <thead>
                    <tr>
                        <th>NO</th>
                        {{-- <th>DETAIL</th> --}}
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
                            {{-- <td>
                                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#show-detail-modal"
                                    class="btn btn-lg btn-success">
                                    Detail
                                </a>
                            </td> --}}
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

    <!-- BEGIN: Filter Modal -->
    <div id="filter-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <div class="text-2xl mb-2">FILTER DATA</div>
                        <hr>
                    </div>
                    <div class="px-5 pb-8">
                        <form action="{{ route('temuan.filter') }}" method="GET">
                            @csrf
                            @method('get')
                            <div class="input-group mt-2">
                                <div class="input-group-text">Area</div>
                                <select data-placeholder="Select location area" class="tom-select w-full" name="area_id"
                                    id="crud-form-2">
                                    <option disabled selected>- Pilih Area -</option>
                                    @foreach ($area as $item)
                                        <option value="{{ $item->id }}">{{ $item->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mt-2">
                                <div class="input-group-text">Line</div>
                                <select data-placeholder="Select line name" class="tom-select w-full" name="line_id"
                                    id="crud-form-2">
                                    <option disabled selected>- Pilih Line -</option>
                                    @foreach ($line as $item)
                                        <option value="{{ $item->id }}">{{ $item->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mt-2">
                                <div class="input-group-text">Part</div>
                                <select data-placeholder="Select part name" class="tom-select w-full" name="part_id"
                                    id="crud-form-2">
                                    <option disabled selected>- Pilih Part -</option>
                                    @foreach ($part as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mt-2">
                                <div class="input-group-text">Status</div>
                                <select data-placeholder="Select status" class="tom-select w-full" name="status"
                                    id="crud-form-2">
                                    <option disabled selected>- Status -</option>
                                    <option value="open">Open</option>
                                    <option value="close">Close</option>
                                </select>
                            </div>
                            <div class="text-center mt-8">
                                <button type="submit" class="btn btn-warning w-24 mx-3">Filter</button>
                                <button type="button" data-tw-dismiss="modal"
                                    class="btn btn-danger w-24 mr-1">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Filter Modal -->

    <!-- BEGIN: Show Photo Modal -->
    <div id="show-photo-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="text-2xl mt-2 fw-bolder text-center mb-8">Dokumentasi Temuan</div>
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

    <!-- BEGIN: Report Modal -->
    <div id="report-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <div class="text-2xl mb-2">GENERATE REPORT</div>
                        <hr>
                    </div>
                    <div class="px-5 pb-8">
                        <form action="{{ route('temuan.report') }}" method="GET">
                            @csrf
                            @method('get')
                            <div class="input-group mt-2">
                                <div class="input-group-text">Pilih Tanggal Kegiatan</div>
                                <input type="date" class="form-control" name="tanggal">
                            </div>
                            <div class="text-center mt-8">
                                <button type="submit" formtarget="_blank"
                                    class="btn btn-warning w-24 mx-3">Generate</button>
                                <button type="button" data-tw-dismiss="modal"
                                    class="btn btn-danger w-24 mr-1">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Report Modal -->
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
            $('#temuan').DataTable({
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
