@extends('layout.form.form')

@section('head')
    <title>Form Closing Report Activity</title>
    <style>
        .temp-hide {
            display: block;
        }

        .lampiran {
            display: none;
        }
    </style>
@endsection

@section('body')
    <div class="page-wrapper p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Form Closing Report Activity</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('closing_report.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-row">
                            <div class="name">Activity</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="kegiatan" class="form-select" required>
                                        <option value="" selected disabled>- Pilih Nama Activity -</option>
                                        @foreach ($activity as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Tanggal</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="date" name="tanggal" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Lokasi</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="lokasi"
                                        placeholder="Contoh: LBB - FTM (UT & DT)" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Waktu Mulai</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="time" name="waktu_mulai" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Section Head</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="section_head" class="form-select" required>
                                        <option value="" selected disabled>- Pilih Nama Section Head -
                                        </option>
                                        @foreach ($section_head as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Personel</div>
                            <div class="value">
                                <div class="input-group p-1">
                                    <div class="input-group mb-1">
                                        <input class="form-control" type="text" name="personel_1" readonly
                                            value="{{ auth()->user()->name }}" required>
                                    </div>
                                    <div class="input-group mb-1">
                                        <select name="personel_2" class="form-select" required>
                                            <option value="" selected disabled>- Personel 2 -
                                            </option>
                                            @foreach ($personel as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                    <div class="input-group mb-1">
                                        <select name="personel_3" class="form-select">
                                            <option value="" selected disabled>- Personel 3 -
                                            </option>
                                            @foreach ($personel as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                    <div class="input-group mb-1">
                                        <select name="personel_4" class="form-select">
                                            <option value="" selected disabled>- Personel 4 -
                                            </option>
                                            @foreach ($personel as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Penggunaan Tools & Materials</div>
                            <div class="value">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 3%">
                                                No
                                            </th>
                                            <th class="text-center text-wrap" style="width: 30%">
                                                Item Name
                                            </th>
                                            <th class="text-center">
                                                Qty.
                                            </th>
                                            <th class="text-center">
                                                Initials
                                            </th>
                                            <th class="text-center">
                                                Ending
                                            </th>
                                            <th class="text-center">
                                                Remarks
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 1; $i <= 10; $i++)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $i }}
                                                </td>
                                                <td class="text-wrap">
                                                    <select class="form-select" name="tools_id[]">
                                                        <option value="" selected disabled>Pilih
                                                        </option>
                                                        @foreach ($tools as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="text-wrap text-center" style="width: 22%">
                                                    <div class="temp-hide">
                                                        <input type="number" class="form-control" name="qty[]"
                                                            min="1">
                                                    </div>
                                                </td>
                                                <td class="text-center text-center">
                                                    <div class="text-center">
                                                        <input class="form-check-input temp-hide" type="checkbox"
                                                            name="initial_check[]" value="V" id="flexCheckDefault">
                                                    </div>
                                                </td>
                                                <td class="text-center text-center">
                                                    <div class="text-center">
                                                        <input class="form-check-input temp-hide" type="checkbox"
                                                            name="ending_check[]" value="V" id="flexCheckDefault">
                                                    </div>
                                                </td>
                                                <td class="text-wrap text-center">
                                                    <div class="temp-hide">
                                                        <input type="text" class="form-control" value=""
                                                            name="remark[]">
                                                    </div>
                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Foto Dokumentasi Kegiatan <span class="text-danger">(*Landscape)</span>
                            </div>
                            <div class="value">
                                <table border="1" class="table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 40%" class="p-2">
                                                <div class="input-group">
                                                    <div class="form-row">
                                                        <div class="form-label mb-1">
                                                            No. 1
                                                        </div>
                                                        <input class="form-control" type="file" name="photo_1">
                                                        @error('photo_1')
                                                            <p class="bg-danger rounded-3 text-center text-white mt-1">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </th>
                                            <th style="width: 40%" class="p-2">
                                                <div class="input-group">
                                                    <div class="form-row">
                                                        <div class="form-label mb-1">
                                                            No. 2
                                                        </div>
                                                        <input class="form-control" type="file" name="photo_2">
                                                        @error('photo_2')
                                                            <p class="bg-danger rounded-3 text-center text-white mt-1">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th style="width: 40%" class="p-2">
                                                <div class="input-group">
                                                    <div class="form-row">
                                                        <div class="form-label mb-1">
                                                            No. 3
                                                        </div>
                                                        <input class="form-control" type="file" name="photo_3">
                                                        @error('photo_3')
                                                            <p class="bg-danger rounded-3 text-center text-white mt-1">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </th>
                                            <th style="width: 40%" class="p-2">
                                                <div class="input-group">
                                                    <div class="form-row">
                                                        <div class="form-label mb-1">
                                                            No. 4
                                                        </div>
                                                        <input class="form-control" type="file" name="photo_4">
                                                        @error('photo_4')
                                                            <p class="bg-danger rounded-3 text-center text-white mt-1">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th style="width: 45%" class="p-2">
                                                <div class="input-group">
                                                    <div class="form-row">
                                                        <div class="form-label mb-1">
                                                            No. 5
                                                        </div>
                                                        <input class="form-control" type="file" name="photo_5">
                                                        @error('photo_5')
                                                            <p class="bg-danger rounded-3 text-center text-white mt-1">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </th>
                                            <th style="width: 45%" class="p-2">
                                                <div class="input-group">
                                                    <div class="form-row">
                                                        <div class="form-label mb-1">
                                                            No. 6
                                                        </div>
                                                        <input class="form-control" type="file" name="photo_6">
                                                        @error('photo_6')
                                                            <p class="bg-danger rounded-3 text-center text-white mt-1">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Ada Lampiran?</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="status_lampiran" id="status_lampiran" class="form-select" required>
                                        <option value="" selected disabled>- Pilih Keterangan Lampiran -</option>
                                        <option value="Terlampir">Ada</option>
                                        <option value="Nihil">Tidak Ada</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="lampiran" id="lampiran">
                            <div class="form-row">
                                <div class="name">Foto Lampiran <span class="text-danger">(*Potrait)</span>
                                </div>
                                <div class="value">
                                    <a id="btn-add" hidden style="width:100%" class="btn btn-primary mb-2 pt-0 me-2">
                                        Add Row
                                    </a>
                                    <table border="1" class="table-bordered" style="width: 100%">
                                        <tbody id="tabel-lampiran">
                                            <tr>
                                                <td class="p-2">
                                                    <div class="input-group">
                                                        <div class="form-row">
                                                            <div class="form-label fw-bolder mb-2">
                                                                <p class="text-danger">
                                                                    *Bisa pilih lebih dari 1 foto
                                                                </p>
                                                            </div>
                                                            <input class="form-control" type="file"
                                                                name="lampiran_1[]" multiple>
                                                            @error('lampiran_1')
                                                                <p class="bg-danger rounded-3 text-center text-white mt-1">
                                                                    {{ $message }}
                                                                </p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div>
                            <a href="{{ route('temuan_mainline.index') }}" class="btn btn-warning rounded">Cancel</a>
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
            $('#status_lampiran').on('change', function() {
                let status_lampiran = this.value;
                if (status_lampiran == 'Nihil') {
                    var lampiran = document.getElementById("lampiran");
                    lampiran.style.display = "none";
                } else if (status_lampiran == 'Terlampir') {
                    var lampiran = document.getElementById("lampiran");
                    lampiran.style.display = "block";
                }
            });

            $("#btn-add").click(function() {
                $("#tabel-lampiran").append(
                    '<tr><td class="p-2"><input type="file" name="lampiran_1[]" class="form-control" /></td><td class="p-2"><button type="button" class="btn btn-danger btn-sm remove-input-field">Hapus</button></td></tr>'
                );
            });

            $(document).on('click', '.remove-input-field', function() {
                $(this).parents('tr').remove();
            });
        });
    </script>
@endsection
