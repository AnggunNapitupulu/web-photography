@extends('layouts.guestTemplate')
@include('layouts.top-area')
@include('layouts.navbar')

@section('camera')
    <div class="inner-page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="header-page-title">
                        <h2>Camera</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="header-page-locator">
                        <ul>
                            <li><a href="{{ route('base') }}">Home /</a> Our Camera</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-page-area pt-100 pb-100" id="camera">
        <div class="container">
            <div class="row">
                @foreach ($cameras as $camera)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                        <div class="single-blog-slide">
                            <div class="images">
                                @php
                                    $day = date('d', strtotime($camera->created_at));
                                    $month = date('M', strtotime($camera->created_at));
                                @endphp
                                <a href="javascript:void(0)"><img
                                        src="{{ asset('assets/images/camera/' . $camera->photo) }}" alt=""
                                        loading="lazy"></a>
                                <span>{{ $day }} <br />{{ $month }}</span>
                                <div class="overley">
                                    <ul>
                                        <li><a class="image-popup"
                                                href="{{ asset('assets/images/camera/' . $camera->photo) }}"><i
                                                    class="fa fa-search"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-informations">
                                <div class="blog-details">
                                    <h3><a href="javascript:void(0)">{{ $camera->camera }}</a></h3>
                                    <p>{{ $camera->description }}</p>
                                    <H4>{{ $camera->price }}</H4>

                                    <div class="read-more">
                                        <a href="{{ route('user.camera.order') }}">Order</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
