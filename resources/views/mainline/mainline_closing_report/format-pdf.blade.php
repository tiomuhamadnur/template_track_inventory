<!DOCTYPE html>

<head>
    <title>Closing Report Activity</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/mm.png') }}" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .text-report {
            font-size: 12px;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    {{-- PAGE 1 --}}
    <table border="1" style="width: 100%" class="mb-3">
        <thead>
            <th class="text-center">
                <img style="height: 70px" src="{{ public_path('assets/images/tcsm.png') }}" alt="logo-tcsm">
            </th>
            <th class="text-center">
                <h3 class="fw-bolder mx-auto mb-0">DAILY REPORT</h3>
            </th>
            <th class="text-center">
                <img style="height: 70px" src="{{ public_path('assets/images/logo_mrtj.png') }}" alt="logo-mrt">
            </th>
        </thead>
    </table>

    <table border="1" class="text-center mb-3" style="width: 100%">
        <thead>
            <th class="text-center p-2" style="background-color: rgb(0, 0, 87)">
                <h6 class="fw-bolder mx-auto mb-0 text-white">REPORT OF CLOSING ACTIVITY</h6>
            </th>
        </thead>
    </table>

    <table border="1" class="text-left mb-5" style="width: 100%">
        <thead>
            <tr>
                <th class="align-middle" colspan="3">
                    <p class="text-report mb-0 p-1 fw-bolder">Telah dilaksanakan {{ $closing_report->kegiatan ?? '?' }}
                        dengan rincian pekerjaan
                        dibawah ini:
                    </p>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="p-1" style="width: 20%">
                    <p class="text-report mb-0">Work Title</p>
                </td>
                <td class="p-1" style="width: 4%">
                    <p class="text-report text-center mb-0">:</p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">{{ $closing_report->kegiatan ?? '?' }}</p>
                </td>
            </tr>
            <tr>
                <td class="p-1">
                    <p class="text-report mb-0">No. Work Order</p>
                </td>
                <td class="p-1">
                    <p class="text-report text-center mb-0">:</p>
                </td>
                <td class="p-1">

                </td>
            </tr>
            <tr>
                <td class="p-1">
                    <p class="text-report mb-0">Date of Closing Activity</p>
                </td>
                <td class="p-1">
                    <p class="text-report text-center mb-0">:</p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">{{ $tanggal ?? '?' }}</p>
                </td>
            </tr>
            <tr>
                <td class="p-1">
                    <p class="text-report mb-0">Location</p>
                </td>
                <td class="p-1">
                    <p class="text-report text-center mb-0">:</p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">{{ $closing_report->lokasi ?? '?' }}</p>
                </td>
            </tr>
            <tr>
                <td class="p-1">
                    <p class="text-report mb-0">Working Time</p>
                </td>
                <td class="p-1">
                    <p class="text-report text-center mb-0">:</p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">{{ $closing_report->waktu_mulai ?? '?' }} - selesai</p>
                </td>
            </tr>
            <tr>
                <td class="p-1 align-top">
                    <p class="text-report mb-0">Personel</p>
                </td>
                <td class="p-1">
                    <p class="text-report text-center mb-0">:</p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        <b>Section Head of Permanent Way:</b> <br>
                        1. {{ $closing_report->section_head ?? '?' }} <br> <br>

                        <b>Staff of Permanent Way:</b> <br>
                        1. {{ $closing_report->personel_1 ?? '?' }} <br>
                        2. {{ $closing_report->personel_2 ?? '?' }} <br>
                        3. {{ $closing_report->personel_3 ?? '' }} <br>
                        4. {{ $closing_report->personel_4 ?? '' }} <br> <br> <br>
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 align-top">
                    <p class="text-report mb-0">Temuan</p>
                </td>
                <td class="p-1">
                    <p class="text-report text-center mb-0">:</p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">{{ $closing_report->status_lampiran ?? '?' }}</p>
                </td>
            </tr>
        </tbody>
    </table>

    <table border="0" class="text-center" style="width: 100%; padding-top: 25px;">
        <thead>
            <tr>
                <td class="p-1" style="width: 30%">
                    <img style="height: 80px" src="{{ public_path('storage/' . auth()->user()->ttd) }}"
                        alt="ttd-staff">
                </td>
                <td class="p-1"></td>
                <td class="p-1" style="width: 30%">
                    <img style="height: 80px" src="{{ public_path('storage/' . $ttd_sh) }}" alt="ttd-sh">
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="p-1" style="border-bottom: 1px solid black;">
                    <p class="text-report mb-0 fw-bolder">
                        <b>{{ auth()->user()->name }}</b>
                    </p>
                </td>
                <td class="p-1"></td>
                <td class="p-1" style="border-bottom: 1px solid black;">
                    <p class="text-report mb-0 fw-bolder">
                        <b>{{ $closing_report->section_head ?? '?' }}</b>
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1">
                    <p class="text-report mb-0 fw-bolder">{{ auth()->user()->jabatan }} Permanent Way RAMS</p>
                </td>
                <td class="p-1"></td>
                <td class="p-1">
                    <p class="text-report mb-0 fw-bolder">Section Head Permanent Way RAMS</p>
                </td>
            </tr>
        </tbody>
    </table>

    {{-- PAGE 2 --}}
    <div class="page-break"></div>

    <table border="1" style="width: 100%" class="mb-3">
        <thead>
            <th class="text-center">
                <img style="height: 70px" src="{{ public_path('assets/images/tcsm.png') }}" alt="logo-tcsm">
            </th>
            <th class="text-center">
                <h3 class="fw-bolder mx-auto mb-0">DAILY REPORT</h3>
            </th>
            <th class="text-center">
                <img style="height: 70px" src="{{ public_path('assets/images/logo_mrtj.png') }}" alt="logo-mrt">
            </th>
        </thead>
    </table>

    <table border="1" class="text-center mb-3" style="width: 100%">
        <thead>
            <th class="text-center p-2" style="background-color: rgb(0, 0, 87)">
                <h6 class="fw-bolder mx-auto mb-0 text-white">CHECKLIST THE QUANTITY OF EQUIPMENTS AND TOOLS</h6>
            </th>
        </thead>
    </table>

    <table border="0" class="text-left mb-3" style="width: 100%">
        <thead>
            <tr>
                <th class="p-1" style="width: 20%;">
                    <p class="text-report mb-0"><b>Purpose of Using</b></p>
                </th>
                <th class="p-1 text-center" style="width: 4%;">
                    <p class="text-report mb-0">:</p>
                </th>
                <th class="p-1">
                    <p class="text-report mb-0"><b>{{ $closing_report->kegiatan ?? '?' }}</b></p>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="p-1">
                    <p class="text-report mb-0 fw-bolder"><b>Date</b></p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">:</p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0"><b>{{ $tanggal ?? '?' }}</b></p>
                </td>
            </tr>
        </tbody>
    </table>

    <table border="1" class="text-left mb-5" style="width: 100%">
        <thead>
            <tr>
                <th class="p-1 text-center" style="width: 4%;">
                    <p class="text-report mb-0 fw-bolder"><b>No.</b></p>
                </th>
                <th class="p-1 text-center" style="width: 30%;">
                    <p class="text-report mb-0 fw-bolder"><b>Equipment Name</b></p>
                </th>
                <th class="p-1 text-center" style="width: 10%;">
                    <p class="text-report mb-0 fw-bolder"><b>Quantity</b></p>
                </th>
                <th class="p-1 text-center" style="width: 20%;">
                    <p class="text-report mb-0 fw-bolder"><b>Initial <br> Checking</b></p>
                </th>
                <th class="p-1 text-center" style="width: 20%;">
                    <p class="text-report mb-0 fw-bolder"><b>Ending <br> Checking</b></p>
                </th>
                <th class="p-1 text-center">
                    <p class="text-report mb-0 fw-bolder"><b>Remarks</b></p>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        1.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Track Gauge
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        2.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        String
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        3.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Tapper Gauge
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        4.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Thickness Gauge
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        5.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Penggaris 15 cm
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        1
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                        V
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                        V
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        6.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Flag
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        7.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Roll Meter
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        8.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Chalk/Pen/Marker
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        4
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                        V
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                        V
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        9.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Flashlight
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        4
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                        V
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                        V
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        10.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Penggaris Siku
                    </p>
                </td>
                <td class="p-1 text-center">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        11.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Whistle
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        12.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Camera
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        13.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Crack Scale
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        4
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                        V
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                        V
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        14.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Track Master
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        15.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Gloves
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        4
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                        V
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                        V
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        16.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Rachet
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        17.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Hammer
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        18.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Torque Momen
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        19.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Thermometer
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        20.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Mistar Besi
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        21.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Wrench
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        22.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Rail Profile Gauge (Riftek)
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        23.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Amplas
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        24.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        WD
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        25.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Palu Karet
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        26.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Antirust Terami
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        27.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Accelerometer
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        28.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Form Pemeriksaan
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        2
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                        V
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                        V
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        29.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Sound Level Meter
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        30.
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        Tablet/Smartphone
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        2
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Initial Checking --}}
                        V
                    </p>
                </td>
                <td class="p-1 text-center">
                    <p class="text-report mb-0">
                        {{-- Ending Checking --}}
                        V
                    </p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">
                        {{-- Remarks --}}
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="page-break"></div>

    <table border="1" style="width: 100%" class="mb-3">
        <thead>
            <th class="text-center">
                <img style="height: 70px" src="{{ public_path('assets/images/tcsm.png') }}" alt="logo-tcsm">
            </th>
            <th class="text-center">
                <h3 class="fw-bolder mx-auto mb-0">DAILY REPORT</h3>
            </th>
            <th class="text-center">
                <img style="height: 70px" src="{{ public_path('assets/images/logo_mrtj.png') }}" alt="logo-mrt">
            </th>
        </thead>
    </table>

    <table border="1" class="text-center mb-3" style="width: 100%">
        <thead>
            <th class="text-center p-2" style="background-color: rgb(0, 0, 87)">
                <h6 class="fw-bolder mx-auto mb-0 text-white text-uppercase" style="text-transform: capitalize;">
                    DOKUMENTASI KEGIATAN
                    {{ $closing_report->kegiatan ?? '?' }}</h6>
            </th>
        </thead>
    </table>

    <table border="1" style="width: 100%" class="mb-3">
        <tbody>
            <tr>
                <th class="p-1" style="width: 4%">
                    <p class="text-report text-center mb-0">1</p>
                </th>
                <th class="p-1">
                    <p class="text-report mb-0">Dokumentasi saat kegiatan</p>
                </th>
                <th class="p-1" style="width: 4%">
                    <p class="text-report text-center mb-0">2</p>
                </th>
                <th class="p-1">
                    <p class="text-report mb-0">Dokumentasi saat kegiatan</p>
                </th>
            </tr>
            <tr>
                <td rowspan="2"></td>
                <td class="text-center p-1">
                    <img style="width: 6cm" src="{{ public_path('storage/' . $closing_report->photo_1) }}"
                        alt="foto-kegiatan-1">
                </td>
                <td rowspan="2"></td>
                <td class="text-center p-1">
                    <img style="width: 6cm" src="{{ public_path('storage/' . $closing_report->photo_2) }}"
                        alt="foto-kegiatan-2">
                </td>
            </tr>
            <tr>
                <td class="p-1">
                    <p class="text-report text-right mb-0">{{ $tanggal ?? '?' }}</p>
                </td>
                <td class="p-1">
                    <p class="text-report text-right mb-0">{{ $tanggal ?? '?' }}</p>
                </td>
            </tr>
            <tr>
                <td class="p-1">
                    <p class="text-report text-center mb-0">3</p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">Dokumentasi saat kegiatan</p>
                </td>
                <td class="p-1">
                    <p class="text-report text-center mb-0">4</p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">Dokumentasi saat kegiatan</p>
                </td>
            </tr>
            <tr>
                <td rowspan="2"></td>
                <td class="text-center p-1">
                    <img style="width: 6cm" src="{{ public_path('storage/' . $closing_report->photo_3) }}"
                        alt="foto-kegiatan-3">
                </td>
                <td rowspan="2"></td>
                <td class="text-center p-1">
                    <img style="width: 6cm" src="{{ public_path('storage/' . $closing_report->photo_4) }}"
                        alt="foto-kegiatan-4">
                </td>
            </tr>
            <tr>
                <td class="p-1">
                    <p class="text-report text-right mb-0">{{ $tanggal ?? '?' }}</p>
                </td>
                <td class="p-1">
                    <p class="text-report text-right mb-0">{{ $tanggal ?? '?' }}</p>
                </td>
            </tr>
            <tr>
                <td class="p-1">
                    <p class="text-report text-center mb-0">5</p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">Dokumentasi saat kegiatan</p>
                </td>
                <td class="p-1">
                    <p class="text-report text-center mb-0">6</p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">Dokumentasi saat kegiatan</p>
                </td>
            </tr>
            <tr>
                <td rowspan="2"></td>
                <td class="text-center p-1">
                    <img style="width: 6cm" src="{{ public_path('storage/' . $closing_report->photo_5) }}"
                        alt="foto-kegiatan-5">
                </td>
                <td rowspan="2"></td>
                <td class="text-center p-1">
                    <img style="width: 6cm" src="{{ public_path('storage/' . $closing_report->photo_6) }}"
                        alt="foto-kegiatan-6">
                </td>
            </tr>
            <tr>
                <td class="p-1">
                    <p class="text-report text-right mb-0">{{ $tanggal ?? '?' }}</p>
                </td>
                <td class="p-1">
                    <p class="text-report text-right mb-0">{{ $tanggal ?? '?' }}</p>
                </td>
            </tr>
        </tbody>
    </table>

    <div @if ($closing_report->status_lampiran == 'Nihil') hidden @endif>
        <div @if ($closing_report->lampiran_1 == null) hidden @endif>
            <div class="page-break"></div>
            <table border="1" style="width: 100%" class="mb-3">
                <thead>
                    <th class="text-center">
                        <img style="height: 70px" src="{{ public_path('assets/images/tcsm.png') }}" alt="logo-tcsm">
                    </th>
                    <th class="text-center">
                        <h3 class="fw-bolder mx-auto mb-0">DAILY REPORT</h3>
                    </th>
                    <th class="text-center">
                        <img style="height: 70px" src="{{ public_path('assets/images/logo_mrtj.png') }}"
                            alt="logo-mrt">
                    </th>
                </thead>
            </table>

            <table border="1" class="text-center mb-3" style="width: 100%">
                <thead>
                    <th class="text-center p-2" style="background-color: rgb(0, 0, 87)">
                        <h6 class="fw-bolder mx-auto mb-0 text-white">LAMPIRAN</h6>
                    </th>
                </thead>
            </table>

            <table border="1" class="text-center mb-3" style="width: 100%;">
                <thead>
                    <tr>
                        <td class="text-center p-2">
                            <img style="width: 80%" src="{{ public_path('storage/' . $closing_report->lampiran_1) }}"
                                alt="lampiran-1">
                        </td>
                    </tr>
                </thead>
            </table>
        </div>

        <div @if ($closing_report->lampiran_2 == null) hidden @endif>
            <div class="page-break"></div>

            <table border="1" style="width: 100%" class="mb-3">
                <thead>
                    <th class="text-center">
                        <img style="height: 70px" src="{{ public_path('assets/images/tcsm.png') }}" alt="logo-tcsm">
                    </th>
                    <th class="text-center">
                        <h3 class="fw-bolder mx-auto mb-0">DAILY REPORT</h3>
                    </th>
                    <th class="text-center">
                        <img style="height: 70px" src="{{ public_path('assets/images/logo_mrtj.png') }}"
                            alt="logo-mrt">
                    </th>
                </thead>
            </table>

            <table border="1" class="text-center mb-3" style="width: 100%">
                <thead>
                    <th class="text-center p-2" style="background-color: rgb(0, 0, 87)">
                        <h6 class="fw-bolder mx-auto mb-0 text-white">LAMPIRAN</h6>
                    </th>
                </thead>
            </table>

            <table border="1" class="text-center mb-3" style="width: 100%;">
                <thead>
                    <tr>
                        <td class="text-center p-2">
                            <img style="width: 80%" src="{{ public_path('storage/' . $closing_report->lampiran_2) }}"
                                alt="lampiran-2">
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</body>

</html>
