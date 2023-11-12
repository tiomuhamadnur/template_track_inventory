<!DOCTYPE html>

<head>
    <title>List Temuan Visual</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/mm.png') }}" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <table border="1" style="width: 100%" class="mb-3">
        <thead>
            <th class="text-center">
                <img style="height: 70px" src="{{ public_path('assets/images/tcsm.png') }}" alt="logo-tcsm">
            </th>
            <th class="text-center">
                <h3 class="fw-bolder mx-auto mb-0">List Temuan Visual</h3>
                <h6>
                    (Update: {{ \Carbon\Carbon::now()->format('d M Y') }})
                </h6>
            </th>
            <th class="text-center">
                <img style="height: 70px" src="{{ public_path('assets/images/logo_mrtj.png') }}" alt="logo-mrt">
            </th>
        </thead>
    </table>
    <table border="1" class="text-center" style="width: 100%">
        <thead>
            <tr>
                <th class="p-1">No</th>
                <th class="p-1">Area</th>
                <th class="p-1">Sub <br> Area</th>
                <th class="p-1">Detail <br> Area</th>
                <th class="p-1">Part</th>
                <th class="p-1">Detail <br> Part</th>
                <th class="p-1">Defect</th>
                <th class="p-1">Class <br> (Priority)</th>
                <th class="p-1 text-wrap">Remark</th>
                <th class="p-1">PIC</th>
                <th class="p-1">Date</th>
                <th class="p-1">Status</th>
                <th class="p-1">Photo <br> Documentation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($temuan_visual as $item)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        {{ $item->area->code }}
                    </td>
                    <td>
                        {{ $item->sub_area->name }}
                    </td>
                    <td>
                        {{ $item->detail_area->name }}
                    </td>
                    <td>
                        {{ $item->part->name }}
                    </td>
                    <td>
                        {{ $item->detail_part->name }}
                    </td>
                    <td>
                        {{ $item->defect->name ?? 'Lainnya' }}
                    </td>
                    <td>
                        {{ $item->klasifikasi }} <br>
                        ({{ $item->prioritas }})
                    </td>
                    <td class="text-wrap">
                        {{ $item->remark ?? '-' }}
                    </td>
                    <td>
                        {{ $item->pic }}
                    </td>
                    <td>
                        {{ $item->tanggal }}
                    </td>
                    <td>
                        {{ $item->status }}
                    </td>
                    <td class="p-2 text-center">
                        @if ($item->status == 'open')
                            <img style="height: 120px" src="{{ public_path('storage/' . $item->photo) }}"
                                alt="tidak ada foto">
                            <p class="text-center mb-0" style="font-size: 10px">(Before Repair)</p>
                        @elseif($item->status == 'close')
                            <img style="height: 120px" src="{{ public_path('storage/' . $item->photo_close) }}"
                                alt="tidak ada foto">
                            <p class="text-center mb-0" style="font-size: 10px">(After Repair)</p>
                        @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
