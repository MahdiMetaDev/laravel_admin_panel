@extends('admin.layout.master')

@section('sub_title')
    Edit Brand
@endsection

@section('content')
    <form action="{{ route('admin.brand.update', $brand->id) }}" method="post" class="row g-3" novalidate
          enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="col-md-12">
            <label for="inputBrandName" class="form-label">Name</label>
            <input type="text" name="name" value="{{ $brand->name }}" class="form-control"
                   id="inputBrandName">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <img src="/{{ $brand->image->url }}" alt="brand_previous_image"
             style="width: 120px; height: 100px; border-radius: 50%">
        <div class="col-md-6">
            <label for="inputBrandFile" class="form-label">Brand Image</label>
            <input type="file" name="image" value="{{ old('image') }}" class="form-control"
                   id="inputBrandFile">
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.brand.index') }}" class="btn btn-danger">Back</a>
        </div>
    </form>
@endsection()
