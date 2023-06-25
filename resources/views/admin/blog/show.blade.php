@extends('admin.layout.master')

@section('sub_title')
    Blog Detail Page
@endsection

@section('content')
    <div class="d-flex">
        <div class="col-md-8">
            <h3>Blog Name >> {{ $blog->name }}</h3>
            <p>Blog Id >> {{ $blog->id }}</p>
            <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Back To Blogs</a>
            <hr class="col-md-4">
            <p>{{ $blog->description }}</p>
        </div>

        @if($blog->image)
            <div class="col-md-4">
                <img class="float-right"
                     style="width: 300px; height:300px; border-radius: 30%; margin-left: 1rem"
                     src="/{{ $blog->image->url }}" alt="blog_image">
            </div>
        @endif
    </div><br>

    <small class="text-primary">number of likes -> {{ count($blog->likes) }}</small>

    <p>Who has liked this blog?</p>
    @if(!count($blog->likes) == 0)
        <ul class="list-group">
            @foreach($blog->likes as $blog_like)
                <li class="list-group-item">{{ $blog_like->user->name }} has liked this blog</li>
            @endforeach
        </ul>
    @else
        <p class="text-danger">No one has liked this blog yet!</p>
    @endif

    <!-- Comments shown section -->
    <section>
        <div class="container my-5 py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="card text-dark">
                        <div class="card-body p-4">
                            <h4 class="mb-0">Recent comments({{ count($blog->comments) }})</h4>
                            <hr>
                            <br>
                            @if(!count($blog->comments) == 0)
                                @foreach($blog->comments as $blog_comment)
                                    @if($blog_comment->published)
                                        <div class="d-flex flex-start">
                                            <img class="rounded-circle shadow-1-strong me-3"
                                                 src="/{{ auth()->user()->image->url }}" alt="avatar" width="60"
                                                 height="60"/>
                                            <div>
                                                <h4 class="fw-bold mb-1">{{ $blog_comment->user->name }}</h4>
                                                <div class="d-flex align-items-center mb-3">
                                                    <p class="mb-0">
                                                        12:40
                                                        @if($blog_comment->published)
                                                            <span class="badge bg-primary">recommended</span>
                                                        @else
                                                            <span class="badge bg-danger">not recommended</span>
                                                        @endif
                                                    </p>
                                                </div>
                                                <p class="mb-0">
                                                    {{ $blog_comment->body }}
                                                </p>
                                                <hr>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <h4>No comments for this blog yet ...</h4>
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
                <input type="hidden" value="{{$blog->id}}" name="commentable_id">
                <button type="submit" class="btn btn-primary mt-2">
                    comment <i class="bi-arrow-right-circle"></i>
                </button>
            </form>
        </div>
    </div>
@endsection()
