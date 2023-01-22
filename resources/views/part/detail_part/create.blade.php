@extends('../layout/' . $layout)

@section('subhead')
    <title>Tambah Data Detail Part</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Form Data Detail Part</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('detail-part.store') }}" method="POST">
                @csrf
                @method('post')
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Detail Part</label>
                        <input id="crud-form-1" type="text" class="form-control w-full" name="name">
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-2">Part Group</label>
                        <select data-placeholder="Select Part Group" class="tom-select w-full" name="detail_part_id"
                            id="crud-form-2">
                            <option disabled selected>- Pilih Part -</option>
                            @foreach ($part as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ route('detail-part.index') }}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
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
