@extends('mainline.mainline_layout.base')

@section('sub-title')
    <title>Data History SC Examination | CPWTM</title>
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
                            <h4 class="card-title">Data History Scissors Crossing Examination</h4>
                            <div class="btn-group">
                                <a href="{{ route('sc.examination.index') }}" class="btn btn-outline-dark btn-lg mx-0"
                                    type="button" title="Kembali">
                                    <i class="ti-arrow-left"></i>
                                </a>
                                <a href="{{ route('sc.examination.create') }}" class="btn btn-outline-success btn-lg mx-0"
                                    type="button">Add Data</a>
                                <a href="#" class="btn btn-outline-warning btn-lg mx-0" type="button"
                                    data-bs-toggle="modal" data-bs-target="#ModalFilter" title="Filter data">
                                    <i class="ti-filter"></i>
                                </a>
                                <a href="#" class="btn btn-outline-success btn-lg mx-0" title="Export to Excel"
                                    data-bs-toggle="modal" data-bs-target="#ModalExportExcel">
                                    <i class="ti-download"></i>
                                </a>
                            </div>
                            <form action="{{ route('wesel.examination.export') }}" method="GET" id="form_export_excel">
                                <input type="text" name="wesel_id" value="{{ $wesel_name->id ?? '' }}" hidden>
                                <input type="text" name="tanggal_awal" value="{{ $tanggal_awal ?? '' }}" hidden>
                                <input type="text" name="tanggal_akhir" value="{{ $tanggal_akhir ?? '' }}" hidden>
                            </form>
                            <table>
                                <tr>
                                    <td>No. SC</td>
                                    <td> : </td>
                                    <td>{{ $wesel_name->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Area</td>
                                    <td> : </td>
                                    <td>{{ $wesel_name->area->code ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Line</td>
                                    <td> : </td>
                                    <td>{{ $wesel_name->line->code ?? '-' }}</td>
                                </tr>
                            </table>
                            <div class="table-responsive pt-3">
                                <table class="table-bordered" style="text-align:center; font-size:12px;">
                                    <thead>
                                        <tr class="fw-bolder" style="height: 19.6167px;">
                                            <td rowspan="5" class="text-nowrap">
                                                Tanggal <br> (Examiner)
                                            </td>
                                            <td style="width: 200px; height: 19.6167px;" colspan="12">
                                                Track Gauge
                                            </td>
                                            <td style="width: 200px; height: 19.6167px;" colspan="12">
                                                Cross level
                                            </td>
                                            <td style="width: 90px; height: 19.6167px;" colspan="8">
                                                Alignment
                                            </td>
                                            <td style="width: 60px; height: 19.6167px;" colspan="8">
                                                Longitudinal level
                                            </td>
                                            <td style="width: 30px; height: 19.6167px;" colspan="8">
                                                Back Gauge
                                            </td>
                                            <td style="width: 70px; height: 65.6167px;" rowspan="3">
                                                Dokumentasi
                                            </td>
                                        </tr>
                                        <tr class="fw-bolder" style="height: 23px;">
                                            <td style="width: 15px; height: 46px;" rowspan="2">1</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">1'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">3</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">3'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">4</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">4'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">7</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">7'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">8</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">8'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">10</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">10'</td>

                                            <td style="width: 15px; height: 46px;" rowspan="2">1</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">1'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">3</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">3'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">4</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">4'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">7</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">7'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">8</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">8'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">10</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">10'</td>

                                            <td style="width: 15px; height: 46px;" rowspan="2">1</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">1'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">3</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">3'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">8</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">8'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">10</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">10'</td>

                                            <td style="width: 15px; height: 46px;" rowspan="2">1</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">1'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">3</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">3'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">8</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">8'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">10</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">10'</td>

                                            <td style="width: 15px; height: 46px;" rowspan="2">2</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">2'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">5</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">5'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">6</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">6'</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">9</td>
                                            <td style="width: 15px; height: 46px;" rowspan="2">9'</td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($wesel as $item)
                                            <tr style="height: 23px;">
                                                <td style="height: 46px;" class="text-nowrap">
                                                    {{ $item->tanggal ?? '' }} <br>
                                                    ({{ $item->pic ?? '-' }})
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->TG_1 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->TG_1A ?? '' }}
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
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->TG_4 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->TG_4A ?? '' }}
                                                    </div>
                                                </td>
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
                                                        {{ $item->TG_8 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->TG_8A ?? '' }}
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
                                                        {{ $item->CL_1A ?? '' }}
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
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->CL_4 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->CL_4A ?? '' }}
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
                                                        {{ $item->AL_1 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->AL_1A ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->AL_3 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->AL_3A ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->AL_8 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->AL_8A ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->AL_10 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->AL_10A ?? '' }}
                                                    </div>
                                                </td>

                                                {{-- LONGITUDINAL LEVEL --}}
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->LL_1 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->LL_1A ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->LL_3 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->LL_3A ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->LL_8 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->LL_8A ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->LL_10 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->LL_10A ?? '' }}
                                                    </div>
                                                </td>

                                                {{-- BACK GAUGE --}}
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->BG_2 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->BG_2A ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->BG_5 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->BG_5A ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->BG_6 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->BG_6A ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->BG_9 ?? '' }}
                                                    </div>
                                                </td>
                                                <td style="height: 46px;">
                                                    <div class="mt-0 mb-0 mx-0 rotate font-weight-bold ms-0 p-0">
                                                        {{ $item->BG_9A ?? '' }}
                                                    </div>
                                                </td>

                                                <td style="height: 23px;" class="text-center">
                                                    <div class="btn-group-vertical">
                                                        <a href="#" class="btn btn-primary my-0"
                                                            data-bs-toggle="modal" data-bs-target="#ModalDokumentasi"
                                                            data-photo="{{ asset('storage/' . $item->photo) }}">
                                                            Show
                                                        </a>
                                                        <a href="{{ route('sc.examination.edit', Crypt::encryptString($item->id)) }}"
                                                            class="btn btn-warning my-0">Edit</a>
                                                    </div>
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

    <!-- Modal Dokumentasi-->
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
    <!-- End Modal Dokumentasi-->

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
                                name="tanggal_awal" required>
                            <input placeholder="Tanggal Akhir" class="form-control ms-1" type="text"
                                onfocus="(this.type='date')" onblur="(this.type='text')" id="date"
                                name="tanggal_akhir" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="float-end">
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
    </div>
    <!-- End Modal Filter-->

    <!-- Modal Export Excel -->
    <div class="modal fade" id="ModalExportExcel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdminTitle">Apakah anda yakin?</h5>
                </div>
                <div class="modal-body pt-3 mb-0">
                    <div class="p-2 text-center">
                        <h1 class="text-center align-middle text-success mt-2" style="font-size: 100px">
                            <i class="mdi mdi-file-excel mx-auto"></i>
                        </h1>
                        <div class="text-slate-500 mt-2">File excel akan didownload sesuai data yang difilter!</div>
                    </div>
                </div>

                <div class="modal-footer mt-2">
                    <div class="float-end">
                        <button type="submit" formtarget="_blank" form="form_export_excel" onclick="closeModal()"
                            class="btn btn-success justify-content-center">
                            Download Excel
                        </button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Export Excel-->
@endsection

@section('javascript')
    <script type="text/javascript">
        $('#ModalDokumentasi').on('show.bs.modal', function(e) {
            var photo = $(e.relatedTarget).data('photo');
            document.getElementById("photo_modal").src = photo;
        });

        function closeModal() {
            $("#ModalExportExcel").modal("hide");
        }
    </script>
@endsection
