@extends('dashboard.layouts.main')

@section('container') 
    <div class="row mt-3">
        <div class="col-lg-5">
            <main class="form">
                <h1 class="h3 mb-3 font-weight-normal text-center">Update Data</h1>
                <form action="{{ route('dashboard.user.update') }}" method="post">
                    @method('put')
                    @csrf
                    @foreach ($users as $user)
                        <input type="text" name="id" id="id" class="form-control rounded-top @error('id') is-invalid @enderror" placeholder="id" autofocus value="{{ $user->id }}" required hidden>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="name" class="sr-only">Name</label>
                        <input type="text" name="name" id="name" class="form-control rounded-top @error('name') is-invalid @enderror" placeholder="Name" autofocus value="{{ $user->name }}" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    
                        <label for="username" class="sr-only">username</label>
                        <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{ $user->username }}" required>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="email" class="sr-only">Email address</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" value="{{ $user->email }}" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" name="password" id="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" placeholder="Password" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    @endforeach
                    <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Update</button>
                </form>
            </main>
        </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom ">
        <a href="{{ route('dashboard.admin') }}" style="text-decoration: none" class="btn btn-info badge">Back</a>
    </div>
@endsection