@extends('layouts.frontend')

@section('content')
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <picture>
                    <source media="(min-width: 1440px)" srcset="{{ asset('assets/images/slider_01_2000x722.jpg') }}">
                    <source media="(min-width: 768px)" srcset="{{ asset('assets/images/slider_01_1500x542.jpg') }}">
                    <img src="{{ asset('assets/images/slider_01_1000x361.jpg') }}" style="width:auto;" class="d-block w-100">
                </picture>
            </div>
            <div class="carousel-item">
                <picture>
                    <source media="(min-width: 1440px)" srcset="{{ asset('assets/images/slider_02_2000x722.jpg') }}">
                    <source media="(min-width: 768px)" srcset="{{ asset('assets/images/slider_02_1500x542.jpg') }}">
                    <img src="{{ asset('assets/images/slider_02_1000x361.jpg') }}" style="width:auto;" class="d-block w-100">
                </picture>
            </div>
            <div class="carousel-item">
                <picture>
                    <source media="(min-width: 1440px)" srcset="{{ asset('assets/images/slider_03_2000x722.jpg') }}">
                    <source media="(min-width: 768px)" srcset="{{ asset('assets/images/slider_03_1500x542.jpg') }}">
                    <img src="{{ asset('assets/images/slider_03_1000x361.jpg') }}" style="width:auto;" class="d-block w-100">
                </picture>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endsection
