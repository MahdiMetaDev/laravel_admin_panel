@extends('admin.layout.master')

@section('content')
    <form action="{{ route('admin.blog.update', $blog->id) }}" method="post" class="row g-3" novalidate enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="col-md-6">
            <label for="inputUserID" class="form-label">User Id</label>
            <input type="number" name="user_id" value="{{ $blog->user_id }}" class="form-control"
                   id="inputUserID" max="{{ count($users) }}" min="1">
            @error('user_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputCategoryID" class="form-label">Category Id</label>
            <input type="number" name="category_id" value="{{ $blog->category_id }}" class="form-control"
                   id="inputCategoryID" max="{{ count($categories) }}" min="1">
            @error('category_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputName" class="form-label">name</label>
            <input type="text" name="name" value="{{ $blog->name }}" class="form-control"
                   placeholder="Enter blog name" id="inputName">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputShortDescription" class="form-label">Short Description</label>
            <input type="text" name="short_description" value="{{ $blog->short_description }}" class="form-control"
                   placeholder="blog short description" id="inputShortDescription">
            @error('short_description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <img src="/{{ $blog->image->url }}" alt="blog_previous_image"
             style="width: 120px; height: 100px; border-radius: 50%">
        <div class="col-md-12">
            <label for="inputBlogImage" class="form-label">Blog New Image</label>
            <input type="file" name="image" class="form-control"
                   id="inputBlogImage">
        </div>
        <div class="col-md-12">
            <label for="inputDescription" class="form-label">Description</label>
            <textarea type="text" name="description" class="form-control" id="inputDescription" rows="5">{{ $blog->description }}</textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection()
