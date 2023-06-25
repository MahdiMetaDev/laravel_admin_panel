<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\BrandRequest;
use App\Http\Resources\BrandResource;
use App\Http\services\Brand\BrandService;
use App\Models\Brand;
use Illuminate\Http\JsonResponse;

class BrandController extends ApiBaseController
{
    public function __construct(private readonly BrandService $brandService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $brands = $this->brandService->index();

        return $this->successResponse(BrandResource::collection($brands));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request): JsonResponse
    {
        $brand = $this->brandService->store($request->validated());
        $data = $this->brandService->show($brand);

        return $this->successResponse(
            $data,
            'برند با موفقیت اضافه شد.',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand): JsonResponse
    {
        $data = $this->brandService->show($brand);
        return $this->successResponse($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, Brand $brand): JsonResponse
    {
        $this->brandService->update($brand, $request->validated());
        $data = $this->brandService->show($brand);

        return $this->successResponse($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand): JsonResponse
    {
        $this->brandService->destroy($brand);

        return $this->successResponse('برند مورد نظر با موفقیت پاک شد.');
    }
}
