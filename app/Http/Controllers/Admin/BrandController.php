<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\services\Brand\BrandService;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BrandController extends Controller
{
    public function __construct(private readonly BrandService $brandService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $brands = $this->brandService->index();

        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $this->brandService->store($request->validated());

        return redirect(route('admin.brand.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand): View
    {
        return view('admin.brand.show', [
            'brand' => $brand->load(['image', 'products'])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand): View
    {
        return view('admin.brand.edit', ['brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $this->brandService->update($brand, $request->validated());

        return redirect(route('admin.brand.show', $brand->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $this->brandService->destroy($brand);

        return redirect(route('admin.brand.index'));
    }
}
