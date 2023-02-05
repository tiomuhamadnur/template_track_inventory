<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('sub-title')
    <link rel="stylesheet" href="{{ asset('assetsdepo/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsdepo/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsdepo/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsdepo/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsdepo/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsdepo/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsdepo/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}}">
    <link rel="stylesheet" href="{{ asset('assetsdepo/js/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsdepo/css/vertical-layout-light/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assetsdepo/images/mm.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <div class="container-scroller">

        @include('depo.depo_layout.header')

        <div class="container-fluid page-body-wrapper">

            @include('depo.depo_layout.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">

                    @yield('sub-content')

                </div>

                @include('depo.depo_layout.footer')

            </div>
        </div>
    </div>


    <script src="{{ asset('assetsdepo/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assetsdepo/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assetsdepo/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assetsdepo/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('assetsdepo/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assetsdepo/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assetsdepo/js/template.js') }}"></script>
    <script src="{{ asset('assetsdepo/js/settings.js') }}"></script>
    <script src="{{ asset('assetsdepo/js/todolist.js') }}"></script>
    <script src="{{ asset('assetsdepo/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assetsdepo/js/dashboard.js') }}"></script>
    <script src="{{ asset('assetsdepo/js/Chart.roundedBarCharts.js') }}"></script>
    <script src="{{ asset('assetsdepo/js/select2.js') }}"></script>
    @yield('javascript')
</body>

</html>
