<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\services\Product\ProductService;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends ApiBaseController
{
    public function __construct(private readonly ProductService $productService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $products = $this->productService->index();

        return $this->successResponse(ProductResource::collection($products));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): JsonResponse
    {
        $product = $this->productService->store($request->validated());
        $data = $this->productService->show($product);

        return $this->successResponse(
            $data,
            'محصول مورد نظر با موفقیت ذخیره شد.',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): JsonResponse
    {
        $data = $this->productService->show($product);

        return $this->successResponse($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product): JsonResponse
    {
        $this->productService->update($product, $request->validated());
        $data = $this->productService->show($product);

        return $this->successResponse(
            $data,
            'محصول مورد نظر با موفقیت بروزرسانی شد.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): JsonResponse
    {
        $this->productService->destroy($product);

        return $this->successResponse('محصول مورد نظر با موفقیت پاک شد.');
    }
}
