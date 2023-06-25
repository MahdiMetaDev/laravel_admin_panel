@extends('admin.layout.master')

@section('content')
    <form action="{{ route('admin.user.update', $user->id) }}"
          method="post" class="row g-3" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PATCH')
        <div class="col-md-6">
            <label for="inputName" class="form-label">Name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                   id="inputName">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputFamily" class="form-label">Family</label>
            <input type="text" name="family" value="{{ $user->family }}" class="form-control"
                   id="inputFamily">
            @error('family')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                   id="inputEmail">
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputPhoneNumber" class="form-label">Phone Number</label>
            <input type="text" name="phone_number" value="{{ $user->phone_number }}" class="form-control"
                   id="inputPhoneNumber">
            @error('phone_number')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        @if($user->image)
            <img src="/{{ $user->image->url }}" alt="user_previous_image"
                 style="width: 120px; height: 100px; border-radius: 50%">
        @endif
        <div class="col-md-6">
            <label for="inputEmail" class="form-label">New User Image</label>
            <input type="file" name="image" class="form-control" id="inputEmail">
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <input type="hidden" value="user" name="role">
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.user.index') }}" class="btn btn-danger">Back</a>
        </div>
    </form>
@endsection()
