@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Data All User</h2>
    </div>
    <div class="col-lg-3">
        @if(session()->has('add')) 
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif
        @if(session()->has('update')) 
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('update') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif
        @if(session()->has('delete')) 
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('delete') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="{{ route('dashboard.admin.create') }}" class="btn btn-success badge rounded-pill">Add New User</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach ($users as $user)
            <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('dashboard.admin.edit', [$user->id]) }}" class="btn btn-warning badge rounded-pill">Update</a>
                        <a href="{{ route('dashboard.admin.show', [$user->id]) }}" class="btn btn-info badge rounded-pill">See Detail</a>
                        <form action="{{ route('dashboard.admin.delete', [$user->id]) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="badge bg-danger border-0 rounded-pill" type="submit">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
        @endforeach
        </table>
@endsection