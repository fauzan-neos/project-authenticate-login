@extends('layouts.main')

@section('container')

{{-- <main class="form-signin">
    <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
    <form>
  
      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
    </form>
</main> --}}
<main class="form-signin">
  <div class="row justify-content-center">
      <div class="col-lg-5">
          @if(session()->has('success')) 
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          @if(session()->has('loginError')) 
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('loginError') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          <h1 class="h3 mb-3 font-weight-normal text-center">Please Login</h1>

          <form action="/login" method="post">
              @csrf

              <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" required autofocus>
              <label for="email" class="sr-only">Email address</label>
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          
              <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
              <label for="password" class="sr-only">Password</label>
              @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          
              <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Sign in</button>
          </form>
          <small class="d-block text-center mt-3">Not Registered? <a href="/register">Register Now!</a></small>
      </div>
  </div>
</main>

@endsection