<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\services\Like\LikeService;
use App\Http\services\Product\ProductService;
use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct(
        private readonly ProductService $productService,
        private readonly LikeService $likeService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = $this->productService->index();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $this->productService->store($request->validated());

        return redirect(route('admin.product.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('admin.product.show', [
            'product' => $product->load(['user', 'category', 'brand', 'images', 'comments', 'likes']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('admin.product.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $this->productService->update($product, $request->validated());

        return redirect(route('admin.product.show', $product->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->productService->destroy($product);

        return redirect(route('admin.product.index'));
    }

    public function product_likes(Product $product)
    {
        $this->likeService->doLike($product);

        return redirect(route('admin.product.show', $product->id));
    }

    public function product_dislikes(Product $product)
    {
        $this->likeService->doDislike($product);

        return redirect(route('admin.product.show', $product->id));
    }
}
