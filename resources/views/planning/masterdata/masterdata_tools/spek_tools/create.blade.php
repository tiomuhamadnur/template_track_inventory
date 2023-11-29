@extends('planning.masterdata.masterdata_layout.base')

@section('sub-title')
    <title>Add Data Spesifikasi Tools | CPWTM</title>
@endsection

@section('sub-content')
    <h5>Master Data > Data Tools > Data Spesifikasi Tools > Create Data</h5>
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
                            <h4 class="card-title">Form Data Tools</h4>
                            <form>
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Penulis</label>
                                  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Dede Irfan" disabled>
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Tools</label>
                                  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="RIFTEK" disabled>
                                </div>
                                <div class="form-group">
                                  <label for="article">Artikel Spesifikasi</label>
                                  <textarea class="form-control-lg" id="article" rows="6"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="article-image">Masukkan Gambar</label>
                                    <br>
                                    <input type="file" class="form-control-file" id="image" name="[]" multiple>
                                  </div>
                                  <a href="" type='submit' class="btn btn-primary">Submit Artikel Spesifikasi</a>
                              </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

