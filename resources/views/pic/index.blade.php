@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title> PIC PM | TCSM</title>
@endsection
@section('sub-content')
    <div class="row flex-grow">
        <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">Preventive Work Person In Charge (Periode:
                                {{ \Carbon\Carbon::now()->format('Y') }})</h4>
                            <p class="card-subtitle card-subtitle-dash">Track Examination Team</p>
                        </div>
                        <div>
                            <a href="/pic-create"><button class="btn btn-primary btn-sm text-white mb-0 me-0"
                                    type="button">Add new PIC</button></a>
                        </div>
                    </div>
                    <div class="table-responsive  mt-1">
                        <table class="table select-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>PM</th>
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
                                        <td>
                                            <div class="d-flex ">
                                                @if ($item->user->photo != null)
                                                    <img src="{{ asset('storage/' . $item->user->photo ?? '') }}"
                                                        alt="IMG">
                                                @else
                                                    <img src="{{ asset('storage/photo-profil/default.png') }}"
                                                        alt="IMG">
                                                @endif
                                                <div>
                                                    <h6>{{ $item->user->name }}</h6>
                                                    <p>{{ $item->user->jabatan }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6>{{ $item->job->name }}</h6>
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
                                            <a href="{{ route('pic.edit', Crypt::encryptString($item->id)) }}"
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
@endsection
