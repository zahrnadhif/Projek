@extends('main')
@section('content')

<div class="main-content">
    <div class="container-fluid mt-3">
        <div class="row d-flex my-2">
            <div class="col-11">Data Reject</div>
            <div class="col-1 ps-4">
                <select class="js-example-basic-single" name="state">
                    <option value="AL">Alabama</option>
                      ...
                    <option value="WY">Wyoming</option>
                  </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3 ps-3 justify-align-center">
                                <img src="{{ asset('gambarReject/sanding.jpg') }}" alt="" style="width:400px; ">
                            </div>
                            <div class="col-9">
                                <div class="row mb-2">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">Penyebab</div>
                                            <div class="card-body">
                                                <p>rfeigkior</p>
                                                <p>fjwdgmjknf</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-header bg-success text-white">Solusi</div>
                                            <div class="card-body">valkdewojfwd</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>

@endsection