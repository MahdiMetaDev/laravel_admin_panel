<?php

namespace App\Http\services\Blog;

use App\Http\Resources\BlogResource;
use App\Http\services\BaseService;
use App\Http\services\Image\ImageService;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class BlogService extends BaseService
{
    public function __construct(Blog $blog, private readonly ImageService $imageService)
    {
        parent::__construct($blog, $this->imageService);
        Log::info('__constructor => BlogService');
    }

    public function index(): Collection
    {
        return Blog::orderByDesc('id')->get();
    }


    public function show(Blog $blog): JsonResource
    {
        return BlogResource::make($blog);
    }


    public function store(array $payload = []): Model
    {
        $blog = parent::store($payload);

        $this->imageService->imageCreate($payload['image'], $blog);

        return $blog;
    }


    public function update($model, array $payload): Model
    {
        $blog = parent::update($model, $payload);

        $this->imageService->imageUpdate($payload['image'], $blog);

        return $blog;
    }

}
