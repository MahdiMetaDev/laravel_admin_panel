<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Http\services\Comment\CommentService;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;

class CommentController extends ApiBaseController
{
    public function __construct(private readonly CommentService $commentService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $comments = $this->commentService->index();

        return $this->successResponse(CommentResource::collection($comments));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request): JsonResponse
    {
        $comment = $this->commentService->store($request->validated());
        $data = $this->commentService->show($comment);

        return $this->successResponse($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment): JsonResponse
    {
        $data = $this->commentService->show($comment);

        return $this->successResponse($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, Comment $comment): JsonResponse
    {
        $this->commentService->update($comment, $request->validated());
        $data = $this->commentService->show($comment);

        return $this->successResponse($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment): JsonResponse
    {
        $this->commentService->destroy($comment);

        return $this->successResponse('کامنت مورد نظر با موفقیت پاک شد.');
    }
}
