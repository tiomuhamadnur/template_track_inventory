<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ultrasonic Test</title>
</head>
<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">
                    No
                </th>
                <th class="text-center">
                    Area
                </th>
                <th class="text-center">
                    Line
                </th>
                <th class="text-center text-wrap">
                    No Joint (W)
                </th>
                <th class="text-center text-wrap">
                    Tanggal
                </th>
                <th class="text-center">
                    Depth (mm)
                </th>
                <th class="text-center">
                    Length (mm)
                </th>
                <th class="text-center">
                    DAC (%)
                </th>
                <th class="text-center">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ut_examination as $item)
                <tr>
                    <td class="text-center">
                        {{ $loop->iteration }}
                    </td>
                    <td class="text-center text-wrap">
                        {{ $item->joint->area->code }}
                    </td>
                    <td class="text-center text-wrap">
                        {{ $item->joint->line->code }}
                    </td>
                    <td class="text-center text-wrap">
                        {{ $item->joint->name }}
                    </td>
                    <td class="text-center text-wrap">
                        {{ $item->tanggal }}
                    </td>
                    <td class="text-center text-wrap">
                        {{ $item->depth }}
                    </td>
                    <td class="text-center text-wrap">
                        {{ $item->length }}
                    </td>
                    <td>
                        {{ $item->dac }}
                    </td>
                    <td>
                        {{ $item->status }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
