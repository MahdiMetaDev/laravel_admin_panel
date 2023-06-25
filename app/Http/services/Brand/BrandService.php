<?php

namespace App\Http\services\Brand;

use App\Http\Resources\BrandResource;
use App\Http\services\BaseService;
use App\Http\services\Image\ImageService;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class BrandService extends BaseService
{
    public function __construct(Brand $brand, private readonly ImageService $imageService)
    {
        parent::__construct($brand, $this->imageService);
    }


    public function index(): Collection
    {
        return Brand::orderByDesc('id')->get();
    }


    public function show(Brand $brand): JsonResource
    {
        return BrandResource::make($brand);
    }


    public function store(array $payload = []): Model
    {
        $brand = parent::store($payload);

        $this->imageService->imageCreate($payload['image'], $brand);

        return $brand;
    }


    public function update($model, array $payload): Model
    {
        $brand = parent::update($model, $payload);

        $this->imageService->imageUpdate($payload['image'], $brand);

        return $brand;
    }
}
