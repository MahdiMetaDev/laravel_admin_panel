@extends('admin.layout.master')

@section('sub_title')
    Category Detail Page
@endsection

@section('content')
    <div class="d-flex">
        <div class="col-md-8">
            <h3>Category Name >> {{ $category->name }}</h3>
            <p>Category Id >> {{ $category->id }}</p>
            <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Back To Categories</a>
        </div>
    </div>
@endsection()
