@php
use Illuminate\Support\Facades\Input;
@endphp
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
                            <h2>Order Camera</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="{{route('base')}}">Home /</a> Order Camera</li>
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
                    <h3>Billing Information</h3>
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ \Str::upper(session('success')) }}
                    </div>
                    @endif
                    <form action="{{route('user.camera.order.store')}}" id="order-form" enctype="multipart/form-data" method="POST" data-toggle="validator">
                        @csrf
                        <fieldset>
                            @error('camera_id')
                                <span style="color:red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Camera</label>
                                    <select class="form-control" name="camera_id" id="service">
                                        <option value="">Select Camera</option>
                                        @foreach($cameras as $camera)
                                            <option value="{{$camera->id}}">{{$camera->camera}}</option>
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
                                    <label>name</label>
                                    <input value="{{old('name')}}" type="text" name="name" id="name" placeholder="John ..." class="form-control" required>
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
                                    <label>email</label>
                                    <input value="{{old('email')}}" type="text" name="email" id="email" placeholder="john@example.com" class="form-control" required>
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
                                    <label>phone</label>
                                    <input value="{{old('phone')}}" type="text" name="phone" id="phone" placeholder="0811....." class="form-control" required>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            @error('photo')
                                <span style="color:red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Photo</label>
                                    <input value="{{old('photo')}}" type="file" name="photo" id="photo" class="form-control" required>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            @error('order_date')
                                <span style="color:red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Order Date</label>
                                    <input value="{{old('order_date')}}" name="order_date" type="date">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            @error('delivery_date')
                                <span style="color:red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Delivery Date</label>
                                    <input value="{{old('delivery_date')}}" name="delivery_date" type="date">
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
                                                        document.getElementById('order-form').submit()">Order Camera</button>
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
                <div id="success-message" class="alert alert-success">
                    
                </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Camera</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Delivery Data</th>
                            <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderCameras as $order)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td><img style="width: 50px; height: 50px;" src="{{asset('images/camera/order/'.$order->photo)}}" alt=""></td>
                                <td>{{$order->name}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->_camera->camera}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->order_date}}</td>
                                <td>{{$order->delivery_date}}</td>
                                <td>
                                    <a href="javascript:void(0)" data-name="{{ $order->_camera->camera }}" class="return-form-btn"  data-bs-target="#modal-return" class="btn btn-sm btn-primary" title="return camera"> <i class="fa fa-share"></i> </a>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        <!-- Order List Area end -->

<!-- Return Form-->
<!-- Cart Page Start Here -->
<div id="block-return-form" class="shipping-area section pt-90">
            <div class="container">
                <div class="form-area">
                    <h3>Billing Information</h3>
                    <form id="return-form" action="{{route('user.camera.order.return')}}" enctype="multipart/form-data" method="POST" data-toggle="validator">
                        <input type="hidden" id="camera" name="camera">
                        <fieldset id="field_name">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>name</label>
                                    <input value="{{old('name')}}" type="text" name="name" id="name" placeholder="John ..." class="form-control" required>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset id="field_email">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>email</label>
                                    <input value="{{old('email')}}" type="text" name="email" id="email" placeholder="john@example.com" class="form-control" required>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset id="field_phone">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>phone</label>
                                    <input value="{{old('phone')}}" type="text" name="phone" id="phone" placeholder="0811....." class="form-control" required>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset id="field_photo2">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Photo</label>
                                    <input value="{{old('photo2')}}" type="file" name="photo2" id="photo2" class="form-control" required>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset id="field_order_date">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Order Date</label>
                                    <input value="{{old('order_date')}}" name="order_date" type="date">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset id="field_delivery_date">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Delivery Date</label>
                                    <input value="{{old('delivery_date')}}" name="delivery_date" type="date">
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
                                <button id="cancel-order-return" style="background:#000000">Close</button>
                                <button id="submit-order-return">Return Back Camera</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End Here -->
<!-- End Return Form -->

<!-- Css -->
<style>
    #block-return-form{
        margin-top: -30px;
        display: none;
    }
    #success-message{
        display: none;
    }
</style>

<!-- script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        $returnForm = $('#block-return-form');
        var $btn_order_return = $('#submit-order-return');
        var $form_order_return = $('#return-form');
        var $success_message = $('#success-message');
        var cnt = 0;
        $('.return-form-btn').click(function(){
            // get atribut data-name from this
            var camera = $(this).attr('data-name');
            $('#camera').val(camera);
            $returnForm.toggle();
            $('html, body').animate({
                scrollTop: $returnForm.offset().top
            }, 1000);
        });

        $btn_order_return.click(function(){
            $form_order_return.submit();
        });

        $form_order_return.submit(function(e){
            e.preventDefault();
            // ajax request header
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            console.log(this);
            $.ajax({
                type: $form_order_return.attr('method'),
                url: $form_order_return.attr('action'),
                data: new FormData(this),
                dataType: 'json',
                processData: false,
                contentType: false,
                beforeSend: function(){
                    $btn_order_return.text('Sending ...');
                    let arr = ['name', 'email', 'phone', 'photo2', 'order_date', 'delivery_date'];
                    if(cnt != 0){
                        cnt = 0;
                        for(let i=0; i<arr.length; i++){
                            let $fieldSet = $('#field_'+arr[i]);
                            let $span = $fieldSet.find('span').first();
                            $span.remove();
                        }
                    }
                },
                success: function (response) {
                    console.log(response);
                    if(response.code == 200){
                        $('#block-return-form').hide();
                        $form_order_return.trigger('reset');
                        $success_message.show();
                        $success_message.html(response.message);
                        setTimeout(function(){
                            location.reload();
                            $success_message.animate({
                                opacity: 0
                            }, 2000, function(){
                                $success_message.hide();
                            });
                        }, 2100);
                    }
                    else if(response.code == 400){
                        cnt = 1;
                        let $errors = response.errors;
                        $.each($errors, function(key, value){
                            let $fiedSet = $('#field_'+key);
                            let HTMLResponse = '<span style="color:red" role="alert">\
                                                    <strong>' + value + '</strong>\
                                                </span>';
                            $fiedSet.append(HTMLResponse);
                        });
                    }
                }
            }).done(function(response){
                $btn_order_return.text('Return Back Camera');
            });
        });
        

        $('#cancel-order-return').click(function(){
            $('#block-return-form').hide();
        });
    });
</script>

@endsection