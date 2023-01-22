@extends('../layout/' . $layout)

@section('subhead')
    <title>Tambah Data Mainline</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Form Data Mainline</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('mainline.store') }}" method="POST">
                @csrf
                @method('post')
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label mt-3">Area</label>
                        <select data-placeholder="Select area" class="tom-select w-full" name="area_id" id="crud-form-2">
                            <option disabled selected>- Pilih Area -</option>
                            @foreach ($area as $item)
                                <option value="{{ $item->id }}">{{ $item->code }} ({{ $item->name }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-3">Line</label>
                        <select data-placeholder="Select line" class="tom-select w-full" name="line_id" id="crud-form-2">
                            <option disabled selected>- Pilih Line -</option>
                            @foreach ($line as $item)
                                <option value="{{ $item->id }}">{{ $item->code }} ({{ $item->name }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-3">No Span</label>
                        <input id="crud-form-1" type="text" class="form-control w-full" name="no_span">
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-3">Kilometer</label>
                        <input id="crud-form-1" type="text" class="form-control w-full" name="kilometer">
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-3">Panjang Span (mm)</label>
                        <input id="crud-form-1" type="text" class="form-control w-full" name="panjang_span">
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-3">Jumlah Sleeper</label>
                        <input id="crud-form-1" type="text" class="form-control w-full" name="jumlah_sleeper">
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-3">Spacing Sleeper</label>
                        <input id="crud-form-1" type="text" class="form-control w-full" name="spacing_sleeper">
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-3">Jenis Sleeper</label>
                        <input id="crud-form-1" type="text" class="form-control w-full" name="jenis_sleeper">
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-3">Joint</label>
                        <input id="crud-form-1" type="text" class="form-control w-full" name="joint">
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ route('mainline.index') }}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                        <button type="submit" class="btn btn-primary w-24">Save</button>
                    </div>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
@endsection

@section('script')
    @vite('resources/js/ckeditor-classic.js')
@endsection
