<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Accelerometer</title>
</head>

<body>
    <table border="1">
        <thead>
            <tr>
                <th rowspan="2">Tanggal</th>
                <th rowspan="2">PIC</th>
                <th rowspan="2">Line</th>
                <th colspan="{{ $area->count() }}">Longitudinal - LTx (dB)</th>
                <th colspan="{{ $area->count() }}">Lateral - Lty (dB)</th>
                <th colspan="{{ $area->count() }}">Vertical - LTz (dB)</th>
            </tr>
            <tr>
                @foreach ($area as $item)
                    <th>{{ $item->code }}</th>
                @endforeach

                @foreach ($area as $item)
                    <th>{{ $item->code }}</th>
                @endforeach

                @foreach ($area as $item)
                    <th>{{ $item->code }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="2">{{ $jadwal->tanggal }}</td>
                <td rowspan="2">{{ $jadwal->pic }}</td>
                <td>UT</td>

                @foreach ($ut_sumbu_x as $item)
                    <td>{{ $item }}</td>
                @endforeach

                @foreach ($ut_sumbu_y as $item)
                    <td>{{ $item }}</td>
                @endforeach

                @foreach ($ut_sumbu_z as $item)
                    <td>{{ $item }}</td>
                @endforeach
            </tr>
            <tr>
                <td>DT</td>

                @foreach ($dt_sumbu_x as $item)
                    <td>{{ $item }}</td>
                @endforeach

                @foreach ($dt_sumbu_y as $item)
                    <td>{{ $item }}</td>
                @endforeach

                @foreach ($dt_sumbu_z as $item)
                    <td>{{ $item }}</td>
                @endforeach
            </tr>
        </tbody>
    </table>
</body>

</html>
