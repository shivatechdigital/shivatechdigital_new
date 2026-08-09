<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('search', ''));
        $status = (string) $request->input('status', 'all');
        $sortBy = (string) $request->input('sort_by', 'created');
        $sortOrder = strtolower((string) $request->input('sort_order', 'desc'));
        $allowedPerPage = [10, 20, 50, 100];
        $perPage = (int) $request->input('per_page', 10);

        if (!in_array($perPage, $allowedPerPage, true)) {
            $perPage = 10;
        }

        if (!in_array($sortOrder, ['asc', 'desc'], true)) {
            $sortOrder = 'desc';
        }

        $sortMap = [
            'id' => 'id',
            'user_name' => 'user_id',
            'email' => 'user_id',
            'status' => 'id',
            'created' => 'created_at',
        ];

        if (!array_key_exists($sortBy, $sortMap)) {
            $sortBy = 'created';
        }

        $comments = $this->buildCommentsQuery($search, $status)
            ->orderBy($sortMap[$sortBy], $sortOrder)
            ->paginate($perPage)
            ->appends($request->query());

        return view('adminDashboard.pages.comments.index', compact(
            'comments',
            'search',
            'status',
            'sortBy',
            'sortOrder',
            'perPage'
        ));
    }

    public function approve(Comment $comment)
    {
        $comment->update(['is_approved' => true]);

        return back()->with('success', 'Comment approved successfully');
    }

    public function destroy(Comment $comment)
    {
        $comment->replies()->delete();
        $comment->delete();

        return back()->with('success', 'Comment deleted successfully');
    }

    public function bulkDelete(Request $request)
    {
        $validated = $request->validate([
            'comment_ids' => 'required|array|min:1',
            'comment_ids.*' => 'exists:comments,id',
        ]);

        $comments = Comment::whereIn('id', $validated['comment_ids'])->get();

        foreach ($comments as $comment) {
            $comment->replies()->delete();
            $comment->delete();
        }

        return redirect()->route('admin.comments.index')
            ->with('success', 'Selected comments deleted successfully');
    }

    public function createReply(Comment $comment)
    {
        abort_if($comment->parent_id !== null, 404);

        $comment->load(['user', 'post', 'legacyPost', 'replies.user']);

        return view('adminDashboard.pages.comments.reply-create', compact('comment'));
    }

    public function storeReply(Request $request, Comment $comment)
    {
        abort_if($comment->parent_id !== null, 404);

        $validated = $request->validate([
            'comment' => 'required|string|min:2|max:5000',
        ]);

        Comment::create([
            'post_id' => $comment->post_id,
            'user_id' => Auth::id(),
            'parent_id' => $comment->id,
            'comment' => $validated['comment'],
            'is_approved' => true,
        ]);

        return redirect()->route('admin.comments.index')
            ->with('success', 'Reply added successfully');
    }

    public function editReply(Comment $comment, Comment $reply)
    {
        abort_if($comment->parent_id !== null, 404);
        abort_if((int) $reply->parent_id !== (int) $comment->id, 404);

        $comment->load(['user', 'post', 'legacyPost']);
        $reply->load('user');

        return view('adminDashboard.pages.comments.reply-edit', compact('comment', 'reply'));
    }

    public function updateReply(Request $request, Comment $comment, Comment $reply)
    {
        abort_if($comment->parent_id !== null, 404);
        abort_if((int) $reply->parent_id !== (int) $comment->id, 404);

        $validated = $request->validate([
            'comment' => 'required|string|min:2|max:5000',
        ]);

        $reply->update([
            'comment' => $validated['comment'],
        ]);

        return redirect()->route('admin.comments.index')
            ->with('success', 'Reply updated successfully');
    }

    private function buildCommentsQuery(string $search, string $status)
    {
        $query = Comment::query()
            ->whereNull('parent_id')
            ->with([
                'user',
                'post',
                'legacyPost',
                'replies' => function ($replyQuery) {
                    $replyQuery->latest();
                },
                'replies.user',
            ])
            ->withCount('replies');

        if ($search !== '') {
            $query->where(function ($innerQuery) use ($search) {
                $innerQuery->where('comment', 'like', '%' . $search . '%')
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%');
                    });
            });
        }

        if ($status === 'new') {
            $query->doesntHave('replies');
        } elseif ($status === 'replied') {
            $query->has('replies');
        }

        return $query;
    }
}