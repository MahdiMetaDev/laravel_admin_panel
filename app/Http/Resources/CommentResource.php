<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'comment_for' => $this->commentable_type,
            'comment_title' => $this->title,
            'comment_body' => $this->body,
            'has_permission' => $this->published
        ];
    }
}
