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
            <a href="{{ route('depo.index') }}">
                <div class="imgBx">
                    <img src="{{ asset('assets/transisiflex/img/depo.png') }}">
                </div>
                <div class="content">
                    <h2>Depo</h2>
                    <p>Dashboard Depo
                    </p>
                </div>
            </a>
        </div>

        <div class="card animate__animated animate__fadeInDown">
            <a href="{{ route('home') }}">
                <div class="imgBx">
                    <img src="{{ asset('assets/transisiflex/img/mainline.png') }}">
                </div>
                <div class="content">
                    <h2>Mainline</h2>
                    <p>Dashboard Mainline</p>
                </div>
            </a>
        </div>

        <div class="card animate__animated animate__fadeInDown" hidden>
            <a href="{{ route('masterdata.index') }}">
                <div class="imgBx">
                    <img src="{{ asset('assets/transisiflex/img/masterdata.png') }}">
                </div>
                <div class="content">
                    <h2>Master Data</h2>
                    <p>Depo & Mainline</p>
                </div>
            </a>
        </div>
    </div>

</body>

</html>
