<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\BlogRequest;
use App\Http\Resources\BlogResource;
use App\Http\services\Blog\BlogService;
use App\Models\Blog;
use Illuminate\Http\JsonResponse;

class BlogController extends ApiBaseController
{
    public function __construct(private readonly BlogService $blogService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = $this->blogService->index();

        return $this->successResponse(BlogResource::collection($blogs));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request): JsonResponse
    {
        $blog = $this->blogService->store($request->validated());
        $data = $this->blogService->show($blog);

        return $this->successResponse(
            $data,
            'بلاگ مورد نظر با موفقیت ذخیره شد.',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $data = $this->blogService->show($blog);

        return $this->successResponse($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        $this->blogService->update($blog, $request->validated());
        $data = $this->blogService->show($blog);

        return $this->successResponse($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $this->blogService->destroy($blog);

        return $this->successResponse('بلاگ مورد نظر با موفقیت پاک شد.');
    }
}
