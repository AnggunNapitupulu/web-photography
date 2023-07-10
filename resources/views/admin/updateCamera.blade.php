@extends('layouts.admin.adminTemplate')
@include('layouts.admin.sidebar')
@include('layouts.admin.navbar')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Camera</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-9">
                    <a href="{{ route('camera') }}" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Back to Camera</span>
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
            <form action="{{ route('updateCamera') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $camera->id }}">
                <div class="form-group">
                    <label for="camera">Camera Name</label>
                    <input type="text" class="form-control" id="camera" value="{{ $camera->camera }}" name="camera"
                        placeholder="Camera Name">
                    <!-- catch error validate -->
                    @if($errors->has('camera'))
                    <span class="text-danger ml-3">
                        {{ $errors->first('camera') }}
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" value="{{ $camera->price }}" name="price"
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
                    <input type="text" class="form-control" id="description" value="{{ $camera->description }}"
                        name="description" placeholder="Description">
                    <!-- catch error validate -->
                    @if($errors->has('description'))
                    <span class="text-danger ml-3">
                        {{ $errors->first('description') }}
                    </span>
                    @endif
                </div>

                <!-- Show image -->
                <div class="form-group">
                    <img src="{{ $camera->photo }}" alt="{{ $camera->camera }}" width="200" height="200">
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
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection