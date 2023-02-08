@extends('masterdata.masterdata_layout.base')

@section('sub-title')
    <title> Add PIC | TCSM</title>
@endsection
@section('sub-content')
    <div class="row flex-grow">
        <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">Management PIC</h4>
                            <p class="card-subtitle card-subtitle-dash">Track Examination Team</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-12">
                        <div class="intro-y col-span-12 lg:col-span-6">
                                <div class="intro-y box p-2">
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Nama</label>
                                        <select data-placeholder="Select line area" class="form-control w-full" name="role"
                                            id="crud-form-2">
                                            <option disabled selected>- Pilih Tim -</option>
                                            <option value="Mainline">Dede Irfan</option>
                                            <option value="Depo">Muhammad Dani</option>
                                            <option value="DAL">Tio Muhamad</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Pilih Preventive Work</label>
                                        <select data-placeholder="Select line area" class="form-control w-full" name="role"
                                            id="crud-form-2">
                                            <option disabled selected>- Pilih PM -</option>
                                            <option value="Mainline">Track Patrol on Foot</option>
                                            <option value="Depo">TO Examination</option>
                                            <option value="DAL">Cabin Ride</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="crud-form-1" class="form-label mt-2">Periode Pekerjaan</label>
                                        <select data-placeholder="Select line area" class="form-control w-full" name="role"
                                            id="crud-form-2">
                                            <option disabled selected>- Pilih Role -</option>
                                            <option value="Mainline">Tahunan</option>
                                            <option value="Depo">6 Bulanan</option>
                                            <option value="DAL">4 Bulanan</option>
                                            <option value="DAL">3 Bulanan</option>
                                            <option value="DAL">Bulanan</option>
                                        </select>
                                    </div>

                                    <div class="text-right mt-5">
                                        <a href="/pic" class="btn btn-outline-primary w-24 mr-1">Cancel</a>
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
