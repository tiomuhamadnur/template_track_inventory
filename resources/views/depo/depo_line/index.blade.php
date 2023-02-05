@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Data Line Depo | TCSM</title>
@endsection

@section('sub-content')
    <h4>Master Data Depo > Line</h4>
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
                            <h4 class="card-title">Data Line</h4>
                            <a href="{{ route('depoline.create') }}" class="btn btn-outline-dark btn-lg" type="button">Add
                                Data</a>
                            <button class="btn btn-outline-dark btn-lg dropdown-toggle" type="button"
                                id="dropdownMenuIconButton1" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" style="margin-left: -10px;">
                                <i class="ti-link"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                                <a class="dropdown-item" href="#">Print</a>
                                <a class="dropdown-item" href="#">Export to Excel</a>
                                <a class="dropdown-item" href="#">Export to PDF</a>
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
                                                Code
                                            </th>
                                            <th class="text-center">
                                                Area
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($line_depo as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->code }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->area }}
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
