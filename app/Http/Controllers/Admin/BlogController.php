<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Http\services\Blog\BlogService;
use App\Http\services\Like\LikeService;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function __construct(
        private readonly BlogService $blogService,
        private readonly LikeService $likeService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $blogs = $this->blogService->index();

        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $users = User::all();
        $categories = Category::all();

        return view('admin.blog.create', compact(['users', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $this->blogService->store($request->validated());

        return redirect(route('admin.blog.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog): View
    {
        return view('admin.blog.show', [
            'blog' => $blog->load(['user', 'category', 'image', 'comments', 'likes']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog): View
    {
        $users = User::all();
        $categories = Category::all();

        return view('admin.blog.edit', [
            'blog' => $blog,
            'users' => $users,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        $this->blogService->update($blog, $request->validated());

        return redirect(route('admin.blog.show', $blog->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $this->blogService->destroy($blog);

        return redirect(route('admin.blog.index'));
    }

    public function blog_likes(Blog $blog)
    {
        $this->likeService->doLike($blog);

        return redirect(route('admin.blog.show', $blog->id));
    }

    public function blog_dislikes(Blog $blog)
    {
        $this->likeService->doDislike($blog);

        return redirect(route('admin.blog.show', $blog->id));
    }
}
