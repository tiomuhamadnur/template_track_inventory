@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Detail Fund | P & C</title>
@endsection

@section('sub-content')
    <h4>Budgeting > Detail Fund & Transaction </h4>
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
                            <h4 class="card-title">Detail Fund</h4>
                            <div class="btn-group">
                                <a href="{{ route('masterdata-fund.index') }}" class="btn btn-outline-dark btn-lg me-0"
                                    type="button">
                                    <i class="mdi mdi-arrow-left"></i>
                                    Back
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
                                                    <td class="fw-bolder">{{ $fund->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Kegiatan</td>
                                                    <td> : </td>
                                                    <td class="fw-bolder">{{ $fund->kegiatan }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Funding Value</td>
                                                    <td> : </td>
                                                    <td class="fw-bolder">{{ $fund->formatRupiah('init_value') }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="ms-4">
                                        <table style="font-size: 15px">
                                            <tbody>
                                                <tr>
                                                    <td>Penyerapan Anggaran</td>
                                                    <td> : </td>
                                                    <td class="fw-bolder">{{ formatRupiah($penyerapan_anggaran, true) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Sisa Anggaran</td>
                                                    <td> : </td>
                                                    <td class="fw-bolder">{{ $persentase_penyerapan_anggaran ?? 0 }}%
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <h4 style="margin-top: 20px"><u>List Kontrak :</u></h4>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th class="text-center text-wrap">
                                                No. Contract
                                            </th>
                                            <th class="text-center text-wrap">
                                                Nama Contract
                                            </th>
                                            <th class="text-center text-wrap">
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
                                                    {{ $item->no_contract }}
                                                </td>
                                                <td class="text-center fw-bolder text-wrap">
                                                    {{ $item->name }}
                                                </td>
                                                <td class="text-center text-wrap">
                                                    {{ $item->formatRupiah('contract_value') }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->formatRupiah('total_paid_value') }}
                                                </td>
                                                <td class="text-center fw-bolder">
                                                    <span
                                                        class="badge @if ($item->status == 'open') bg-danger
                                                        @elseif($item->status == 'close') bg-success
                                                        @else bg-info @endif">
                                                        {{ $item->status }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group-vertical">
                                                        <a href="{{ route('masterdata-contract.transaction', $item->id) }}"
                                                            type="button" class="btn btn-outline-success my-0">Detail</a>

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
@endsection
