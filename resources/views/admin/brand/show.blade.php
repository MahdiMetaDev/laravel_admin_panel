@extends('admin.layout.master')

@section('sub_title')
    Brand Detail Page
@endsection

@section('content')
    <div class="d-flex">
        <div class="col-md-8">
            <h3>Brand Name >> {{ $brand->name }}</h3>
            <p>Brand Id >> {{ $brand->id }}</p>
            <a href="{{ route('admin.brand.index') }}" class="btn btn-secondary">Back To Brands</a>
        </div>

        <div class="col-md-4">
            <img class="float-right"
                 style="width: 300px; height:300px; border-radius: 30%;"
                 src="/{{ $brand->image->url }}" alt="blog_image">
        </div>
    </div>
@endsection()
