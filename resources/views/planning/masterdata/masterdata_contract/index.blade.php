@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Data Contract | P & C</title>
@endsection

@section('sub-content')
    <h4>Budgeting > Data </h4>
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
                            <h4 class="card-title">Data Contract</h4>
                            <div class="btn-group">
                                <a href="{{ route('masterdata-contract.create') }}" class="btn btn-primary btn-lg me-0"
                                    type="button">Add
                                    Data</a>
                            </div>

                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th class="text-center text-wrap">
                                                Nama Contract
                                            </th>
                                            <th class="text-center text-wrap">
                                                No. Contract
                                            </th>
                                            <th class="text-center">
                                                Funding
                                            </th>
                                            <th class="text-center">
                                                Contract Value
                                            </th>
                                            <th class="text-center">
                                                Paid Value
                                            </th>
                                            <th class="text-center">
                                                Status
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contracts as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center fw-bolder text-wrap">
                                                    {{ $item->name }} <br> <br>
                                                    ({{ $item->vendor ?? '-' }})
                                                </td>
                                                <td class="text-center fw-bolder text-wrap">
                                                    {{ $item->no_contract }}
                                                </td>
                                                <td class="text-center fw-bolder text-wrap">
                                                    {{ $item->fund->name }}
                                                </td>
                                                <td class="text-center fw-bolder">
                                                    {{ $item->formatRupiah('contract_value') }}
                                                </td>
                                                <td class="text-center fw-bolder">
                                                    {{ $item->formatRupiah('total_paid_value') }}
                                                </td>
                                                <td class="text-center">
                                                    <span
                                                        class="badge @if ($item->status == 'open') bg-danger
                                                                            @elseif($item->status == 'close') bg-success
                                                                            @else bg-info @endif">
                                                        {{ $item->status }}
                                                    </span><br> <br>
                                                    {{ $item->remark ?? '-' }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group-vertical">
                                                        <a href="{{ route('masterdata-contract.edit', $item->id) }}"
                                                            type="button" class="btn btn-outline-warning my-0">Edit</a>
                                                        <a href="{{ route('masterdata-contract.transaction', $item->id) }}"
                                                            type="button" class="btn btn-outline-success my-0">Detail</a>
                                                        <a class="btn btn-outline-danger my-0 disabled" href="javascript:;"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#delete-confirmation-modal"
                                                            onclick="#">Delete</a>
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
