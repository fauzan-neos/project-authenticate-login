@extends('layouts.main')

@section('container') 
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <main class="form-registration">
                <h1 class="h3 mb-3 font-weight-normal text-center">Registration</h1>
                <form action="/register" method="post">
                    @csrf

                    <input type="text" name="name" id="name" class="form-control rounded-top @error('name') is-invalid @enderror" placeholder="Name" autofocus value="{{ old('name') }}" required>
                    <label for="name" class="sr-only">Name</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                
                    <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}" required>
                    <label for="username" class="sr-only">username</label>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" value="{{ old('email') }}" required>
                    <label for="email" class="sr-only">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                
                    <input type="password" name="password" id="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" placeholder="Password" required>
                    <label for="password" class="sr-only">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                
                    <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-3">Already Registered? <a href="/login">Login</a></small>
            </main>
        </div>
    </div>
@endsection