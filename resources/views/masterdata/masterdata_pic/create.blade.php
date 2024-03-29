@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title> Add PIC | CPWTM</title>
@endsection
@section('sub-content')
    <div class="row flex-grow">
        <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">Management PIC</h4>
                            <p class="card-subtitle card-subtitle-dash">{{ auth()->user()->section->name }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-12">
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <form action="{{ route('pic.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="intro-y box p-2">
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Nama PIC</label>
                                        <select data-placeholder="Select line area" class="form-control w-full"
                                            id="crud-form-2" required name="user_id">
                                            <option value="" disabled selected>- Pilih Personil -</option>
                                            @foreach ($technician as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Pilih Preventive Work</label>
                                        <select data-placeholder="Select line area" class="form-control w-full"
                                            id="crud-form-2" name="job_id" required>
                                            <option value="" disabled selected>- Pilih PM -</option>
                                            @foreach ($job as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Tahun</label>
                                        <select data-placeholder="Select year" class="form-control w-full" id="crud-form-2"
                                            name="tahun" required>
                                            @for ($i = $tahun - 2; $i <= $tahun + 5; $i++)
                                                <option value="{{ $i }}"
                                                    @if ($i == $tahun) selected @endif>
                                                    {{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>

                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Progress</label>
                                        <input type="number" class="form-control" value="0" name="progress"
                                            min="0">
                                    </div>

                                    <div class="text-right mt-5">
                                        <a href="/pic" class="btn btn-outline-warning w-24 mr-1">Cancel</a>
                                        <button type="submit" class="btn btn-primary w-24">Save</button>
                                    </div>
                                </div>
                            </form>
                            <!-- END: Form Layout -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
