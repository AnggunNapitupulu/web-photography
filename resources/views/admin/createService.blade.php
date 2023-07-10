@extends('layouts.admin.adminTemplate')
@include('layouts.admin.sidebar')
@include('layouts.admin.navbar')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Add Service</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-9">
                    <a href="{{ route('service') }}" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">See Service</span>
                    </a>
                </div>
                <div class="col-lg-3">
                    @if(session('msg'))
                    <span class=" btn btn-success disabled">
                        {{ session('msg') }}
                    </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body py-3">
            <form action="{{ route('createService') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="service">Service</label>
                    <input type="text" class="form-control" id="service" value="{{ old('service') }}" name="service"
                        placeholder="Service">
                    <!-- catch error validate -->
                    @if($errors->has('service'))
                    <span class="text-danger ml-3">
                        {{ $errors->first('service') }}
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" value="{{ old('description') }}"
                        name="description" placeholder="Description">
                    <!-- catch error validate -->
                    @if($errors->has('description'))
                    <span class="text-danger ml-3">
                        {{ $errors->first('description') }}
                    </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection