@extends('layouts.app')
@section('content')

@if(auth()->user()->role == 1)
<div class="content-heading">
    <div>
        Dashboard
        <small data-localize="dashboard.WELCOME">Selamat Datang {{auth()->user()->nama}}</small>
    </div>
</div>
@else
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body bg-gray-dark rounded">
                <p>
                    <h1>Selamat Datang</h1>
                    di halaman Sentra Batik <strong style="color: yellow">{{ucwords(auth()->user()->nama)}}</strong style="color: yellow">
                    </p>
                </div>
            </div>
        </div>      
    </div>
    @endif



    <!-- START cards box-->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card flex-row align-items-center align-items-stretch border-0">
                <div class="col-4 d-flex align-items-center bg-primary-dark justify-content-center rounded-left"><em class="fab fa-envira fa-3x"></em></div>
                <div class="col-8 py-3 bg-primary rounded-right">
                    <div class="h2 mt-0">{{ $batik_count }}</div>
                    <div class="text-uppercase">Batik</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12">
            <div class="card flex-row align-items-center align-items-stretch border-0">
                <div class="col-4 d-flex align-items-center bg-green justify-content-center rounded-left">
                    <div class="text-center">
                        <div class="text-sm" data-now="" data-format="MMMM"></div>
                        <br />
                        <div class="h2 mt-0" data-now="" data-format="D"></div>
                    </div>
                </div>
                <div class="col-8 py-3 rounded-right">
                    <div class="text-uppercase" data-now="" data-format="dddd"></div>
                    <br />
                    <div class="h2 mt-0" data-now="" data-format="h:mm"></div>
                    <div class="text-muted text-sm" data-now="" data-format="a"></div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script src="{{ mix('/js/sparkline.js') }}"></script>
    <script src="{{ mix('/js/easypiechart.js') }}"></script>
    <script src="{{ mix('/js/flot.js') }}"></script>
    @endsection
