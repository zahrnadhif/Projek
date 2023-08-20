@extends('main')
@section('content')

<div class="main-content">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header ps-3 fs-3 fw-semibold text-center">{{ $rejection }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3 ps-3 justify-align-center">
                                <img src="{{ asset('gambarReject/1KJ.jpeg') }}" alt="" style="width:400px; height:400px; ">
                            </div>
                            <div class="col-9 ps-5">
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                permukaan cat terdapat gelombang yang menyerupai kulit jeruk
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">Penyebab</div>
                                            <div class="card-body">
                                                <ul>
                                                    <li>Kekentalan terlalu tinggi</li>
                                                    <li>Lapisan Cat terlalu tebal</li>
                                                    <li>Jarak pengecatan terlalu dekat</li>                         
                                                    <li>Tekanan angin terlalu tinggi</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header bg-success text-white">Solusi</div>
                                            <div class="card-body">
                                                <ul>
                                                    <li>Turunkan Viscositas cat</li>
                                                    <li>Jaga proses aplikasi agar tidak terlalu tebal</li>
                                                    <li>Atur jarak antara spraygun dan bidang yang di cat</li>                         
                                                    <li>Perhatikan tekanan angin yang digunakan</li>
                                                </ul>
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
</div>

<script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>

@endsection