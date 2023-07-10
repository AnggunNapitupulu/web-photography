@extends('layouts.admin.adminTemplate')
@include('layouts.admin.sidebar')
@include('layouts.admin.navbar')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Orders</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class=" card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Service</th>
                            <th>Order By</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->service->service }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->service_date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <h1 class="h3 mb-2 text-gray-800">Camera Orders</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- @if(session('msg'))
        <div class="card-header">
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        </div>
        @endif -->
        @if(session('msgD'))
        <div class="card-header">
            <div class="alert alert-danger">
                {{ session('msgD') }}
            </div>
        </div>
        @endif
        <div class=" card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Camera</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cameraorders as $co)
                        <tr class="clickable-row" data-toggle="modal" data-target="#detailOrderCamera-{{$co->id}}">
                            <td>{{ $loop->iteration }}</td>
                            <!-- show photo from public -->
                            <td>
                                <img src="{{ asset('images/camera/order/' . $co->photo) }}" alt="{{ $co->photo }}"
                                    width="100" height="100">
                            </td>
                            <td>{{ $co->name }}</td>
                            <td>{{ $co->email }}</td>
                            <td>{{ $co->_camera->camera }}</td>
                        </tr>
                        <!-- Pop Detail Order Camera-->
                        <div class="modal fade" id="detailOrderCamera-{{$co->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Order Camera</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="" action="" method="POST" class="d-none">
                                            @csrf
                                            <!-- show foto center -->
                                            <div class="form-group row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <img src="{{ asset('images/camera/order/' . $co->photo) }}"
                                                        alt="{{ $co->photo }}" width="200" height="200">
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name"
                                                    class="col-md-3 col-form-label text-md-right">Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="name" class="form-control" name="name"
                                                        value="{{ $co->name }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email"
                                                    class="col-md-3 col-form-label text-md-right">Email</label>
                                                <div class="col-md-9">
                                                    <input type="email" id="email" class="form-control" name="email"
                                                        value="{{ $co->email }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone"
                                                    class="col-md-3 col-form-label text-md-right">Phone</label>
                                                <div class="col-md-9">
                                                    <input type="phone" id="phone" class="form-control" name="phone"
                                                        value="{{ $co->phone }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="camera"
                                                    class="col-md-3 col-form-label text-md-right">Camera</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="camera" class="form-control" name="camera"
                                                        value="{{ $co->_camera->camera }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="order date"
                                                    class="col-md-3 col-form-label text-md-right">Order Date</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="order date" class="form-control"
                                                        name="order_date" value="{{ $co->order_date }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="delivery date"
                                                    class="col-md-3 col-form-label text-md-right">Delivery Date</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="delivery date" class="form-control"
                                                        name="delivery_date" value="{{ $co->delivery_date }}" readonly>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('declineOrder', $co->id) }}">
                                            <button class="btn btn-danger" type="button">
                                                <i class="fas fa-times"></i> Decline
                                            </button>
                                        </a>
                                        |
                                        <a href="{{ route('acceptOrder', $co->id) }}">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-check"></i> Accept
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <h1 class="h3 mb-2 text-gray-800">Camera Return</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        @if(session('msg1'))
        <div class="card-header py-3">
            <span class="btn btn-success disabled">
                {{ session('msg1') }}
            </span>
        </div>
        @endif
        @if(session('msg1D'))
        <div class="card-header py-3">
            <span class="btn btn-danger disabled">
                {{ session('msg1D') }}
            </span>
        </div>
        @endif
        <div class=" card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Camera</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($camerareturns as $co)
                        <tr class="clickable-row2" data-toggle="modal" data-target="#detailCameraReturn-{{$co->id}}">
                            <td>{{ $loop->iteration }}</td>
                            <!-- show photo from public -->
                            <td>
                                <img src="{{ asset('images/camera/return/' . $co->photo) }}" alt="{{ $co->photo }}"
                                    width="100" height="100">
                            </td>
                            <td>{{ $co->name }}</td>
                            <td>{{ $co->email }}</td>
                            <td>{{ $co->_camera->camera }}</td>
                        </tr>
                        <!-- Pop Detail Order Camera-->
                        <div class="modal fade" id="detailCameraReturn-{{$co->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Return Camera</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="" action="" method="POST" class="d-none">
                                            @csrf
                                            <!-- show foto center -->
                                            <div class="form-group row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <img src="{{ asset('images/camera/return/' . $co->photo) }}"
                                                        alt="{{ $co->photo }}" width="200" height="200">
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name"
                                                    class="col-md-3 col-form-label text-md-right">Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="name" class="form-control" name="name"
                                                        value="{{ $co->name }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email"
                                                    class="col-md-3 col-form-label text-md-right">Email</label>
                                                <div class="col-md-9">
                                                    <input type="email" id="email" class="form-control" name="email"
                                                        value="{{ $co->email }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone"
                                                    class="col-md-3 col-form-label text-md-right">Phone</label>
                                                <div class="col-md-9">
                                                    <input type="phone" id="phone" class="form-control" name="phone"
                                                        value="{{ $co->phone }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="camera"
                                                    class="col-md-3 col-form-label text-md-right">Camera</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="camera" class="form-control" name="camera"
                                                        value="{{ $co->_camera->camera }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="order date"
                                                    class="col-md-3 col-form-label text-md-right">Order Date</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="order date" class="form-control"
                                                        name="order_date" value="{{ $co->order_date }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="delivery date"
                                                    class="col-md-3 col-form-label text-md-right">Delivery Date</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="delivery date" class="form-control"
                                                        name="delivery_date" value="{{ $co->delivery_date }}" readonly>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('declineReturn', $co->id) }}">
                                            <button class="btn btn-danger" type="button">
                                                <i class="fas fa-times"></i> Decline
                                            </button>
                                        </a>
                                        |
                                        <a href="{{ route('acceptReturn', $co->id) }}">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-check"></i> Accept
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection