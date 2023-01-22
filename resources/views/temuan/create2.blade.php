@extends('../layout/' . $layout)

@section('subhead')
    <title>Tambah Data Temuan</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Form Data Temuan</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('temuan.store') }}" method="POST">
                @csrf
                @method('post')
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label mt-2">Area</label>
                        <select data-placeholder="Select area name" class="tom-select w-full" id="area">
                            <option disabled selected>- Pilih Nama Area -</option>
                            <option value="Mainline">Mainline</option>
                            <option value="Depo">Depo</option>
                            <option value="DAL">DAL</option>
                        </select>
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-2">Line</label>
                        <select data-placeholder="Select line name" class="tom-select w-full" id="line">
                            <option disabled selected>- Pilih Nama Line -</option>
                        </select>
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-2">Location</label>
                        <select data-placeholder="Select location name" class="tom-select w-full" id="location">
                            <option disabled selected>- Pilih Nama Location -</option>
                            @foreach ($area as $item)
                                <option value="{{ $item->id }}">{{ $item->code }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-2">No Span</label>
                        <select data-placeholder="Select no span" class="tom-select w-full" name="mainline_id"
                            id="crud-form-2">
                            <option disabled selected>- Pilih No Span -</option>
                            @foreach ($mainline as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->area->code . ' - ' . $item->line->code . ' - ' . $item->no_span . ' - (KM:' . $item->kilometer . ')' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-2">Parts</label>
                        <select data-placeholder="Select part name" class="tom-select w-full" name="part_id"
                            id="crud-form-2">
                            <option disabled selected>- Pilih Nama Part -</option>
                            @foreach ($part as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-2">No Sleeper</label>
                        <input id="crud-form-1" type="number" class="form-control w-full" name="no_sleeper">
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-2">Direction</label>
                        <select data-placeholder="Select part name" class="tom-select w-full" name="direction"
                            id="crud-form-2">
                            <option disabled selected>- Pilih Direction -</option>
                            <option value="L">L</option>
                            <option value="R">R</option>
                        </select>
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-2">Defect</label>
                        <select data-placeholder="Select defect name" class="tom-select w-full" name="defect_id"
                            id="crud-form-2">
                            <option disabled selected>- Pilih Jenis Defect -</option>
                            @foreach ($defect as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-2">Remark</label>
                        <textarea id="crud-form-1" class="form-control w-full" name="remark"></textarea>
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-2">PIC</label>
                        <input id="crud-form-1" type="text" class="form-control w-full" name="pic">
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-2">Tanggal Temuan</label>
                        <input id="crud-form-1" type="date" class="form-control w-full" name="tanggal">
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ route('temuan.index') }}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                        <button type="submit" class="btn btn-primary w-24">Save</button>
                    </div>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#area').on('change', function() {
                var area = this.value;
                $.ajax({
                    url: '/getLine?area=' + area,
                    type: 'get',
                    success: function(res) {
                        $('#line').html('<option selected disabled>Pilih Nama Line</option>');
                        $.each(res, function(key, value) {
                            $('#line').append('<option value="' + value
                                .id + '">' + value.code + ' - (' + value.name +
                                ')</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection
