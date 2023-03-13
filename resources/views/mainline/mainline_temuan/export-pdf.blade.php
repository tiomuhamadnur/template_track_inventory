<!DOCTYPE html>

<head>
    <title>List Temuan Mainline</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/mm.png') }}" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <table border="1" style="width: 100%" class="mb-3">
        <thead>
            <th class="text-center">
                <img style="height: 70px" src="{{ public_path('assets/images/tcsm.png') }}" alt="logo-marti">
            </th>
            <th class="text-center">
                <h3 class="fw-bolder mx-auto mb-0">List Temuan Mainline</h3>
                <h6>
                    (Update: {{ \Carbon\Carbon::now()->format('d M Y') }})
                </h6>
            </th>
            <th class="text-center">
                <img style="height: 70px" src="{{ public_path('assets/images/logo_mrtj.png') }}" alt="logo-mrt">
            </th>
        </thead>
    </table>
    <table border="1" class="text-center">
        <thead>
            <tr>
                <th class="p-1">No</th>
                <th class="p-1">Date</th>
                <th class="p-1">Area</th>
                <th class="p-1">Line</th>
                <th class="p-1">Span</th>
                {{-- <th class="p-1">Chainage</th> --}}
                <th class="p-1">No. <br> Sleeper</th>
                <th class="p-1">Dir</th>
                <th class="p-1">Part</th>
                {{-- <th class="p-1">Detail <br> Part</th> --}}
                <th class="p-1">Defect</th>
                <th class="p-1">Remark</th>
                <th class="p-1">Class</th>
                <th class="p-1">Examiner</th>
                <th class="p-1">Status</th>
                <th class="p-1">Photo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($temuan as $item)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        {{ $item->tanggal }}
                    </td>
                    <td>
                        {{ $item->mainline->area->code }}
                    </td>
                    <td>
                        {{ $item->mainline->line->code }}
                    </td>
                    <td>
                        {{ $item->mainline->no_span }}
                    </td>
                    {{-- <td>
                        {{ $item->mainline->kilometer }}
                    </td> --}}
                    <td>
                        {{ $item->no_sleeper }}
                    </td>
                    <td>
                        {{ $item->direction }}
                    </td>
                    <td>
                        {{ $item->part->name }} <br>
                        ({{ $item->detail_part->name }})
                    </td>
                    {{-- <td>
                        {{ $item->detail_part->name }}
                    </td> --}}
                    <td>
                        {{ $item->defect->name ?? 'Lainnya' }}
                    </td>
                    <td>
                        {{ $item->remark ?? '-' }}
                    </td>
                    <td>
                        {{ $item->klasifikasi }}
                    </td>
                    <td>
                        {{ $item->pic }}
                    </td>
                    <td>
                        {{ $item->status }}
                    </td>
                    <td class="p-2">
                        <img style="height: 120px" src="{{ public_path('storage/' . $item->photo) }}"
                            alt="tidak ada foto">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
