@extends('auth.layout.master')

@section('content')
    <div class="card" style="width: 30rem; padding: 5rem">
        <form action="{{ route('auth.register.store') }}" method="post" class="form-signin" novalidate>
            @csrf
            <img class="mb-4" src="/assets/icons/favicon.ico" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
            <div>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address"
                       value="{{ old('email') }}" required autofocus>
                @error('email')
                <smal class="form-text text-danger">{{ $message }}</smal>
                @enderror
            </div>
            <div>
                <label for="inputName" class="sr-only">Name</label>
                <input type="text" name="name" id="inputName" class="form-control" placeholder="Enter your name..."
                       value="{{ old('name') }}" required autofocus>
                @error('name')
                <smal class="form-text text-danger">{{ $message }}</smal>
                @enderror
            </div>
            <div>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password"
                       value="{{ old('password') }}" required>
                @error('password')
                <smal class="form-text text-danger">{{ $message }}</smal>
                @enderror
            </div>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
                <div>
                    <span>already has an account? <a href="{{ route('auth.login') }}">login</a></span>
                </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
        </form>
    </div>
@endsection()
