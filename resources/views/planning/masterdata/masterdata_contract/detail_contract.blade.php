@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Detail Contract | P & C</title>
@endsection

@section('sub-content')
    <h4>Budgeting > Detail Contract & Transaction </h4>
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
                            <h4 class="card-title">Detail Progress Contract</h4>
                            <div class="btn-group">
                                <a href="{{ route('masterdata-contract.index') }}" class="btn btn-outline-dark btn-lg me-0"
                                    type="button">
                                    <i class="mdi mdi-arrow-left"></i>
                                    Back
                                </a>
                                <a href="#" class="btn btn-primary btn-lg ms-0" type="button" data-bs-toggle="modal"
                                    data-bs-target="#ModalAdd">
                                    Add Data
                                </a>
                            </div>
                            <div class="row">
                                <div class="btn-group">
                                    <div class="me-4">
                                        <table style="font-size: 15px">
                                            <tbody>
                                                <tr>
                                                    <td>Funding</td>
                                                    <td> : </td>
                                                    <td class="fw-bolder">{{ $contract->fund->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>No. Contract</td>
                                                    <td> : </td>
                                                    <td class="fw-bolder">{{ $contract->no_contract }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Vendor</td>
                                                    <td> : </td>
                                                    <td class="fw-bolder">{{ $contract->vendor }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Contract Value</td>
                                                    <td> : </td>
                                                    <td class="fw-bolder">
                                                        {{ $contract->formatRupiah('contract_value') ?? '-' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="ms-4">
                                        <table style="font-size: 15px">
                                            <tbody>
                                                <tr>
                                                    <td>Paid Value</td>
                                                    <td> : </td>
                                                    <td class="fw-bolder">{{ $contract->formatRupiah('paid_value') ?? '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Progress</td>
                                                    <td> : </td>
                                                    <td class="fw-bolder">{{ $progress }}%</td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td> : </td>
                                                    <td class="fw-bolder">
                                                        <span
                                                            class="badge @if ($contract->status == 'open') bg-danger
                                                        @elseif($contract->status == 'close') bg-success
                                                        @else bg-info @endif">
                                                            {{ $contract->status }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th class="text-center text-wrap">
                                                Termin
                                            </th>
                                            <th class="text-center text-wrap">
                                                Description
                                            </th>
                                            <th class="text-center">
                                                Paid Value
                                            </th>
                                            <th class="text-center">
                                                Paid At
                                            </th>
                                            <th class="text-center">
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($progress_contract as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center fw-bolder text-wrap">
                                                    {{ $item->termin }}
                                                </td>
                                                <td class="text-center text-wrap">
                                                    {{ $item->description }}
                                                </td>
                                                <td class="text-center fw-bolder">
                                                    {{ $item->formatRupiah('paid_value') ?? '-' }}
                                                </td>
                                                <td class="text-center fw-bolder">
                                                    {{ $item->tanggal_paid }}
                                                </td>
                                                <td class="text-center">
                                                    <span
                                                        class="badge @if ($item->status == 'paid') bg-success
                                                            @else bg-info @endif">
                                                        {{ $item->status }}
                                                    </span>
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

    <!-- Modal Add-->
    <div class="modal fade" id="ModalAdd" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="form_add" action="{{ route('masterdata-contract.progress.store') }}" method="POST">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <input type="text" name="contract_id" value="{{ $contract->id }}" hidden>
                            <label class="form-label">Termin</label>
                            <input type="text" class="form-control" name="termin" placeholder="termin ke-" required
                                autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" placeholder="deskripsi pembayaran"
                                required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Paid Value (IDR)</label>
                            <input type="number" min="0" class="form-control" name="paid_value"
                                placeholder="value pembayaran" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tanggal</label>
                            <input placeholder="input tanggal pembayaran" class="form-control" type="text"
                                onfocus="(this.type='datetime-local')" onblur="(this.type='text')" id="date"
                                name="tanggal_paid">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control" name="status" placeholder="value pembayaran"
                                required value="paid" readonly>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="pull-right">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            Tutup
                        </button>
                        <button type="submit" form="form_add" class="btn btn-success justify-content-center">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Add-->
@endsection
