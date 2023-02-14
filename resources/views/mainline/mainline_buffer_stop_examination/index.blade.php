@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title>Data Buffer/Wheel Stop Examination | TCSM</title>
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
                            <h4 class="card-title">Data Buffer/Wheel Stop Examination</h4>
                            {{-- <form action="{{ route('wesel.temuan.export') }}" method="GET">
                                @csrf
                                @method('get') --}}
                            <div class="btn-group">
                                <a href="{{ route('buffer.examination.index') }}" class="btn btn-outline-dark btn-lg mx-0"
                                    type="button">
                                    <i class="ti-reload"></i>
                                </a>
                                <a href="{{ route('buffer.examination.create') }}"
                                    class="btn btn-outline-success btn-lg mx-0" type="button">Add Data</a>
                                <a href="#" class="btn btn-outline-warning btn-lg mx-0" type="button"
                                    data-bs-toggle="modal" data-bs-target="#ModalFilter" title="Filter data">
                                    <i class="ti-filter"></i>
                                </a>
                                {{-- <input type="text" name="area_id" value="{{ $area_id ?? '' }}" hidden>
                                    <input type="text" name="line_id" value="{{ $line_id ?? '' }}" hidden>
                                    <input type="text" name="part_id" value="{{ $part_id ?? '' }}" hidden>
                                    <input type="text" name="status" value="{{ $status ?? '' }}" hidden> --}}
                                <button type="submit" class="btn btn-outline-success btn-lg mx-0" title="Export to Excel">
                                    <i class="ti-download"></i>
                                </button>
                                <a href="#" class="btn btn-outline-danger btn-lg mx-0" type="button"
                                    data-bs-toggle="modal" data-bs-target="#ModalReport" title="Generate Report">
                                    <i class="ti-printer"></i></a>
                            </div>
                            {{-- </form> --}}
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
                                                Tanggal
                                            </th>
                                            <th class="text-center">
                                                PIC
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($buffer_stop_examination as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->buffer_stop->name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->tanggal }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->pic }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-outline-success mx-0">Detail</button>
                                                        <button type="button"
                                                            class="btn btn-outline-danger mx-0">Delete</button>
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
                <form action="{{ route('buffer.examination.report') }}" method="GET">
                    @csrf
                    @method('get')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAdminTitle">Generate Report Activity</h5>
                    </div>
                    <div class="modal-body pt-3 mb-0">
                        <div class="form-group align-middle">
                            <label class="form-label">Buffer/Wheel Stop</label> <br>
                            <select name="buffer_stop_id" class="form-select" required>
                                <option value="" disabled selected>- Pilih buffer/wheel stop -</option>
                                @foreach ($buffer_stop as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }} ({{ $buffer_stop->area->code }})
                                    </option>
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
