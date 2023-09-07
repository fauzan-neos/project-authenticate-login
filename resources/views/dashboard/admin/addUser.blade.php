@extends('dashboard.layouts.main')

@section('container') 
    <div class="row mt-3">
        <div class="col-lg-5">
            <main class="form">
                <h1 class="h3 mb-3 font-weight-normal text-center">Add New User</h1>
                <form action="{{ route('dashboard.admin.add') }}" method="post">
                    @csrf
                        <label for="name" class="sr-only">Name</label>
                        <input type="text" name="name" id="name" class="form-control rounded-top @error('name') is-invalid @enderror" placeholder="Name" autofocus required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    
                        <label for="username" class="sr-only">username</label>
                        <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" required>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="email" class="sr-only">Email address</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" required>
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

                        <label for="is_admin" class="sr-only">Admin</label>
                        <input type="text" name="is_admin" id="is_admin" class="form-control rounded-bottom @error('is_admin') is-invalid @enderror" required>
                        @error('is_admin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <button class="btn btn-md btn-primary btn-block mt-3" type="submit">Add</button>
                </form>
            </main>
        </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom ">
        <a href="{{ route('dashboard.admin') }}" style="text-decoration: none" class="btn btn-info badge">Back</a>
    </div>
@endsection