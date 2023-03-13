<!DOCTYPE html>

<head>
    <title>List Temuan Mainline</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <h3 class="text-center fw-bolder">List Temuan Mainline</h3>
    <table border="1" class="text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Area</th>
                <th>Line</th>
                <th>Span</th>
                <th>Chainage</th>
                <th>No. <br> Sleeper</th>
                <th>Dir</th>
                <th>Part</th>
                <th>Detail <br> Part</th>
                <th>Defect</th>
                <th>Remark</th>
                <th>Class</th>
                <th>Examiner</th>
                <th>Status</th>
                <th>Photo</th>
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
                    <td>
                        {{ $item->mainline->kilometer }}
                    </td>
                    <td>
                        {{ $item->no_sleeper }}
                    </td>
                    <td>
                        {{ $item->direction }}
                    </td>
                    <td>
                        {{ $item->part->name }}
                    </td>
                    <td>
                        {{ $item->detail_part->name }}
                    </td>
                    <td>
                        {{ $item->defect->name ?? '-' }}
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
                    <td>
                        <img style="height: 120px" src="{{ public_path('storage/' . $item->photo) }}"
                            alt="tidak ada foto">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
