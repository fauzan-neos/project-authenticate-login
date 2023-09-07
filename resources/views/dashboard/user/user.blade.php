@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Data User</h2>
    </div>
    <div class="col-lg-3">
        @if(session()->has('update')) 
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif
    </div>
    @foreach ($users as $user)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="/dashboard/user/edit" class="btn btn-warning badge rounded-pill">Update</a>
                        <a href="/dashboard/user/show" class="btn btn-info badge rounded-pill">See Detail</a>
                    </td>
                </tr>
            </tbody>
        </table>
    @endforeach
@endsection