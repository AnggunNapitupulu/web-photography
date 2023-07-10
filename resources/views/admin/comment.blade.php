@extends('layouts.admin.adminTemplate')
@include('layouts.admin.sidebar')
@include('layouts.admin.navbar')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Comments</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        @if(session('msg'))
        <div class="card-header py-3">
            <div class="row">
                <span class="btn btn-success disabled">
                    {{ session('msg') }}
                </span>
            </div>
        </div>
        @endif
        <div class=" card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comments as $comment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->phone }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->subject }}</td>
                            <td>{{ $comment->message }}</td>
                            <td>
                                <center>
                                    <a style="color: red;" href="#" data-toggle="modal"
                                        data-target="#popComment-{{$comment->id}}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </center>
                            </td>
                        </tr>
                        <!-- Pop Comment-->
                        <div class="modal fade" id="popComment-{{$comment->id}}" tabindex="-1" role="dialog"
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
                                        <button class="btn btn-secondary" type="button"
                                            data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-danger" href=""
                                            onclick="event.preventDefault();
                                                     document.getElementById('pop-comment-{{$comment->id}}').submit();">Remove</a>
                                        <form id="pop-comment-{{$comment->id}}"
                                            action="{{ route('removeComment',$comment->id) }}" method="POST"
                                            class="d-none">
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