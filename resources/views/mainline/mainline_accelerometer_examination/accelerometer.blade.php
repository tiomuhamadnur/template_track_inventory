@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title>Accelerometer | CPWTM</title>
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
                            <h4 class="card-title">Data Detail Accelerometer</h4>
                            <a href="{{ route('accelerometer.index') }}" class="btn btn-outline-dark btn-lg" type="button">
                                <i class="mdi mdi-arrow-left"></i>
                                Back
                            </a>
                            <table>
                                <tr>
                                    <td>Examiner</td>
                                    <td> : </td>
                                    <td>{{ $jadwal->pic }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td> : </td>
                                    <td>{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d F Y') }}</td>
                                </tr>
                            </table>
                            <div class="mt-2">
                                showing: <u class="fw-bolder">{{ $accelerometer->count() ?? 0 }}</u> data
                            </div>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th class="text-center">
                                                Area
                                            </th>
                                            <th class="text-center">
                                                Line
                                            </th>
                                            <th class="text-center">
                                                L-X
                                            </th>
                                            <th class="text-center">
                                                L-Y
                                            </th>
                                            <th class="text-center">
                                                L-Z
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($accelerometer as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->area->code }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->line->code }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->sumbu_x }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->sumbu_y }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->sumbu_z }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" type="button" class="btn btn-outline-warning"
                                                        data-bs-toggle="modal" data-bs-target="#ModalEdit"
                                                        data-id="{{ $item->id }}" data-area="{{ $item->area->code }}"
                                                        data-line="{{ $item->line->code }}"
                                                        data-sumbu_x="{{ $item->sumbu_x }}"
                                                        data-sumbu_y="{{ $item->sumbu_y }}"
                                                        data-sumbu_z="{{ $item->sumbu_z }}">Edit</a>
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

    <!-- Modal Edit -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form action="{{ route('accelerometer.update') }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="modal-header">
                        <h5 class="modal-title fw-bolder">
                            Form Update Data Accelerometer
                        </h5>
                    </div>
                    <div class="modal-body pt-3 mb-0">
                        <input type="text" name="id" id="id_modal" hidden>

                        <div class="form-group align-middle">
                            <label class="form-label">Tanggal</label>
                            <input class="form-control p-1" type="date" value="{{ $jadwal->tanggal }}" readonly>
                        </div>

                        <div class="form-group align-middle">
                            <label class="form-label">Area</label>
                            <input class="form-control p-1" type="text" id="area_modal" readonly>
                        </div>

                        <div class="form-group align-middle">
                            <label class="form-label">Line</label>
                            <input class="form-control p-1" type="text" id="line_modal" readonly>
                        </div>

                        <div class="btn-group">
                            <div class="form-group align-middle">
                                <label class="form-label">Sumbu X</label>
                                <input class="form-control p-1" type="number" min="0" step=".1"
                                    id="sumbu_x_modal" name="sumbu_x" required autocomplete="off">
                            </div>

                            <div class="form-group align-middle">
                                <label class="form-label">Sumbu Y</label>
                                <input class="form-control p-1"type="number" min="0" step=".1"
                                    id="sumbu_y_modal" name="sumbu_y" required autocomplete="off">
                            </div>
                            <div class="form-group align-middle">
                                <label class="form-label">Sumbu Z</label>
                                <input class="form-control p-1" type="number" min="0" step=".1"
                                    id="sumbu_z_modal" name="sumbu_z" required autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer mt-2">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary justify-content-center">
                                Update
                            </button>
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                                Tutup
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Edit -->
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#ModalEdit').on('show.bs.modal', function(e) {
                var id = $(e.relatedTarget).data('id');
                var area = $(e.relatedTarget).data('area');
                var line = $(e.relatedTarget).data('line');
                var sumbu_x = $(e.relatedTarget).data('sumbu_x');
                var sumbu_y = $(e.relatedTarget).data('sumbu_y');
                var sumbu_z = $(e.relatedTarget).data('sumbu_z');

                $('#id_modal').val(id);
                $('#area_modal').val(area);
                $('#line_modal').val(line);
                $('#sumbu_x_modal').val(sumbu_x);
                $('#sumbu_y_modal').val(sumbu_y);
                $('#sumbu_z_modal').val(sumbu_z);
            });
        });
    </script>
@endsection
