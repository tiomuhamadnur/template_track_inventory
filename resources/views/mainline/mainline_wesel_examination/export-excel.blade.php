<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $wesel->first()->wesel->name ?? '' }}</title>
    </head>

    <body>
        <table class="table-bordered" style="text-align:center; font-size:12px;">
            <thead>
                <tr class="fw-bolder">
                    <td rowspan="3">
                        Tanggal
                    </td>
                    <td rowspan="3">
                        Examiner
                    </td>
                    <td rowspan="3">
                        No. Turn Out
                    </td>
                    <td colspan="13">
                        Track Gauge
                    </td>
                    <td colspan="14">
                        Cross level
                    </td>
                    <td colspan="6">
                        Alignment
                    </td>
                    <td colspan="4">
                        Longitudinal level
                    </td>
                    <td colspan="2">
                        Back Gauge
                    </td>
                </tr>
                <tr class="fw-bolder">
                    <td rowspan="2">1</td>
                    <td rowspan="2">2</td>
                    <td rowspan="2">2'</td>
                    <td rowspan="2">2''</td>
                    <td rowspan="2">3</td>
                    <td rowspan="2">3'</td>
                    <td rowspan="2">4'</td>
                    <td rowspan="2">5</td>
                    <td rowspan="2">5'</td>
                    {{-- <td rowspan="2">6'</td> --}}
                    <td rowspan="2">7</td>
                    <td rowspan="2">7'</td>
                    <td rowspan="2">10</td>
                    <td rowspan="2">10'</td>
                    <td rowspan="2">1</td>
                    <td rowspan="2">2</td>
                    <td rowspan="2">3</td>
                    <td rowspan="2">3'</td>
                    <td rowspan="2">4</td>
                    <td rowspan="2">4'</td>
                    <td rowspan="2">5</td>
                    <td rowspan="2">5'</td>
                    <td rowspan="2">7</td>
                    <td rowspan="2">7'</td>
                    <td rowspan="2">8</td>
                    <td rowspan="2">8'</td>
                    <td rowspan="2">10</td>
                    <td rowspan="2">10'</td>
                    <td rowspan="2">2</td>
                    <td rowspan="2">5</td>
                    <td colspan="3">5'</td>
                    <td rowspan="2">9</td>
                    <td rowspan="2">2</td>
                    <td rowspan="2">5</td>
                    <td rowspan="2">5'</td>
                    <td rowspan="2">9</td>
                    <td rowspan="2">8</td>
                    <td rowspan="2">8'</td>
                </tr>
                <tr class="fw-bolder">
                    <td>1/4</td>
                    <td>1/2</td>
                    <td>3/4</td>
                </tr>
            </thead>

            <tbody>
                @foreach ($wesel as $item)
                    <tr>
                        <td>
                            {{ $item->tanggal ?? '' }}
                        </td>
                        <td>
                            {{ $item->pic ?? '' }}
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->wesel->name ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->TG_1 ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->TG_2 ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->TG_2A ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->TG_2AA ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->TG_3 ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->TG_3A ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->TG_4A ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->TG_5 ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->TG_5A ?? '' }}
                            </div>
                        </td>
                        {{-- <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->TG_6A ?? '' }}
                            </div>
                        </td> --}}
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->TG_7 ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->TG_7A ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->TG_10 ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->TG_10A ?? '' }}
                            </div>
                        </td>

                        {{-- CROSS LEVEL --}}
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->CL_1 ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->CL_2 ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->CL_3 ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->CL_3A ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->CL_4 ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->CL_4A ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->CL_5 ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->CL_5A ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->CL_7 ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->CL_7A ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->CL_8 ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->CL_8A ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->CL_10 ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->CL_10A ?? '' }}
                            </div>
                        </td>

                        {{-- ALIGNMENT --}}
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->AL_2 ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->AL_5 ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->AL_5A_1per4 ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->AL_5A_1per2 ?? '' }}
                            </div>
                        </td>
                        <td>
                            <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                {{ $item->AL_5A_3per4 ?? '' }}
                            </div>
                        </td>
                        <td>
                            {{ $item->AL_9 ?? '' }}
                        </td>

                        {{-- LONGITUDINAL LEVEL --}}
                        <td>
                            {{ $item->LL_2 ?? '' }}
                        </td>
                        <td>
                            {{ $item->LL_5 ?? '' }}
                        </td>
                        <td>
                            {{ $item->LL_5A ?? '' }}
                        </td>
                        <td>
                            {{ $item->LL_9 ?? '' }}
                        </td>

                        {{-- BACK GAUGE --}}
                        <td>
                            {{ $item->BG_8 ?? '' }}
                        </td>
                        <td>
                            {{ $item->BG_8A ?? '' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

</html>
