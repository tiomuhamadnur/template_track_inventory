@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title>Data Turn Out Examination | TCSM</title>
@endsection

@section('sub-content')
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
                            <h4 class="card-title">Data Turn Out Examination</h4>
                            <div class="btn-group">
                                <a href="{{ route('wesel.examination.index') }}" class="btn btn-outline-dark btn-lg mx-0"
                                    type="button" title="Refresh">
                                    <i class="ti-reload"></i>
                                </a>
                                <a href="{{ route('wesel.examination.create') }}"
                                    class="btn btn-outline-success btn-lg mx-0" type="button">Add Data</a>
                                <a href="#" class="btn btn-outline-danger btn-lg mx-0" type="button"
                                    data-bs-toggle="modal" data-bs-target="#ModalReport" title="Generate Report">
                                    <i class="ti-printer"></i></a>
                            </div>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th class="text-center">
                                                Name
                                            </th>
                                            <th class="text-center">
                                                Area
                                            </th>
                                            <th class="text-center">
                                                Line
                                            </th>
                                            <th class="text-center text-wrap">
                                                History <br> Data Record
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wesel as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center fw-bolder">
                                                    {{ $item->name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->area->code }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->line->code }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="{{ route('wesel.examination.history', Crypt::encryptString($item->id)) }}"
                                                            type="button" title="Show history data pengukuran"
                                                            class="btn btn-outline-primary mx-0">Show</a>
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

    <!-- Modal Report -->
    <div class="modal fade" id="ModalReport" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form action="{{ route('wesel.examination.report') }}" method="GET">
                    @csrf
                    @method('get')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAdminTitle">Generate Report Activity</h5>
                    </div>
                    <div class="modal-body pt-3 mb-0">
                        <div class="form-group align-middle">
                            <label class="form-label">Wesel</label> <br>
                            <select name="wesel_id" class="form-select" required>
                                <option value="" disabled selected>- Pilih nama wesel -</option>
                                @foreach ($wesel as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }} ({{ $item->area->code ?? '' }}
                                        - {{ $item->line->code ?? '' }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group align-middle">
                            <label class="form-label">Pilih Tanggal Kegiatan</label>
                            <input class="form-control p-1" type="date" name="tanggal" required>
                        </div>
                    </div>

                    <div class="modal-footer mt-2">
                        <button type="submit" formtarget="_blank" class="btn btn-primary justify-content-center">
                            Generate
                        </button>
                        <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
