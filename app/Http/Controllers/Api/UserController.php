<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Http\services\User\UserService;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class UserController extends ApiBaseController
{
    public function __construct(private readonly UserService $userService)
    {
        Log::info('__constructor => UserController');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::first();
        $role_ids = Role::pluck('id');
        $user->roles()->syncWithPivotValues($role_ids, ['date' => '2023-12-10']);

        return $user->load('roles');

//        $users = $this->userService->index();

//        return $this->successResponse(UserResource::collection($users));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): JsonResponse
    {
        $user = $this->userService->store($request->validated());

        return $this->successResponse(
            UserResource::make($user),
            'کاربر مورد نظر با موفقیت ذخیره شد',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): JsonResponse
    {
        $data = $this->userService->show($user);

        return $this->successResponse($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user): JsonResponse
    {
        $this->userService->update($user, $request->validated());

        return $this->successResponse(
            UserResource::make($user),
            'کاربر مورد نظر با موفقیت بروزرسانی شد.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): JsonResponse
    {
        $this->userService->destroy($user);

        return $this->successResponse('کاربر مورد نظر پاک شد.');
    }
}
