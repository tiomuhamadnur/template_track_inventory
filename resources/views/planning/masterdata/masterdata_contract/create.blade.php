@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Contract | P & C</title>
@endsection

@section('sub-content')
    <h5>Budgeting > Data Contract > Create Data</h5>
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
                            <h4 class="card-title">Form Data Contract</h4>
                            <form class="forms-sample" action="{{ route('masterdata-contract.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="exampleInputName1">Nama Contract</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Masukkan Nama Contract" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">No. Contract</label>
                                    <input type="text" class="form-control" name="no_contract" id="no_contract"
                                        placeholder="Masukkan No Contract" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Vendor</label>
                                    <input type="text" class="form-control" name="vendor" id="vendor"
                                        placeholder="Masukkan Nama Perusahaan" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Fund</label>
                                    <select class="form-control" id="fund_id" name="fund_id" required>
                                        <option value="" disabled selected>- Pilih Funding -</option>
                                        @foreach ($fund as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }} ({{ $item->tahun }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Contract Value</label>
                                    <input type="number" class="form-control" name="contract_value" id="contract"
                                        placeholder="Masukkan Total Contract Value (Rp.)" min="0">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Remark</label>
                                    <input type="text" class="form-control" name="remark" id="contract"
                                        placeholder="Masukkan Remark (Optional)">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Section</label>
                                    <select class="form-control" id="section_id" name="section_id" required>
                                        <option value="" disabled selected>- Pilih Section -</option>
                                        @foreach ($section as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Departement</label>
                                    <select class="form-control" id="departement_id" name="departement_id" required>
                                        <option value="" disabled selected>- Pilih Departement -</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                                <a href="{{ route('masterdata-contract.index') }}" class="btn btn-outline-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $('#section_id').on('change', function() {
            var section_id = this.value;
            $.ajax({
                url: '/getDepartement?section_id=' + section_id,
                type: 'get',
                success: function(res) {
                    $.each(res, function(key, value) {
                        $('#departement_id').html('<option selected value= "' +
                            value
                            .id + '">' + value.name + ' - (' + value.code +
                            ') </option>');
                    });
                }
            });
        });
    </script>
@endsection
