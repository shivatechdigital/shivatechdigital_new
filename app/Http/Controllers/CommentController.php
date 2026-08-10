<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\BlogPost;
use App\Support\AdminNotifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CommentController extends Controller
{
    /**
     * Store Comment or Reply
     */
    public function store(Request $request, BlogPost $post)
    {
        // Check login
        if (!Auth::check()) {
            return redirect()
                ->route('login')
                ->with('error', 'Please login first.');
        }

        // Validate request
        $validated = $request->validate([
            'comment' => 'required|string|min:3|max:2000',

            'parent_id' => [
                'nullable',
                Rule::exists('comments', 'id')->where(function ($query) use ($post) {
                    $query->where('post_id', $post->id);
                }),
            ],
        ]);

        // Create comment
        $comment = Comment::create([
            'comment'   => $validated['comment'],
            'parent_id' => $validated['parent_id'] ?? null,
            'user_id'   => Auth::id(),
            'post_id'   => $post->id,
        ]);

        $isReply = !empty($comment->parent_id);

        AdminNotifier::notify(
            $isReply ? 'New Reply on Post' : 'New Comment on Post',
            ($isReply ? 'A new reply' : 'A new comment') . ' was posted on "' . $post->title . '".',
            route('admin.comments.index'),
            $isReply ? 'comment_reply_created' : 'comment_created',
            ['post_id' => $post->id, 'comment_id' => $comment->id]
        );

        return back()->with('success', 'Comment posted successfully!');
    }

    /**
     * Delete Comment
     */
    public function destroy(Comment $comment)
    {
        // Only comment owner can delete
        if ($comment->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Delete replies first
        $comment->replies()->delete();

        // Delete main comment
        $comment->delete();

        return back()->with('success', 'Comment deleted successfully!');
    }
}