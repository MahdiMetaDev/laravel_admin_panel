<?php

namespace App\Http\services\Product;

use App\Http\Resources\ProductResource;
use App\Http\services\BaseService;
use App\Http\services\Image\ImageService;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class ProductService extends BaseService
{
    public function __construct(Product $product, private readonly ImageService $imageService)
    {
        parent::__construct($product, $this->imageService);
        Log::info('__constructor => ProductService');
    }


    public function index(): Collection
    {
        return Product::orderByDesc('id')->get();
    }


    public function show(Product $product): JsonResource
    {
        return ProductResource::make($product);
    }


    public function store(array $payload = []): Model
    {
        $product = parent::store($payload);

        $this->imageService->imageCreate($payload['image'], $product);

        return $product;
    }


    public function update($model, array $payload): Model
    {
        $product = parent::update($model, $payload);

        $this->imageService->imageUpdate($payload['image'], $product);

        return $product;
    }
}
