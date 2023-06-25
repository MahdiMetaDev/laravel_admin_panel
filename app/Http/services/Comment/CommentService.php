<?php

namespace App\Http\services\Comment;

use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class CommentService
{
    public function index(): Collection
    {
        return Comment::orderByDesc('id')->get();
    }


    public function store(array $payload): Comment
    {
        return Comment::create($payload);
    }


    public function show(Comment $comment): JsonResource
    {
        return CommentResource::make($comment);
    }


    public function update(Comment $comment, array $payload): void
    {
        $comment->update($payload);
    }


    public function destroy(Comment $comment): void
    {
        $comment->delete();
    }
}
