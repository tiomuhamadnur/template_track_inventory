<div class="col-lg-6">
    <div class="person-on-duty header-text">
        <div class="heading-section">
            <h5><em>Today's</em> Personel on Duty</h5>
        </div>

        <div class="owl-features owl-carousel">
            @if ($man_power->count() > 0)
                @foreach ($man_power as $item)
                    <div class="item">
                        <div class="thumb">
                            <img src="{{ asset('storage/' . $item->user->photo ?? '') }}">
                            <div class="hover-effect">
                                <h6>{{ $item->user->jabatan }}</h6>
                            </div>
                        </div>
                        <div>
                            <div class="text-wrap d-flex">
                                <h4>{{ $item->user->name }}</h4>
                            </div>
                            <span class="text-wrap">
                                {{ $item->user->section }}
                            </span>
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
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-wrap">
                    <h4 class="text-warning">Jadwal man power belum diatur, silahkan hubungi
                        PIC terkait!
                    </h4>
                </div>
            @endif
        </div>
    </div>
</div>
