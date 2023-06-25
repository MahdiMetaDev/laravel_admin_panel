@extends('auth.layout.master')

@section('content')
    <div class="card" style="width: 30rem; padding: 5rem">
        <form action="{{ route('auth.auth.store') }}" method="post" class="form-signin" novalidate>
            @csrf
            <h1 class="h3 mb-4 font-weight-normal">Sign in as admin</h1>
            <div class="form-group">
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address"
                       value="{{ old('email') }}" required autofocus>
                @error('email')
                <smal class="form-text text-danger">{{ $message }}</smal>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password"
                       value="{{ old('password') }}" required>
                @error('password')
                <smal class="form-text text-danger">{{ $message }}</smal>
                @enderror
            </div>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="remember_me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </div>
@endsection()
