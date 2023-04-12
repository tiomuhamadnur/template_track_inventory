@extends('depo.depo_layout.base')

@section('sub-title')
    <title> Dashboard | TCSM</title>
@endsection
@section('sub-content')
    <h4>Dashboard Depo</h4>
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="card-title card-title-dash">Mapping Depo (Data masih
                                                        dummy)</h4>
                                                </div>
                                                <p class="card-subtitle card-subtitle-dash">Mapping Sebaran Temuan di DEPO</p>
                                                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1012.31 630.35"><defs><style>.cls-1{fill:#808285;}.cls-1,.cls-10,.cls-2{stroke:#58595b;}.cls-1,.cls-10,.cls-14,.cls-16,.cls-2,.cls-3,.cls-4,.cls-5,.cls-6,.cls-7,.cls-8{stroke-miterlimit:10;}.cls-1,.cls-10,.cls-16,.cls-2{stroke-width:2px;}.cls-11,.cls-2{fill:#a7a9ac;}.cls-2{opacity:0.43;}.cls-10,.cls-16,.cls-3,.cls-5,.cls-6{fill:none;}.cls-3,.cls-6{stroke:#262262;}.cls-3{stroke-width:5px;}.cls-14,.cls-4{fill:#fff;}.cls-4,.cls-5,.cls-7{stroke:#603913;}.cls-4,.cls-5,.cls-6,.cls-7{stroke-width:3px;}.cls-7{fill:#603913;}.cls-8{fill:#fff200;}.cls-14,.cls-16,.cls-8{stroke:#231f20;}.cls-9{font-size:11.11px;}.cls-15,.cls-9{font-family:Krungthep, Krungthep;}.cls-12{fill:#939598;}.cls-13{fill:#d1d3d4;}.cls-15{font-size:27.77px;}</style></defs><title>DEPO</title><rect class="cls-1" x="756.24" y="234.68" width="10.18" height="390.9"/><rect class="cls-1" x="798.09" y="233.91" width="10.18" height="390.9"/><rect class="cls-1" x="844.98" y="233.91" width="10.18" height="390.9"/><rect class="cls-1" x="890.95" y="233.91" width="10.18" height="390.9"/><rect class="cls-1" x="936.75" y="233.91" width="10.18" height="390.9"/><rect class="cls-1" x="983.94" y="234.78" width="10.18" height="390.9"/><rect class="cls-2" x="738.34" y="234.83" width="272.97" height="394.52"/><line class="cls-3" x1="15.18" y1="23.03" x2="967.47" y2="23.03"/><line class="cls-4" x1="956.8" y1="18.02" x2="956.8" y2="27.45"/><line class="cls-4" x1="967.47" y1="18.02" x2="967.47" y2="27.45"/><polyline class="cls-3" points="970.79 45.43 494.12 45.43 452.85 23.03"/><line class="cls-5" x1="960.83" y1="40.71" x2="960.83" y2="50.14"/><line class="cls-5" x1="971.51" y1="40.71" x2="971.51" y2="50.14"/><polyline class="cls-3" points="494.12 45.43 544.39 71.35 975.54 71.35"/><line class="cls-5" x1="964.63" y1="66.05" x2="964.63" y2="77.25"/><line class="cls-5" x1="975.54" y1="66.05" x2="975.54" y2="77.25"/><polyline class="cls-3" points="978.38 93.16 544.39 93.16 491.32 65.34 410.64 23.03"/><polyline class="cls-3" points="491.32 65.34 541.07 120.27 978.38 120.27"/><polyline class="cls-3" points="978.38 141.48 539.65 141.48 476.96 75 444.89 40.99"/><path class="cls-3" d="M596.92,223.8,544.67,119.61Z" transform="translate(-67.71 -44.61)"/><line class="cls-3" x1="992.61" y1="179.19" x2="529.21" y2="179.19"/><polyline class="cls-3" points="715.14 179.19 773.48 209.25 992.61 209.25"/><path class="cls-3" d="M828.62,274.48" transform="translate(-67.71 -44.61)"/><polyline class="cls-3" points="950.4 255.21 550.08 255.21 367.95 61.34 296.8 23.03"/><line class="cls-3" x1="296.8" y1="45.43" x2="339.02" y2="23.03"/><polyline class="cls-3" points="339.02 45.76 264.55 45.43 229.93 53.68 53.01 53.68"/><polyline class="cls-3" points="53.01 86.68 358.94 86.68 436.86 237.59 515.5 390.71 518.19 395.95"/><path class="cls-6" d="M469.76,142.25" transform="translate(-67.71 -44.61)"/><polyline class="cls-3" points="950.4 301.76 539.65 301.76 455.81 154.86"/><polyline class="cls-3" points="709.45 341.25 560.04 341.25 516.02 307.07 479.41 255.21 402.06 97.64"/><line class="cls-3" x1="438.65" y1="241.05" x2="422.42" y2="139.12"/><polyline class="cls-3" points="709.45 368.75 560.2 368.75 521.78 311.54"/><polyline class="cls-3" points="911.82 400.96 584.23 400.96 555.75 377.39 510.24 315.57 484.8 262.84"/><polyline class="cls-3" points="890.95 434.75 593.09 434.75 555.75 377.39"/><polyline class="cls-3" points="698.31 472.46 608.26 472.46 563.36 422.17 513.09 319.44"/><polyline class="cls-3" points="906.13 511.75 608.26 511.75 570.55 430.23"/><polyline class="cls-3" points="906.13 562.03 612.69 562.03 555.75 447.32 532.99 360.11"/><polyline class="cls-3" points="906.13 608.39 596.25 608.39 555.75 447.32 292.06 86.68 127.95 173.3 89.53 172.12"/><polyline class="cls-3" points="250.79 86.68 190.08 118.5 157.12 118.5 63.44 118.5"/><line class="cls-5" x1="968.41" y1="88.27" x2="968.41" y2="99.46"/><line class="cls-5" x1="979.32" y1="88.27" x2="979.32" y2="99.46"/><line class="cls-5" x1="968.41" y1="114.8" x2="968.41" y2="126"/><line class="cls-5" x1="979.32" y1="114.8" x2="979.32" y2="126"/><line class="cls-5" x1="968.41" y1="135.94" x2="968.41" y2="147.13"/><line class="cls-5" x1="979.32" y1="135.94" x2="979.32" y2="147.13"/><circle class="cls-7" cx="995.28" cy="179.8" r="4.71"/><line class="cls-5" x1="989.5" y1="174.21" x2="989.5" y2="185.4"/><circle class="cls-7" cx="994.82" cy="209.25" r="4.71"/><line class="cls-5" x1="989.04" y1="203.65" x2="989.04" y2="214.84"/><circle class="cls-7" cx="952.94" cy="255.39" r="4.71"/><line class="cls-5" x1="947.15" y1="249.79" x2="947.15" y2="260.99"/><circle class="cls-7" cx="952.71" cy="301.37" r="4.71"/><line class="cls-5" x1="946.93" y1="295.77" x2="946.93" y2="306.97"/><line class="cls-5" x1="912.75" y1="395.58" x2="912.75" y2="406.77"/><line class="cls-5" x1="891.88" y1="429.36" x2="891.88" y2="440.56"/><line class="cls-5" x1="906.13" y1="506.15" x2="906.13" y2="517.34"/><line class="cls-5" x1="906.13" y1="602.79" x2="906.13" y2="613.99"/><line class="cls-5" x1="906.13" y1="556.43" x2="906.13" y2="567.63"/><line class="cls-5" x1="698.31" y1="466.86" x2="698.31" y2="478.06"/><line class="cls-5" x1="700.23" y1="363.15" x2="700.23" y2="374.34"/><line class="cls-5" x1="709.45" y1="363.15" x2="709.45" y2="374.34"/><line class="cls-5" x1="53.01" y1="81.67" x2="53.01" y2="92.86"/><line class="cls-5" x1="63.44" y1="48.08" x2="63.44" y2="59.27"/><line class="cls-5" x1="53.01" y1="48.08" x2="53.01" y2="59.27"/><circle class="cls-7" cx="62.9" cy="118.5" r="4.71"/><line class="cls-5" x1="68.69" y1="124.09" x2="68.69" y2="112.9"/><circle class="cls-7" cx="62.36" cy="139.12" r="4.71"/><line class="cls-5" x1="68.15" y1="144.72" x2="68.15" y2="133.52"/><polyline class="cls-3" points="157.12 118.5 117.85 139.12 68.69 139.12"/><circle class="cls-7" cx="91.29" cy="173.07" r="4.71"/><line class="cls-5" x1="97.08" y1="178.66" x2="97.08" y2="167.47"/><line class="cls-5" x1="709.45" y1="336.33" x2="709.45" y2="347.53"/><rect class="cls-8" x="33.82" y="164.04" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(41.69 177.46)">IFT 4</text><rect class="cls-8" x="5.75" y="128.81" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(13.61 142.23)">IFT 3</text><rect class="cls-8" x="5.75" y="107.53" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(13.61 120.95)">IFT 2</text><rect class="cls-8" x="5.75" y="77.65" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(13.61 91.07)">IFT 1</text><rect class="cls-8" x="0.5" y="44.65" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(16.24 58.07)">LT</text><polygon class="cls-10" points="1011.31 629.35 738.34 629.35 738.34 429.37 738.34 234.83 1011.31 234.83 1011.31 629.35"/><circle class="cls-11" cx="803.18" cy="289.29" r="11.55"/><circle class="cls-12" cx="803.18" cy="289.29" r="7.2"/><circle class="cls-13" cx="803.18" cy="289.29" r="4.96"/><circle class="cls-11" cx="803.18" cy="377.39" r="11.55"/><circle class="cls-12" cx="803.18" cy="377.39" r="7.2"/><circle class="cls-13" cx="803.18" cy="377.39" r="4.96"/><circle class="cls-11" cx="803.18" cy="466.51" r="11.55"/><circle class="cls-12" cx="803.18" cy="466.51" r="7.2"/><circle class="cls-13" cx="803.18" cy="466.51" r="4.96"/><circle class="cls-11" cx="803.18" cy="552.56" r="11.55"/><circle class="cls-12" cx="803.18" cy="552.56" r="7.2"/><circle class="cls-13" cx="803.18" cy="552.56" r="4.96"/><circle class="cls-11" cx="896.04" cy="289.29" r="11.55"/><circle class="cls-12" cx="896.04" cy="289.29" r="7.2"/><circle class="cls-13" cx="896.04" cy="289.29" r="4.96"/><circle class="cls-11" cx="896.04" cy="377.39" r="11.55"/><circle class="cls-12" cx="896.04" cy="377.39" r="7.2"/><circle class="cls-13" cx="896.04" cy="377.39" r="4.96"/><circle class="cls-11" cx="896.04" cy="466.51" r="11.55"/><circle class="cls-12" cx="896.04" cy="466.51" r="7.2"/><circle class="cls-13" cx="896.04" cy="466.51" r="4.96"/><circle class="cls-11" cx="896.04" cy="552.56" r="11.55"/><circle class="cls-12" cx="896.04" cy="552.56" r="7.2"/><circle class="cls-13" cx="896.04" cy="552.56" r="4.96"/><circle class="cls-11" cx="989.04" cy="289.29" r="11.55"/><circle class="cls-12" cx="989.04" cy="289.29" r="7.2"/><circle class="cls-13" cx="989.04" cy="289.29" r="4.96"/><circle class="cls-11" cx="989.04" cy="377.39" r="11.55"/><circle class="cls-12" cx="989.04" cy="377.39" r="7.2"/><circle class="cls-13" cx="989.04" cy="377.39" r="4.96"/><circle class="cls-11" cx="989.04" cy="466.51" r="11.55"/><circle class="cls-12" cx="989.04" cy="466.51" r="7.2"/><circle class="cls-13" cx="989.04" cy="466.51" r="4.96"/><circle class="cls-11" cx="989.04" cy="552.56" r="11.55"/><circle class="cls-12" cx="989.04" cy="552.56" r="7.2"/><circle class="cls-13" cx="989.04" cy="552.56" r="4.96"/><rect class="cls-8" x="331.88" y="200.22" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(339.75 213.64)">IFLT</text><rect class="cls-8" x="574.23" y="0.5" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(585.8 13.92)">ST 1</text><rect class="cls-8" x="574.23" y="25.2" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(584.88 38.63)">ST 2</text><rect class="cls-8" x="730.98" y="49.36" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(741.62 62.79)">ST 3</text><rect class="cls-8" x="732.05" y="73.53" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(742.69 86.95)">ST 4</text><rect class="cls-8" x="574.23" y="97.64" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(584.88 111.06)">ST 5</text><rect class="cls-8" x="574.23" y="123.25" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(584.88 136.67)">ST 6</text><rect class="cls-8" x="798.22" y="154.86" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(808.86 168.29)">CT 1</text><rect class="cls-8" x="798.22" y="185.41" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(808.86 198.83)">CT 2</text><rect class="cls-8" x="615" y="232.02" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(625.65 245.44)">WLT</text><rect class="cls-8" x="615" y="280.26" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(627.5 293.68)">ERT</text><rect class="cls-8" x="615" y="319.44" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(623.6 332.86)">TDT 1</text><rect class="cls-8" x="615" y="346.86" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(623.6 360.29)">TDT 2</text><rect class="cls-8" x="696.42" y="379.26" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(705.02 392.68)">INT 1</text><rect class="cls-8" x="696.42" y="413.66" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(705.02 427.08)">INT 2</text><rect class="cls-8" x="637.21" y="450.28" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(649.52 463.7)">SLT</text><rect class="cls-8" x="697.35" y="489.85" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(707.8 503.28)">WT 1</text><rect class="cls-8" x="696.42" y="540.09" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(706.87 553.51)">WT 2</text><rect class="cls-8" x="696.42" y="586.51" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(706.87 599.93)">WT 3</text><text class="cls-9" transform="translate(98.43 367.9)">INFRASTRUCTURE TRACK</text><text class="cls-9" transform="translate(98.43 396.46)">INFRASTRUCTURE &amp; FACILITY TRACK</text><rect class="cls-14" x="37.1" y="355.04" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(49.6 368.46)">IFT</text><rect class="cls-14" x="37.1" y="382.81" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(47.75 396.23)">IFLT</text><text class="cls-9" transform="translate(98.43 422.38)">LEAD TRACK</text><rect class="cls-14" x="37.1" y="408.73" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(52.37 422.15)">LT</text><text class="cls-9" transform="translate(98.43 448.51)">WORKSHOP TRACK</text><rect class="cls-14" x="37.1" y="434.86" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(50.52 448.28)">WT</text><text class="cls-9" transform="translate(98.43 474.66)">INSPECTION TRACK</text><rect class="cls-14" x="37.1" y="461.01" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(48.67 474.43)">INT</text><text class="cls-9" transform="translate(98.43 500.35)">TRAIN DISCONNECTING TRACK</text><rect class="cls-14" x="37.1" y="486.69" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(49.6 500.11)">TDT</text><text class="cls-9" transform="translate(98.43 525.11)">SHUNTING LOCOMOTIVE TRACK</text><rect class="cls-14" x="37.1" y="511.45" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(49.6 524.88)">SLT</text><text class="cls-9" transform="translate(98.43 549.19)">EMERGENCY REPAIR TRACK</text><rect class="cls-14" x="37.1" y="535.54" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(49.6 548.96)">ERT</text><text class="cls-9" transform="translate(98.43 572.79)">WHEEL LATHE TRACK</text><rect class="cls-14" x="37.1" y="559.14" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(49.6 572.56)">WLT</text><text class="cls-9" transform="translate(98.12 596.4)">CLEANING TRACK</text><rect class="cls-14" x="36.79" y="582.75" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(52.07 596.17)">CT</text><text class="cls-9" transform="translate(98.12 620.27)">STABLING</text><rect class="cls-14" x="36.79" y="606.61" width="44.43" height="18.05" rx="9.03" ry="9.03"/><text class="cls-9" transform="translate(52.07 620.04)">ST</text><text class="cls-15" transform="translate(36.79 332.86)">LEGEND LINE DEPO:</text><text class="cls-9" transform="translate(227.8 14.28)">TO DAL</text><polyline class="cls-16" points="278.6 2.35 171.23 2.35 199 14.28"/></svg>
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

    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card animate__animated animate__zoomIn">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="card-title card-title-dash">Defect per Line (Data masih
                                                        dummy)</h4>
                                                </div>
                                                <p class="card-subtitle card-subtitle-dash">Presentase Sebaran Temuan Per
                                                    Line Area Depo</p>
                                                <div id="container" class="mt-5 text-center"></div>
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

    <div class="row">
        <div class="col-8 grid-margin stretch-card animate__animated animate__zoomIn">
            <div class="card card-rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title card-title-dash">Defect Part</h4>
                            </div>
                            <p class="card-subtitle card-subtitle-dash">Sebaran Defect Berdasarkan Part
                                di Depo</p>
                            <div id="defect-part-depo" class="mt-5 text-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex flex-column animate__animated animate__zoomIn">
            <div class="row flex-grow">
                <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                    <div class="card bg-primary card-rounded">
                        <a href="">
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
                                        <h2 class="text-white fw-bolder">
                                            {{ $temuan_baru_bulan_ini->count() }}
                                        </h2>
                                    </div>
                                    <div class="col-sm-5">
                                        <p class="status-summary-ight-white mb-1">
                                            <span>
                                                Closing Temuan
                                            </span>
                                        </p>
                                        <h2 class="text-white fw-bolder">
                                            {{ $temuan_close_bulan_ini->count() }}
                                        </h2>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="status-summary-chart-wrapper pb-4">
                                            <canvas id="status-summary"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body">
                            <div class="row">
                                <h4 class="text-center fw-bolder">Temuan Total</h4>
                                <div class="col-sm-6">
                                    <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
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
                                            <h4 class="mb-0 fw-bold text-success">
                                                {{ $temuan_close->count() }}
                                            </h4>
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

    <div class="row">
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
                            <div id="klasifikasi-depo"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        // JS JUMLAH TEMUAN DEPO
        const chart = Highcharts.chart('container', {
            title: {
                text: '',
                align: 'left'
            },
            subtitle: {
                text: '',
                align: 'left'
            },
            yAxis: {
                title: {
                    text: 'Jumlah Temuan'
                }
            },
            xAxis: {
                categories: ['ST1', 'ST2', 'ST3', 'ST4', 'ST5', 'ST6', 'CT1', 'CT2', 'WLT', 'ERT', 'TDT1', 'TDT2',
                    'INT1', 'INT2', 'SLT', 'WT1', 'WT2', 'WT3', 'IFLT', 'IFT1', 'IFT2', 'IFT3', 'LT'
                ]
            },
            series: [{
                type: 'column',
                name: 'Temuan',
                colorByPoint: true,
                data: [10, 10, 34, 11, 12, 11, 9, 29, 10, 11, 12, 35, 13, 13, 10, 12, 12, 9, 17, 12, 13, 14,
                    14
                ],
                showInLegend: false
            }]
        });

        document.getElementById('plain').addEventListener('click', () => {
            chart.update({
                chart: {
                    inverted: false,
                    polar: false
                },
                subtitle: {
                    text: '' +
                        '' +
                        ''
                }
            });
        });

        document.getElementById('inverted').addEventListener('click', () => {
            chart.update({
                chart: {
                    inverted: true,
                    polar: false
                },
                subtitle: {
                    text: '' +
                        '' +
                        ''
                }
            });
        });

        document.getElementById('polar').addEventListener('click', () => {
            chart.update({
                chart: {
                    inverted: false,
                    polar: true
                },
                subtitle: {
                    text: '' +
                        '"' +
                        ''
                }
            });
        });
    </script>

    <script>
        // JS KLASIFIKASI DEPO
        let minor = <?php echo json_encode($temuan_minor); ?>;
        let moderate = <?php echo json_encode($temuan_moderate); ?>;
        let mayor = <?php echo json_encode($temuan_mayor); ?>;
        Highcharts.chart('klasifikasi-depo', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: '',
                align: 'left'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                    }
                }
            },
            series: [{
                name: 'jumlah temuan',
                colorByPoint: true,
                data: [{
                    name: 'Major',
                    y: mayor,
                }, {
                    name: 'Minor',
                    y: minor,
                }, {
                    name: 'Moderate',
                    y: moderate,
                }]
            }]
        });
    </script>

    <script>
        let ballast = <?php echo json_encode($defect_ballast); ?>;
        let sleeper = <?php echo json_encode($defect_sleeper); ?>;
        let rail = <?php echo json_encode($defect_rail); ?>;
        let fastening = <?php echo json_encode($defect_fastening); ?>;
        let lainnya = <?php echo json_encode($defect_lainnya); ?>;

        Highcharts.chart('defect-part-depo', {
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
                    ['Ballast', ballast],
                    ['Rail Defect', rail],
                    ['Fastening System', fastening],
                    ['Sleeper', sleeper],
                    ['Lainnya', lainnya],
                ]
            }]
        });
    </script>
@endsection
