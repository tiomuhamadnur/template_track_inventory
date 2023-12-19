@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Data Alarms | CPWTM</title>
@endsection

@section('sub-content')
    <h4>Master Data > Alarms</h4>
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
                            <h4 class="card-title">Data Alarms</h4>
                            <h3 class="float-end badge" id="statusBadge">
                                Status Server: <span id="statusText">OK</span>
                            </h3>
                            <a href="{{ route('alarms.create') }}" class="btn btn-outline-dark btn-lg" type="button">Add
                                Data</a>
                            <button class="btn btn-outline-dark btn-lg dropdown-toggle" type="button"
                                id="dropdownMenuIconButton1" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" style="margin-left: -10px;">
                                <i class="ti-link"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                                <a class="dropdown-item" href="#">Print</a>
                                <a class="dropdown-item" href="#">Export to Excel</a>
                                <a class="dropdown-item" href="#">Export to PDF</a>
                            </div>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th class="text-center">
                                                Title
                                            </th>
                                            <th class="text-center">
                                                Day
                                            </th>
                                            <th class="text-center">
                                                Time
                                            </th>
                                            <th class="text-center">
                                                End Point
                                            </th>
                                            <th class="text-center">
                                                Description
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alarms as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center text-wrap">
                                                    {{ $item->title }}
                                                </td>
                                                <td class="text-center text-wrap">
                                                    {{ $item->day ?? '-' }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->time ?? '-' }}
                                                </td>
                                                <td class="text-center text-wrap">
                                                    <a href="{{ $item->endpoint }}"
                                                        target="_blank">{{ $item->endpoint }}</a>
                                                </td>
                                                <td class="text-center text-wrap">
                                                    {{ $item->description ?? '-' }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group-vertical">
                                                        <a href="{{ route('alarms.edit', $item->id) }}" type="button"
                                                            class="btn btn-outline-warning my-0">Edit</a>
                                                        <a class="btn btn-outline-danger my-0" href="javascript:;"
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
                        <form action="{{ route('alarms.delete') }}" method="POST">
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

        // Fungsi untuk melakukan AJAX request setiap 10 detik
        function fetchData() {
            $.ajax({
                url: 'https://alarms.tideupindustries.com',
                type: 'get',
                dataType: 'json',
                success: function(res) {
                    // Mengakses status dan message dari respons
                    var status = res.status;
                    var message = res.message;

                    // Mengubah elemen HTML berdasarkan respons
                    if (status === 'OK') {
                        $('#statusBadge').removeClass('bg-danger').addClass('bg-success');
                        $('#statusText').text(message);
                    } else {
                        $('#statusBadge').removeClass('bg-success').addClass('bg-danger');
                        $('#statusText').text('Down');
                    }
                },
                error: function(xhr, status, error) {
                    // console.error('Kesalahan dalam permintaan ke server:', status, error);

                    // Jika terjadi kesalahan, mengubah status menjadi 'Down' dan warna menjadi merah
                    $('#statusBadge').removeClass('bg-success').addClass('bg-danger');
                    $('#statusText').text('Down');
                }
            });
        }

        // Jalankan fungsi fetchData setiap 10 detik
        setInterval(fetchData, 30000);
    </script>
@endsection
