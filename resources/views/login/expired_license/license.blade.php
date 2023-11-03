<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Oops! License Expired</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/exods.png') }}" />
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/css/style.css') }}">

</head>

<body>

    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <div></div>
                <h1>Oops</h1>
            </div>
            <h2>license expired</h2>
            <p style="margin-bottom: 0cm">Your license app is expired since <span
                    style="color: red">{{ $expired_date ?? '-' }}</span></p>
            <p style="margin-top: 0cm">Please pay the subscription to extend your license app.</p>
            <a href="{{ route('login.index') }}">login page</a>
        </div>
    </div>

</body>

</html>
