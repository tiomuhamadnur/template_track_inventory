{{-- ROW 1 --}}
<div class="row">
    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card card-rounded shadow">
            <div class="card-body">
                <div class="row">
                    <h4 class="text-center fw-bolder" style="padding-bottom: 10px;">Stasiun</h4>
                    <div class="col-sm-12 text-center">
                        <div>
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $stasiun }}
                                    <br>
                                    <p>stasiun</p>
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card card-rounded shadow">
            <div class="card-body">
                <div class="row">
                    <h4 class="text-center fw-bolder" style="padding-bottom: 10px;">Data Line</h4>
                    <div class="col-sm-12 text-center">
                        <div class="btn-group">
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $line_mainline }}
                                    <br>
                                    <p>Mainline</p>
                                </h3>
                            </a>
                            <div class="mx-5"></div>
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $line_depo }}
                                    <br>
                                    <p>Depo</p>
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card card-rounded shadow">
            <div class="card-body">
                <div class="row">
                    <h4 class="text-center fw-bolder" style="padding-bottom: 10px;">Track Bed</h4>
                    <div class="col-sm-12 text-center">
                        <div>
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $trackbed }}
                                    <br>
                                    <p>Mainline</p>
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card card-rounded shadow">
            <div class="card-body">
                <div class="row">
                    <h4 class="text-center fw-bolder" style="padding-bottom: 10px;">Sleeper</h4>
                    <div class="col-sm-12 text-center">
                        <div>
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $sleeper_mainline }}
                                    <br>
                                    <p>Mainline</p>
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card card-rounded shadow">
            <div class="card-body">
                <div class="row">
                    <h4 class="text-center fw-bolder" style="padding-bottom: 10px;">Turnouts</h4>
                    <div class="col-sm-12 text-center">
                        <div class="btn-group">
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $turnout_mainline }}
                                    <br>
                                    <p>Mainline</p>
                                </h3>
                            </a>
                            <div class="mx-5"></div>
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $turnout_depo }}
                                    <br>
                                    <p>Depo</p>
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card card-rounded shadow">
            <div class="card-body">
                <div class="row">
                    <h4 class="text-center fw-bolder" style="padding-bottom: 10px;">Scissors Crossing</h4>
                    <div class="col-sm-12 text-center">
                        <div class="btn-group">
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $sc_mainline }}
                                    <br>
                                    <p>Mainline</p>
                                </h3>
                            </a>
                            <div class="mx-5"></div>
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $sc_depo }}
                                    <br>
                                    <p>Depo</p>
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card card-rounded shadow">
            <div class="card-body">
                <div class="row">
                    <h4 class="text-center fw-bolder" style="padding-bottom: 10px;">Buffer/Wheel Stop</h4>
                    <div class="col-sm-12 text-center">
                        <div class="btn-group">
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $buffer }}
                                    <br>
                                    <p>Buffer Stop</p>
                                </h3>
                            </a>
                            <div class="mx-5"></div>
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $wheel }}
                                    <br>
                                    <p>Wheel Stop</p>
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card card-rounded shadow">
            <div class="card-body">
                <div class="row">
                    <h4 class="text-center fw-bolder" style="padding-bottom: 10px;">Lengkung Mainline</h4>
                    <div class="col-sm-12 text-center">
                        <div class="btn-group">
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $lengkung_kurang }}
                                    <br>
                                    <p>R <= 600m</p>
                                </h3>
                            </a>
                            <div class="mx-5"></div>
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $lengkung_lebih }}
                                    <br>
                                    <p>R > 600m</p>
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card card-rounded shadow">
            <div class="card-body">
                <div class="row">
                    <h4 class="text-center fw-bolder" style="padding-bottom: 10px;">Lengkung Depo</h4>
                    <div class="col-sm-12 text-center">
                        <div class="btn-group">
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $lengkung_kurang_depo }}
                                    <br>
                                    <p>R <= 600m</p>
                                </h3>
                            </a>
                            <div class="mx-5"></div>
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $lengkung_lebih_depo }}
                                    <br>
                                    <p>R > 600m</p>
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card card-rounded shadow">
            <div class="card-body">
                <div class="row">
                    <h4 class="text-center fw-bolder" style="padding-bottom: 10px;">Welding Joint</h4>
                    <div class="col-sm-12 text-center">
                        <div class="btn-group">
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $w_mainline }}
                                    <br>
                                    <p>Mainline</p>
                                </h3>
                            </a>
                            <div class="mx-5"></div>
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $w_depo }}
                                    <br>
                                    <p>Depo</p>
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card card-rounded shadow">
            <div class="card-body">
                <div class="row">
                    <h4 class="text-center fw-bolder" style="padding-bottom: 10px;">Normal Joint (NJ)</h4>
                    <div class="col-sm-12 text-center">
                        <div class="btn-group">
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $nj_mainline }}
                                    <br>
                                    <p>Mainline</p>
                                </h3>
                            </a>
                            <div class="mx-5"></div>
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $nj_depo }}
                                    <br>
                                    <p>Depo</p>
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card card-rounded shadow">
            <div class="card-body">
                <div class="row">
                    <h4 class="text-center fw-bolder" style="padding-bottom: 10px;">Insulated Rail Joint (IRJ)</h4>
                    <div class="col-sm-12 text-center">
                        <div class="btn-group">
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $irj_mainline }}
                                    <br>
                                    <p>Mainline</p>
                                </h3>
                            </a>
                            <div class="mx-5"></div>
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $irj_depo }}
                                    <br>
                                    <p>Depo</p>
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card card-rounded shadow">
            <div class="card-body">
                <div class="row">
                    <h4 class="text-center fw-bolder" style="padding-bottom: 10px;">Glued Rail Joint (GIJ)</h4>
                    <div class="col-sm-12 text-center">
                        <div class="btn-group">
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $gij_mainline }}
                                    <br>
                                    <p>Mainline</p>
                                </h3>
                            </a>
                            <div class="mx-5"></div>
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $gij_depo }}
                                    <br>
                                    <p>Depo</p>
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card card-rounded shadow">
            <div class="card-body">
                <div class="row">
                    <h4 class="text-center fw-bolder" style="padding-bottom: 10px;">Expansion Joint (EJ)</h4>
                    <div class="col-sm-12 text-center">
                        <div>
                            <a href="#" title="">
                                <h3 class="mb-0 fw-bold text-success">
                                    {{ $ej }}
                                    <br>
                                    <p>Mainline</p>
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

{{-- END ROW 4 --}}
