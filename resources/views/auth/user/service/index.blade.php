@extends('layouts.guestTemplate')
@include('layouts.top-area')
@include('layouts.navbar')
@include('layouts.mobile-area')

@section('content')
<div class="inner-page-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="header-page-title">
                    <h2>Service</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="header-page-locator">
                    <ul>
                        <li><a href="{{route('base')}}">Home /</a> Our Service</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="slider-bottom-area pt-100 pb-90" id="service">
    <div class="section-title">
        <h2>Our <span>Services</span></h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mihi vero, inquit, placet agi
            subtilius et, ut ipse dixisti, pressius.Photograhy HTML is very </p>
    </div>
    <div class="container">
            <div class="total-business">
                @foreach($services as $service)
                <div class="single-business">
                    <h3><a href="{{ route('service.show',\Str::slug($service->service)) }}">{{ $service->service }}</a></h3>
                    <p>{{ $service->description }}</p>
                </div>
                @endforeach
            </div>
    </div>
</div>
@endsection