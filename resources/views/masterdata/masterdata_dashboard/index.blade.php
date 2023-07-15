@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title> Dashboard Admin | CPWTM</title>
@endsection
@section('sub-content')
    <h4>Dashboard Master Data</h4>
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <div>
                    </div>
                </div>
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                            @include('masterdata.masterdata_dashboard.card_asset')
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
