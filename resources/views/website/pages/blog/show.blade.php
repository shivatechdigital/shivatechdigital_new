@extends('website.index')
@section('title', $post->meta_title ?? $post->title)
@section('meta_title', $post->meta_title ?? $post->title)
@section('meta_description', $post->meta_description ?? Str::limit($post->excerpt, 160))
@section('meta_keywords', $post->meta_keywords)
@section('canonical')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"> 
    <link rel="canonical" href="{{ url('/blog/' . $post->slug) }}" />
@endsection

@push('additional-meta')
<meta property="og:title" content="{{ $post->og_title ?? $post->meta_title ?? $post->title }}">
    <meta property="og:description" content="{{ $post->og_description ?? $post->meta_description ?? Str::limit($post->excerpt, 160) }}">
    <meta property="og:image" content="{{ $post->featured_image ? asset($post->featured_image) : asset('web_assets/img/og-blog.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="{{ $post->title }}">
    <meta name="twitter:image" content="{{ $post->featured_image ? asset($post->featured_image) : asset('web_assets/img/og-blog.jpg') }}">
    <meta property="og:url" content="{{ url('/blog/' . $post->slug) }}">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="Shiva Tech Digital">
    <meta name="twitter:card" content="{{ $post->twitter_card ?? 'summary_large_image' }}">
    <meta name="twitter:title" content="{{ $post->og_title ?? $post->meta_title ?? $post->title }}">
    <meta name="twitter:description" content="{{ $post->og_description ?? $post->meta_description }}">
    <meta name="twitter:image" content="{{ $post->og_image ?? asset('web_assets/img/og-blog.jpg') }}">
@endpush
@section('website.content')
<style>
    .section-heading{
        position:relative;
        margin-bottom:40px;
    }
    
    .section-heading span{
        position:relative;
        z-index:2;
        background:#0f172a;
        padding-right:20px;
    }
    
    .section-heading::after{
        content:'';
        position:absolute;
        left:0;
        top:50%;
        width:100%;
        height:1px;
        background:rgba(255,255,255,.1);
    }
