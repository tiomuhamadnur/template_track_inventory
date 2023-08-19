@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title>Data History Turn Out Examination | TCSM</title>
@endsection

@section('sub-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <div>
                    </div>
                </div>
                <div class="col-lg-12 grid-margin stretch-card mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Turn Out Examination ({{ $wesel_name->name ?? '' }} -
                                {{ $wesel_name->area->code ?? '' }} -
                                {{ $wesel_name->line->code ?? '' }})</h4>
                            <div class="btn-group">
                                <a href="{{ route('wesel.examination.index') }}" class="btn btn-outline-dark btn-lg mx-0"
                                    type="button" title="Kembali">
                                    <i class="ti-arrow-left"></i>
                                </a>
                                <a href="{{ route('wesel.examination.create') }}"
                                    class="btn btn-outline-success btn-lg mx-0" type="button">Add Data</a>
                                <a href="#" class="btn btn-outline-warning btn-lg mx-0" type="button"
                                    data-bs-toggle="modal" data-bs-target="#ModalFilter" title="Filter data">
                                    <i class="ti-filter"></i>
                                </a>
                                <input type="text" name="wesel_id" value="{{ $wesel_name->id }}" hidden>
                                <a href="#" class="btn btn-outline-success btn-lg mx-0" form="form_export_excel"
                                    title="Export to Excel">
                                    <i class="ti-download"></i>
                                </a>
                            </div>
                            <form action="{{ route('wesel.examination.export') }}" method="GET" id="form_export_excel">
                                @csrf
                                @method('get')
                                <input type="text" name="wesel_id" value="{{ $wesel_name->id ?? '' }}" hidden>
                                <input type="text" name="tanggal_awal" value="{{ $tanggal_awal ?? '' }}" hidden>
                                <input type="text" name="tanggal_akhir" value="{{ $tanggal_akhir ?? '' }}" hidden>
                            </form>
                            <div class="table-responsive pt-3">
                                <table class="table-bordered" style="text-align:center; font-size:12px;">
                                    <thead>
                                        <tr class="fw-bolder" style="height: 19.6167px;">
                                            <td rowspan="5">
                                                Tanggal
                                            </td>
                                            <td style="width: 200px; height: 19.6167px;" colspan="12">
                                                Track Gauge
                                            </td>
                                            <td style="width: 200px; height: 19.6167px;" colspan="12">
                                                Cross level
                                            </td>
                                            <td style="width: 90px; height: 19.6167px;" colspan="6">
                                                Alignment
                                            </td>
                                            <td style="width: 60px; height: 19.6167px;" colspan="4">
                                                Longitudinal level
                                            </td>
                                            <td style="width: 30px; height: 19.6167px;" colspan="2">
                                                Back Gauge
                                            </td>
                                            <td style="width: 70px; height: 65.6167px;" rowspan="3">
                                                Dokumentasi
                                            </td>
                                        </tr>
                                        <tr class="fw-bolder" style="height: 23px;">
                                            <td style="width: 15px; height: 46px;" rowspan="2">1</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">2</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">2'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">2''</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">3</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">3'</td>
                                            {{-- <td style="width: 15px; height: 46px;" rowspan="2">4'</td> --}}
                                            <td style="width: 15px; height: 46px;" rowspan="2">5</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">5'</td>
                                            {{-- <td style="width: 15px; height: 46px;" rowspan="2">6'</td> --}}
                                            <td style="width: 15px; height: 46px;" rowspan="2">7</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">7'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">10</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">10'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">1</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">2</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">3</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">3'</td>
                                            {{-- <td style="width: 15px; height: 46px;" rowspan="2">4</td>
                                                <td style="width: 15px; height: 46px;" rowspan="2">4'</td> --}}
                                            <td style="width: 15px; height: 46px;" rowspan="2">5</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">5'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">7</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">7'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">8</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">8'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">10</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">10'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">2</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">5</td>
                                            <td style="width: 45px; height: 23px;" colspan="3">5'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">9</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">2</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">5</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">5'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">9</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">8</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">8'</td>
                                        </tr>
                                        <tr class="fw-bolder" style="height: 23px;">
                                            <td style="font-size:10px; width: 15px; height: 23px;">1/4</td>
                                            <td style="font-size:10px; width: 15px; height: 23px;">1/2</td>
                                            <td style="font-size:10px; width: 15px; height: 23px;">3/4</td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($wesel as $item)
                                            <tr style="height: 23px;">
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->tanggal ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->TG_1 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->TG_2 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->TG_2A ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->TG_2AA ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->TG_3 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->TG_3A ?? '' }}
                                                    </div>
                                                </td>
                                                {{-- <td style="height: 46px;">
                                                        <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                            {{ $item->TG_4A ?? '' }}
                                                        </div>
                                                    </td> --}}
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->TG_5 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->TG_5A ?? '' }}
                                                    </div>
                                                </td>
                                                {{-- <td style="height: 46px;">
                                                        <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                            {{ $item->TG_6A ?? '' }}
                                                        </div>
                                                    </td> --}}
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->TG_7 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->TG_7A ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->TG_10 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->TG_10A ?? '' }}
                                                    </div>
                                                </td>

                                                {{-- CROSS LEVEL --}}
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->CL_1 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->CL_2 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->CL_3 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->CL_3A ?? '' }}
                                                    </div>
                                                </td>
                                                {{-- <td style="height: 46px;">
                                                        <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                            {{ $item->CL_4 ?? '' }}
                                                        </div>
                                                    </td>
                                                    <td style="height: 46px;">
                                                        <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                            {{ $item->CL_4A ?? '' }}
                                                        </div>
                                                    </td> --}}
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->CL_5 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->CL_5A ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->CL_7 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->CL_7A ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->CL_8 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->CL_8A ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->CL_10 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->CL_10A ?? '' }}
                                                    </div>
                                                </td>

                                                {{-- ALIGNMENT --}}
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->AL_2 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->AL_5 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->AL_5A_1per4 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->AL_5A_1per2 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->AL_5A_3per4 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->AL_9 ?? '' }}
                                                    </div>
                                                </td>

                                                {{-- LONGITUDINAL LEVEL --}}
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->LL_2 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->LL_5 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->LL_5A ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->LL_9 ?? '' }}
                                                    </div>
                                                </td>

                                                {{-- BACK GAUGE --}}
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->BG_8 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->BG_8A ?? '' }}
                                                    </div>
                                                </td>

                                                <td style="height: 23px;">
                                                    <a href="#" class="btn-sm btn-outline-primary p-1"
                                                        data-bs-toggle="modal" data-bs-target="#ModalDokumentasi"
                                                        data-photo="{{ asset('storage/' . $item->photo) }}">
                                                        Show
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalDokumentasi" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalAdminTitle">Dokumentasi Kegiatan Turn Out Examination
                        ({{ $wesel_name->name ?? '' }} - {{ $wesel_name->area->code ?? '' }} -
                        {{ $wesel_name->line->code ?? '' }})</h3>
                </div>
                <div class="modal-body">
                    <div class="mb-4 text-center align-middle">
                        {{-- KONTEN PHOTO DOKUMENTASI KEGIATAN --}}
                        <div class="border mx-auto" style="width: 70%">
                            <p class="fw-bolder mb-0">Foto Dokumentasi Kegiatan</p>
                            <img src="" id="photo_modal" class="img-thumbnail"
                                alt="Tidak ada photo dokumentasi">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Filter-->
    <div class="modal fade" id="ModalFilter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="form_filter" action="{{ route('wesel.examination.filter') }}" method="GET">
                        @csrf
                        @method('get')
                        <div class="form-group">
                            <label class="form-label">Wesel</label>
                            <input type="text" value="{{ $wesel_name->id }}" name="wesel_id" hidden>
                            <input type="text" class="form-control" value="{{ $wesel_name->name }}" readonly>
                        </div>
                        <label class="form-label">Tanggal</label>
                        <div class="input-group">
                            <input placeholder="Tanggal Awal" class="form-control me-1" type="text"
                                onfocus="(this.type='date')" onblur="(this.type='text')" id="date"
                                name="tanggal_awal">
                            <input placeholder="Tanggal Akhir" class="form-control ms-1" type="text"
                                onfocus="(this.type='date')" onblur="(this.type='text')" id="date"
                                name="tanggal_akhir">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="form_filter" class="btn btn-primary justify-content-center">
                        Filter
                    </button>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#ModalDokumentasi').on('show.bs.modal', function(e) {
                var photo = $(e.relatedTarget).data('photo');
                document.getElementById("photo_modal").src = photo;
            });
        });
    </script>
@endsection
