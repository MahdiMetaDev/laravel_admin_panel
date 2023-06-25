<?php

namespace App\Http\services\User;

use App\Http\Resources\UserResource;
use App\Http\services\BaseService;
use App\Http\services\Image\ImageService;
use App\Http\services\Profile\ProfileService;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\NoReturn;

class UserService extends BaseService
{
    #[NoReturn] public function __construct(
        User $user,
        private readonly ProfileService $profileService,
        private readonly ImageService $imageService,
    )
    {
        parent::__construct($user);
    }


    public function show(User $user): JsonResource
    {
        return UserResource::make($user);
    }


    public function store(array $payload = []): Model
    {
        $user = parent::store($payload);

//        $this->profileService->store([
//            'user_id' => $user->id,
//            'national_code' => $payload['profile']['national_code'],
//            'education' => $payload['profile']['education']
//        ]);

        $this->imageService->imageCreate($payload['image'], $user);

        return $user;
    }

    public function update($model, array $payload): Model
    {
        $user = parent::update($model, $payload);

        $this->imageService->imageUpdate($payload['image'], $user);

        return $user;
    }

}
