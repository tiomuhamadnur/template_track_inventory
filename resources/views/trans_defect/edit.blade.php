@extends('../layout/' . $layout)

@section('subhead')
    <title>Tambah Data Relasi Part & Defect</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Form Data Relasi Part & Defect</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('transDefect.update') }}" method="POST">
                @csrf
                @method('put')
                <div class="intro-y box p-5">
                    <input type="text" value="{{ $trans_defect->id }}" name="id" hidden>
                    <div>
                        <label for="crud-form-1" class="form-label">Part</label>
                        <select data-placeholder="Select Part" class="tom-select w-full" name="part_id" id="crud-form-2">
                            <option value="{{ $trans_defect->part_id }}" selected>{{ $trans_defect->part->name }}</option>
                            @foreach ($part as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-2">Detail Part</label>
                        <select data-placeholder="Select Detail Part" class="tom-select w-full" name="detail_part_id"
                            id="crud-form-2">
                            <option value="{{ $trans_defect->detail_part_id }}" selected>
                                {{ $trans_defect->detail_part->name }}
                            </option>
                            @foreach ($detail_part as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-2">Defect</label>
                        <select data-placeholder="Select Defect" class="tom-select w-full" name="defect_id"
                            id="crud-form-2">
                            <option value="{{ $trans_defect->defect_id }}" selected>{{ $trans_defect->defect->name }}
                            </option>
                            @foreach ($defect as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ route('transDefect.index') }}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
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
