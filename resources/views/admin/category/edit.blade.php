@extends('admin.layout.master')

@section('sub_title')
    Edit Category
@endsection

@section('content')
    <form action="{{ route('admin.category.update', $category->id) }}" method="post" class="row g-3" novalidate>
        @csrf
        @method('PATCH')
        <div class="col-md-12">
            <label for="inputCategoryName" class="form-label">Name</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control"
                   id="inputCategoryName">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.category.index') }}" class="btn btn-danger">Back</a>
        </div>
    </form>
@endsection()
