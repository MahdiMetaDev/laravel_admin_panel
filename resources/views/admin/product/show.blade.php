@extends('admin.layout.master')

@section('sub_title')
    Product Detail Page
@endsection

@section('content')
    <div class="">
        <div class="d-flex">
            <div class="col-md-8">
                <h3>Product Name >> {{ $product->name }}</h3>
                <p>Product Id >> {{ $product->id }}</p>
                <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Back To Products</a>
            </div>

            <div class="col-md-4">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($product->images as $product_image)
                            <div class="carousel-item active">
                                <img src="/{{ $product_image->url }}" class="d-block w-100" alt="product_image">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <br>

        <small class="text-primary">number of likes -> {{ count($product->likes) }}</small>

        <p>Who has liked this product?</p>
        @if(!count($product->likes) == 0)
            <div class="col-md-6">
                <ul class="list-group">
                    @foreach($product->likes as $product_like)
                        <li class="list-group-item">{{ $product_like->user->name }} has liked this product</li>
                    @endforeach
                </ul>
            </div>
        @else
            <p class="text-danger">No one has liked this product yet!</p>
        @endif

        <!-- Comments shown section -->
        <section>
            <div class="container my-5 py-5">
                <div class="row d-flex justify-content-center my-4">
                    <div class="col-md-8">
                        <div class="card text-dark">
                            <div class="card-body p-4">
                                <h4 class="mb-0">Recent comments({{ count($product->comments) }})</h4>
                                <hr>
                                <br>
                                @if(!count($product->comments) == 0)
                                    @foreach($product->comments as $product_comment)
                                        @if($product_comment->published)
                                            <div class="d-flex flex-start">
                                                <img class="rounded-circle shadow-1-strong me-3"
                                                     src="/{{ auth()->user()->image->url }}" alt="avatar" width="60"
                                                     height="60"/>
                                                <div>
                                                    <h4 class="fw-bold mb-1">{{ $product_comment->user->name }}</h4>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <p class="mb-0">
                                                            12:40
                                                            @if($product_comment->published)
                                                                <span class="badge bg-primary">recommended</span>
                                                            @else
                                                                <span class="badge bg-danger">not recommended</span>
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <p class="mb-0">
                                                        {{ $product_comment->body }}
                                                    </p>
                                                    <hr>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <h4>No comments for this product yet ...</h4>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Add comments section -->
        <div class="d-flex justify-content-center">
            <div class="card shadow my-3 p-5 w-sm-75 w-100">
                <form action="{{ route('admin.comment.store') }}" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <input type="text" name="title" value="{{ old('title') }}"
                               class="form-control" placeholder="comment title">
                        @error('title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                    <textarea name="body" class="form-control" placeholder="comment body"
                              rows="5" cols="10">{{ old('body') }}</textarea>
                        @error('body')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <input type="hidden" value="blog" name="commentable_type">
                    <input type="hidden" value="{{$product->id}}" name="commentable_id">
                    <button type="submit" class="btn btn-primary mt-2">
                        comment <i class="bi-arrow-right-circle"></i>
                    </button>
                </form>
            </div>
        </div>
@endsection()
