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

        .text-judul {
            font-size: 24px;
        }

        .text-sub-judul {
            font-size: 16px;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <table border="1" style="width: 100%" class="mb-3">
        <thead>
            <th class="text-center" style="width: 30%">
                <img style="height: 70px" src="{{ public_path('assets/images/tcsm.png') }}" alt="logo-tcsm">
            </th>
            <th class="text-center">
                <p class="text-judul fw-bolder mx-auto mb-0">DAILY REPORT</p>
            </th>
            <th class="text-center" style="width: 30%">
                <img style="height: 70px" src="{{ public_path('assets/images/logo_mrtj.png') }}" alt="logo-mrt">
            </th>
        </thead>
    </table>

    <table border="1" class="text-center mb-3" style="width: 100%">
        <thead>
            <th class="text-center p-1" style="background-color: rgb(0, 0, 87)">
                <p class="text-sub-judul fw-bolder mx-auto mb-0 text-white">REPORT OF CLOSING ACTIVITY</p>
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
                        <b>Section Head of {{ $section_head->section->name ?? '?' }}:</b> <br>
                        1. {{ $closing_report->section_head ?? '?' }} <br> <br>

                        <b>Staff of {{ $section_head->section->name ?? '?' }}:</b> <br>
                        1. {{ $closing_report->personel_1 ?? '?' }} <br>
                        2. {{ $closing_report->personel_2 ?? '' }} <br>
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
                    @if (auth()->user()->ttd != null)
                        <img style="height: 80px" src="{{ public_path('storage/' . auth()->user()->ttd) }}"
                            alt="ttd-staff">
                    @else
                        {{-- Do Nothing --}}
                    @endif
                </td>
                <td class="p-1"></td>
                <td class="p-1" style="width: 30%">
                    @if ($section_head->ttd != null)
                        <img style="height: 80px" src="{{ public_path('storage/' . $section_head->ttd) }}"
                            alt="ttd-sh">
                    @else
                        {{-- Do Nothing --}}
                    @endif
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
                        <b>{{ $section_head->name ?? '?' }}</b>
                    </p>
                </td>
            </tr>
            <tr>
                <td class="p-1">
                    <p class="text-report mb-0 fw-bolder">
                        {{ auth()->user()->jabatan . ' ' . auth()->user()->section->name }}
                    </p>
                </td>
                <td class="p-1"></td>
                <td class="p-1">
                    <p class="text-report mb-0 fw-bolder">
                        {{ $section_head->jabatan . ' ' . $section_head->section->name }}
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="page-break"></div>

    <table border="1" style="width: 100%" class="mb-3">
        <thead>
            <th class="text-center" style="width: 30%">
                <img style="height: 70px" src="{{ public_path('assets/images/tcsm.png') }}" alt="logo-tcsm">
            </th>
            <th class="text-center">
                <p class="text-judul fw-bolder mx-auto mb-0">DAILY REPORT</p>
            </th>
            <th class="text-center" style="width: 30%">
                <img style="height: 70px" src="{{ public_path('assets/images/logo_mrtj.png') }}" alt="logo-mrt">
            </th>
        </thead>
    </table>

    <table border="1" class="text-center mb-3" style="width: 100%">
        <thead>
            <th class="text-center p-1" style="background-color: rgb(0, 0, 87)">
                <p class="text-sub-judul fw-bolder mx-auto mb-0 text-white">CHECKLIST THE QUANTITY OF EQUIPMENTS AND
                    TOOLS</p>
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
                <th class="p-1 text-center" style="width: 5%;">
                    <p class="text-report mb-0 fw-bolder"><b>Unit</b></p>
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
            @foreach ($tools as $item)
                <tr>
                    <td class="text-center">
                        <p class="text-report mb-0">
                            {{ $loop->iteration }}
                        </p>
                    </td>
                    <td class="">
                        <p class="text-report mb-0">
                            {{ $item->tools->name ?? '' }}
                        </p>
                    </td>
                    <td class="text-center">
                        <p class="text-report mb-0">
                            {{ $item->qty ?? '' }}
                        </p>
                    </td>
                    <td class="text-center">
                        <p class="text-report mb-0">
                            {{ $item->tools->unit ?? '' }}
                        </p>
                    </td>
                    <td class="text-center">
                        <p class="text-report mb-0">
                            {{ $item->initial_check ?? '' }}
                        </p>
                    </td>
                    <td class="text-center">
                        <p class="text-report mb-0">
                            {{ $item->ending_check ?? '' }}
                        </p>
                    </td>
                    <td class="text-center">
                        <p class="text-report mb-0">
                            {{ $item->remark ?? '' }}
                        </p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="page-break"></div>

    <table border="1" style="width: 100%" class="mb-3">
        <thead>
            <th class="text-center" style="width: 30%">
                <img style="height: 70px" src="{{ public_path('assets/images/tcsm.png') }}" alt="logo-tcsm">
            </th>
            <th class="text-center">
                <p class="text-judul fw-bolder mx-auto mb-0">DAILY REPORT</p>
            </th>
            <th class="text-center" style="width: 30%">
                <img style="height: 70px" src="{{ public_path('assets/images/logo_mrtj.png') }}" alt="logo-mrt">
            </th>
        </thead>
    </table>

    <table border="1" class="text-center mb-3" style="width: 100%">
        <thead>
            <th class="text-center p-1" style="background-color: rgb(0, 0, 87)">
                <p class="text-sub-judul fw-bolder mx-auto mb-0 text-white text-uppercase"
                    style="text-transform: capitalize;">
                    DOKUMENTASI KEGIATAN
                    {{ $closing_report->kegiatan ?? '?' }}</p>
            </th>
        </thead>
    </table>

    <table border="1" style="width: 100%" class="mb-3">
        <tbody>
            <tr>
                <td class="p-1" style="width: 4%">
                    <p class="text-report text-center mb-0">1</p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">Dokumentasi saat kegiatan</p>
                </td>
                <td class="p-1" style="width: 4%">
                    <p class="text-report text-center mb-0">2</p>
                </td>
                <td class="p-1">
                    <p class="text-report mb-0">Dokumentasi saat kegiatan</p>
                </td>
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

    @if ($lampiran->count() != null)
        @foreach ($lampiran as $item)
            <div class="page-break"></div>
            <table border="1" style="width: 100%" class="mb-3">
                <thead>
                    <th class="text-center" style="width: 30%">
                        <img style="height: 70px" src="{{ public_path('assets/images/tcsm.png') }}" alt="logo-tcsm">
                    </th>
                    <th class="text-center">
                        <p class="text-judul fw-bolder mx-auto mb-0">DAILY REPORT</p>
                    </th>
                    <th class="text-center" style="width: 30%">
                        <img style="height: 70px" src="{{ public_path('assets/images/logo_mrtj.png') }}"
                            alt="logo-mrt">
                    </th>
                </thead>
            </table>

            <table border="1" class="text-center mb-3" style="width: 100%">
                <thead>
                    <th class="text-center p-1" style="background-color: rgb(0, 0, 87)">
                        <p class="text-sub-judul fw-bolder mx-auto mb-0 text-white">LAMPIRAN</p>
                    </th>
                </thead>
            </table>

            <table border="1" class="text-center mb-3" style="width: 100%;">
                <thead>
                    <tr>
                        <td class="text-center p-2">
                            <img style="width: 80%" src="{{ public_path('storage/' . $item->lampiran_1 ?? '-') }}"
                                alt="lampiran-1">
                        </td>
                    </tr>
                </thead>
            </table>
        @endforeach
    @else
        {{-- Do Nothing --}}
    @endif

    {{-- @if ($closing_report->lampiran_2 != null)
        <div class="page-break"></div>
        <table border="1" style="width: 100%" class="mb-3">
            <thead>
                <th class="text-center" style="width: 30%">
                    <img style="height: 70px" src="{{ public_path('assets/images/tcsm.png') }}" alt="logo-tcsm">
                </th>
                <th class="text-center">
                    <p class="text-judul fw-bolder mx-auto mb-0">DAILY REPORT</p>
                </th>
                <th class="text-center" style="width: 30%">
                    <img style="height: 70px" src="{{ public_path('assets/images/logo_mrtj.png') }}" alt="logo-mrt">
                </th>
            </thead>
        </table>

        <table border="1" class="text-center mb-3" style="width: 100%">
            <thead>
                <th class="text-center p-1" style="background-color: rgb(0, 0, 87)">
                    <p class="text-sub-judul fw-bolder mx-auto mb-0 text-white">LAMPIRAN</p>
                </th>
            </thead>
        </table>

        <table border="1" class="text-center mb-3" style="width: 100%;">
            <thead>
                <tr>
                    <td class="text-center p-2">
                        <img style="width: 80%"
                            src="{{ public_path('storage/' . $closing_report->lampiran_2 ?? '-') }}"
                            alt="lampiran-2">
                    </td>
                </tr>
            </thead>
        </table>
    @else

    @endif --}}

</body>

</html>
