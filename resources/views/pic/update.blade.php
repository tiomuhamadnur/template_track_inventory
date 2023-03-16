@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title> Edit PIC | TCSM</title>
@endsection
@section('sub-content')
    <div class="row flex-grow">
        <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">Edit Data PIC</h4>
                            <p class="card-subtitle card-subtitle-dash">Track Examination Team</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-12">
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <form action="{{ route('pic.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="intro-y box p-2">
                                    <div>
                                        <input type="text" name="id" hidden value="{{ $pic->id }}">
                                        <label for="crud-form-1" class="form-label mt-2">Nama PIC</label>
                                        <select data-placeholder="Select line area" class="form-control w-full"
                                            id="crud-form-2" required name="user_id">
                                            <option value="{{ $pic->user->id }}" selected>{{ $pic->user->name }}
                                            </option>
                                            @foreach ($technician as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Pilih Preventive Work</label>
                                        <select data-placeholder="Select line area" class="form-control w-full"
                                            id="crud-form-2" name="job_id" required>
                                            <option value="{{ $pic->job->id }}" selected>{{ $pic->job->name }}
                                                @foreach ($job as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Tahun</label>
                                        <input type="text" class="form-control" name="tahun"
                                            value="{{ $pic->tahun }}" readonly>
                                    </div>

                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Progress (max:
                                            {{ $pic->job->frekuensi }})</label>
                                        <input type="number" class="form-control" value="{{ $pic->progress }}"
                                            name="progress" min="0" max="{{ $pic->job->frekuensi }}">
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
