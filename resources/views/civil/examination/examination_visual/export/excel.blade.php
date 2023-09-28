<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Temuan Visual</title>
</head>

<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">
                    NO
                </th>
                <th class="text-center">
                    AREA
                </th>
                <th class="text-center text-wrap">
                    SUB AREA
                </th>
                <th>
                    DETAIL AREA
                </th>
                <th class="text-center">
                    PART
                </th>
                <th>
                    DETAIL PART
                </th>
                <th class="text-center text-wrap">
                    DEFECT
                </th>
                <th class="text-center text-wrap">
                    CLASSIFICATION
                </th>
                <th>
                    PRIORITY
                </th>
                <th class="text-center">
                    STATUS
                </th>
                <th class="text-center">
                    DATE
                </th>
                <th class="text-center">
                    PHOTO OPEN
                </th>
                <th class="text-center">
                    PHOTO CLOSE
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($temuan_visual as $item)
                <tr>
                    <td class="text-center">
                        {{ $loop->iteration }}
                    </td>
                    <td class="text-center">
                        {{ $item->area->code }}
                    </td>
                    <td class="text-center">
                        {{ $item->sub_area->name }}
                    </td>
                    <td class="text-center">
                        {{ $item->detail_area->name ?? '-' }}
                    </td>
                    <td class="text-center text-wrap">
                        {{ $item->part->name }}
                    </td>
                    <td class="text-center">
                        {{ $item->detail_part->name }}
                    </td>
                    <td class="text-center">
                        {{ $item->defect->name ?? 'Lainnya' }}
                    </td>
                    <td class="text-center">
                        {{ $item->klasifikasi }}
                    </td>
                    <td class="text-center">
                        {{ $item->prioritas }}
                    </td>
                    <td>
                        {{ $item->status }}
                    </td>
                    <td class="text-center">
                        {{ $item->tanggal }}
                    </td>
                    <td>
                        @if ($item->photo != null)
                            {{ asset('storage/' . $item->photo) }}
                        @else
                        @endif
                    </td>
                    <td>
                        @if ($item->photo_close != null)
                            {{ asset('storage/' . $item->photo_close) }}
                        @else
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
