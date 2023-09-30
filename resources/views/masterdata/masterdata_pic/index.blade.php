@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title> PIC PM | CPWTM</title>
@endsection
@section('sub-content')
    <div class="row flex-grow">
        <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">Preventive Work Person In Charge (Periode:
                                {{ $tahun }})</h4>
                            <p class="card-subtitle card-subtitle-dash">{{ auth()->user()->departement }}</p>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('pic.create') }}"><button class="btn btn-primary btn-sm text-white mb-0 me-0"
                                    type="button">Add new PIC</button></a>
                            <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#ModalFilter"
                                title="Filter data">
                                <button class="btn btn-warning btn-sm text-white mb-0 me-0" type="button">
                                    <i class="ti-filter"></i>
                                    Filter
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive  mt-1">
                        <table class="table select-table" style="width: 100%">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th style="width: 30%">PM</th>
                                    <th>PIC</th>
                                    <th>Progress</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pic as $item)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-flat mt-0 text-center">
                                                {{ $loop->iteration }}
                                            </div>
                                        </td>
                                        <td class="text-wrap">
                                            <div class="d-flex ">
                                                @if ($item->job->logo != null)
                                                    <img src="{{ asset('storage/' . $item->job->logo ?? '') }}"
                                                        alt="logo">
                                                @else
                                                    <img src="{{ asset('storage/photo-profil/default.png') }}"
                                                        alt="logo">
                                                @endif
                                                <div>
                                                    <h6>{{ $item->job->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-wrap">
                                            <div class="d-flex">
                                                <div>
                                                    <h6>{{ $item->user->name }}</h6>
                                                    <p>{{ $item->user->jabatan }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <div
                                                    class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                    <p class="text-success">
                                                        @if ($item->progress == null or $item->progress == 0)
                                                            @php
                                                                $persentase = 0;
                                                            @endphp
                                                        @else
                                                            @php
                                                                $persentase = ($item->progress / $item->job->frekuensi) * 100;
                                                            @endphp
                                                        @endif
                                                        {{ number_format($persentase, 1, '.', ',') }}%
                                                    </p>
                                                    <p>{{ $item->progress }}/{{ $item->job->frekuensi }}</p>
                                                </div>
                                                <div class="progress progress-md">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: {{ round($persentase) }}%" aria-valuenow="25"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if (round($persentase) >= 100)
                                                <div class="badge badge-opacity-success">Completed</div>
                                            @else
                                                <div class="badge badge-opacity-warning">On Pogress</div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('pic.edit', $item->id) }}"
                                                class="btn-sm btn-outline-warning btn-sm" type="button">Edit</a>
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

    <!-- Modal Filter-->
    <div class="modal fade" id="ModalFilter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="form_filter" action="{{ route('pic.filter') }}" method="GET">
                        <div class="form-group">
                            @php
                                $tahun_ini = $tahun - 5;
                            @endphp
                            <label class="form-label">Tahun</label>
                            <select class="form-select" name="tahun">
                                <option disabled selected>- Pilih Tahun -</option>
                                @for ($i = $tahun_ini; $i <= $tahun + 5; $i++)
                                    <option value="{{ $i }}" @if ($i == $tahun) selected @endif>
                                        {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="float-right">
                        <button type="submit" form="form_filter" class="btn btn-primary justify-content-center">
                            Filter
                        </button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Filter-->
@endsection
