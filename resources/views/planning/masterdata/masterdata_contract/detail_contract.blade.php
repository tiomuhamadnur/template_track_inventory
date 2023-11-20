@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Detail Contract | P & C</title>
@endsection

@section('sub-content')
    <h4>Transaction > Detail Contract & Transaction </h4>
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
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card card-rounded shadow">
                                    <div class="card-body">
                                        <div class="row">
                                            <h4 class="text-left fw-bolder" style="padding-bottom: 10px;">Detail Contract</h4>
                                            <div class="col-sm-12 text-left">
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-primary btn-lg me-0"
                                                        type="button">Tambah Transaksi</a>
                                                </div>
                                                <div class="table-responsive pt-3">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">
                                                                    No. Contract
                                                                </th>
                                                                <th class="text-center">
                                                                    Funding
                                                                </th>
                                                                <th class="text-center">
                                                                    Vendor
                                                                </th>
                                                                <th class="text-center">
                                                                    Contract Value
                                                                </th>
                                                                <th class="text-center">
                                                                    Status
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center fw-bolder text-wrap">
                                                                    {{ $contract->no_contract }}
                                                                </td>
                                                                <td class="text-center text-wrap">
                                                                    {{ $contract->fund->name }}
                                                                </td>
                                                                <td class="text-center text-wrap">
                                                                    {{ $contract->vendor }}
                                                                </td>
                                                                <td class="text-center fw-bolder text-wrap">
                                                                    {{ $contract->formatRupiah('contract_value') }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $contract->status}}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top: 20px;">
                                <h4><u><strong>Detail Transaksi Contract  {{ $contract->no_contract }}: </strong></u></h4>
                                <table>
                                <tr >
                                    <td> • Nomer Contract <strong>{{ $contract->no_contract }}</strong> Telah Melaksanakan Pembayaran Termin <strong>1</strong> dengan Nominal <strong>Pembayaran: Rp 10.487.000,-</strong></td>
                                </tr>
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
