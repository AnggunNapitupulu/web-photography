@extends('layouts.admin.adminTemplate')
@include('layouts.admin.sidebar')
@include('layouts.admin.navbar')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Add Camera</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-9">
                    <a href="{{ route('camera') }}" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">See Camera</span>
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
            <form action="{{ route('createCamera') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="camera">Camera Name</label>
                    <input type="text" class="form-control" id="camera" value="{{ old('camera') }}" name="camera"
                        placeholder="Camera Name">
                    <!-- catch error validate -->
                    @if($errors->has('camera'))
                    <span class="text-danger ml-3">
                        {{ $errors->first('Camera') }}
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" value="{{ old('price') }}" name="price"
                        placeholder="Price" min="1">
                    <!-- catch error validate -->
                    @if($errors->has('price'))
                    <span class="text-danger ml-3">
                        {{ $errors->first('price') }}
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
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <!-- catch error validate -->
                    @if($errors->has('image'))
                    <span class="text-danger ml-3">
                        {{ $errors->first('image') }}
                    </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection