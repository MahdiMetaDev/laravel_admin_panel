<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\services\Category\CategoryService;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends ApiBaseController
{
    public function __construct(private readonly CategoryService $categoryService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $categories = $this->categoryService->index();

        return $this->successResponse(CategoryResource::collection($categories));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request): JsonResponse
    {
        $category = $this->categoryService->store($request->validated());
        $data = $this->categoryService->show($category);

        return $this->successResponse($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): JsonResponse
    {
        $data = $this->categoryService->show($category);

        return $this->successResponse($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category): JsonResponse
    {
        $this->categoryService->update($category, $request->validated());
        $data = $this->categoryService->show($category);

        return $this->successResponse($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): JsonResponse
    {
        $this->categoryService->destroy($category);

        return $this->successResponse('دسته بندی مورد نظر با موفقیت پاک شد.');
    }
}
