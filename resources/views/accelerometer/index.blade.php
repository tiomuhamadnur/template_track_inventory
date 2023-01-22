@extends('../layout/' . $layout)

@section('subhead')
    <title>Data Kegiatan Accelerometer</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Data Kegiatan Accelerometer</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            {{-- <a href="{{ route('accelerometer.jadwal.create') }}" class="btn btn-primary shadow-md mr-2">Add Jadwal</a> --}}
            <a href="{{ route('accelerometer.create') }}" class="btn btn-primary shadow-md mr-2">Add New Data</a>
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
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table id="table_id" class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>TANGGAL</th>
                        <th>KEGIATAN</th>
                        <th>PIC</th>
                        <th>REPORT</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal_accelerometer as $item)
                        <tr>
                            <td>
                                <div>
                                    {{ $loop->iteration }}
                                </div>
                            </td>
                            <td>
                                <div>
                                    <a href="{{ route('accelerometer.summary.index', $item->id) }}"
                                        class="tooltip btn btn-warning rounded"
                                        title="Lihat Detail Summary di tanggal {{ $item->tanggal }}!">
                                        {{ $item->tanggal }}
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div>
                                    {{ $item->kegiatan }}
                                </div>
                            </td>
                            <td>
                                <div>
                                    {{ $item->pic }}
                                </div>
                            </td>
                            <td>
                                <div>
                                    <form action="{{ route('accelerometer.report') }}" method="get">
                                        @csrf
                                        @method('get')
                                        <input type="text" name="jadwal_id" hidden value="{{ $item->id }}">
                                        <button class="tooltip" type="submit" title="Export Laporan Kegiatan"
                                            formtarget="_blank">
                                            <i data-lucide="file-text"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div>
                                    <a class="flex items-center mr-3"
                                        href="{{ route('accelerometer.jadwal.edit', $item->id) }}">
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
                        <form action="{{ route('accelerometer.jadwal.delete') }}" method="POST">
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
@endsection

@section('script')
    <script type="text/javascript">
        function toggleModal(id) {
            $('#id').val(id);
        }
    </script>
@endsection
