@extends('../layout/' . $layout)

@section('subhead')
    <title>Edit Data Line</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Form Data Line</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('line.update') }}" method="POST">
                @csrf
                @method('put')
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label mt-2">Line Name</label>
                        <input type="text" name="id" value="{{ $line->id }}" hidden>
                        <input id="crud-form-1" type="text" class="form-control w-full" name="name"
                            placeholder="Input area name" value="{{ $line->name }}">
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-2">Line Code</label>
                        <input id="crud-form-1" type="text" class="form-control w-full" name="code"
                            placeholder="Input area code" value="{{ $line->code }}">
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-2">Line Area</label>
                        <select data-placeholder="Select line area" class="tom-select w-full" name="area"
                            id="crud-form-2">
                            <option disabled selected>- Pilih Area -</option>
                            <option @if ($line->area == 'Mainline') selected @endif value="Mainline">Mainline</option>
                            <option @if ($line->area == 'Depo') selected @endif value="Depo">Depo</option>
                        </select>
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ route('line.index') }}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
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
