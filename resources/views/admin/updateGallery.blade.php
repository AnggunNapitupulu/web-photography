@extends('layouts.admin.adminTemplate')
@include('layouts.admin.sidebar')
@include('layouts.admin.navbar')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Gallery</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-9">
                    <a href="{{ route('gallery') }}" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Back to Gallery</span>
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
            <!-- make form gallery -->
            <form action="{{ route('updateGallery') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $gallery->id }}">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" value="{{ $gallery->title }}" name="title">
                    <!-- catch error validate -->
                    @if($errors->has('title'))
                    <span class="text-danger ml-3">
                        {{ $errors->first('title') }}
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == $gallery->cat_gallery_id) selected
                            @endif>{{ $category->category }}</option>
                        >{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <img src="{{ $gallery->path_image }}" alt="{{ $gallery->title }}" width="200" height="200">
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