@extends('admin.layout.master')

@section('sub_title')
    New Product
@endsection

@section('content')
    <form action="{{ route('admin.product.store') }}" method="post" class="row g-3" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="col-md-6">
            <label for="inputUserID" class="form-label">User Id</label>
            <input type="number" name="user_id" value="{{ old('user_id') }}" class="form-control"
                   id="inputUserID">
            @error('user_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputBrandID" class="form-label">Brand Id</label>
            <input type="number" name="brand_id" value="{{ old('brand_id') }}" class="form-control"
                   id="inputBrandID">
            @error('brand_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputCategoryID" class="form-label">Category Id</label>
            <input type="number" name="category_id" value="{{ old('category_id') }}" class="form-control"
                   id="inputCategoryID">
            @error('category_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputName" class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                   placeholder="enter your name" id="inputName">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputImage" class="form-label">Product Image</label>
            <input type="file" name="images[]" class="form-control" id="inputImage" multiple>
        </div>
        <div class="col-12">
            <label for="inputShortDescription" class="form-label">Short_Description</label>
            <input type="text" name="short_description" value="{{ old('short_description') }}" class="form-control"
                   placeholder="product short description" id="inputShortDescription">
            @error('short_description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-12">
            <label for="inputDescription" class="form-label">Description</label>
            <textarea type="text" name="description" class="form-control" id="inputDescription" rows="5">{{ old('description') }}</textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection()
