<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\services\Comment\CommentService;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function __construct(private readonly CommentService $commentService)
    {
    }

    public function index(): View
    {
        $comments = $this->commentService->index();

        return view('admin.comment.index', compact('comments'));
    }

    public function create(): View
    {
        return view('admin.comment.create');
    }

    public function store(CommentRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['published'] = false;

        if ($data['commentable_type'] == 'blog') {
            $data['commentable_type'] = Blog::class;
        }

        $this->commentService->store($data);

        return redirect(route('admin.comment.index'));
    }

    public function edit(Comment $comment): View
    {
        return view(route('admin.comment.edit', $comment->id));
    }

    public function update(CommentRequest $request, Comment $comment)
    {
        $this->commentService->update($comment, $request->validated());

        return redirect(route('admin.comment.index'));
    }

    public function statusUpdate(Request $request, Comment $comment)
    {
        if ($request->input('recommended') == 'yes') {
            $comment->update([
                'published' => true,
            ]);
        } else {
            $comment->update([
                'published' => false,
            ]);
        }

        return back();
    }
}
