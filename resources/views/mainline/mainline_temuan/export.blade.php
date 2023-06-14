<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table id="temuan" class="table table-report mt-2">
        <thead>
            <tr>
                <th>NO</th>
                <th>DATE</th>
                <th>AREA</th>
                <th>LINE</th>
                <th>SPAN</th>
                <th>CHAINAGE</th>
                <th>SLEEPER</th>
                <th>DIR</th>
                <th>PART</th>
                <th>DETAIL PART</th>
                <th>DEFECT</th>
                <th>REMARK</th>
                <th>CLASSIFICATION</th>
                <th>STATUS</th>
                <th>PHOTO OPEN</th>
                <th>PHOTO CLOSE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($temuan as $item)
                <tr>
                    <td>
                        <div>
                            {{ $loop->iteration }}
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ $item->tanggal }}
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ $item->mainline->area->code }}
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ $item->mainline->line->code }}
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ $item->mainline->no_span }}
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ $item->mainline->kilometer }}
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ $item->no_sleeper }}
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ $item->direction }}
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ $item->part->name }}
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ $item->detail_part->name }}
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ $item->defect->name ?? '-' }}
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ $item->remark ?? '-' }}
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ $item->klasifikasi }}
                        </div>
                    </td>
                    <td>
                        {{ $item->status }}
                    </td>
                    <td>
                        @if ($item->photo != null)
                            {{ asset('storage/' . $item->photo) }}
                        @else
                            '-'
                        @endif
                    </td>
                    <td>
                        @if ($item->photo_close != null)
                            {{ asset('storage/' . $item->photo_close) }}
                        @else
                            ''
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
