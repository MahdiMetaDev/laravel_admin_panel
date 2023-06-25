@extends('admin.layout.master')

@section('content')
    <form action="{{ route('admin.product.update', $product->id) }}" method="post" class="row g-3"
          enctype="multipart/form-data" novalidate>
        @csrf
        @method('PATCH')
        <div class="col-md-6">
            <label for="inputUserID" class="form-label">User Id</label>
            <input type="number" name="user_id" value="{{ $product->user_id }}" class="form-control"
                   id="inputUserID">
            @error('user_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputBrandID" class="form-label">Brand Id</label>
            <input type="number" name="brand_id" value="{{ $product->brand_id }}" class="form-control"
                   id="inputBrandID">
            @error('brand_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputCategoryID" class="form-label">Category Id</label>
            <input type="number" name="category_id" value="{{ $product->category_id }}" class="form-control"
                   id="inputCategoryID">
            @error('category_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputName" class="form-label">Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control"
                   id="inputName">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        @foreach($product->images as $image)
            <img src="/{{ $image->url }}" alt="product_images"
                 style="width: 120px; height: 100px; border-radius: 50%">
        @endforeach
        <div class="col-md-6">
            <label for="inputImage" class="form-label">Product Image</label>
            <input type="file" name="image" class="form-control" id="inputImage">
        </div>
        <div class="col-12">
            <label for="inputShortDescription" class="form-label">Short_Description</label>
            <input type="text" name="short_description" value="{{ $product->short_description }}" class="form-control"
                   placeholder="product short description" id="inputShortDescription">
            @error('short_description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-12">
            <label for="inputDescription" class="form-label">Description</label>
            <textarea type="text" name="description" class="form-control" id="inputDescription"
                      rows="5">{{ $product->description }}</textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection()
