@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Data Fund | P & C</title>
@endsection

@section('sub-content')
    <h4>Budgeting > Data Fund </h4>
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
                            <h4 class="card-title">Data Fund (Tahun {{ $tahun }})</h4>
                            <div class="btn-group">
                                <a href="{{ route('masterdata-fund.create') }}" class="btn btn-primary btn-lg me-0"
                                    type="button">
                                    Add Data
                                </a>
                                <button class="btn btn-outline-dark btn-lg ms-0" type="button" data-bs-toggle="modal"
                                    data-bs-target="#filter-modal">
                                    Filter <i class="ti-filter"></i>
                                </button>
                            </div>
                            {{-- <div>
                                <form class="col-sm-2" method="GET" action="{{ route('masterdata-tools') }}">
                                    <div class="input-group">
                                        <input type="search" name="search" class="form-control form-control-dark"
                                            placeholder="Cari Data..." aria-label="Search">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </form>
                            </div> --}}
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th class="text-center text-wrap">
                                                Nama Fund
                                            </th>
                                            <th class="text-center">
                                                Kegiatan
                                            </th>
                                            <th class="text-center">
                                                Initial Value
                                            </th>
                                            <th class="text-center">
                                                Current Value
                                            </th>
                                            <th class="text-center">
                                                Tahun Anggaran
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($funds as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center fw-bolder text-wrap">
                                                    {{ $item->name }}
                                                </td>
                                                <td class="text-center fw-bolder text-wrap">
                                                    {{ $item->kegiatan }}
                                                </td>
                                                <td class="text-center fw-bolder">
                                                    {{ $item->formatRupiah('init_value') }}
                                                </td>
                                                <td class="text-center fw-bolder">
                                                    {{ $item->formatRupiah('current_value') }}
                                                </td>
                                                <td class="text-center fw-bolder text-wrap">
                                                    {{ $item->tahun }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group-vertical">
                                                        <a href="{{ route('masterdata-fund.edit', $item->id) }}"
                                                            type="button" class="btn btn-outline-warning my-0">Edit</a>
                                                        <a href="{{ route('masterdata-fund.transaction', $item->id) }}"
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

    <!-- BEGIN: Filter Modal -->
    <div id="filter-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-2">
                    <div class="px-5 pb-8 mt-3">
                        <form id="filter_form" action="{{ route('masterdata-fund.index') }}" method="GET">
                            <div class="form-group">
                                <label class="form-label">Tahun Anggaran</label>
                                <input type="number" class="form-control" name="tahun" placeholder="tahun anggaran"
                                    value="{{ $tahun }}" min="{{ $tahun - 5 }}" max="{{ $tahun + 100 }}"
                                    required autocomplete="off">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="pull-right">
                        <button type="button" data-bs-dismiss="modal"
                            class="btn btn-outline-warning w-24 mr-1 me-2">Cancel</button>
                        <button type="submit" form="filter_form" class="btn btn-success w-24">Filter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Filter Modal -->
@endsection
