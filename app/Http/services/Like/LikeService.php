<?php

namespace App\Http\services\Like;

class LikeService
{
    public function doLike($eloquent): void
    {
        $like = $eloquent->likes()->where('user_id', auth()->user()->id)->first();

        if (!is_null($like)) {
            $like->delete();
        }

        $eloquent->likes()->create([
            'user_id' => auth()->user()->id
        ]);
    }

    public function doDislike($eloquent): void
    {
        $like = $eloquent->likes()->where('user_id', auth()->user()->id)->first();

        if (!is_null($like)) {
            $like->delete();
        }
    }
}
