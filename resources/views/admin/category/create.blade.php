@extends('admin.layout.master')

@section('sub_title')
    New Category
@endsection

@section('content')
    <form action="{{ route('admin.category.store') }}" method="post" class="row g-3" novalidate>
        @csrf
        <div class="col-md-12">
            <label for="inputCategoryName" class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                   id="inputCategoryName">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection()
