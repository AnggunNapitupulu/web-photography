@extends('layouts.admin.adminTemplate')
@include('layouts.admin.sidebar')
@include('layouts.admin.navbar')
@section('content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Galleries</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="row">
          <div class="col-md-9">
            <a href="{{ route('gallery.create') }}" class="btn btn-primary btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
              </span>
              <span class="text">Create Gallery</span>
            </a>
          </div>
          <div class="col-lg-3">
            @if ($errors->any())
              <span class="btn btn-danger disabled">
                {{ $errors->first() }}
              </span>
            @endif
            @if (session('msg'))
              <span class=" btn btn-success disabled">
                {{ session('msg') }}
              </span>
            @endif
          </div>
        </div>
      </div>
      <div class=" card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nomor</th>
                <th>Title</th>
                <th>Category</th>
                <th>Image</th>
                <th>Created At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($galleries as $gallery)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $gallery->title }}</td>
                  <td>{{ $gallery->gallery->category }}</td>
                  <td>
                    <center>
                      <img src="{{ $gallery->path_image }}" style="max-width: 100px; max-height: 100px;" alt="image"
                        loading="lazy">
                    </center>
                  </td>
                  <td>{{ $gallery->created_at }}</td>
                  <td>
                    <center>
                      <a href="{{ route('gallery.update', $gallery->id) }}"><i class="fa fa-pen"></i></a>
                      |
                      <a style="color: red;" href="#" data-toggle="modal" data-target="#popGallery-{{ $gallery->id }}">
                        <i class="fa fa-trash"></i>
                      </a>
                    </center>
                  </td>
                </tr>
                <!-- Pop Gallery-->
                <div class="modal fade" id="popGallery-{{ $gallery->id }}" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are you sure</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" href=""
                          onclick="event.preventDefault();
                                                       document.getElementById('pop-gallery-{{ $gallery->id }}').submit();">Remove</a>
                        <form id="pop-gallery-{{ $gallery->id }}" action="{{ route('removeGallery', $gallery->id) }}"
                          method="POST" class="d-none">
                          @csrf
                        </form>
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
