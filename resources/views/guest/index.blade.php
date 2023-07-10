@extends('layouts.guestTemplate')
@include('layouts.top-area')
@include('layouts.navbar')
@include('layouts.mobile-area')
@include('guest.home')
@include('guest.gallery')
@include('guest.camera')
@include('guest.photograper')
@include('guest.comment')
@section('content')
    <div class="slider-bottom-area pt-100 pb-90" id="service">
        <div class="section-title">
            <h2>Our <span>Services</span></h2>
            <p>We provide several photography services. You can see a description of the photography services for each
                section below. </p>
        </div>
        <div class="container">
            <div class="slider-bottom">
                <div class="total-business">
                    @foreach ($services as $service)
                        <div class="single-business">
                            <h3><a
                                    href="{{ route('service.show', \Str::slug($service->service)) }}">{{ $service->service }}</a>
                            </h3>
                            <p>{{ $service->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
