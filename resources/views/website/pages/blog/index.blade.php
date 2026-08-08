@extends('website.index')
{{-- 🔥 SEO SLUG - This loads meta from service_meta table --}}
@section('seo_slug', 'blog')
@section('website.content')
<!-- Hero Section with Gradient -->

<style>
    .hero-section{
        min-height: auto !important;
        padding-top: 7rem !important;
    }
    .hero-section {
        background: linear-gradient(-45deg,#0f172a,#1e3a8a,#1e40af,#0369a1);
        background-size: 400% 400%;
        animation: gradientMove 12s ease infinite;
    }
    
    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    
    .btn-primary{
        background:linear-gradient(135deg,#2563eb,#1d4ed8);
        border:none;
        border-radius:14px;
        padding:12px 24px;
        font-weight:600;
        transition:.3s;
    }
    
    .btn-primary:hover{
        transform:translateY(-3px);
        box-shadow:0 10px 30px rgba(37,99,235,.5);
    }
    /* ========================================
       PAGINATION STYLING
    ======================================== */
    
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 50px;
    }
    
    .pagination {
        display: flex !important;
        align-items: center;
        justify-content: center;
        gap: 10px;
        flex-wrap: wrap;
        padding: 0;
        margin: 0;
        list-style: none;
    }
    
    .pagination li {
        list-style: none;
    }
    
    .pagination .page-link,
    .pagination li a,
    .pagination li span {
        width: 45px;
        height: 45px;
        border-radius: 12px !important;
        border: 1px solid rgba(255,255,255,0.08);
        background: #ffffff;
        color: #1f2937;
        display: flex !important;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-weight: 600;
        transition: all .3s ease;
        box-shadow: 0 4px 12px rgba(0,0,0,.08);
    }
    
    .pagination li a:hover,
    .pagination .page-link:hover {
        background: linear-gradient(135deg,#2563eb,#1d4ed8);
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(37,99,235,.35);
    }
    
    .pagination .active span,
    .pagination .active .page-link {
        background: linear-gradient(135deg,#2563eb,#1d4ed8);
        color: #fff;
        border-color: transparent;
        box-shadow: 0 10px 25px rgba(37,99,235,.35);
    }
    
    .pagination .disabled span {
        opacity: .5;
        cursor: not-allowed;
    }
    
    .pagination svg {
        width: 18px !important;
        height: 18px !important;
        max-width: 18px !important;
        max-height: 18px !important;
    }
    
    /* Fix giant arrows issue */
    svg.w-5,
    svg.h-5,
    svg.w-4,
    svg.h-4 {
        width: 18px !important;
        height: 18px !important;
    }
    .pagination-wrapper .text-muted{
        color: white !important;
    }
    .pagination-wrapper nav{
        width: 100%;
    }
    /* Mobile */
    @media (max-width: 768px) {
        .pagination .page-link,
        .pagination li a,
        .pagination li span {
            width: 40px;
            height: 40px;
            font-size: 14px;
        }
    }
</style>
<section class="hero-section position-relative overflow-hidden py-5" style="color:white">
    <div class="hero-bg"></div>
    <!-- Tech grid overlay -->
    <div class="hero-grid-overlay"></div>
    <div class="container position-relative" style="z-index: 1; margin-top:30px;">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <!-- Label badge -->
                <div class="hero-label mb-3 animate-fade-in">
                    <span><i class="fas fa-code me-2"></i>Tech Insights & Resources</span>
                </div>
                <h1 class="display-3 fw-bold text-white mb-3 animate-fade-in">
                    Expert Knowledge.<br><span class="hero-highlight">Real Solutions.</span>
                </h1>
                <p class="lead text-white-50 mb-4" style="max-width:520px; margin:0 auto;">
                    In-depth articles on web development, digital strategy &amp; technology from our engineering team.
                </p>
                
                <!-- Search Bar -->
                <form action="{{ route('blog.index') }}" method="GET" class="mt-4">
                    <div class="search-wrapper mx-auto" style="max-width: 580px;">
                        <div class="input-group input-group-lg shadow-lg hero-search">
                            <span class="input-group-text bg-white border-0" style="border-radius:14px 0 0 14px;">
                                <i class="fas fa-search" style="color:#2563eb;"></i>
                            </span>
                            <input type="text" name="search" class="form-control border-0" 
                                   placeholder="Search articles, topics, tutorials..." 
                                   value="{{ request('search') }}">
                            <button class="btn btn-primary px-4" type="submit" style="border-radius:0 14px 14px 0;">
                                Search
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Stats -->
                <div class="row mt-5">
                    <div class="col-md-4">
                        <div class="hero-stat">
                            <h3 class="fw-bold text-white">{{ \App\Models\BlogPost::published()->count() }}+</h3>
                            <p class="text-white-50 mb-0 small">Articles Published</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="hero-stat hero-stat-border">
                            <h3 class="fw-bold text-white">{{ \App\Models\Category::count() }}+</h3>
                            <p class="text-white-50 mb-0 small">Tech Categories</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="hero-stat">
                            <h3 class="fw-bold text-white">{{ \App\Models\User::count() }}+</h3>
                            <p class="text-white-50 mb-0 small">Expert Authors</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container my-5">
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Active Filters Display -->
            @if(request()->hasAny(['search', 'category', 'tag', 'month', 'author']))
            <div class="active-filters mb-4">
                <div class="d-flex align-items-center flex-wrap gap-2">
                    <span class="text-muted">
                        <i class="fas fa-filter"></i> Active Filters:
                    </span>
                    
                    @if(request('search'))
                    <span class="badge bg-primary">
                        Search: {{ request('search') }}
                        <a href="{{ route('blog.index') }}" class="text-white ms-1">×</a>
                    </span>
                    @endif

                    @if(request('category'))
                    <span class="badge bg-info">
                        Category: {{ request('category') }}
                        <a href="{{ route('blog.index') }}" class="text-white ms-1">×</a>
                    </span>
                    @endif

                    @if(request('month'))
                    <span class="badge bg-success">
                        Archive: {{ DateTime::createFromFormat('!m', request('month'))->format('F') }} {{ request('year') }}
                        <a href="{{ route('blog.index') }}" class="text-white ms-1">×</a>
                    </span>
                    @endif

                    <a href="{{ route('blog.index') }}" class="btn btn-sm btn-outline-danger">
                        Clear All
                    </a>
                </div>
            </div>
            @endif

            <!-- Category Pills -->
            <div class="category-filter mb-4">
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <a href="{{ route('blog.index') }}" 
                       class="category-pill {{ !request('category') ? 'active' : '' }}">
                        <i class="fas fa-th-large"></i> All Posts
                    </a>
                    @foreach($categories->take(6) as $category)
                    <a href="{{ route('blog.index', ['category' => $category->slug]) }}" 
                       class="category-pill {{ request('category') == $category->slug ? 'active' : '' }}">
                        {{ $category->name }}
                        <span class="badge">{{ $category->published_posts_count }}</span>
                    </a>
                    @endforeach
                </div>
            </div>

            <!-- Results Count -->
            <div class="results-info mb-3">
                <p class="text-muted">
                    <i class="fas fa-list"></i> 
                    Showing {{ $posts->firstItem() ?? 0 }} - {{ $posts->lastItem() ?? 0 }} 
                    of {{ $posts->total() }} results
                </p>
            </div>

            <!-- Blog Posts Grid -->
            <div class="row g-4">
                @forelse($posts as $post)
                <div class="col-md-6">
                    <article class="blog-card h-100">
                        <div class="blog-card-image">
                            @if($post->featured_image)
                                <img src="{{ Str::startsWith($post->featured_image, 'http') ? $post->featured_image : asset('storage/'.$post->featured_image) }}" alt="{{ $post->title }}">
                            @else
                                <div class="placeholder-image">
                                    <i class="fas fa-image fa-3x"></i>
                                </div>
                            @endif
                            <div class="blog-card-overlay">
                                <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-light btn-sm">
                                    <i class="fas fa-arrow-right"></i> Read More
                                </a>
                            </div>
                        </div>
                        
                        <div class="blog-card-body">
                            <div class="blog-card-meta mb-2">
                                <a href="{{ route('blog.category', $post->category->slug) }}" 
                                   class="category-badge">
                                    {{ $post->category->name }}
                                </a>
                                <span class="read-time">
                                    <i class="far fa-clock"></i> {{ $post->read_time }} min
                                </span>
                            </div>

                            <h4 class="blog-card-title">
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h4>
                            
                            <p class="blog-card-excerpt">
                                {{ Str::limit($post->excerpt ?? strip_tags($post->content), 120) }}
                            </p>

                            <div class="blog-card-footer">
                                <div class="author-info">
                                    <div class="author-avatar">
                                        {{ substr($post->user->name, 0, 1) }}
                                    </div>
                                    <div class="author-details">
                                        <div class="author-name">{{ $post->user->name }}</div>
                                        <div class="post-date">{{ $post->published_at->format('M d, Y') }}</div>
                                    </div>
                                </div>
                                <div class="post-stats">
                                    <span class="stat-item">
                                        <i class="fas fa-eye"></i> {{ $post->views }}
                                    </span>
                                    <span class="stat-item">
                                        <i class="fas fa-comments"></i> {{ $post->comments_count }}
                                    </span>
                                </div>
                            </div>

                            @if($post->tags->count() > 0)
                            <div class="blog-card-tags mt-3">
                                @foreach($post->tags->take(3) as $tag)
                                <a href="{{ route('blog.tag', $tag->slug) }}" class="tag-badge">
                                    #{{ $tag->name }}
                                </a>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </article>
                </div>
                @empty
                <div class="col-12">
                    <div class="empty-state text-center py-5">
                        <i class="fas fa-inbox fa-4x text-muted mb-3"></i>
                        <h4>No posts found</h4>
                        <p class="text-muted">Try adjusting your search or filter criteria</p>
                        <a href="{{ route('blog.index') }}" class="btn btn-primary mt-3">
                            <i class="fas fa-home"></i> View All Posts
                        </a>
                    </div>
                </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            @if($posts->hasPages())
            <div class="pagination-wrapper mt-5">
                {{ $posts->appends(request()->query())->links() }}
            </div>
            @endif
        </div>

        <!-- Enhanced Sidebar -->
        <div class="col-lg-4">
            <div class="sidebar-sticky">
                
                <!-- Newsletter Widget -->
                <div class="sidebar-widget newsletter-widget mb-4">
                    <div class="widget-header">
                        <i class="fas fa-envelope"></i>
                        <h5>Newsletter</h5>
                    </div>
                    <div class="widget-body">
                        <p class="mb-3">Subscribe to get latest articles directly in your inbox</p>
                        <form>
                            <div class="mb-2">
                                <input type="email" class="form-control" placeholder="Your email address">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-paper-plane"></i> Subscribe
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Monthly Archives Widget -->
                <div class="sidebar-widget mb-4">
                    <div class="widget-header">
                        <i class="fas fa-calendar-alt"></i>
                        <h5>Archives</h5>
                    </div>
                    <div class="widget-body">
                        <ul class="archive-list">
                            @foreach($archives as $archive)
                            <li>
                                <a href="{{ route('blog.index', ['month' => $archive->month, 'year' => $archive->year]) }}"
                                   class="{{ request('month') == $archive->month && request('year') == $archive->year ? 'active' : '' }}">
                                    <i class="far fa-folder-open"></i>
                                    <span>
                                        {{ DateTime::createFromFormat('!m', $archive->month)->format('F') }} 
                                        {{ $archive->year }}
                                    </span>
                                    <span class="count">{{ $archive->count }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="sidebar-widget mb-4">
                    <div class="widget-header">
                        <i class="fas fa-folder"></i>
                        <h5>Categories</h5>
                    </div>
                    <div class="widget-body">
                        <ul class="category-list">
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ route('blog.category', $category->slug) }}">
                                    <span class="category-icon">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                    <span class="category-name">{{ $category->name }}</span>
                                    <span class="category-count">{{ $category->published_posts_count }}</span>
                                </a>
                                <div class="category-progress">
                                    <div class="progress-bar" style="width: {{ $posts->total() > 0 ? ($category->published_posts_count / $posts->total()) * 100 : 0 }}%"></div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Popular Posts Widget -->
                <div class="sidebar-widget mb-4">
                    <div class="widget-header">
                        <i class="fas fa-fire"></i>
                        <h5>Popular Posts</h5>
                    </div>
                    <div class="widget-body">
                        @foreach($popularPosts as $index => $popular)
                        <div class="popular-post-item">
                            <div class="post-number">{{ $index + 1 }}</div>
                            <div class="post-thumbnail">
                                @if($popular->featured_image)
                                    <img src="{{ Str::startsWith($popular->featured_image, 'http') ? $popular->featured_image : asset('storage/'.$popular->featured_image) }}" alt="{{ $popular->title }}">
                                @else
                                    <div class="thumbnail-placeholder">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="post-details">
                                <a href="{{ route('blog.show', $popular->slug) }}" class="post-title">
                                    {{ Str::limit($popular->title, 50) }}
                                </a>
                                <div class="post-meta">
                                    <span><i class="fas fa-eye"></i> {{ $popular->views }}</span>
                                    <span><i class="far fa-calendar"></i> {{ $popular->published_at->format('M d') }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Recent Posts Widget -->
                <div class="sidebar-widget mb-4">
                    <div class="widget-header">
                        <i class="fas fa-clock"></i>
                        <h5>Recent Posts</h5>
                    </div>
                    <div class="widget-body">
                        @foreach($recentPosts as $recent)
                        <div class="recent-post-item">
                            <div class="post-thumbnail-small">
                                @if($recent->featured_image)
                                    <img src="{{ Str::startsWith($recent->featured_image, 'http') ? $recent->featured_image : asset('storage/'.$recent->featured_image) }}" alt="{{ $recent->title }}">
                                @else
                                    <div class="thumbnail-placeholder-small">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="post-details-small">
                                <a href="{{ route('blog.show', $recent->slug) }}">
                                    {{ Str::limit($recent->title, 60) }}
                                </a>
                                <div class="post-date-small">
                                    <i class="far fa-clock"></i> {{ $recent->published_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Top Authors Widget -->
                <div class="sidebar-widget mb-4">
                    <div class="widget-header">
                        <i class="fas fa-users"></i>
                        <h5>Top Authors</h5>
                    </div>
                    <div class="widget-body">
                        @foreach($topAuthors as $author)
                        <div class="author-item">
                            <div class="author-avatar-large">
                                {{ substr($author->name, 0, 1) }}
                            </div>
                            <div class="author-info-detail">
                                <a href="{{ route('blog.index', ['author' => $author->id]) }}" class="author-name-link">
                                    {{ $author->name }}
                                </a>
                                <div class="author-posts-count">
                                    <i class="fas fa-pen"></i> {{ $author->published_posts_count }} Articles
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Tags Cloud Widget -->
                <div class="sidebar-widget">
                    <div class="widget-header">
                        <i class="fas fa-tags"></i>
                        <h5>Popular Tags</h5>
                    </div>
                    <div class="widget-body">
                        <div class="tags-cloud">
                            @foreach($tags as $tag)
                            <a href="{{ route('blog.tag', $tag->slug) }}" 
                               class="tag-cloud-item"
                               style="font-size: {{ 12 + ($tag->posts_count * 2) }}px">
                                {{ $tag->name }}
                                <span class="tag-count">{{ $tag->posts_count }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
/* =============================================
   HERO SECTION
============================================= */
.hero-section {
    background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
    position: relative;
}

.hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

/* Subtle animated circuit-board dots */
.hero-grid-overlay {
    position: absolute;
    inset: 0;
    background-image:
        radial-gradient(circle, rgba(37,99,235,0.15) 1px, transparent 1px);
    background-size: 40px 40px;
    pointer-events: none;
    z-index: 0;
}

.hero-label {
    display: inline-block;
}

.hero-label span {
    display: inline-flex;
    align-items: center;
    background: rgba(37,99,235,0.25);
    border: 1px solid rgba(37,99,235,0.5);
    color: #93c5fd;
    padding: 6px 18px;
    border-radius: 50px;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 0.5px;
    backdrop-filter: blur(6px);
}

.hero-highlight {
    background: linear-gradient(90deg, #60a5fa, #38bdf8);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-search .form-control:focus {
    box-shadow: none;
}

.hero-stat {
    padding: 10px 0;
}

.hero-stat-border {
    border-left: 1px solid rgba(255,255,255,0.1);
    border-right: 1px solid rgba(255,255,255,0.1);
}

.animate-fade-in {
    animation: fadeIn 0.9s ease-in;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* =============================================
   CATEGORY PILLS
============================================= */
.category-pill {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 7px 16px;
    background: white;
    border: 1.5px solid #e2e8f0;
    border-radius: 8px;
    color: #374151;
    text-decoration: none;
    transition: all 0.25s ease;
    font-weight: 600;
    font-size: 13px;
    letter-spacing: 0.2px;
}

.category-pill:hover,
.category-pill.active {
    background: #2563eb;
    color: white;
    border-color: #2563eb;
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(37,99,235,0.3);
}

.category-pill .badge {
    background: rgba(0,0,0,0.12);
    padding: 2px 8px;
    border-radius: 10px;
    font-size: 11px;
}

/* =============================================
   BLOG CARDS
============================================= */
.blog-card {
    background: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 1px 4px rgba(0,0,0,0.07), 0 4px 16px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    border: 1px solid #f1f5f9;
}

.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 40px rgba(37,99,235,0.15), 0 4px 12px rgba(0,0,0,0.08);
    border-color: #bfdbfe;
}

.blog-card-image {
    position: relative;
    height: 210px;
    overflow: hidden;
}

.blog-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.blog-card:hover .blog-card-image img {
    transform: scale(1.06);
}

.placeholder-image {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #1e3a8a 0%, #0369a1 100%);
    color: rgba(255,255,255,0.4);
}

.blog-card-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to top, rgba(15,23,42,0.8) 0%, transparent 60%);
    display: flex;
    align-items: flex-end;
    justify-content: flex-start;
    padding: 15px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.blog-card:hover .blog-card-overlay {
    opacity: 1;
}

.blog-card-overlay .btn-light {
    font-size: 12px;
    font-weight: 700;
    border-radius: 8px;
    padding: 6px 14px;
    color: #1e3a8a;
}

.blog-card-body {
    padding: 20px;
}

.blog-card-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.category-badge {
    background: #eff6ff;
    color: #1d4ed8;
    padding: 4px 12px;
    border-radius: 6px;
    font-size: 11px;
    text-decoration: none;
    font-weight: 700;
    letter-spacing: 0.4px;
    text-transform: uppercase;
    border: 1px solid #bfdbfe;
}

.read-time {
    color: #94a3b8;
    font-size: 12px;
}

.blog-card-title {
    font-size: 17px;
    font-weight: 700;
    margin: 10px 0 8px;
    line-height: 1.45;
}

.blog-card-title a {
    color: #0f172a;
    text-decoration: none;
    transition: color 0.25s ease;
}

.blog-card-title a:hover {
    color: #2563eb;
}

.blog-card-excerpt {
    color: #64748b;
    font-size: 14px;
    line-height: 1.65;
    margin-bottom: 15px;
}

.blog-card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 14px;
    border-top: 1px solid #f1f5f9;
}

.author-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.author-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 14px;
}

.author-name {
    font-weight: 600;
    font-size: 13px;
    color: #1e293b;
}

.post-date {
    font-size: 11px;
    color: #94a3b8;
}

.post-stats {
    display: flex;
    gap: 12px;
}

.stat-item {
    color: #94a3b8;
    font-size: 12px;
}

.stat-item i {
    color: #2563eb;
}

.tag-badge {
    display: inline-block;
    padding: 3px 10px;
    background: #f8fafc;
    color: #475569;
    border-radius: 6px;
    font-size: 12px;
    text-decoration: none;
    margin-right: 5px;
    border: 1px solid #e2e8f0;
    transition: all 0.25s ease;
}

.tag-badge:hover {
    background: #2563eb;
    color: white;
    border-color: #2563eb;
}

/* =============================================
   SIDEBAR
============================================= */
.sidebar-sticky {
    position: sticky;
    top: 20px;
}

.sidebar-widget {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 1px 4px rgba(0,0,0,0.06), 0 4px 16px rgba(0,0,0,0.04);
    border: 1px solid #f1f5f9;
}

.widget-header {
    background: linear-gradient(135deg, #0f172a 0%, #1e40af 100%);
    color: white;
    padding: 14px 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.widget-header h5 {
    margin: 0;
    font-size: 15px;
    font-weight: 700;
    letter-spacing: 0.3px;
}

.widget-body {
    padding: 20px;
}

/* Newsletter Widget */
.newsletter-widget .widget-body p {
    font-size: 14px;
    color: #64748b;
}

/* Archive List */
.archive-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.archive-list li {
    margin-bottom: 7px;
}

.archive-list a {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 14px;
    background: #f8fafc;
    border-radius: 8px;
    color: #374151;
    text-decoration: none;
    transition: all 0.25s ease;
    border: 1px solid #f1f5f9;
    font-size: 14px;
}

.archive-list a:hover,
.archive-list a.active {
    background: #2563eb;
    color: white;
    border-color: #2563eb;
    transform: translateX(4px);
}

.archive-list .count {
    background: rgba(0,0,0,0.1);
    padding: 2px 8px;
    border-radius: 10px;
    font-size: 12px;
}

/* Category List */
.category-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.category-list li {
    margin-bottom: 12px;
}

.category-list a {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #374151;
    text-decoration: none;
    transition: color 0.25s ease;
    margin-bottom: 5px;
    font-size: 14px;
}

.category-list a:hover {
    color: #2563eb;
}

.category-icon {
    color: #2563eb;
}

.category-name {
    flex: 1;
    font-weight: 500;
}

.category-count {
    background: #eff6ff;
    color: #1d4ed8;
    padding: 2px 10px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 700;
}

.category-progress {
    height: 3px;
    background: #e2e8f0;
    border-radius: 2px;
    overflow: hidden;
}

.progress-bar {
    height: 100%;
    background: linear-gradient(90deg, #2563eb 0%, #0369a1 100%);
    transition: width 0.3s ease;
}

/* Popular Posts */
.popular-post-item {
    display: flex;
    gap: 12px;
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid #f1f5f9;
}

.popular-post-item:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.post-number {
    width: 28px;
    height: 28px;
    background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
    color: white;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 13px;
    flex-shrink: 0;
}

.post-thumbnail {
    width: 58px;
    height: 58px;
    border-radius: 8px;
    overflow: hidden;
    flex-shrink: 0;
}

.post-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.thumbnail-placeholder {
    width: 100%;
    height: 100%;
    background: #eff6ff;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #93c5fd;
}

.post-details {
    flex: 1;
}

.post-title {
    color: #1e293b;
    text-decoration: none;
    font-weight: 600;
    font-size: 13px;
    line-height: 1.45;
    display: block;
    margin-bottom: 5px;
}

.post-title:hover {
    color: #2563eb;
}

.post-meta {
    display: flex;
    gap: 10px;
    font-size: 11px;
    color: #94a3b8;
}

/* Recent Posts */
.recent-post-item {
    display: flex;
    gap: 10px;
    margin-bottom: 12px;
    padding-bottom: 12px;
    border-bottom: 1px solid #f1f5f9;
}

.recent-post-item:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.post-thumbnail-small {
    width: 50px;
    height: 50px;
    border-radius: 8px;
    overflow: hidden;
    flex-shrink: 0;
}

.post-thumbnail-small img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.thumbnail-placeholder-small {
    width: 100%;
    height: 100%;
    background: #eff6ff;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #93c5fd;
    font-size: 12px;
}

.post-details-small a {
    color: #1e293b;
    text-decoration: none;
    font-weight: 500;
    font-size: 13px;
    line-height: 1.4;
    display: block;
    margin-bottom: 4px;
}

.post-details-small a:hover {
    color: #2563eb;
}

.post-date-small {
    font-size: 11px;
    color: #94a3b8;
}

/* Top Authors */
.author-item {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 10px;
    padding: 10px 12px;
    background: #f8fafc;
    border-radius: 10px;
    transition: all 0.25s ease;
    border: 1px solid #f1f5f9;
}

.author-item:hover {
    background: #2563eb;
    border-color: #2563eb;
}

.author-item:hover .author-name-link,
.author-item:hover .author-posts-count {
    color: white;
}

.author-avatar-large {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 18px;
    flex-shrink: 0;
}

.author-name-link {
    color: #1e293b;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    display: block;
    margin-bottom: 2px;
}

.author-posts-count {
    font-size: 12px;
    color: #64748b;
}

/* Tags Cloud */
.tags-cloud {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.tag-cloud-item {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 5px 12px;
    background: #f8fafc;
    color: #475569;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 500;
    font-size: 13px;
    border: 1px solid #e2e8f0;
    transition: all 0.25s ease;
}

.tag-cloud-item:hover {
    background: #2563eb;
    color: white;
    border-color: #2563eb;
    transform: scale(1.04);
}

.tag-count {
    background: rgba(0,0,0,0.1);
    padding: 1px 6px;
    border-radius: 6px;
    font-size: 10px;
}

/* Empty State */
.empty-state {
    background: white;
    border-radius: 12px;
    padding: 60px 20px;
    border: 1px solid #f1f5f9;
}

.empty-state i {
    opacity: 0.25;
    color: #2563eb !important;
}

/* Results info */
.results-info p {
    font-size: 14px;
    color: #64748b;
}

/* Active filter badges */
.active-filters .badge {
    font-size: 12px;
    font-weight: 500;
    padding: 6px 12px;
    border-radius: 8px;
}

/* =============================================
   RESPONSIVE
============================================= */
@media (max-width: 991px) {
    .sidebar-sticky {
        position: static;
        margin-top: 40px;
    }
}

@media (max-width: 767px) {
    .hero-section {
        padding: 40px 0 !important;
    }
    
    .display-3 {
        font-size: 2rem;
    }
    
    .category-pill {
        font-size: 12px;
        padding: 6px 12px;
    }
    
    .blog-card-image {
        height: 180px;
    }

    .hero-stat-border {
        border: none;
        border-top: 1px solid rgba(255,255,255,0.1);
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }
}
</style>
@endpush