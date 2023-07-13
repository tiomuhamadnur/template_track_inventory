<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="refresh" content="10800">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('assets/show_page/assets/images/exodus-header.png') }}" rel="shortcut icon">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Schedule Permanent Way | EXODUS</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/show_page/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/show_page/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/show_page/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/show_page/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/show_page/assets/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

</head>

<body>

    <!-- MULAI PRELOADER -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- AKHIR PRELOADER -->

    <!-- MULAI HEADER AREA -->
    <header class="header-area header-sticky">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="{{ route('transisi') }}" class="logo">
                            <img src="{{ asset('assets/show_page/assets/images/exods2.png') }}" alt="">
                        </a>
                        <ul class="nav">
                            <li><a href="#">Go To Exodus<img
                                        src="{{ asset('assets/show_page/assets/images/exodus-header.png') }}"
                                        alt=""></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- AKHIR HEADER AREA -->

    <!-- AWAL CONTAINER KONTEN -->
    <div class="container-fluid mt--3">
        <div class="row">
            <div class="col-lg-9" style="margin: 0 auto;">
                <div class="page-content">
                    <div class="row">
                        <!-- AWAL PERSON ON DUTY -->
                        <div class="col-lg-6">
                            <div class="person-on-duty header-text">
                                <div class="heading-section">
                                    <h5><em>Today's</em> Personel on Duty</h5>
                                </div>

                                @if ($man_power->count() > 0)
                                    <div class="owl-features owl-carousel">
                                        @foreach ($man_power as $item)
                                            <div class="item">
                                                <div class="thumb">
                                                    <img src="{{ asset('storage/' . $item->user->photo ?? '') }}">
                                                    <div class="hover-effect">
                                                        <h6>{{ $item->user->jabatan }}</h6>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="text-wrap d-flex">
                                                        <h4>{{ $item->user->name }}</h4>
                                                    </div>
                                                    <span class="text-wrap">
                                                        {{ $item->user->section }}
                                                    </span>
                                                    <button
                                                        class="btn @if ($item->shift == 1) btn-success
                                                                @elseif($item->shift == 2)
                                                                btn-warning
                                                                @elseif($item->shift == 3)
                                                                btn-danger
                                                                @else
                                                                btn-light @endif">
                                                        Shift:{{ $item->shift }}
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-wrap">
                                        <h4 class="text-warning">Jadwal man power belum diatur, silahkan hubungi PIC
                                            terkait!
                                        </h4>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- AKHIR PERSON ON DUTY -->

                        <!-- AWAL DAILY ACTIVITY -->
                        <div class="col-lg-6">
                            <div class="daily-activity" style="padding-bottom: 50px;margin-bottom: auto;">
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <div class="heading-section">
                                            <h5><em>Today's</em> Daily Activity</h5>
                                        </div>
                                    </div>
                                    @if ($pekerjaan->count() > 0)
                                        @foreach ($pekerjaan as $item)
                                            <div class="col-lg-6">
                                                <div class="item">
                                                    <img src="{{ asset('storage/' . $item->job->logo ?? '') }}"
                                                        alt="logo" class="templatemo-item">
                                                    <div>
                                                        <div class="text-wrap d-flex">
                                                            <h4>{{ $item->section }} - {{ $item->job->name }}</h4>
                                                        </div>
                                                        <span>
                                                            {{ $item->location }}
                                                            <button
                                                                class="btn @if ($item->shift == 1) btn-success
                                                        @elseif($item->shift == 2)
                                                        btn-warning
                                                        @elseif($item->shift == 3)
                                                        btn-danger
                                                        @else
                                                        btn-light @endif">
                                                                Shift:{{ $item->shift }}
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="text-wrap">
                                            <h4 class="text-warning">Jadwal pekerjaan belum diatur, silahkan hubungi PIC
                                                terkait!
                                            </h4>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- AKHIR DAILY ACTIVITY -->

                        <!-- AWAL GNERAL INFO -->
                        <div class="col-lg-6" style="margin-top: 21px;">
                            <div class="content">
                                <div class="general-info">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="heading-section">
                                                <h5><em>General</em> Information </h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div id="clockdate">
                                                <div class="clockdate-wrapper">
                                                    <div id="clock"></div>
                                                    <div id="date"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6" style="display: flex; justify-content: space-between;">
                                            @foreach ($section_head as $item)
                                                <div class="row">
                                                    <div class="col-lg-11 text-center">
                                                        <div class="thumb">
                                                            <img src="{{ asset('storage/' . $item->photo ?? '') }}"
                                                                alt="foto_sh" style="border-radius: 10px;">
                                                        </div>
                                                        <a href="#" class="text-light fw-bolder"
                                                            style="font-size: 12px">
                                                            {{ $item->name }}
                                                        </a> <br class="mb-0 mt-0">
                                                        <p style="font-size: 12px">
                                                            {{ $item->jabatan }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- AKHIR NOTES & NOTIF -->

                        <!-- AWAL NOTES NOTIF -->
                        <div class="col-6">
                            <div class="content">
                                <div class="notes-notif">
                                    <div class="row" style="margin-bottom: 15px;">
                                        <div class="col-lg-12">
                                            <div class="heading-section">
                                                <h4><em>Notes</em> & Announcements </h4>
                                            </div>
                                            <div class="row" style="display: flex; justify-content:space-around;">
                                                <div class="col-12">
                                                    <div class="row" style="justify-content: space-around;">
                                                        <a href="#" class="intro-banner-vdo-play-btn pinkBg"
                                                            target="_blank">
                                                            <i class="glyphicon glyphicon-play whiteText"
                                                                aria-hidden="true"></i>
                                                            <span class="ripple pinkBg"></span>
                                                            <span class="ripple pinkBg"></span>
                                                            <span class="ripple pinkBg"></span>
                                                        </a>
                                                    </div>
                                                    @foreach ($announcement as $item)
                                                        <h5 class="notify">● {{ $item->content }}
                                                        </h5>
                                                    @endforeach
                                                    {{-- <h5 class="notify">● Personel Shift 1 & 2 agar selalu
                                                        mengikuti <i><em>Role Call Meeting</em></i> Pagi & Petang.
                                                    </h5>
                                                    <h5 class="notify">● Personel Shift 2 agar selalu mengecek jadwal
                                                        kegiatan malam dan <em>mempersiapkan kebutuhan
                                                            <i>tools/material</i> sesuai kebutuhan pekerjaan.</em>
                                                    </h5>
                                                    <h5 class="notify">● <em>LPP dan Perizinan</em> harap dicek
                                                        kembali sesuai pekerjaan (Revisi terbaru).
                                                    </h5> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- AKHIR GENERAL INFO -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- AKHIR CONTAINER CONTENT -->

    <!-- AWAL FOOTER -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Proudly Developed by <a href="https://tideupindustries.com"
                            target="_blank" class=" fw-bolder text-success">Tide Up Industries.</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- AKHIR FOOTER -->

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('assets/show_page/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/show_page/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/show_page/assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/show_page/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/show_page/assets/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/show_page/assets/js/popup.js') }}"></script>
    <script src="{{ asset('assets/show_page/assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/show_page/assets/js/watch.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



</body>

</html>
