@if ($pekerjaan->count() > 0)
    @foreach ($pekerjaan as $item)
        <div class="col-lg-6">
            <div class="item">
                <img src="{{ asset('storage/' . $item->job->logo ?? '') }}" alt="logo" class="templatemo-item">
                <div>
                    <div class="text-wrap d-flex">
                        <h4>{{ $item->section }} - {{ $item->job->name }}</h4>
                    </div>
                    <span>
                        {{ $item->location }}
                        <button
                            class="btn @if ($item->shift == 1) btn-success
            @elseif($item->shift == 2)
            btn-warning
            @elseif($item->shift == 3)
            btn-danger
            @else
            btn-light @endif">
                            Shift:{{ $item->shift }}
                        </button>
                    </span>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="text-wrap">
        <h4 class="text-warning mb-4">Jadwal pekerjaan belum diatur, silahkan
            hubungi PIC
            terkait!
        </h4>
        <h4 class="text-danger">Atau hari ini OCS ON 24 jam.</h4>
    </div>
@endif
