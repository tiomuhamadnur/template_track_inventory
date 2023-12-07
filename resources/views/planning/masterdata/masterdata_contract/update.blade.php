@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Edit Data Contract | P & C</title>
@endsection

@section('sub-content')
    <h5>Budgeting > Data Contract > Edit Data</h5>
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
                            <h4 class="card-title">Form Edit Data Contract</h4>
                            <form class="forms-sample" action="{{ route('masterdata-contract.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="name">Nama Kontrak</label>
                                    <input type="text" name="id" hidden value="{{ $contract->id }}">
                                    <input type="text" class="form-control" name="name" id="="
                                        placeholder="Masukkan Nama Contract" value="{{ $contract->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_contract">No. Contract</label>
                                    <input type="text" name="id" hidden value="{{ $contract->id }}">
                                    <input type="text" class="form-control" name="no_contract" id="="
                                        placeholder="Masukkan No. Contract" value="{{ $contract->no_contract }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Fund</label>
                                    <select class="form-control" id="fund_id" name="fund_id">
                                        <option disabled selected>- Pilih Funding -</option>
                                        @foreach ($fund as $item)
                                            <option value={{ $item->id }}
                                                @if ($contract->fund_id == $item->id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="vendor">Vendor</label>
                                    <select class="form-control" id="vendor" name="vendor">
                                        <option disabled selected>- Pilih Vendor -</option>
                                        @foreach ($vendor as $item)
                                            <option @if ($contract->vendor == $item->name) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="contract_value">Contract Value</label>
                                    <input type="number" class="form-control" name="contract_value" id="="
                                        placeholder="Masukkan Nilai Contract" value="{{ $contract->contract_value }}"
                                        min="0" required>
                                </div>
                                <div class="form-group">
                                    <label for="remark">Remark</label>
                                    <input type="text" class="form-control" name="remark" id="="
                                        placeholder="Masukkan Remark" value="{{ $contract->remark }}">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="text" class="form-control" name="status" id="="
                                        placeholder="Masukkan Status" value="{{ $contract->status }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Section</label>
                                    <select class="form-control" id="section_id" name="section_id">
                                        <option disabled selected>- Pilih Section -</option>
                                        @foreach ($section as $item)
                                            <option value={{ $item->id }}
                                                @if ($contract->section_id == $item->id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Departement</label>
                                    <select class="form-control" id="departement_id" name="departement_id">
                                        <option disabled selected>- Pilih Departement -</option>
                                        @foreach ($departement as $item)
                                            <option value={{ $item->id }}
                                                @if ($contract->departement_id == $item->id) selected @endif>{{ $item->name }} -
                                                ({{ $item->code }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('masterdata-contract.index') }}"
                                    class="btn btn-outline-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
