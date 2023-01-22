@extends('../layout/' . $layout)

@section('subhead')
    <title>Edit Data Defect</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Form Data Defect</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('defect.update') }}" method="POST">
                @csrf
                @method('put')
                <input type="text" name="id" value="{{ $defect->id }}" hidden>
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Defect Name</label>
                        <input id="crud-form-1" type="text" class="form-control w-full" name="name"
                            value="{{ $defect->name }}">
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-2">Detail Part</label>
                        <select data-placeholder="Select detail part" class="tom-select w-full" name="detail_part_id"
                            id="crud-form-2">
                            <option value="{{ $defect->detail_part_id ?? '' }}" selected>
                                {{ $defect->detail_part->name ?? '' }}</option>
                            @foreach ($detail_part as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ route('defect.index') }}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
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
