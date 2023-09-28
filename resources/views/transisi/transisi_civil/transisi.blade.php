<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,intial-scale=1.0">
    <meta charset="utf-8">
    <title>Dashboard Switch | CPWTM</title>
    {{-- <link rel="shortcut icon" href="{{ asset('assets/images/mm.png') }}" /> --}}
    <link rel="shortcut icon" href="{{ asset('assets/images/exods.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/transisiflex/style2.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <div class="container">

        <div class="main">
            <h1 class=" animate__animated animate__fadeInDown">Dashboard Switch
                <div class="roller">
                    <span id="rolltext">Exodus<br>
                        Data Distribution System<br>
                </div>
        </div>

        <div class="bg">
            <ul class="glass">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>

        <div class="card animate__animated animate__fadeInDown">
            <a href="{{ route('dashboard-activity-civil.index') }}">
                <div class="imgBx">
                    <img src="{{ asset('assets/transisiflex/img/mainline.png') }}">
                </div>
                <div class="content">
                    <h2>Activity</h2>
                    <p>Dashboard Activity</p>
                </div>
            </a>
        </div>

        {{-- <div class="card animate__animated animate__fadeInDown">
            <a href="{{ route('jadwal.pekerjaan.index') }}">
                <div class="imgBx">
                    <img src="{{ asset('assets/transisiflex/img/schedule.jpg') }}">
                </div>
                <div class="content">
                    <h2>Jadwal Pekerjaan</h2>
                    <p>Detail Time Schedule</p>
                </div>
            </a>
        </div> --}}

        <div class="card animate__animated animate__fadeInDown" hidden>
            <a href="{{ route('dashboard-masterdata-civil.index') }}">
                <div class="imgBx">
                    <img src="{{ asset('assets/transisiflex/img/masterdata.png') }}">
                </div>
                <div class="content">
                    <h2>Master Data</h2>
                    <p>Assets Civil Structure</p>
                </div>
            </a>
        </div>
    </div>

</body>

</html>
