@extends('admin.layout.master')

@section('sub_title')
    User Detail Page
@endsection

@section('content')

    <div class="d-flex">
        <div class="col-md-8">
            <h3>User Name >> {{ $user->name }}</h3>
            <p>User Id >> {{ $user->id }}</p>
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Back To Users</a>
        </div>

        @if($user->image)
            <div class="col-md-4">
                <img class="float-right"
                     style="width: 300px; height:300px; border-radius: 30%;"
                     src="/{{ $user->image->url }}" alt="user_image">
            </div>
        @endif
    </div>

    <div class="card card-default my-5">
        <div class="card-header alert alert-danger">
            List of Products ({{ $user->name }}) registered
        </div>

        <ul class="list-group">
            <div class="card-body">
                @foreach($user->products as $product)
                    <li class="list-group-item">{{ $product->name }}</li>
                @endforeach
            </div>
        </ul>
    </div>

    <div class="card card-default my-5">
        <div class="card-header alert alert-info">
            List of Blogs ({{ $user->name }}) registered
        </div>

        <ul class="list-group">
            <div class="card-body">
                @foreach($user->blogs as $blog)
                    <li class="list-group-item">{{ $blog->name }}</li>
                @endforeach
            </div>
        </ul>
    </div>
@endsection()
