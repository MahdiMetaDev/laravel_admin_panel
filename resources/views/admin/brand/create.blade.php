@extends('admin.layout.master')

@section('sub_title')
    New Brand
@endsection

@section('content')
    <form action="{{ route('admin.brand.store') }}" method="post" class="row g-3" novalidate enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <label for="inputBrandName" class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                   id="inputBrandName">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputBrandFile" class="form-label">Brand Image</label>
            <input type="file" name="image" value="{{ old('image') }}" class="form-control"
                   id="inputBrandFile">
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection()
