<!DOCTYPE html>

<head>
    <title>Jadwal Pekerjaan</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/mm.png') }}" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <table border="1" style="width: 100%" class="mb-3">
        <thead>
            <th class="text-center" style="width: 30%">
                <img style="height: 70px" src="{{ public_path('assets/images/logo_mrtj.png') }}" alt="logo-mrt">
            </th>
            <th class="text-center">
                <h5 class="fw-bolder mx-auto mb-0">Detail Pelaksanaan Kegiatan <br> {{ $section ?? '' }}</h5>
                <h6>
                    (Periode: {{ $bulan ?? '' }} {{ $tahun ?? '' }})
                </h6>
            </th>
            <th class="text-center" style="width: 30%">
                <img style="height: 70px" src="{{ public_path('assets/images/tcsm.png') }}" alt="logo-tcsm">
            </th>
        </thead>
    </table>
    <table border="1" class="text-center" style="width: 100%">
        <thead>
            <tr>
                <th class="p-1" style="width: 12%">Hari</th>
                <th class="p-1" style="width: 13%">Tanggal</th>
                <th class="p-1" style="width: 22%">Lokasi</th>
                <th class="p-1">Kegiatan</th>
                <th class="p-1 text-wrap" style="width: 10%">Shift</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwal_pekerjaan as $item)
                <tr>
                    <td>
                        {{ \Carbon\Carbon::parse($item->start)->translatedFormat('l') }}
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($item->start)->translatedFormat('d-M-Y') }}
                    </td>
                    <td>
                        {{ $item->location }}
                    </td>
                    <td>
                        {{ $item->nama_pekerjaan }}
                    </td>
                    <td>
                        {{ $item->shift }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
