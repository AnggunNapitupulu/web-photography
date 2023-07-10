@extends('layouts.admin.adminTemplate')
@include('layouts.admin.sidebar')
@include('layouts.admin.navbar')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Users</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        @if($errors->any())
        <div class="card-header py-3">
            <span class="btn btn-danger disabled">
                {{ $errors->first() }}
            </span>
        </div>
        @endif
        @if(session('msg'))
        <div class="card-header py-3">
            <span class="btn btn-success disabled">
                {{ session('msg') }}
            </span>
        </div>
        @endif
        <div class=" card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Nomor Telepon</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <center>
                                    <a style="color: red;" href="#" data-toggle="modal"
                                        data-target="#popUser-{{$user->id}}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </center>
                            </td>
                        </tr>
                        <!-- Pop User-->
                        <div class="modal fade" id="popUser-{{$user->id}}" tabindex="-1" role="dialog"
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
                                                     document.getElementById('pop-user-{{$user->id}}').submit();">Remove</a>
                                        <form id="pop-user-{{$user->id}}" action="{{ route('removeUser',$user->id) }}"
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