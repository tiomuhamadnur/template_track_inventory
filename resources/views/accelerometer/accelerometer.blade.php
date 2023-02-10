@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title>Accelerometer | TCSM</title>
@endsection

@section('sub-content')
    <h4>Mainline > Accelerometer > <span class="bg-warning rounded p-0">
            Tanggal: {{ $jadwal->tanggal }}
        </span>
    </h4>
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
                            <h4 class="card-title">Data Accelerometer</h4>
                            <a href="{{ route('accelerometer.index') }}" class="btn btn-outline-dark btn-lg"
                                type="button">Back
                            </a>
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
                                                    <button type="button" class="btn btn-outline-warning">Edit</button>
                                                    <button type="button" class="btn btn-outline-danger">Delete</button>
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
