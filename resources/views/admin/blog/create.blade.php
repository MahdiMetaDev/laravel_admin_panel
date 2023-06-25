@extends('admin.layout.master')

@section('sub_title')
    New Blog
@endsection

@section('content')
    <form action="{{ route('admin.blog.store') }}" method="post" class="row g-3" novalidate enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="inputUserID" class="form-label">User Id</label>
            <input type="number" name="user_id" value="{{ old('user_id') }}" class="form-control"
                   id="inputUserID" max="{{ count($users) }}" min="1">
            @error('user_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputCategoryID" class="form-label">Category Id</label>
            <input type="number" name="category_id" value="{{ old('category_id') }}" class="form-control"
                   id="inputCategoryID" max="{{ count($categories) }}" min="1">
            @error('category_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputName" class="form-label">name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                   placeholder="Enter blog name" id="inputName">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputShortDescription" class="form-label">Short Description</label>
            <input type="text" name="short_description" value="{{ old('short_description') }}" class="form-control"
                   placeholder="blog short description" id="inputShortDescription">
            @error('short_description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-12">
            <label for="inputBlogImage" class="form-label">Blog Image</label>
            <input type="file" name="image" class="form-control"
                   id="inputBlogImage">
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
