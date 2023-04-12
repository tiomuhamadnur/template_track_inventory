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
                                                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 974.65 606.92"><defs><style>.cls-1,.cls-10{fill:#a7a9ac;}.cls-1,.cls-16,.cls-9{stroke:#58595b;}.cls-1,.cls-13,.cls-15,.cls-16,.cls-17,.cls-2,.cls-3,.cls-4,.cls-5,.cls-6,.cls-7,.cls-9{stroke-miterlimit:10;}.cls-1,.cls-15,.cls-16,.cls-9{stroke-width:2px;}.cls-1{opacity:0.43;}.cls-15,.cls-2,.cls-4,.cls-5,.cls-9{fill:none;}.cls-2,.cls-5{stroke:#262262;}.cls-2{stroke-width:5px;}.cls-13,.cls-3{fill:#fff;}.cls-3,.cls-4,.cls-6{stroke:#603913;}.cls-3,.cls-4,.cls-5,.cls-6{stroke-width:3px;}.cls-6{fill:#603913;}.cls-7{fill:#fff200;}.cls-13,.cls-15,.cls-17,.cls-7{stroke:#231f20;}.cls-8{font-size:10.69px;}.cls-14,.cls-18,.cls-8{font-family:Krungthep, Krungthep;}.cls-11{fill:#939598;}.cls-12{fill:#d1d3d4;}.cls-14{font-size:26.73px;}.cls-16{fill:#808285;}.cls-17{fill:#a97c50;}.cls-18{font-size:14.05px;}</style></defs><title>DEPO</title><rect class="cls-1" x="710.85" y="226.1" width="262.8" height="379.82"/><line class="cls-2" x1="14.63" y1="22.19" x2="931.44" y2="22.19"/><line class="cls-3" x1="921.17" y1="17.37" x2="921.17" y2="26.45"/><line class="cls-3" x1="931.44" y1="17.37" x2="931.44" y2="26.45"/><polyline class="cls-2" points="934.64 43.75 475.72 43.75 436 22.19"/><line class="cls-4" x1="925.05" y1="39.21" x2="925.05" y2="48.29"/><line class="cls-4" x1="935.33" y1="39.21" x2="935.33" y2="48.29"/><polyline class="cls-2" points="475.72 43.75 524.13 68.71 939.21 68.71"/><line class="cls-4" x1="928.7" y1="63.61" x2="928.7" y2="74.39"/><line class="cls-4" x1="939.21" y1="63.61" x2="939.21" y2="74.39"/><polyline class="cls-2" points="941.95 89.7 524.13 89.7 473.04 62.92 395.36 22.19"/><polyline class="cls-2" points="473.04 62.92 520.93 115.8 941.95 115.8"/><polyline class="cls-2" points="941.95 136.23 519.56 136.23 459.21 72.23 428.33 39.48"/><path class="cls-2" d="M592.44,229.33,542.14,129Z" transform="translate(-82.93 -56.79)"/><line class="cls-2" x1="955.65" y1="172.53" x2="509.51" y2="172.53"/><polyline class="cls-2" points="688.51 172.53 744.68 201.47 955.65 201.47"/><path class="cls-2" d="M815.51,278.12" transform="translate(-82.93 -56.79)"/><polyline class="cls-2" points="915 245.72 529.61 245.72 354.26 59.07 285.76 22.19"/><line class="cls-2" x1="285.76" y1="43.75" x2="326.4" y2="22.19"/><polyline class="cls-2" points="326.4 44.07 254.71 43.75 221.38 51.69 51.05 51.69"/><polyline class="cls-2" points="51.05 83.47 345.58 83.47 420.6 228.75 496.31 376.17 498.9 381.21"/><path class="cls-5" d="M470,150.81" transform="translate(-82.93 -56.79)"/><polyline class="cls-2" points="915 290.54 519.56 290.54 438.85 149.11"/><polyline class="cls-2" points="683.03 328.55 539.2 328.55 496.81 295.64 461.57 245.72 387.09 94.02"/><line class="cls-2" x1="422.32" y1="232.08" x2="406.7" y2="133.96"/><polyline class="cls-2" points="683.03 355.02 539.35 355.02 502.36 299.95"/><polyline class="cls-2" points="877.87 386.04 562.48 386.04 535.06 363.35 491.25 303.83 466.75 253.06"/><polyline class="cls-2" points="857.77 418.56 571.01 418.56 535.06 363.35"/><polyline class="cls-2" points="672.31 454.87 585.62 454.87 542.39 406.46 493.99 307.55"/><polyline class="cls-2" points="872.39 492.69 585.62 492.69 549.32 414.21"/><polyline class="cls-2" points="872.39 541.11 589.88 541.11 535.06 430.67 513.15 346.71"/><polyline class="cls-2" points="872.39 585.74 574.05 585.74 535.06 430.67 281.2 83.47 123.2 166.86 86.21 165.73"/><polyline class="cls-2" points="241.47 83.47 183.02 114.1 151.28 114.1 61.1 114.1"/><line class="cls-4" x1="932.34" y1="85" x2="932.34" y2="95.78"/><line class="cls-4" x1="942.84" y1="85" x2="942.84" y2="95.78"/><line class="cls-4" x1="932.34" y1="110.54" x2="932.34" y2="121.32"/><line class="cls-4" x1="942.84" y1="110.54" x2="942.84" y2="121.32"/><line class="cls-4" x1="932.34" y1="130.89" x2="932.34" y2="141.67"/><line class="cls-4" x1="942.84" y1="130.89" x2="942.84" y2="141.67"/><circle class="cls-6" cx="958.22" cy="173.12" r="4.53"/><line class="cls-4" x1="952.65" y1="167.73" x2="952.65" y2="178.51"/><circle class="cls-6" cx="957.77" cy="201.47" r="4.53"/><line class="cls-4" x1="952.2" y1="196.08" x2="952.2" y2="206.86"/><circle class="cls-6" cx="917.45" cy="245.89" r="4.53"/><line class="cls-4" x1="911.88" y1="240.5" x2="911.88" y2="251.28"/><circle class="cls-6" cx="917.23" cy="290.16" r="4.53"/><line class="cls-4" x1="911.66" y1="284.77" x2="911.66" y2="295.55"/><line class="cls-4" x1="878.76" y1="380.86" x2="878.76" y2="391.64"/><line class="cls-4" x1="858.66" y1="413.38" x2="858.66" y2="424.16"/><line class="cls-4" x1="872.39" y1="487.31" x2="872.39" y2="498.09"/><line class="cls-4" x1="872.39" y1="580.35" x2="872.39" y2="591.13"/><line class="cls-4" x1="872.39" y1="535.72" x2="872.39" y2="546.5"/><line class="cls-4" x1="672.31" y1="449.48" x2="672.31" y2="460.26"/><line class="cls-4" x1="674.16" y1="349.63" x2="674.16" y2="360.41"/><line class="cls-4" x1="683.03" y1="349.63" x2="683.03" y2="360.41"/><line class="cls-4" x1="51.05" y1="78.64" x2="51.05" y2="89.42"/><line class="cls-4" x1="61.1" y1="46.3" x2="61.1" y2="57.08"/><line class="cls-4" x1="51.05" y1="46.3" x2="51.05" y2="57.08"/><circle class="cls-6" cx="60.58" cy="114.1" r="4.53"/><line class="cls-4" x1="66.15" y1="119.49" x2="66.15" y2="108.71"/><circle class="cls-6" cx="60.06" cy="133.96" r="4.53"/><line class="cls-4" x1="65.63" y1="139.35" x2="65.63" y2="128.57"/><polyline class="cls-2" points="151.28 114.1 113.48 133.96 66.15 133.96"/><circle class="cls-6" cx="87.91" cy="166.64" r="4.53"/><line class="cls-4" x1="93.48" y1="172.03" x2="93.48" y2="161.25"/><line class="cls-4" x1="683.03" y1="323.82" x2="683.03" y2="334.6"/><rect class="cls-7" x="32.58" y="157.95" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(40.16 170.87)">IFT 4</text><rect class="cls-7" x="5.55" y="124.03" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(13.12 136.95)">IFT 3</text><rect class="cls-7" x="5.55" y="103.54" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(13.12 116.46)">IFT 2</text><rect class="cls-7" x="5.55" y="74.78" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(13.12 87.7)">IFT 1</text><rect class="cls-7" x="0.5" y="43.01" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(15.65 55.93)">LT</text><polygon class="cls-9" points="973.65 605.92 710.85 605.92 710.85 413.38 710.85 226.1 973.65 226.1 973.65 605.92"/><circle class="cls-10" cx="773.27" cy="278.53" r="11.12"/><circle class="cls-11" cx="773.27" cy="278.53" r="6.93"/><circle class="cls-12" cx="773.27" cy="278.53" r="4.78"/><circle class="cls-10" cx="773.27" cy="363.35" r="11.12"/><circle class="cls-11" cx="773.27" cy="363.35" r="6.93"/><circle class="cls-12" cx="773.27" cy="363.35" r="4.78"/><circle class="cls-10" cx="773.27" cy="449.15" r="11.12"/><circle class="cls-11" cx="773.27" cy="449.15" r="6.93"/><circle class="cls-12" cx="773.27" cy="449.15" r="4.78"/><circle class="cls-10" cx="773.27" cy="531.99" r="11.12"/><circle class="cls-11" cx="773.27" cy="531.99" r="6.93"/><circle class="cls-12" cx="773.27" cy="531.99" r="4.78"/><circle class="cls-10" cx="862.67" cy="278.53" r="11.12"/><circle class="cls-11" cx="862.67" cy="278.53" r="6.93"/><circle class="cls-12" cx="862.67" cy="278.53" r="4.78"/><circle class="cls-10" cx="862.67" cy="363.35" r="11.12"/><circle class="cls-11" cx="862.67" cy="363.35" r="6.93"/><circle class="cls-12" cx="862.67" cy="363.35" r="4.78"/><circle class="cls-10" cx="862.67" cy="449.15" r="11.12"/><circle class="cls-11" cx="862.67" cy="449.15" r="6.93"/><circle class="cls-12" cx="862.67" cy="449.15" r="4.78"/><circle class="cls-10" cx="862.67" cy="531.99" r="11.12"/><circle class="cls-11" cx="862.67" cy="531.99" r="6.93"/><circle class="cls-12" cx="862.67" cy="531.99" r="4.78"/><circle class="cls-10" cx="952.2" cy="278.53" r="11.12"/><circle class="cls-11" cx="952.2" cy="278.53" r="6.93"/><circle class="cls-12" cx="952.2" cy="278.53" r="4.78"/><circle class="cls-10" cx="952.2" cy="363.35" r="11.12"/><circle class="cls-11" cx="952.2" cy="363.35" r="6.93"/><circle class="cls-12" cx="952.2" cy="363.35" r="4.78"/><circle class="cls-10" cx="952.2" cy="449.15" r="11.12"/><circle class="cls-11" cx="952.2" cy="449.15" r="6.93"/><circle class="cls-12" cx="952.2" cy="449.15" r="4.78"/><circle class="cls-10" cx="952.2" cy="531.99" r="11.12"/><circle class="cls-11" cx="952.2" cy="531.99" r="6.93"/><circle class="cls-12" cx="952.2" cy="531.99" r="4.78"/><rect class="cls-7" x="319.53" y="192.78" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(327.11 205.7)">IFLT</text><rect class="cls-7" x="552.86" y="0.5" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(563.99 13.42)">ST 1</text><rect class="cls-7" x="552.86" y="24.28" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(563.1 37.2)">ST 2</text><rect class="cls-7" x="703.76" y="47.54" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(714.01 60.47)">ST 3</text><rect class="cls-7" x="704.79" y="70.8" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(715.04 83.73)">ST 4</text><rect class="cls-7" x="552.86" y="94.02" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(563.1 106.94)">ST 5</text><rect class="cls-7" x="552.86" y="118.68" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(563.1 131.6)">ST 6</text><rect class="cls-7" x="768.5" y="149.11" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(778.74 162.03)">CT 1</text><rect class="cls-7" x="768.5" y="178.52" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(778.74 191.44)">CT 2</text><rect class="cls-7" x="592.1" y="223.4" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(602.35 236.32)">WLT</text><rect class="cls-7" x="592.1" y="269.84" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(604.13 282.76)">ERT</text><rect class="cls-7" x="592.1" y="307.55" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(600.38 320.48)">TDT 1</text><rect class="cls-7" x="592.1" y="333.96" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(600.38 346.88)">TDT 2</text><rect class="cls-7" x="670.49" y="365.15" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(678.77 378.07)">INT 1</text><rect class="cls-7" x="670.49" y="398.26" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(678.77 411.18)">INT 2</text><rect class="cls-7" x="613.49" y="433.52" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(625.34 446.44)">SLT</text><rect class="cls-7" x="671.38" y="471.62" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(681.44 484.54)">WT 1</text><rect class="cls-7" x="670.49" y="519.98" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(680.55 532.9)">WT 2</text><rect class="cls-7" x="670.49" y="564.67" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(680.55 577.59)">WT 3</text><text class="cls-8" transform="translate(94.78 354.21)">INFRASTRUCTURE TRACK</text><text class="cls-8" transform="translate(94.78 381.71)">INFRASTRUCTURE &amp; FACILITY TRACK</text><rect class="cls-13" x="35.74" y="341.83" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(47.77 354.75)">IFT</text><rect class="cls-13" x="35.74" y="368.57" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(45.99 381.49)">IFLT</text><text class="cls-8" transform="translate(94.78 406.66)">LEAD TRACK</text><rect class="cls-13" x="35.74" y="393.52" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(50.44 406.44)">LT</text><text class="cls-8" transform="translate(94.78 431.82)">WORKSHOP TRACK</text><rect class="cls-13" x="35.74" y="418.67" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(48.66 431.59)">WT</text><text class="cls-8" transform="translate(94.78 456.99)">INSPECTION TRACK</text><rect class="cls-13" x="35.74" y="443.85" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(46.88 456.77)">INT</text><text class="cls-8" transform="translate(94.78 481.72)">TRAIN DISCONNECTING TRACK</text><rect class="cls-13" x="35.74" y="468.58" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(47.77 481.5)">TDT</text><text class="cls-8" transform="translate(94.78 505.56)">SHUNTING LOCOMOTIVE TRACK</text><rect class="cls-13" x="35.74" y="492.41" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(47.77 505.34)">SLT</text><text class="cls-8" transform="translate(94.78 528.74)">EMERGENCY REPAIR TRACK</text><rect class="cls-13" x="35.74" y="515.6" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(47.77 528.52)">ERT</text><text class="cls-8" transform="translate(94.78 551.47)">WHEEL LATHE TRACK</text><rect class="cls-13" x="35.74" y="538.33" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(47.77 551.25)">WLT</text><text class="cls-8" transform="translate(94.48 574.19)">CLEANING TRACK</text><rect class="cls-13" x="35.44" y="561.05" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(50.15 573.97)">CT</text><text class="cls-8" transform="translate(94.48 597.17)">STABLING</text><rect class="cls-13" x="35.44" y="584.03" width="42.78" height="17.38" rx="8.69" ry="8.69"/><text class="cls-8" transform="translate(50.15 596.95)">ST</text><text class="cls-14" transform="translate(35.44 320.48)">LEGEND LINE DEPO:</text><text class="cls-8" transform="translate(219.33 13.76)">TO DAL</text><polyline class="cls-15" points="268.24 2.28 164.87 2.28 191.6 13.76"/><rect class="cls-16" x="728.08" y="225.95" width="9.8" height="376.34"/><rect class="cls-16" x="768.37" y="225.22" width="9.8" height="376.34"/><rect class="cls-16" x="813.52" y="225.22" width="9.8" height="376.34"/><rect class="cls-16" x="857.77" y="225.22" width="9.8" height="376.34"/><rect class="cls-16" x="901.86" y="225.22" width="9.8" height="376.34"/><rect class="cls-16" x="947.3" y="226.05" width="9.8" height="376.34"/><rect class="cls-17" x="772.95" y="339.92" width="139.29" height="22.83" rx="9.03" ry="9.03"/><text class="cls-18" transform="translate(782.9 356.9)">WORKSHOP AREA</text></svg>
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
