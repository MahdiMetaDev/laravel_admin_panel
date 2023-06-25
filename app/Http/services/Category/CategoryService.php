<?php

namespace App\Http\services\Category;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class CategoryService
{
    public function index(): Collection
    {
        return Category::orderByDesc('id')->get();
    }


    public function store(array $payload): Category
    {
        return Category::create($payload);
    }


    public function show(Category $category): JsonResource
    {
        return CategoryResource::make($category);
    }


    public function update(Category $category, array $payload): void
    {
        $category->update($payload);
    }


    public function destroy(Category $category): void
    {
        $category->delete();
    }
}
