@extends('adminDashboard.index')

@section('title', 'Reply Comment')

@section('adminDashboard.content')
<style>
    .comment-reply-page {
        --rp-bg: linear-gradient(130deg, #eff6ff 0%, #f8fafc 45%, #eef2ff 100%);
        --rp-surface: rgba(255, 255, 255, 0.86);
        --rp-text: #0f172a;
        --rp-muted: #64748b;
        --rp-border: rgba(148, 163, 184, 0.28);
        --rp-shadow: 0 20px 42px rgba(15, 23, 42, 0.12);
    }

    html[data-theme=dark] .comment-reply-page {
        --rp-bg: radial-gradient(circle at top, #1e293b 0%, #0f172a 48%, #111827 100%);
        --rp-surface: rgba(15, 23, 42, 0.88);
        --rp-text: #e2e8f0;
        --rp-muted: #94a3b8;
        --rp-border: rgba(148, 163, 184, 0.24);
        --rp-shadow: 0 24px 48px rgba(2, 6, 23, 0.55);
    }

    .comment-reply-page {
        background: var(--rp-bg);
        border-radius: 18px;
        padding: 18px;
    }

    .comment-reply-page .reply-card {
        background: var(--rp-surface);
        border: 1px solid var(--rp-border);
        box-shadow: var(--rp-shadow);
        border-radius: 16px;
        backdrop-filter: blur(10px);
    }

    .comment-reply-page .reply-card h3,
    .comment-reply-page .form-label,
    .comment-reply-page .form-control,
    .comment-reply-page .meta-text {
        color: var(--rp-text);
    }

    .comment-reply-page .form-control {
        border-color: var(--rp-border);
        background: rgba(255, 255, 255, 0.88);
        min-height: 44px;
    }

    html[data-theme=dark] .comment-reply-page .form-control {
        background: rgba(30, 41, 59, 0.8);
        border-color: #475569;
        color: #f8fafc;
    }

    .comment-reply-page .text-muted {
        color: var(--rp-muted) !important;
    }

    .original-comment-box {
        border: 1px dashed var(--rp-border);
        border-radius: 12px;
        padding: 12px;
        margin-bottom: 14px;
    }

    .original-comment-text {
        white-space: pre-wrap;
        line-height: 1.45;
    }
</style>

<div class="container-fluid comment-reply-page">
    <div class="row">
        <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="card reply-card">
                <div class="card-header bg-transparent border-0 pb-0 d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Reply to Comment</h3>
                    <a href="{{ route('admin.comments.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
                <div class="card-body pt-3">
                    @php
                        $postTitle = optional($comment->post)->title ?? optional($comment->legacyPost)->title ?? ('Post #' . $comment->post_id);
                    @endphp

                    <div class="original-comment-box">
                        <div class="meta-text fw-semibold mb-1">Post: {{ $postTitle }}</div>
                        <div class="meta-text small mb-1">User: {{ $comment->user->name ?? 'Unknown User' }} ({{ $comment->user->email ?? '-' }})</div>
                        <div class="meta-text small mb-2">Commented: {{ $comment->created_at->format('M d, Y h:i A') }}</div>
                        <div class="original-comment-text">{{ $comment->comment }}</div>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.comments.reply.store', $comment) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Your Reply *</label>
                            <textarea name="comment" rows="6" class="form-control @error('comment') is-invalid @enderror" required>{{ old('comment') }}</textarea>
                            @error('comment')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 flex-wrap">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-reply"></i> Send Reply
                            </button>
                            <a href="{{ route('admin.comments.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
