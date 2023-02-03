<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Dashboard | TCSM</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('assets/login/images/marti.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/vendor/animate/animate.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/css/main.css') }}">
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic">
                    <div class="marti">
                        <img src="{{ asset('assets/login/images/gg.png') }}"
                            style="margin-left: 19px; margin-bottom: -150px;">
                        <img src="{{ asset('assets/login/images/marti.png') }}" alt="IMG">
                        <img src="{{ asset('assets/login/images/bb.png') }}" style="margin-top: -80px;">
                        <style type="text/css">
                            .marti {
                                width: 400px;
                                height: 400px;
                                position: relative;
                                animation: animate 1s ease infinite alternate;
                                margin-top: 150px;
                                margin-left: -45px;
                            }

                            @keyframes animate {
                                0% {
                                    top: -190px;
                                }

                                100% {
                                    top: -210px;
                                }
                            }
                        </style>
                    </div>
                </div>
                <form action="{{ route('login.check') }}" method="POST" class="login100-form validate-form">
                    @csrf
                    @method('post')
                    <span class="login100-form-title">
                        Dashboard Login Page
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Masukkan Email"
                            value="tiomuhamadnur@gmail.com">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    @if (session('status'))
                        <div class="badge badge-danger p-2 mb-3" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Masukkan Password"
                            value="admin">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/login/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('assets/login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/login/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/login/js/main.js') }}"></script>

</body>

</html>
