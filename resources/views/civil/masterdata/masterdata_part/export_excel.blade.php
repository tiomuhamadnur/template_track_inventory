<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Part Civil</title>
</head>

<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">
                    id
                </th>
                <th class="text-center">
                    name
                </th>
                <th class="text-center">
                    code
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td class="text-center">
                        {{ $item->id }}
                    </td>
                    <td class="text-center">
                        {{ $item->name }}
                    </td>
                    <td class="text-center">
                        {{ $item->code ?? '' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
