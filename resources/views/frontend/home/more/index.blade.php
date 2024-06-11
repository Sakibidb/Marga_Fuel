@extends('frontend.home.master')

@section('content')
    <div class="row m-4">

        <h2 class="d-flex justify-content-center">

            <p>{{ __('language.more') }}</p>
        </h2>
        <hr>
        <div class="col mb-2">
            <div class="card" style="width: 18rem; background-color: #009C82;">
                <div class="card-img-top d-flex justify-content-center pt-5" style="height: 200px;">
                    <img src="{{ asset('assets/img/car1.png') }}" class="img-fluid" style="width: 50%; height: auto;">
                </div>
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title d-flex justify-content-center"></h5>
                    <p class="card-text d-flex justify-content-center" style="color: white;">
                        <b>{{ __('language.car_wash') }}</b>
                    </p>
                </div>
            </div>
        </div>

        <div class="col mb-2">
            <div class="card" style="width: 18rem; background-color: #009C82;">
                <div class="card-img-top d-flex justify-content-center pt-5" style="height: 200px;">
                    <img src="{{ asset('assets/img/mobil.png') }}" class="img-fluid" style="width: 50%; height: auto;">
                </div>
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title d-flex justify-content-center"></h5>
                    <p class="card-text d-flex justify-content-center" style="color: white;">
                        <b>{{ __('language.lube_oil') }}</b></p>
                </div>
            </div>
        </div>


        <div class="col mb-2">
            <div class="card" style="width: 18rem; background-color: #009C82;">
                <div class="card-img-top d-flex justify-content-center pt-5" style="height: 200px;">
                    <img src="{{ asset('assets/img/tyres.png') }}" class="img-fluid" style="width: 50%; height: auto;">
                </div>
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title d-flex justify-content-center"></h5>
                    <p class="card-text d-flex justify-content-center" style="color: white;">
                        <b>{{ __('language.tyres') }}</b></p>
                </div>
            </div>
        </div>

        <div class="col mb-2">
            <div class="card" style="width: 18rem; background-color: #009C82;">
                <div class="card-img-top d-flex justify-content-center pt-5" style="height: 200px;">
                    <img src="{{ asset('assets/img/service.png') }}" class="img-fluid" style="width: 50%; height: auto;">
                </div>
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title d-flex justify-content-center"></h5>
                    <p class="card-text d-flex justify-content-center" style="color: white;">
                        <b>{{ __('language.services') }}</b></p>
                </div>
            </div>
        </div>

        <div class="col mb-2">
            <div class="card" style="width: 18rem; background-color: #009C82;">
                <div class="card-img-top d-flex justify-content-center pt-5" style="height: 200px;">
                    <img src="{{ asset('assets/img/battery.png') }}" class="img-fluid" style="width: 50%; height: auto;">
                </div>
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title d-flex justify-content-center"></h5>
                    <p class="card-text d-flex justify-content-center" style="color: white;">
                        <b>{{ __('language.battery') }}</b></p>
                </div>
            </div>
        </div>


        <div class="col mb-2">
            <div class="card" style="width: 18rem; background-color: #009C82;">
                <div class="card-img-top d-flex justify-content-center pt-5" style="height: 200px;">
                    <img src="{{ asset('assets/img/car.png') }}" class="img-fluid" style="width: 50%; height: auto;">
                </div>
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title d-flex justify-content-center"></h5>
                    <p class="card-text d-flex justify-content-center" style="color: white;">
                        <b>{{ __('language.inspection') }}</b></p>
                </div>
            </div>
        </div>



    </div>
@endsection
<script></script>
