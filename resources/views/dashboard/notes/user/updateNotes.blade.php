@extends('dashboard.layouts.main')

@section('container') 
    <div class="row mt-3">
        <div class="col-lg-5">
            <main class="form">
                @foreach ($notes as $note)
                <h1 class="h3 mb-3 font-weight-normal text-center">Edit Notes</h1>
                <form action="{{ route('dashboard.user.notes.update', [$note->notes]) }}" method="post">
                    @method('put')
                    @csrf
                        <div class="input-group">
                            <span class="input-group-text">Author</span>
                            <input type="text" name="author" id="author" class="form-control rounded-top @error('author') is-invalid @enderror" value="{{ $note->author }}" placeholder="author" autofocus required readonly>
                            @error('author')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    
                        <div class="input-group mt-3">
                            <span class="input-group-text">Title</span>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="title" value="{{ $note->title }}" required>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="input-group mt-3">
                            <span class="input-group-text">Notes</span>
                            <textarea class="form-control" name="notes" id="notes" aria-label="With textarea"></textarea>
                            @error('notes')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button class="btn btn-md btn-primary btn-block mt-3" type="submit">Edit Note</button>
                    </form>
                    @endforeach
                </main>
            </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom ">
        <a href="{{ route('dashboard.user.notes') }}" style="text-decoration: none" class="btn btn-info badge">Back</a>
    </div>
@endsection