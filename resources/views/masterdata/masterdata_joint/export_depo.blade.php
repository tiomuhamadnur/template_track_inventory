<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Joint Depo</title>
</head>

<body>
    <table id="temuan" class="table table-report mt-2">
        <thead>
            <tr>
                <th>no</th>
                <th>area</th>
                <th>line</th>
                <th>joint_id</th>
                <th>no joint</th>
                <th>tipe</th>
                <th>direction</th>
                <th>chainage (m)</th>
                <th>wesel</th>
                <th>tanggal</th>
                <th>dac</th>
                <th>depth</th>
                <th>length</th>
                <th>operator</th>
                <th>status</th>
                <th>remark</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($joint_depo as $item)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        {{ $item->area->code }}
                    </td>
                    <td>
                        {{ $item->line->code }}
                    </td>
                    <td>
                        {{ $item->id }}
                    </td>
                    <td>
                        {{ $item->name }}
                    </td>
                    <td>
                        {{ $item->tipe }}
                    </td>
                    <td>
                        {{ $item->direction }}
                    </td>
                    <td>
                        {{ $item->kilometer ?? '' }}
                    </td>
                    <td>
                        {{ $item->wesel->name ?? '' }}
                    </td>
                    <td>
                        {{-- Tanggal UT --}}
                    </td>
                    <td>
                        {{-- DAC UT --}}
                    </td>
                    <td>
                        {{-- Depth UT --}}
                    </td>
                    <td>
                        {{-- Length UT --}}
                    </td>
                    <td>
                        {{-- Operator UT --}}
                    </td>
                    <td>
                        {{-- Status UT --}}
                    </td>
                    <td>
                        {{-- Remark UT --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
