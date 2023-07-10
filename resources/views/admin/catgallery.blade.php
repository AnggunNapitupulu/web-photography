@extends('layouts.admin.adminTemplate')
@include('layouts.admin.sidebar')
@include('layouts.admin.navbar')
@section('content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Category Gallery</h1>

    {{-- <div class="card shadow mb-4">
      <div class="card-body py-3">
        <form action="{{ route('catgallery.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="category">Category name</label>
            <input type="text" class="form-control" id="category" value="{{ old('category') }}" name="category"
              placeholder="Category Name">
            <!-- catch error validate -->
            @if ($errors->has('category'))
              <span class="text-danger ml-3">
                {{ $errors->first('category') }}
              </span>
            @endif
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div> --}}

    <div class="card shadow mb-4">
      <div class=" card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $category->category }}</td>
                  <td>{{ $category->created_at }}</td>
                  <td>
                    <center>
                      <a href="{{ route('catgallery.edit', $category->id) }}"><i class="fa fa-pen"></i></a>
                      |
                      <a style="color: red;" href="#" data-toggle="modal"
                        data-target="#popCatGallery-{{ $category->id }}">
                        <i class="fa fa-trash"></i>
                      </a>
                    </center>
                  </td>
                </tr>
                <!-- Pop Gallery-->
                <div class="modal fade" id="popCatGallery-{{ $category->id }}" tabindex="-1" role="dialog"
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
                                                                     document.getElementById('pop-cat-gallery-{{ $category->id }}').submit();">Remove</a>
                        <form id="pop-cat-gallery-{{ $category->id }}"
                          action="{{ route('catgallery.destroy', $category->id) }}" method="POST"
                          class="d-none">
                          @method('delete')
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