</style>
<div class="container my-5 mt-5" style="color:white; margin-top:105px !important">
    <div class="row">
        <!-- Main Post Content -->
        <div class="col-lg-8">
            <article class="post-single">
                <!-- Featured Image -->
                @if($post->featured_image)
                <div class="post-image mb-4" style="display:flex; align-items:center; justify-content:center;">
                    <img src="{{ Str::startsWith($post->featured_image, 'http') ? $post->featured_image : asset('storage/'.$post->featured_image) }}" class="img-fluid rounded shadow" alt="{{ $post->title }}" loading="lazy" style="width:70% !important">
                </div>
                @endif

                <!-- Post Header -->
                <header class="post-header mb-4">
                    <div class="mb-3">
                        <a href="{{ route('blog.category', $post->category->slug) }}" class="badge bg-primary fs-6 text-decoration-none">
                            {{ $post->category->name }}
                        </a>
                    </div>

                    <h1 class="display-5 fw-bold mb-3">{{ $post->title }}</h1>

                    <div class="post-meta d-flex flex-wrap align-items-center text-muted mb-3 text-white">
                        <div class="me-4 text-white">
                            <i class="fas fa-user"></i> 
                            <strong>{{ $post->user->name }}</strong>
                        </div>
                        <div class="me-4 text-white">
                            <i class="far fa-calendar"></i> 
                            {{ $post->published_at->format('M d, Y') }}
                        </div>
                        <div class="me-4 text-white">
                            <i class="far fa-clock"></i> 
                            {{ $post->reading_time ?? 5 }} min read
                        </div>
                        <div class="text-white">
                            <i class="fas fa-eye"></i> 
                            {{ $post->views }} views
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="post-tags mb-4">
                        @foreach($post->tags as $tag)
                            <a href="{{ route('blog.tag', $tag->slug) }}" class="badge bg-light text-dark text-decoration-none me-1">
                                #{{ $tag->name }}
                            </a>
                        @endforeach
                    </div>

                    <!-- Social Share -->
                    <div class="social-share mb-4">
                        <h6 class="d-inline me-2">Share:</h6>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}" target="_blank" class="btn btn-sm btn-primary">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $post->slug)) }}&text={{ urlencode($post->title) }}" target="_blank" class="btn btn-sm btn-info text-white">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('blog.show', $post->slug)) }}" target="_blank" class="btn btn-sm btn-primary">
                            <i class="fab fa-linkedin-in"></i> LinkedIn
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . route('blog.show', $post->slug)) }}" target="_blank" class="btn btn-sm btn-success">
                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>
                    </div>
                </header>

                <!-- Post Content -->
                <div class="post-content mb-5">
                    {!! $post->content !!}
                </div>

                <!-- Related Posts -->
                @if($relatedPosts->count() > 0)
                <section class="related-posts mb-5">
                    <h3 class="mb-4 section-heading">Related Articles</h3>
                    <div class="row g-4">
                        @foreach($relatedPosts as $related)
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm">
                                @if($related->featured_image)
                                    <img src="{{ Str::startsWith($related->featured_image, 'http') ? $related->featured_image : asset('storage/'.$related->featured_image) }}" class="card-img-top" alt="{{ $related->title }}" style="height: 150px; object-fit: cover;">
                                @endif
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <a href="{{ route('blog.show', $related->slug) }}" class="text-dark text-decoration-none">
                                            {{ Str::limit($related->title, 60) }}
                                        </a>
                                    </h6>
                                    <small class="text-muted">{{ $related->published_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
                @endif
                
                

                <!-- Comments Section -->
                <section class="comments-section mt-5">
                    <h3 class="mb-4">
                        <i class="fas fa-comments"></i> {{ $post->comments_count }}
                    </h3>
                    @if(!auth()->check())
                        @php
                            session(['url.intended' => url()->current()]);
                        @endphp
                    @endif
                    <!-- Comment Form -->
                    @auth
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('comment.store', $post) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Your Comment</label>
                                    <textarea name="comment" rows="4" class="form-control @error('comment') is-invalid @enderror" placeholder="Share your thoughts..." required></textarea>
                                    @error('comment')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane"></i> Post Comment
                                </button>
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="alert alert-info">
                        Please <a href="{{ route('login') }}">login</a> to comment on this post.
                    </div>
                    @endauth

                    <!-- Comments List -->
                    <div class="comments-list">
                        @forelse($post->comments as $comment)
                        <div class="comment-item card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <strong>{{ $comment->user->name }}</strong>
                                        <small class="text-muted ms-2">{{ $comment->created_at->diffForHumans() }}</small>
                                    </div>
                                    @auth
                                    @if($comment->user_id == auth()->id())
                                    <form action="{{ route('comment.destroy', $comment) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this comment?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    @endif
                                    @endauth
                                </div>
                                <p class="mt-2 mb-0">{{ $comment->comment }}</p>

                                <!-- Replies -->
                                @if($comment->replies->count() > 0)
                                <div class="replies ms-4 mt-3">
                                    @foreach($comment->replies as $reply)
                                    <div class="reply-item card bg-light mb-2">
                                        <div class="card-body py-2">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <strong>{{ $reply->user->name }}</strong>
                                                    <small class="text-muted ms-2">{{ $reply->created_at->diffForHumans() }}</small>
                                                </div>
                                                @auth
                                                @if($reply->user_id == auth()->id())
                                                <form action="{{ route('comment.destroy', $reply) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                                @endif
                                                @endauth
                                            </div>
                                            <p class="mt-1 mb-0">{{ $reply->comment }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif

                                <!-- Reply Form -->
                                @auth
                                <button class="btn btn-sm btn-outline-primary mt-2" onclick="toggleReplyForm({{ $comment->id }})">
                                    <i class="fas fa-reply"></i> Reply
                                </button>
                                <div id="reply-form-{{ $comment->id }}" class="reply-form mt-3" style="display: none;">
                                    <form action="{{ route('comment.store', $post) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                        <textarea name="comment" rows="2" class="form-control mb-2" placeholder="Write a reply..." required></textarea>
                                        <button type="submit" class="btn btn-sm btn-primary">Post Reply</button>
                                        <button type="button" class="btn btn-sm btn-secondary" onclick="toggleReplyForm({{ $comment->id }})">Cancel</button>
                                    </form>
                                </div>
                                @endauth
                            </div>
                        </div>
                        @empty
                        <p class="text-white">No comments yet. Be the first to comment!</p>
                        @endforelse
                    </div>
                </section>
            </article>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Author Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-user"></i> About Author</h5>
                </div>
                <div class="card-body text-center">
                    <div class="mb-3">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <span class="fs-2">{{ substr($post->user->name, 0, 1) }}</span>
                        </div>
                    </div>
                    <h5>{{ $post->author_name ?? $post->user->name }}</h5>
                    <p class="text-muted">{{ $post->user->posts->count() }} Posts Published</p>
                </div>
            </div>

            <!-- Popular Posts -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-fire"></i> Popular Posts</h5>
                </div>
                <div class="card-body">
                    @foreach($popularPosts as $popular)
                    <div class="d-flex mb-3 {{ !$loop->last ? 'border-bottom pb-3' : '' }}">
                        @if($popular->featured_image)
                            <img src="{{ Str::startsWith($popular->featured_image, 'http') ? $popular->featured_image : asset('storage/'.$popular->featured_image) }}" class="rounded me-3" alt="{{ $post->title }}" width="60" height="60" style="object-fit: cover;">
                        @endif
                        <div>
                            <a href="{{ route('blog.show', $popular->slug) }}" class="text-dark text-decoration-none">
                                <h6 class="mb-1">{{ Str::limit($popular->title, 50) }}</h6>
                            </a>
                            <small class="text-muted">{{ $popular->views }} views</small>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function toggleReplyForm(commentId) {
    const form = document.getElementById('reply-form-' + commentId);
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
}
</script>

<style>
.post-content {
    font-size: 1.1rem;
    line-height: 1.8;
}
.post-content img {
    max-width: 100%;
    height: auto;
}
.comment-item {
    transition: box-shadow 0.3s ease;
}
.comment-item:hover {
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}
</style>
@endsection