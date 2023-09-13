@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>All Notes</h2>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="{{ route('dashboard.user.notes.create') }}" class="btn btn-success badge rounded-pill">Add New Notes</a>
    </div>
    <div class="col-lg-3">
        @if(session()->has('delete')) 
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('delete') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif
        @if(session()->has('add')) 
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('add') }}
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
    </div>
    <div class="row">
        @foreach ($notes as $note)
        <div class="col-md-3 m-1">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Title : {{ $note->title }}</h5>
                    <h6 class="card-subtitle mb-2 mt-1 text-body-secondary">Author : {{ $note->author }}<h6>
                    <p class="card-text">{{ $note->notes }}</p>
                    <div class="d-flex justify-content-xxl-start flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                        <a href="{{ route('dashboard.user.notes.edit', [$note->notes]) }}" class="card-link btn btn-primary badge rounded-pill me-2">Edit</a>
                        <form action="{{ route('dashboard.user.notes.delete', [$note->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger badge rounded-pill" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>  
        </div>
        @endforeach
    </div> 
@endsection