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
                <th>PHOTO</th>
                {{-- <th>ACTIONS</th> --}}
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
                        <span
                            class="text-xs px-1 rounded-full @if ($item->status == 'open') btn-sm bg-success @else btn-sm bg-danger @endif text-white mr-1">
                            {{ $item->status }}
                        </span>
                    </td>
                    <td class="item-center">
                        <div>
                            {{ asset('storage/' . $item->photo) }}
                        </div>
                    </td>
                    {{-- <td class="table-report__action w-56">
                        <div>
                            <a class="flex items-center mr-3" href="{{ route('temuan.edit', $item->id) }}">
                                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                            </a>
                            <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                data-tw-target="#delete-confirmation-modal"
                                onclick="toggleModal('{{ $item->id }}')">
                                <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                            </a>
                        </div>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
