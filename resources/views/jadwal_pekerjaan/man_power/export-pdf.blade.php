<!DOCTYPE html>

<head>
    <title>Jadwal Shift {{ $section ?? '' }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/mm.png') }}" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="mb-4">
        <p class="float-right mb-1">generated at: {{ \Carbon\Carbon::now() }}</p>
    </div>
    <table border="1" style="width: 100%" class="mb-3">
        <thead>
            <th class="text-center" style="width: 30%">
                <img style="height: 70px" src="{{ public_path('assets/images/logo_mrtj.png') }}" alt="logo-mrt">
            </th>
            <th class="text-center py-auto">
                <p class="fw-bolder mt-2 mb-2" style="font-weight: 700; font-size: 30px;">JADWAL SHIFT</p>
                <p class="mb-0 text-uppercase">
                    {{ $section ?? '' }}
                </p>
                <p class="mt-0">
                    (Periode: {{ $bulan ?? '' }} {{ $tahun ?? '' }})
                </p>
            </th>
            <th class="text-center" style="width: 30%">
                <img style="height: 70px" src="{{ public_path('assets/images/tcsm.png') }}" alt="logo-tcsm">
            </th>
        </thead>
    </table>
    <table id="data-table" border="1" class="text-center" style="width: 100%">
        <thead>
            <tr>
                <th class="p-1" style="width: 4%">No</th>
                <th class="p-1" style="width: 15%">Tanggal</th>
                <th class="p-1 text-wrap" style="width: 10%">Shift</th>
                <th class="p-1" style="width: 22%">Nama Man Power</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($man_power as $tanggal => $items)
                <tr>
                    <td rowspan="{{ count($items) }}">{{ $loop->iteration }}</td>
                    <td class="text-wrap" rowspan="{{ count($items) }}">
                        {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('l, d F Y') }}
                    </td>
                    <td
                        @if ($items[0]->shift == 2) class="bg-warning"
                        @elseif($items[0]->shift == 1) class="bg-success"
                        @elseif($items[0]->shift == 3) class="bg-primary" @endif>
                        {{ $items[0]->shift }}
                    </td>
                    <td>
                        {{ $items[0]->user->name }}
                    </td>
                </tr>
                @for ($i = 1; $i < count($items); $i++)
                    <tr>
                        <td
                            @if ($items[$i]->shift == 2) class="bg-warning"
                            @elseif($items[$i]->shift == 1) class="bg-success"
                            @elseif($items[$i]->shift == 3) class="bg-primary" @endif>
                            {{ $items[$i]->shift }}
                        </td>
                        <td>
                            {{ $items[$i]->user->name }}
                        </td>
                    </tr>
                @endfor
            @endforeach

            {{-- @foreach ($man_power as $item)
                <tr>
                    <td>
                        {{ \Carbon\Carbon::parse($item->start)->translatedFormat('l, d F Y') }}
                    </td>
                    <td>
                        {{ $item->shift }}
                    </td>
                    <td class="text-left">
                        {{ $item->user->name }}
                    </td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
</body>

</html>
