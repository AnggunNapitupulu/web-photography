@extends('layouts.admin.adminTemplate')
@include('layouts.admin.sidebar')
@include('layouts.admin.navbar')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Add Gallery</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-9">
                    <a href="{{ route('gallery') }}" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">See Gallery</span>
                    </a>
                </div>
                <div class="col-lg-3">
                    @if(session('msg'))
                    <span class=" btn btn-success disabled">
                        {{ session('msg') }}
                    </span>
                    @endif
                    @if(session('msgE'))
                    <span class=" btn btn-danger disabled">
                        {{ session('msgE') }}
                    </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body py-3">
            <form action="{{ route('createGallery') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" value="{{ old('title') }}" name="title"
                        placeholder="Title">
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
                        <option value="">-- Select Category --</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
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