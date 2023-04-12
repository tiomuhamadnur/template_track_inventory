@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title>Request For Inspection | TCSM</title>
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
                            <h4 class="card-title">Request For Inspection</h4>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th class="text-center text-wrap">
                                                Name Submitter
                                            </th>
                                            <th class="text-center">
                                                Location <br> (No. Span)
                                            </th>
                                            <th class="text-center text-wrap">
                                                Part <br>
                                                Detail Part <br>
                                                (Defect)
                                            </th>
                                            <th class="text-center text-wrap">
                                                Tanggal Perbaikan
                                            </th>
                                            <th class="text-center text-wrap">
                                                Remark
                                            </th>
                                            <th class="text-center text-wrap">
                                                Detail
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_rfi as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->user->name }}
                                                </td>
                                                <td class="text-center text-wrap">
                                                    {{ $item->temuan_mainline->mainline->area->code }} <br>
                                                    ({{ $item->temuan_mainline->mainline->no_span }})
                                                </td>
                                                <td class="text-center text-wrap">
                                                    {{ $item->temuan_mainline->part->name }} <br>
                                                    {{ $item->temuan_mainline->detail_part->name }} <br>
                                                    ({{ $item->temuan_mainline->defect->name }})
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->tanggal }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $item->remark ?? '-' }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" type="button"
                                                        class="btn btn-outline-dark mx-0">Show</a>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="#" type="button"
                                                            class="btn btn-success mx-0 text-white">Approve</a>
                                                        <button type="button"
                                                            class="btn btn-danger mx-0 text-white">Reject</button>
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
