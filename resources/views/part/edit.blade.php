@extends('../layout/' . $layout)

@section('subhead')
    <title>Edit Data Part</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Form Data Part</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('part.update') }}" method="POST">
                @csrf
                @method('put')
                <input type="text" name="id" value="{{ $part->id }}" hidden>
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Part Name</label>
                        <input id="crud-form-1" type="text" class="form-control w-full" name="name"
                            value="{{ $part->name }}">
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ route('part.index') }}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
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
