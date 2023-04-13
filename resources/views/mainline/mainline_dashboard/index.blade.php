@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title> Dashboard | TCSM</title>
@endsection
@section('sub-content')
    <h4>Dashboard Mainline</h4>
    <div class="row">
        <div class="col-12 grid-margin stretch-card animate__animated animate__zoomIn">
            <div class="card card-rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title card-title-dash">Mapping Mainline</h4>
                            </div>
                            <p class="card-subtitle card-subtitle-dash">Mapping Sebaran Temuan di Area Mainline
                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1064.95 531.59"><defs><style>.cls-1,.cls-11,.cls-14,.cls-4,.cls-6,.cls-7,.cls-8{fill:none;}.cls-1,.cls-12,.cls-13,.cls-4,.cls-5{stroke:#231f20;}.cls-1,.cls-11,.cls-12,.cls-13,.cls-14,.cls-2,.cls-4,.cls-5,.cls-6,.cls-7,.cls-8,.cls-9{stroke-miterlimit:10;}.cls-1{stroke-width:15px;}.cls-2{fill:#a7a9ac;stroke:#808285;stroke-width:0.5px;}.cls-2,.cls-6,.cls-7,.cls-8{fill-rule:evenodd;}.cls-3{font-size:28.47px;}.cls-10,.cls-16,.cls-3{font-family:Krungthep, Krungthep;}.cls-11,.cls-4,.cls-5{stroke-width:2px;}.cls-6{stroke:#2bb673;}.cls-6,.cls-7{stroke-width:5px;}.cls-7{stroke:#1b75bc;}.cls-8{stroke:#f15a29;}.cls-9{fill:#27aae1;stroke:#2b3990;}.cls-10{font-size:9.49px;}.cls-11,.cls-14{stroke:#fff;}.cls-12{fill:#231f20;}.cls-13{fill:#fff;}.cls-14{stroke-width:3px;}.cls-15{fill:#2bb673;}.cls-16{font-size:12.76px;}.cls-17{fill:#1b75bc;}</style></defs><title>Mapping</title><polyline class="cls-1" points="423.82 375.03 279.19 375.03 153.09 265.04 153.09 235.66"/><polygon id="Mainline" class="cls-2" points="29.37 277.17 53.93 296.94 86.19 277.17 93.78 277.17 126.05 307.69 129.84 322.24 151.99 346.44 173.5 367.32 164.32 375.86 173.5 379.65 212.4 379.65 276.93 322.24 334.81 321.3 410.73 253.92 452.44 253.53 495.18 219.92 547.37 217.72 569.2 199.44 587.23 199.44 628.98 236.05 834.26 236.05 857.67 219.92 899.98 219.92 966.79 163.3 940.23 136.73 886.37 186.35 839.64 186.35 819.71 208.8 760.88 208.8 646.88 205.84 599.56 167.59 548.25 167.59 534.65 191.14 477.89 191.14 438.56 227.35 393.64 224.7 320.58 289.67 261.75 289.67 201.01 346.44 165.59 314.5 165.59 296.94 105.99 243.01 67.22 243.01 29.37 277.17"/><text class="cls-3" transform="translate(899.66 283.85)">DKA</text><line class="cls-4" x1="939.57" y1="173.03" x2="922.93" y2="114.19"/><line class="cls-5" x1="922.93" y1="114.19" x2="868.37" y2="114.19"/><text class="cls-3" transform="translate(869.56 109.92)">BHI</text><line class="cls-4" x1="839.64" y1="217.9" x2="823.01" y2="159.07"/><line class="cls-5" x1="823.01" y1="159.07" x2="768.44" y2="159.07"/><text class="cls-3" transform="translate(770.82 154.8)">STB</text><polyline class="cls-4" points="784.34 225.04 784.34 311.24 855.71 311.24"/><text class="cls-3" transform="translate(790.82 304.95)">BNH</text><polyline class="cls-4" points="617.39 201.89 617.39 288.08 688.76 288.08"/><line class="cls-4" x1="541.18" y1="201.33" x2="524.55" y2="142.5"/><line class="cls-5" x1="524.55" y1="142.5" x2="469.98" y2="142.5"/><polyline class="cls-4" points="471.09 215.6 471.09 301.8 541.18 301.8"/><line class="cls-4" x1="432.71" y1="242.85" x2="416.08" y2="184.02"/><polyline class="cls-4" points="893.17 203.94 893.17 290.14 964.55 290.14"/><polyline class="cls-4" points="368.74 260.33 368.74 340.75 432.71 340.75"/><line class="cls-4" x1="289.37" y1="310.7" x2="272.74" y2="251.86"/><line class="cls-5" x1="96.16" y1="206" x2="41.59" y2="206"/><polyline class="cls-4" points="158.79 329.05 158.79 442.28 233.28 442.28"/><line class="cls-5" x1="272.74" y1="251.86" x2="218.17" y2="251.86"/><line class="cls-4" x1="112.79" y1="264.83" x2="96.16" y2="206"/><path class="cls-6" d="M144.6,397.45l-39.44-17-6.89-3L65.63,363.39" transform="translate(-36.12 -134.49)"/><polyline class="cls-6" points="118.14 270.53 124.78 276.22 124.78 299.94 152.94 323.35"/><polyline class="cls-6" points="164.32 333.79 178.56 346.44 213.03 346.44 248.46 314.5 281.36 314.5 283.19 314.5"/><polyline class="cls-6" points="296.14 314.5 316.78 314.5 348.57 285.95 348.57 277.41 363.99 264.83"/><polyline class="cls-6" points="373.72 256.29 388.9 243.01 424.96 243.01"/><polyline class="cls-6" points="466.24 219.92 443.15 241.9 439.35 243.01 438.64 243.01"/><polyline class="cls-6" points="476.2 211.69 485.69 203.16 534.65 201.89"/><polyline class="cls-6" points="547.37 198.88 573.47 173.26 584.85 173.26 611.42 198.88 611.91 199.44"/><polyline class="cls-7" points="622.81 207.58 629.29 212.8 670.26 212.8 670.94 212.8"/><polyline class="cls-7" points="684.73 212.8 691.25 212.8 698.13 219.17 775.59 219.17 778.91 221.9 779.66 222.64"/><polyline class="cls-7" points="834.26 221.5 824.46 227.91 794.63 227.91 793.7 227.91 791.84 227.91"/><polyline class="cls-7" points="846.44 216.28 855.93 216.28 875.54 199.99 886.93 199.99 887.64 200.94"/><polyline class="cls-7" points="935.36 178.84 906.06 205.84 901.79 205.84 900.29 205.84"/><path class="cls-8" d="M984.17,307.63" transform="translate(-36.12 -134.49)"/><line class="cls-4" x1="677.19" y1="212.8" x2="660.56" y2="153.97"/><circle class="cls-9" cx="940.23" cy="174.39" r="6.8"/><circle class="cls-9" cx="893.17" cy="205.84" r="6.8"/><circle class="cls-9" cx="839.64" cy="217.9" r="6.8"/><circle class="cls-9" cx="784.56" cy="227.35" r="6.8"/><circle class="cls-9" cx="677.93" cy="213.75" r="6.8"/><circle class="cls-9" cx="617.8" cy="202.84" r="6.8"/><circle class="cls-9" cx="541.45" cy="202.84" r="6.8"/><circle class="cls-9" cx="471.09" cy="215.6" r="6.8"/><circle class="cls-9" cx="431.76" cy="242.85" r="6.8"/><path class="cls-8" d="M475.37,377.5" transform="translate(-36.12 -134.49)"/><circle class="cls-9" cx="368.44" cy="260.33" r="6.8"/><circle class="cls-9" cx="289.7" cy="314.49" r="6.8"/><circle class="cls-9" cx="158.79" cy="329.05" r="6.8"/><circle class="cls-9" cx="112.79" cy="264.83" r="6.8"/><path class="cls-6" d="M71.07,406.12" transform="translate(-36.12 -134.49)"/><text class="cls-3" transform="translate(42.31 202.4)">LBB</text><path d="M132.27,340.49" transform="translate(-36.12 -134.49)"/><text class="cls-3" transform="translate(162.58 437.38)">FTM</text><line class="cls-5" x1="416.08" y1="184.02" x2="361.51" y2="184.02"/><line class="cls-5" x1="660.56" y1="153.97" x2="605.99" y2="153.97"/><text class="cls-3" transform="translate(215.71 248.27)">CPR</text><text class="cls-3" transform="translate(372.77 335.41)">HJN</text><text class="cls-3" transform="translate(361.52 180.62)">BLA</text><text class="cls-3" transform="translate(475.3 297.45)">BLM</text><text class="cls-3" transform="translate(468.8 139.34)">ASN</text><text class="cls-3" transform="translate(625.05 281.8)">SNY</text><text class="cls-3" transform="translate(610.73 149.7)">IST</text><text class="cls-10" transform="translate(291.54 395.06)">Jakarta Outter Ring Road</text><path class="cls-1" d="M200.44,340.49" transform="translate(-36.12 -134.49)"/><line class="cls-11" x1="152.77" y1="235.66" x2="152.77" y2="262.9"/><line class="cls-11" x1="169.85" y1="248.7" x2="169.85" y2="248.7"/><line class="cls-11" x1="157.35" y1="268.75" x2="188.76" y2="296.16"/><line class="cls-11" x1="196.28" y1="302.72" x2="218.22" y2="321.85"/><line class="cls-11" x1="257.25" y1="355.9" x2="275.09" y2="371.46"/><line class="cls-11" x1="288.45" y1="375.03" x2="314.72" y2="375.03"/><line class="cls-11" x1="337.97" y1="375.03" x2="353.63" y2="375.03"/><line class="cls-11" x1="380.67" y1="375.03" x2="409.61" y2="375.03"/><polyline class="cls-4" points="28.36 229.54 28.36 342.78 127.16 342.78"/><text class="cls-3" transform="translate(30.61 338.71)">DAL-TB</text><polygon class="cls-12" points="602.58 130.92 544.79 130.92 544.78 124.18 536.98 124.18 541.18 113.9 556.13 113.9 554.36 107.17 551.87 107.17 552.58 100.78 561.8 100.78 560.03 94.76 567.83 92.98 567.83 85.54 562.51 85.54 565.35 82.7 566.06 74.55 567.83 63.2 569.78 58.24 564.64 49.02 562.16 35.55 562.51 22.78 558.97 24.55 564.64 19.95 564.99 17.82 561.45 14.63 564.28 9.31 567.47 6.12 569.78 7.89 572.44 0.8 575.27 2.93 577.4 0.8 581.3 5.76 584.14 5.41 585.75 6.47 585.75 14.27 588.39 14.27 588.39 17.11 584.14 19.59 585.75 24.2 585.75 43.35 583.43 55.76 585.75 52.56 587.33 56.11 585.75 59.3 585.75 63.91 585.75 74.55 583.43 83.41 582.37 94.4 582.01 99.36 594.77 98.66 595.13 103.97 593.36 110.71 590.16 114.26 605.99 114.97 611 123.47 600.8 124.18 602.58 130.92"/><polygon class="cls-13" points="573.99 99.36 579.64 99.36 576.82 79.51 573.99 81.28 571.73 87.31 571.73 92.27 573.99 99.36"/><polygon class="cls-13" points="571.73 41.93 570.04 41.93 570.04 34.48 568.45 30.76 571.73 20.92 581.75 20.92 579.64 27.57 581.75 32.62 581.75 41.93 579.64 41.93 579.64 35.81 579.64 31.43 575.1 31.43 571.73 32.62 571.73 35.81 571.73 39.8 571.73 41.93"/><polygon class="cls-12" points="1002.01 207.5 1010.52 207.5 1010.52 127.65 1025.95 127.65 1025.95 209.4 1034.99 209.4 1034.99 124.19 1031.8 118.88 1006.53 120.2 1002.01 122.86 1002.01 207.5"/><path class="cls-12" d="M1021.16,249.81" transform="translate(-36.12 -134.49)"/><path class="cls-12" d="M1047.53,253.36l1.68-9.84,4,8.15.35,1.68,4.08-.44.35-3.55,4.52-.09v4.08l3-.62.35-4.3,1.24-1.11-2.3-2-1.68-5.05-.53-2.39.09-1.42,3,.62s2.48,2.13,2.84,2.3.71,2.57.71,2.57l2.3.71,1.33-.09v-3.9l-1.77-2.22-3.55-1.24h-2.75l-2.13-1.42-.27-.8.27-2.57-.62-1.33h-2.93l-.62,1.15.44,2.66-.89.27-6.38-7.8h-2l1,1.42,2.26,3.1,3.1,3.55-1,.18-4.39-1.06-1.11-.8,1.11-2.66-1.81-.8s-2.13-.62-2.3-.35-1.42,1.42-1.06,1.86a15.51,15.51,0,0,1,1.06,2.39l-1.13.09-4.37-5.41-2,.53,2.75,3.63s1.24,3.46,1.68,3.72a18.07,18.07,0,0,1,2,2.75s-.09,4.61-.09,4.88-1.33,11-1.33,11Z" transform="translate(-36.12 -134.49)"/><path class="cls-13" d="M1051.47,235.65,1051,238s1.86,5.85,2,6.29,1.33,4.43,1.33,4.43l2-2.22,1.24-4.79.71-3.72-1.06-2.3-5.23-.62-.89.53" transform="translate(-36.12 -134.49)"/><path d="M794.66,369.24V340c-.49-.92-1-1.85-1.4-2.8a5.57,5.57,0,0,1-.53-2.71l-8.42-8.84V278.1H763.11v48.73l-8.51,13.69v30l8.51,12.65v53.1h24.82V384.14l7.54-12A5.14,5.14,0,0,1,794.66,369.24Z" transform="translate(-36.12 -134.49)"/><line class="cls-14" x1="737.63" y1="143.61" x2="737.63" y2="177.02"/><line class="cls-14" x1="737.63" y1="194.99" x2="737.63" y2="228.4"/><line class="cls-14" x1="737.63" y1="251.43" x2="737.63" y2="284.84"/>

                                    {{-- ST.LBB --}}

                                <a href=""><circle class="cls-9" cx="29.51" cy="229.54" r="6.8"/></a>

                                <rect class="cls-15" x="956.46" y="469.37" width="108.49" height="17.55"/><text class="cls-16" transform="translate(956.87 461.17)">Elevated</text><rect class="cls-17" x="956.46" y="514.04" width="108.49" height="17.55"/><text class="cls-16" transform="translate(955.28 504.78)">Underground</text></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <div>
                    </div>
                </div>
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-lg-8 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-sm-flex justify-content-between align-items-start">
                                            <div>
                                                <h4 class="card-title card-title-dash">Grafik Trend Temuan</h4>
                                                <h5 class="card-subtitle card-subtitle-dash">
                                                    <span>
                                                        Update
                                                        {{ \Carbon\Carbon::now()->format('F Y') }}
                                                    </span>
                                                </h5>
                                            </div>
                                            <div id="performance-line-legend"></div>
                                        </div>
                                        <div id="chart-container" style="width: 100%; height: 250px;">
                                            {{-- <canvas id="trenOpen"></canvas> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex flex-column animate__animated animate__zoomIn">
                                <div class="row flex-grow">
                                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                        <div class="card bg-primary card-rounded">
                                            <div class="card-body pb-0">
                                                <h4 class="card-title card-title-dash text-white mb-4">
                                                    Temuan {{ \Carbon\Carbon::now()->format('F Y') }}
                                                </h4>
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <p class="status-summary-ight-white mb-1">
                                                            <span>
                                                                Temuan Baru
                                                            </span>
                                                        </p>
                                                        <a href="#">
                                                            <h2 class="text-white fw-bolder">
                                                                {{ $temuan_baru_bulan_ini->count() }}
                                                            </h2>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <p class="status-summary-ight-white mb-1">
                                                            <span>
                                                                Closing Temuan
                                                            </span>
                                                        </p>
                                                        <a href="#">
                                                            <h2 class="text-white fw-bolder">
                                                                {{ $temuan_close_bulan_ini->count() }}
                                                            </h2>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <div class="status-summary-chart-wrapper pb-4">
                                                            <canvas id="status-summary"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="row">
                                                    <h4 class="text-center fw-bolder">Temuan Total</h4>
                                                    <div class="col-sm-6">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                                            <div>
                                                                <p class="text-small mb-2">Temuan Open</p>
                                                                <a href="#"
                                                                    title="Minor: {{ $temuan_minor }} | Moderate: {{ $temuan_moderate }} | Major: {{ $temuan_mayor }}">
                                                                    <h4 class="mb-0 fw-bold text-danger">
                                                                        {{ $temuan_open->count() }}
                                                                    </h4>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <p class="text-small mb-2">Temuan Closed</p>
                                                                <a href="#"
                                                                    title="Minor: {{ $temuan_close_minor }} | Moderate: {{ $temuan_close_moderate }} | Major: {{ $temuan_close_mayor }}">
                                                                    <h4 class="mb-0 fw-bold text-success">
                                                                        {{ $temuan_close->count() }}
                                                                    </h4>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="card-title card-title-dash">Klasifikasi Defect</h4>
                                                </div>
                                                <p class="card-subtitle card-subtitle-dash">Klasifikasi Defect Berdasarkan
                                                    Justifikasi Tim Track Examination
                                                </p>
                                                <div id="klasifikasi-chart"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-12 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="card-title card-title-dash">Titik Sebaran Defect Area
                                                        Mainline</h4>
                                                </div>
                                                <p class="card-subtitle card-subtitle-dash">Presentase Sebaran Temuan Per
                                                    Area</p>
                                                <div id="sebaran-area-chart"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-6 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="card-title card-title-dash">Defect Part</h4>
                                                </div>
                                                <p class="card-subtitle card-subtitle-dash">Sebaran Defect Berdasarkan Part
                                                    di Mainline</p>
                                                <div id="defect-part-chart" class="mt-5 text-center"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="card-title card-title-dash">Defect per Line</h4>
                                                </div>
                                                <p class="card-subtitle card-subtitle-dash">Presentase Sebaran Temuan Per
                                                    Line</p>
                                                <div id="sebaran-chart" class="mt-5 text-center"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 d-flex flex-column animate__animated animate__zoomIn">
                                <div class="row flex-grow">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="d-sm-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h4 class="card-title card-title-dash">Progress Pekerjaan
                                                            Tahunan
                                                        </h4>
                                                        <p class="card-subtitle card-subtitle-dash">Data didapat berdasarkan
                                                            Pekerjaan yang sudah dikerjakan</p>
                                                    </div>
                                                    <div>
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0"
                                                                type="button" id="dropdownMenuButton2"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                Tahun {{ \Carbon\Carbon::now()->format('Y') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                                    <div class="col-12">
                                                        {{-- <div id="chartpic" style="width: 100%; height:500px;">
                                                        </div> --}}
                                                        <div class="table-responsive  mt-1">
                                                            <table class="table select-table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-wrap" style="width: 40%">
                                                                            Preventive Maintenance</th>
                                                                        <th class="text-wrap text-center">Progress</th>
                                                                        <th class="text-wrap text-center">Status
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @foreach ($pic as $item)
                                                                        <tr>
                                                                            <td class="text-wrap">
                                                                                <h6>{{ $item->job->name }}</h6>
                                                                            </td>
                                                                            <td>
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
                                                                                    <p>{{ $item->progress }}/{{ $item->job->frekuensi }}
                                                                                    </p>
                                                                                </div>
                                                                                <div class="progress progress-md">
                                                                                    <div class="progress-bar bg-success"
                                                                                        role="progressbar"
                                                                                        style="width: {{ round($persentase) }}%; height: 100%;"
                                                                                        aria-valuenow="25"
                                                                                        aria-valuemin="0"
                                                                                        aria-valuemax="100"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                @if (round($persentase) >= 100)
                                                                                    <div
                                                                                        class="badge badge-opacity-success">
                                                                                        Completed</div>
                                                                                @else
                                                                                    <div
                                                                                        class="badge badge-opacity-warning">
                                                                                        On Pogress</div>
                                                                                @endif
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('mainline.mainline_dashboard.modals')
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        // {{-- JS TREN TEMUAN --}}
        let temuan = <?php echo json_encode($temuan); ?>;
        let bulan = <?php echo json_encode($bulan); ?>;

        Highcharts.chart('chart-container', {
            title: {
                text: ''
            },
            xAxis: {
                categories: bulan
            },
            yAxis: {
                title: {
                    text: 'Jumlah Temuan'
                }
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                type: 'column',
                name: 'jumlah temuan',
                showInLegend: false,
                data: temuan,
            }, ]
        });


        //{{-- JS MAJOR MINOR --}}
        let minor = <?php echo json_encode($temuan_minor); ?>;
        let moderate = <?php echo json_encode($temuan_moderate); ?>;
        let mayor = <?php echo json_encode($temuan_mayor); ?>;
        Highcharts.chart('klasifikasi-chart', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: '',
                align: 'left'
            },
            subtitle: {
                text: '',
                align: 'left'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
            series: [{
                name: 'jumlah temuan',
                data: [
                    ['Major', mayor],
                    ['Moderate', moderate],
                    ['Minor', minor],
                ]
            }]
        });

        //{{-- JS DEFECT PART --}}
        let trackbed = <?php echo json_encode($defect_trackbed); ?>;
        let sleeper = <?php echo json_encode($defect_sleeper); ?>;
        let rail = <?php echo json_encode($defect_rail); ?>;
        let fastening = <?php echo json_encode($defect_fastening); ?>;
        let lainnya = <?php echo json_encode($defect_lainnya); ?>;
        Highcharts.chart('defect-part-chart', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: '',
                align: 'left'
            },
            subtitle: {
                text: '',
                align: 'left'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
            series: [{
                name: 'jumlah temuan',
                data: [
                    ['Trackbed', trackbed],
                    ['Sleeper', sleeper],
                    ['Fastening System', fastening],
                    ['Rail', rail],
                    ['Lainnya', lainnya],
                ]
            }]
        });

        //{{-- JS SEBARAN Per LINE --}}
        let persentase_UT = <?php echo json_encode($persentase_UT); ?>;
        let persentase_DT = <?php echo json_encode($persentase_DT); ?>;
        let persentase_MT = <?php echo json_encode($persentase_MT); ?>;
        let persentase_DAL = <?php echo json_encode($persentase_DAL); ?>;
        let persentase_TB = <?php echo json_encode($persentase_TB); ?>;
        Highcharts.chart('sebaran-chart', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'left',
                text: ''
            },
            subtitle: {
                align: 'left',
                text: ''
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Presentase Temuan'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },

            series: [{
                name: 'Line',
                colorByPoint: true,
                data: [{
                        name: 'Up Track',
                        y: persentase_UT,
                    },
                    {
                        name: 'Down Track',
                        y: persentase_DT,
                    },
                    {
                        name: 'Middle Track',
                        y: persentase_MT,
                    },
                    {
                        name: 'DAL',
                        y: persentase_DAL,
                    },
                    {
                        name: 'TB',
                        y: persentase_TB,
                    },
                ]
            }]
        });

        // JS BUBBLE SEBARAN TEMUAN PER-AREA
        Highcharts.chart('sebaran-area-chart', {
            chart: {
                type: 'packedbubble',
                height: '50%'
            },
            title: {
                text: '',
                align: 'left'
            },
            tooltip: {
                useHTML: true,
                pointFormat: '<b>{point.name}:</b> {point.value} Titik<sub></sub>'
            },
            plotOptions: {
                packedbubble: {
                    minSize: '30%',
                    maxSize: '200%',
                    zMin: 0,
                    zMax: 1000,
                    layoutAlgorithm: {
                        splitSeries: false,
                        gravitationalConstant: 0.02
                    },
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}',
                        filter: {
                            property: 'y',
                            operator: '>',
                            value: 250
                        },
                        style: {
                            color: 'black',
                            textOutline: 'none',
                            fontWeight: 'normal'
                        }
                    }
                }
            },
            series: [{
                    name: 'Mainline UT',
                    data: [{
                            name: 'St. LBB',
                            value: 7.2
                        },
                        {
                            name: 'LBB-FTM',
                            value: 8.1
                        },
                        {
                            name: 'St.FTM',
                            value: 17.8
                        },
                        {
                            name: 'FTM-CPR',
                            value: 34
                        },
                        {
                            name: 'St.CPR',
                            value: 43
                        },
                        {
                            name: 'CPR-HJN',
                            value: 78.6
                        },
                        {
                            name: 'St.HJN',
                            value: 52
                        },
                        {
                            name: 'HJN-BLA',
                            value: 74.1
                        },
                        {
                            name: 'St.BLA',
                            value: 89.1
                        }, {
                            name: 'BLA-BLM',
                            value: 199
                        },
                        {
                            name: 'St.BLM',
                            value: 195.2
                        },
                        {
                            name: 'BLM-ASEAN',
                            value: 195.2
                        }, {
                            name: 'St.ASEAN',
                            value: 195.2
                        },
                        {
                            name: 'ASEAN-SNY',
                            value: 195.2
                        }, {
                            name: 'St.SNY',
                            value: 195.2
                        }, {
                            name: 'SNY-IST',
                            value: 195.2
                        },
                        {
                            name: 'St.IST',
                            value: 195.2
                        },
                        {
                            name: 'IST-BNH',
                            value: 195.2
                        },
                        {
                            name: 'St.BNH',
                            value: 195.2
                        }, {
                            name: 'BNH-STB',
                            value: 195.2
                        }, {
                            name: 'St.STB',
                            value: 195.2
                        },
                        {
                            name: 'STB-DKA',
                            value: 195.2
                        }, {
                            name: 'St.DKA',
                            value: 195.2
                        }, {
                            name: 'DKA-BHI',
                            value: 195.2
                        }, {
                            name: 'St.BHI',
                            value: 195.2
                        }
                    ]
                },
                {
                    name: 'Mainline DT',
                    data: [{
                            name: 'St. LBB',
                            value: 7.2
                        },
                        {
                            name: 'LBB-FTM',
                            value: 8.1
                        },
                        {
                            name: 'St.FTM',
                            value: 17.8
                        },
                        {
                            name: 'FTM-CPR',
                            value: 34
                        },
                        {
                            name: 'St.CPR',
                            value: 43
                        },
                        {
                            name: 'CPR-HJN',
                            value: 78.6
                        },
                        {
                            name: 'St.HJN',
                            value: 52
                        },
                        {
                            name: 'HJN-BLA',
                            value: 74.1
                        },
                        {
                            name: 'St.BLA',
                            value: 89.1
                        }, {
                            name: 'BLA-BLM',
                            value: 199
                        },
                        {
                            name: 'St.BLM',
                            value: 195.2
                        },
                        {
                            name: 'BLM-ASEAN',
                            value: 195.2
                        }, {
                            name: 'St.ASEAN',
                            value: 195.2
                        },
                        {
                            name: 'ASEAN-SNY',
                            value: 195.2
                        }, {
                            name: 'St.SNY',
                            value: 195.2
                        }, {
                            name: 'SNY-IST',
                            value: 195.2
                        },
                        {
                            name: 'St.IST',
                            value: 195.2
                        },
                        {
                            name: 'IST-BNH',
                            value: 195.2
                        },
                        {
                            name: 'St.BNH',
                            value: 195.2
                        }, {
                            name: 'BNH-STB',
                            value: 195.2
                        }, {
                            name: 'St.STB',
                            value: 195.2
                        },
                        {
                            name: 'STB-DKA',
                            value: 195.2
                        }, {
                            name: 'St.DKA',
                            value: 195.2
                        }, {
                            name: 'DKA-BHI',
                            value: 195.2
                        }, {
                            name: 'St.BHI',
                            value: 195.2
                        }
                    ]
                },
                {
                    name: 'Mainline Middle Track',
                    data: [{
                            name: 'MT BLM',
                            value: 7.2
                        },
                        {
                            name: 'MT BHI',
                            value: 8.1
                        }
                    ]
                },
                {
                    name: 'DAL-TB',
                    data: [{
                            name: 'DAL-TB',
                            value: 7.2
                        },
                        {
                            name: 'MT BHI',
                            value: 8.1
                        }
                    ]
                }
            ]

        });
    </script>
@endsection
