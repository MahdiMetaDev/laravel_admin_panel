<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\services\Category\CategoryService;
use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function __construct(private readonly CategoryService $categoryService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = $this->categoryService->index();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $this->categoryService->store($request->validated());

        return redirect(route('admin.category.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): View
    {
        return view('admin.category.show', [
            'category' => $category->load(['products', 'blogs'])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view('admin.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $this->categoryService->update($category, $request->validated());

        return redirect(route('admin.category.show', $category->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->categoryService->destroy($category);

        return redirect(route('admin.category.index'));
    }
}
