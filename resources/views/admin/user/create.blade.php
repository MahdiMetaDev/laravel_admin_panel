@extends('admin.layout.master')

@section('sub_title')
    New User
@endsection

@section('content')
    <form action="{{ route('admin.user.store') }}" method="post" class="row g-3" novalidate enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="inputName" class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                   placeholder="Enter your name" id="inputName">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputFamily" class="form-label">Family</label>
            <input type="text" name="family" value="{{ old('family') }}" class="form-control"
                   placeholder="Enter your family" id="inputFamily">
            @error('family')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-12">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                   placeholder="enter your email" id="inputEmail">
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputImage" class="form-label">User Image</label>
            <input type="file" name="image" class="form-control" id="inputImage">
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" name="password" value="{{ old('password') }}" class="form-control"
                   placeholder="password" id="inputPassword">
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <input type="hidden" value="user" name="role">
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection()
