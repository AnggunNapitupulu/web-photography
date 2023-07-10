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
                            <h2>Order Service</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="{{route('base')}}">Home /</a> Order Service</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Inner Page Header serction end here -->

        <!-- Cart Page Start Here -->
        <div class="shipping-area section pt-90">
            <div class="container">
                <div class="form-area">
                    <h3>Billing Pemesanan</h3>
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ \Str::upper(session('success')) }}
                    </div>
                    @endif
                    <form action="{{route('user.service.order.store')}}" id="order-form" method="POST" data-toggle="validator">
                        @csrf
                        <fieldset>
                            @error('service_id')
                                <span style="color:red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Service</label>
                                    <select class="form-control" name="service_id" id="service">
                                        <option value="">Select Service</option>
                                        @foreach($services as $service)
                                            <option value="{{$service->id}}">{{$service->service}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            @error('name')
                                <span style="color:red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Name</label>
                                    <input name="name" type="text" placeholder="John Doe">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            @error('email')
                                <span style="color:red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Email</label>
                                    <input name="email" type="text" placeholder="johndoe@gmail.com">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            @error('phone')
                                <span style="color:red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Phone</label>
                                    <input name="phone" type="text" placeholder="081....">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            @error('service_date')
                                <span style="color:red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Service Date</label>
                                    <input name="service_date" type="date">
                                </div>
                            </div>
                        </fieldset>
                    </form>                                  
                </div>
                <div style="clear: both"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="accordion" id="accordion">
                            <div class="next-step text-center">
                                <button id="submit-order" onclick="event.preventDefault();
                                                        document.getElementById('order-form').submit()">Order Service</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End Here -->

        <!-- Order List Area start -->
            <div class="order-list-area section pt-20">
                <div class="container">
                    <h3>Order History</h3>
                    @if (session('success-delete'))
                    <div class="alert alert-success">
                        {{ \Str::upper(session('success-delete')) }}
                    </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Service</th>
                            <th scope="col">Service Date</th>
                            <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderlists as $orderlist):
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$orderlist->name}}</td>
                                <td>{{$orderlist->email}}</td>
                                <td>{{$orderlist->phone}}</td>
                                <td>{{$orderlist->service->service}}</td>
                                <td>{{$orderlist->service_date}}</td>
                                <td>
                                    <a href="{{route('user.service.order.destroy', $orderlist->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">  
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        <!-- Order List Area end -->

@endsection