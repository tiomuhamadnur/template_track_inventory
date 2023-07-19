@extends('layout.form.form')

@section('head')
    <title>Form Edit Data Joint</title>
@endsection

@section('body')
    <div class="page-wrapper p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Form Edit Data Joint</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('joint.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="text" name="id" value="{{ $joint->id }}" hidden>
                        <div class="form-row">
                            <div class="name">Area</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="area" class="form-select">
                                        <option value="" selected disabled>- Pilih Nama Area -</option>
                                        <option value="Mainline">Mainline</option>
                                        <option value="DAL">DAL</option>
                                        <option value="Depo">Depo</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Location</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="location" name="area_id" class="form-select" required>
                                        <option value="{{ $joint->area->id }}" selected>{{ $joint->area->code }}</option>
                                        @foreach ($area as $item)
                                            <option value="{{ $item->id }}">{{ $item->code }}</option>
                                        @endforeach
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Line</div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="line" name="line_id" class="form-select" required>
                                        <option value="{{ $joint->line->id ?? '' }}" selected>{{ $joint->line->code ?? '' }}
                                        </option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">No Span <span class="text-danger">(*khusus mainline & DAL)</span></div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="mainline_id" name="mainline_id" class="form-select">
                                        <option value="{{ $joint->mainline->id ?? '' }}" selected>
                                            {{ $joint->mainline->no_span ?? '' }}</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                    <a href="#" class="btn btn-sm btn-success" title="Show Span"
                                        id="show_span">Show</a>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Nama Joint</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Input Nama Joint" name="name"
                                        required autocomplete="off" value="{{ $joint->name ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Tipe Joint</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="tipe" class="form-select" required>
                                        <option value="{{ $joint->tipe }}" selected>{{ $joint->tipe }}</option>
                                        <option value="NJ">NJ (Normal Joint)</option>
                                        <option value="W">W (Welding)</option>
                                        <option value="GIJ">GIJ (Glued Insulated Joint)</option>
                                        <option value="IRJ">IRJ (Insulated Rail Joint)</option>
                                        <option value="EJ">EJ (Expansion Joint)</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Direction</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="direction" class="form-select" required>
                                        <option value="{{ $joint->direction ?? '' }}" selected>
                                            {{ $joint->direction ?? '' }}</option>
                                        <option value="L">L (Left)</option>
                                        <option value="R">R (Right)</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Chainage (m) <span class="text-danger">(*khusus depo)</span></div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="ex: 123.52" name="kilometer"
                                        autocomplete="off" value="{{ $joint->kilometer ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Wesel <span class="text-danger">(*jika joint di wesel)</span></div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="wesel_id" class="form-select">
                                        <option value="">Bukan Wesel</option>
                                        <option value="{{ $joint->wesel->id ?? '' }}" selected>
                                            {{ $joint->wesel->name ?? '' }} - {{ $joint->wesel->line->code ?? '' }} -
                                            {{ $joint->wesel->area->code ?? '' }}</option>
                                        @foreach ($wesel as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }} -
                                                {{ $item->line->code }} -
                                                {{ $item->area->code }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <a @if ($joint->area->id == 1) href="{{ route('joint.depo.index') }}"
                            @else
                                href="{{ route('joint.index') }}" @endif
                                class="btn btn-warning rounded">Cancel</a>
                            <button class="btn btn-success ms-2" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#show_span').on('click', function() {
                var line = document.getElementById("line").value;
                var location = document.getElementById("location").value;
                $.ajax({
                    url: '/getSpan?location=' + location + '&line=' + line,
                    type: 'get',
                    success: function(res) {
                        $('#mainline_id').html(
                            '<option value="" selected disabled>- Pilih Nomor Span -</option>'
                        );
                        $.each(res, function(key, value) {
                            $('#mainline_id').append('<option value="' + value
                                .id + '">' + value.no_span + ' - (KM: ' + value
                                .kilometer +
                                ')</option>');
                        });
                    }
                });
            });

            $('#area').on('change', function() {
                var area = this.value;
                $.ajax({
                    url: '/getLocation?area=' + area,
                    type: 'get',
                    success: function(res) {
                        $('#location').html(
                            '<option value="" selected disabled>- Pilih Nama Location -</option>'
                        );
                        $.each(res, function(key, value) {
                            $('#location').append('<option value="' + value
                                .id + '">' + value.code + ' - (' + value.name +
                                ')</option>');
                        });
                    }
                });
            });

            $('#location').on('change', function() {
                var area = document.getElementById("area").value;
                $.ajax({
                    url: '/getLine?area=' + area,
                    type: 'get',
                    success: function(res) {
                        $('#line').html(
                            '<option value="" selected disabled>- Pilih Nama Line -</option>'
                        );
                        $.each(res, function(key, value) {
                            $('#line').append('<option value="' + value
                                .id + '">' + value.code + ' - (' + value.name +
                                ')</option>');
                        });
                    }
                });
            });

            $('#line').on('change', function() {
                var line = document.getElementById("line").value;
                var location = document.getElementById("location").value;
                $.ajax({
                    url: '/getSpan?location=' + location + '&line=' + line,
                    type: 'get',
                    success: function(res) {
                        $('#mainline_id').html(
                            '<option value="" selected disabled>- Pilih Nomor Span -</option>'
                        );
                        $.each(res, function(key, value) {
                            $('#mainline_id').append('<option value="' + value
                                .id + '">' + value.no_span + ' - (KM: ' + value
                                .kilometer +
                                ')</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection
