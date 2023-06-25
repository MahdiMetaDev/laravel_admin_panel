<?php

namespace App\Http\services\Image;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ImageService
{
    public function imageCreate($image, $eloquent): void
    {
        $image_url = $image->store('images');

        // get uploaded image details
        $uploadedImageFileName = $image->getClientOriginalName();
        $uploadedImageFileExtension = $image->getClientOriginalExtension();

        $eloquent->image()->create([
            'name' => $uploadedImageFileName,
            'extension' => '.' . $uploadedImageFileExtension,
            'url' => $image_url,
            'size' => rand(50, 100),
        ]);
    }

    public function imageUpdate($image, $eloquent): void
    {
        if ($image) {
            $image_url = $image->store('images');

            // get uploaded image details
            $uploadedImageFileName = $image->getClientOriginalName();
            $uploadedImageFileExtension = $image->getClientOriginalExtension();

            $eloquent->image()->update([
                'name' => $uploadedImageFileName,
                'extension' => '.' . $uploadedImageFileExtension,
                'url' => $image_url,
                'size' => rand(50, 100),
            ]);
        }
    }
}
