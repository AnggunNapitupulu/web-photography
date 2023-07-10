@extends('layouts.guestTemplate')
@include('layouts.top-area')
@include('layouts.navbar')

@section('content')
    <!-- Inner Page Header serction start here -->
    <div class="inner-page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="header-page-title">
                        <h2>{{ $service->service }}</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="header-page-locator">
                        <ul>
                            <li><a href="{{ route('base') }}">Home /</a> {{ $service->service }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Page Header serction end here -->

    <!-- Portfolio Details Start Here -->
    <div class="portfolio-details-area pt-100 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="project-description">
                        <h3>Service Description</h3>
                        <p>Fashion at this time does not depend on everyday life, but more than that, fashion is a
                            lifestyle. For this reason, this fashion service provides a good and correct way of dressing and
                            in accordance with the desired style.</p>
                    </div>
                </div>
                <div class="col-sm col-sm-3 visit-projectss" style="padding-bottom : 20px">
                    <a href="{{ route('user.service.order') }}">Order Service <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
            <div class="related-project">
                <h3>Related Service</h3>
                <div style="float: right;" class="all-service">
                    <a class="btn btn-sm btn-primary" href="{{ route('user.service.index') }}">All Service <i
                            class="fa fa-arrow-right"></i> </a>
                </div>
                <div class="row">
                    <!-- single portfolio start -->
                    @foreach ($relatedServices as $relatedService)
                        <div class="col-lg-4 col-md-6 col-sm-12 mix theme graphics mb-md-30">
                            <div class="container">
                                <div class="single-business">
                                    <h2><a href="javascript:void">{{ $relatedService->service }}</a></h2>
                                    <p>
                                        {{ $relatedService->description }}
                                    </p>
                                </div>
                                <div class="visit-project">
                                    <a href="{{ route('service.show', $relatedService->slug_service) }}">Read More <i
                                            class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- single portfolio end -->
            </div>
        </div>
    </div>
    <!-- Portfolio Details End Here -->
@endsection
