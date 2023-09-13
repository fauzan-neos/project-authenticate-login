
@extends('dashboard.layouts.main')

@section('container') 
    @if ($notes->count())
    <div class="row">
        @foreach ($notes as $note)
        <div class="col-md-3 m-1">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Title : {{ $note->title }}</h5>
                    <h6 class="card-subtitle mb-2 mt-1 text-body-secondary">Author : <a href="{{ route('dashboard.admin.notes.show', [$note->author]) }}">{{ $note->author }}</a><h6>
                    <p class="card-text">{{ $note->notes }}</p>
                    <div class="d-flex justify-content-xxl-start flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
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
    @else
        <p class="text-center fs-3">No Notes Found.</p>
    @endif

    <div class="d-flex mt-3 justify-content-center">
        {{ $notes->links() }}
    </div>
        
@endsection
