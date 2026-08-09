@extends('website.index')
{{-- SEO SLUG --}}
@section('seo_slug', 'blog')

@push('styles')
<style>
/* ============================================================
   BLOG PAGE - CLEAN WHITE REDESIGN
============================================================ */

/* Compact Hero */
.blog-hero-compact {
    height: 150px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
    background:
        linear-gradient(135deg, rgba(15,23,42,0.82) 0%, rgba(30,58,138,0.78) 100%),
        url('https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=1400&q=80') center/cover no-repeat;
}

.blog-hero-compact::after {
    content: '';
    position: absolute;
    inset: 0;
    background: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Crect x='0' y='0' width='1' height='40'/%3E%3Crect x='0' y='0' width='40' height='1'/%3E%3C/g%3E%3C/svg%3E");
    pointer-events: none;
}

.blog-hero-inner { position: relative; z-index: 1; text-align: center; }
.blog-hero-badge {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(99,102,241,0.2); border: 1px solid rgba(99,102,241,0.4);
    border-radius: 50px; padding: 4px 14px; color: #a5b4fc;
    font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;
    margin-bottom: 10px;
}
.blog-hero-title {
    font-size: 2.4rem; font-weight: 800; color: #fff;
    margin: 0; line-height: 1; letter-spacing: -0.5px;
}
.blog-hero-title span {
    background: linear-gradient(90deg, #818cf8, #60a5fa);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
}

/* Toolbar: count + search */
.blog-toolbar {
    background: #fff;
    border-bottom: 1px solid #f1f5f9;
    padding: 14px 0;
    position: sticky;
    top: 108px;
    z-index: 100;
    box-shadow: 0 2px 12px rgba(0,0,0,0.05);
}
@media(max-width:991px) { .blog-toolbar { top: 72px; } }

.blog-results-count { font-size: 0.9rem; color: #475569; white-space: nowrap; }
.blog-results-count strong { color: #0f172a; font-size: 1.1rem; }

.blog-search-form .input-group { width: 280px; max-width: 100%; }
.blog-search-form .form-control {
    border: 1.5px solid #e2e8f0; border-radius: 10px 0 0 10px;
    padding: 8px 14px; font-size: 0.87rem; color: #374151;
}
.blog-search-form .form-control:focus { border-color: #2563eb; box-shadow: none; }
.blog-search-form .btn { border-radius: 0 10px 10px 0; background: #2563eb; border: none; padding: 8px 14px; }

/* Main area */
.blog-main { background: #fff; min-height: 60vh; }

/* Category pills */
.category-pill {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 6px 14px; background: #f8fafc; border: 1.5px solid #e2e8f0;
    border-radius: 8px; color: #374151; text-decoration: none;
    font-weight: 600; font-size: 0.8rem; transition: all 0.25s ease;
}
.category-pill:hover, .category-pill.active {
    background: #2563eb; color: white; border-color: #2563eb;
}
.category-pill .badge {
    background: rgba(0,0,0,0.12); padding: 1px 6px; border-radius: 8px; font-size: 10px;
}

/* Blog Cards */
.blog-card {
    background: #fff; border-radius: 14px; overflow: hidden;
    box-shadow: 0 1px 4px rgba(0,0,0,0.07); border: 1px solid #f1f5f9;
    transition: all 0.3s ease;
}
.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 16px 40px rgba(37,99,235,0.12); border-color: #bfdbfe;
}
.blog-card-image { position: relative; height: 200px; overflow: hidden; }
.blog-card-image img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
.blog-card:hover .blog-card-image img { transform: scale(1.06); }
.placeholder-image {
    width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;
    background: linear-gradient(135deg, #1e3a8a 0%, #0369a1 100%); color: rgba(255,255,255,0.3);
}
.blog-card-overlay {
    position: absolute; bottom: 0; left: 0; right: 0; padding: 14px;
    background: linear-gradient(to top, rgba(15,23,42,0.85) 0%, transparent 100%);
    display: flex; align-items: flex-end; opacity: 0; transition: opacity 0.3s ease;
}
.blog-card:hover .blog-card-overlay { opacity: 1; }
.blog-card-body { padding: 18px; }
.blog-card-meta { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
.category-badge {
    background: #eff6ff; color: #1d4ed8; padding: 3px 10px; border-radius: 6px;
    font-size: 0.7rem; text-decoration: none; font-weight: 700; text-transform: uppercase; letter-spacing: 0.3px; border: 1px solid #bfdbfe;
}
.read-time { color: #94a3b8; font-size: 0.72rem; }
.blog-card-title { font-size: 0.97rem; font-weight: 700; margin: 0 0 8px; line-height: 1.4; }
.blog-card-title a { color: #0f172a; text-decoration: none; transition: color 0.25s; }
.blog-card-title a:hover { color: #2563eb; }
.blog-card-excerpt { color: #64748b; font-size: 0.82rem; line-height: 1.6; margin-bottom: 14px; }
.blog-card-footer { display: flex; justify-content: space-between; align-items: center; padding-top: 12px; border-top: 1px solid #f1f5f9; }
.author-info { display: flex; align-items: center; gap: 8px; }
.author-avatar { width: 32px; height: 32px; border-radius: 50%; background: linear-gradient(135deg, #2563eb, #1e40af); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 13px; }
.author-name { font-weight: 600; font-size: 0.8rem; color: #1e293b; }
.post-date { font-size: 0.7rem; color: #94a3b8; }
.post-stats { display: flex; gap: 10px; }
.stat-item { color: #94a3b8; font-size: 0.72rem; }
.stat-item i { color: #2563eb; }
.tag-badge { display: inline-block; padding: 2px 8px; background: #f8fafc; color: #475569; border-radius: 5px; font-size: 0.7rem; text-decoration: none; margin-right: 4px; border: 1px solid #e2e8f0; }
.tag-badge:hover { background: #2563eb; color: #fff; border-color: #2563eb; }

/* Active filters */
.active-filters .badge { font-size: 0.75rem; padding: 5px 10px; border-radius: 6px; }

/* Empty state */
.empty-state { background: #fff; border-radius: 12px; border: 1px solid #f1f5f9; }

/* ============================================================
   SIDEBAR (Archives, Categories, Popular, Recent, Authors)
============================================================ */
.sidebar-sticky { position: sticky; top: 160px; }
.sidebar-widget { background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 1px 4px rgba(0,0,0,0.06); border: 1px solid #f1f5f9; margin-bottom: 20px; }
.widget-header { background: linear-gradient(135deg, #0f172a 0%, #1e40af 100%); color: #fff; padding: 12px 18px; display: flex; align-items: center; gap: 8px; }
.widget-header h5 { margin: 0; font-size: 0.85rem; font-weight: 700; }
.widget-body { padding: 16px; }

/* Archive list */
.archive-list { list-style: none; padding: 0; margin: 0; }
.archive-list li { margin-bottom: 6px; }
.archive-list a { display: flex; align-items: center; justify-content: space-between; padding: 8px 12px; background: #f8fafc; border-radius: 8px; color: #374151; text-decoration: none; transition: all 0.2s; font-size: 0.83rem; border: 1px solid #f1f5f9; }
.archive-list a:hover, .archive-list a.active { background: #2563eb; color: #fff; border-color: #2563eb; }
.archive-list .count { background: rgba(0,0,0,0.1); padding: 1px 7px; border-radius: 8px; font-size: 11px; }

/* Category list */
.category-list { list-style: none; padding: 0; margin: 0; }
.category-list li { margin-bottom: 10px; }
.category-list a { display: flex; align-items: center; gap: 8px; color: #374151; text-decoration: none; font-size: 0.83rem; transition: color 0.2s; margin-bottom: 4px; }
.category-list a:hover { color: #2563eb; }
.category-icon { color: #2563eb; }
.category-name { flex: 1; font-weight: 500; }
.category-count { background: #eff6ff; color: #1d4ed8; padding: 1px 8px; border-radius: 5px; font-size: 0.7rem; font-weight: 700; }
.category-progress { height: 3px; background: #e2e8f0; border-radius: 2px; overflow: hidden; }
.progress-bar { height: 100%; background: linear-gradient(90deg, #2563eb, #0369a1); }

/* Popular posts */
.popular-post-item { display: flex; gap: 10px; margin-bottom: 14px; padding-bottom: 14px; border-bottom: 1px solid #f1f5f9; }
.popular-post-item:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
.post-number { width: 26px; height: 26px; background: linear-gradient(135deg, #2563eb, #1e40af); color: #fff; border-radius: 7px; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 12px; flex-shrink: 0; }
.post-thumbnail { width: 54px; height: 54px; border-radius: 8px; overflow: hidden; flex-shrink: 0; }
.post-thumbnail img { width: 100%; height: 100%; object-fit: cover; }
.thumbnail-placeholder { width: 100%; height: 100%; background: #eff6ff; display: flex; align-items: center; justify-content: center; color: #93c5fd; }
.post-details { flex: 1; }
.post-title { color: #1e293b; text-decoration: none; font-weight: 600; font-size: 0.8rem; line-height: 1.4; display: block; margin-bottom: 4px; }
.post-title:hover { color: #2563eb; }
.post-meta { display: flex; gap: 8px; font-size: 0.7rem; color: #94a3b8; }

/* Recent posts */
.recent-post-item { display: flex; gap: 10px; margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid #f1f5f9; }
.recent-post-item:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
.post-thumbnail-small { width: 46px; height: 46px; border-radius: 7px; overflow: hidden; flex-shrink: 0; }
.post-thumbnail-small img { width: 100%; height: 100%; object-fit: cover; }
.thumbnail-placeholder-small { width: 100%; height: 100%; background: #eff6ff; display: flex; align-items: center; justify-content: center; color: #93c5fd; font-size: 12px; }
.post-details-small a { color: #1e293b; text-decoration: none; font-weight: 500; font-size: 0.8rem; display: block; margin-bottom: 3px; line-height: 1.4; }
.post-details-small a:hover { color: #2563eb; }
.post-date-small { font-size: 0.7rem; color: #94a3b8; }

/* Top Authors */
.author-item { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; padding: 9px 10px; background: #f8fafc; border-radius: 10px; border: 1px solid #f1f5f9; transition: all 0.2s; }
.author-item:hover { background: #2563eb; border-color: #2563eb; }
.author-item:hover .author-name-link, .author-item:hover .author-posts-count { color: #fff; }
.author-avatar-large { width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(135deg, #2563eb, #1e40af); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 16px; flex-shrink: 0; }
.author-name-link { color: #1e293b; text-decoration: none; font-weight: 600; font-size: 0.83rem; display: block; }
.author-posts-count { font-size: 0.7rem; color: #64748b; }

/* ============================================================
   CUSTOM PAGINATION
============================================================ */
.blog-pagination-wrap {
    margin-top: 36px;
    padding-top: 24px;
    border-top: 1px solid #f1f5f9;
}
.pagination-info {
    font-size: 0.85rem;
    color: #64748b;
    margin-bottom: 14px;
}
.pagination-info strong { color: #0f172a; }
.custom-pagination {
    display: flex;
    align-items: center;
    gap: 6px;
    flex-wrap: wrap;
}
.custom-pagination a,
.custom-pagination span {
    width: 38px;
    height: 38px;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.25s ease;
    border: 1.5px solid #e2e8f0;
    color: #374151;
    background: #fff;
}
.custom-pagination a:hover {
    background: #eff6ff;
    border-color: #bfdbfe;
    color: #2563eb;
}
.custom-pagination .active-page {
    background: #2563eb;
    border-color: #2563eb;
    color: #fff;
    box-shadow: 0 4px 12px rgba(37,99,235,0.3);
}
.custom-pagination .disabled-page {
    opacity: 0.4;
    cursor: not-allowed;
    pointer-events: none;
}
.custom-pagination .dots {
    width: auto;
    border: none;
    background: transparent;
    color: #94a3b8;
    cursor: default;
    pointer-events: none;
}

@media(max-width:768px) {
    .blog-search-form .input-group { width: 100%; }
    .sidebar-sticky { position: static; margin-top: 30px; }
}
</style>
@endpush

@section('website.content')

{{-- ===== COMPACT HERO ===== --}}
<section class="blog-hero-compact">
    <div class="blog-hero-inner">
        <div class="blog-hero-badge"><i class="fas fa-pen-nib"></i> Shiva Tech Digital</div>
        <h1 class="blog-hero-title">Our <span>Blogs</span></h1>
    </div>
</section>

{{-- ===== TOOLBAR: Count + Search ===== --}}
<div class="blog-toolbar">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <div class="blog-results-count">
                <i class="fas fa-newspaper me-2" style="color:#2563eb;"></i>
                <strong>{{ $posts->total() }}</strong> Articles
                @if($posts->total() != $posts->firstItem() - 1 + $posts->perPage())
                &nbsp;·&nbsp; <span style="color:#94a3b8;">Showing {{ $posts->firstItem() ?? 0 }}–{{ $posts->lastItem() ?? 0 }}</span>
                @endif
                @if(request()->hasAny(['search','category','tag','month']))
                &nbsp;· <a href="{{ route('blog.index') }}" class="text-danger" style="font-size:0.8rem;"><i class="fas fa-times"></i> Clear filter</a>
                @endif
            </div>
            <form action="{{ route('blog.index') }}" method="GET" class="blog-search-form d-flex" style="gap:0;">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search articles..." value="{{ request('search') }}">
                    <button class="btn" type="submit" style="background:#2563eb;color:#fff;border-radius:0 10px 10px 0;padding:0 14px;"><i class="fas fa-search"></i></button>
                </div>
                @foreach(request()->except(['search','page']) as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}">
                @endforeach
            </form>
        </div>
    </div>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="blog-main">
    <div class="container py-4">
        <div class="row g-4">

            {{-- POSTS COLUMN --}}
            <div class="col-lg-8">

                {{-- Active Filters --}}
                @if(request()->hasAny(['search', 'category', 'tag', 'month', 'author']))
                <div class="active-filters mb-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <span class="text-muted small"><i class="fas fa-filter"></i> Filters:</span>
                        @if(request('search'))
                        <span class="badge bg-primary">Search: {{ request('search') }} <a href="{{ route('blog.index') }}" class="text-white ms-1">×</a></span>
                        @endif
                        @if(request('category'))
                        <span class="badge bg-info">Category: {{ request('category') }} <a href="{{ route('blog.index') }}" class="text-white ms-1">×</a></span>
                        @endif
                        @if(request('month'))
                        <span class="badge bg-success">{{ DateTime::createFromFormat('!m', request('month'))->format('F') }} {{ request('year') }} <a href="{{ route('blog.index') }}" class="text-white ms-1">×</a></span>
                        @endif
                    </div>
                </div>
                @endif

                {{-- Category Pills --}}
                <div class="d-flex align-items-center gap-2 flex-wrap mb-4">
                    <a href="{{ route('blog.index') }}" class="category-pill {{ !request('category') ? 'active' : '' }}">
                        <i class="fas fa-th-large" style="font-size:0.7rem;"></i> All
                    </a>
                    @foreach($categories->take(7) as $cat)
                    <a href="{{ route('blog.index', ['category' => $cat->slug]) }}"
                       class="category-pill {{ request('category') == $cat->slug ? 'active' : '' }}">
                        {{ $cat->name }} <span class="badge">{{ $cat->published_posts_count }}</span>
                    </a>
                    @endforeach
                </div>

                {{-- Blog Grid --}}
                <div class="row g-4">
                    @forelse($posts as $post)
                    <div class="col-md-6">
                        <article class="blog-card h-100">
                            <div class="blog-card-image">
                                @if($post->featured_image)
                                    <img src="{{ Str::startsWith($post->featured_image, 'http') ? $post->featured_image : asset('storage/'.$post->featured_image) }}" alt="{{ $post->title }}" loading="lazy">
                                @else
                                    <div class="placeholder-image"><i class="fas fa-image fa-2x"></i></div>
                                @endif
                                <div class="blog-card-overlay">
                                    <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-light btn-sm" style="font-size:0.78rem;">
                                        Read More <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-card-body">
                                <div class="blog-card-meta">
                                    <a href="{{ route('blog.category', $post->category->slug) }}" class="category-badge">{{ $post->category->name }}</a>
                                    <span class="read-time"><i class="far fa-clock"></i> {{ $post->read_time }} min</span>
                                </div>
                                <h4 class="blog-card-title"><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h4>
                                <p class="blog-card-excerpt">{{ Str::limit($post->excerpt ?? strip_tags($post->content), 100) }}</p>
                                <div class="blog-card-footer">
                                    <div class="author-info">
                                        <div class="author-avatar">{{ substr($post->user->name, 0, 1) }}</div>
                                        <div>
                                            <div class="author-name">{{ $post->user->name }}</div>
                                            <div class="post-date">{{ $post->published_at->format('M d, Y') }}</div>
                                        </div>
                                    </div>
                                    <div class="post-stats">
                                        <span class="stat-item"><i class="fas fa-eye"></i> {{ $post->views }}</span>
                                        <span class="stat-item"><i class="fas fa-comments"></i> {{ $post->comments_count }}</span>
                                    </div>
                                </div>
                                @if($post->tags->count() > 0)
                                <div class="mt-2">
                                    @foreach($post->tags->take(3) as $tag)
                                    <a href="{{ route('blog.tag', $tag->slug) }}" class="tag-badge">#{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </article>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="empty-state text-center py-5">
                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                            <h5>No posts found</h5>
                            <p class="text-muted small">Try adjusting your search or filters</p>
                            <a href="{{ route('blog.index') }}" class="btn btn-primary btn-sm mt-2">View All Posts</a>
                        </div>
                    </div>
                    @endforelse
                </div>

                {{-- ===== CUSTOM PAGINATION ===== --}}
                @if($posts->hasPages())
                <div class="blog-pagination-wrap">
                    {{-- Row 1: Results info --}}
                    <div class="pagination-info">
                        Showing <strong>{{ $posts->firstItem() }}</strong> to <strong>{{ $posts->lastItem() }}</strong>
                        of <strong>{{ $posts->total() }}</strong> results
                    </div>
                    {{-- Row 2: Page numbers --}}
                    <div class="custom-pagination">
                        {{-- Prev --}}
                        @if($posts->onFirstPage())
                        <span class="disabled-page"><i class="fas fa-chevron-left" style="font-size:0.7rem;"></i></span>
                        @else
                        <a href="{{ $posts->previousPageUrl() }}"><i class="fas fa-chevron-left" style="font-size:0.7rem;"></i></a>
                        @endif

                        {{-- Pages: 1 to 6, then ..., then last page --}}
                        @php
                            $currentPage = $posts->currentPage();
                            $lastPage = $posts->lastPage();
                            $showDots = $lastPage > 7;
                            $windowPages = collect(range(max(1, $currentPage - 2), min($lastPage, $currentPage + 2)));
                        @endphp

                        {{-- Always show page 1 --}}
                        @if(!$windowPages->contains(1))
                        <a href="{{ $posts->url(1) }}" class="{{ $currentPage == 1 ? 'active-page' : '' }}">1</a>
                        @if($windowPages->min() > 2)<span class="dots">...</span>@endif
                        @endif

                        {{-- Window pages --}}
                        @foreach($windowPages as $page)
                        @if($page == $currentPage)
                        <span class="active-page">{{ $page }}</span>
                        @else
                        <a href="{{ $posts->url($page) }}">{{ $page }}</a>
                        @endif
                        @endforeach

                        {{-- Always show last page --}}
                        @if(!$windowPages->contains($lastPage))
                        @if($windowPages->max() < $lastPage - 1)<span class="dots">...</span>@endif
                        <a href="{{ $posts->url($lastPage) }}" class="{{ $currentPage == $lastPage ? 'active-page' : '' }}">{{ $lastPage }}</a>
                        @endif

                        {{-- Next --}}
                        @if($posts->hasMorePages())
                        <a href="{{ $posts->nextPageUrl() }}"><i class="fas fa-chevron-right" style="font-size:0.7rem;"></i></a>
                        @else
                        <span class="disabled-page"><i class="fas fa-chevron-right" style="font-size:0.7rem;"></i></span>
                        @endif
                    </div>
                </div>
                @endif
            </div>

            {{-- SIDEBAR (no Newsletter, no Popular Tags) --}}
            <div class="col-lg-4">
                <div class="sidebar-sticky">

                    {{-- Archives --}}
                    <div class="sidebar-widget">
                        <div class="widget-header"><i class="fas fa-calendar-alt"></i><h5>Archives</h5></div>
                        <div class="widget-body">
                            <ul class="archive-list">
                                @foreach($archives as $archive)
                                <li>
                                    <a href="{{ route('blog.index', ['month' => $archive->month, 'year' => $archive->year]) }}"
                                       class="{{ request('month') == $archive->month && request('year') == $archive->year ? 'active' : '' }}">
                                        <span><i class="far fa-folder-open me-2"></i>{{ DateTime::createFromFormat('!m', $archive->month)->format('F') }} {{ $archive->year }}</span>
                                        <span class="count">{{ $archive->count }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- Categories --}}
                    <div class="sidebar-widget">
                        <div class="widget-header"><i class="fas fa-folder"></i><h5>Categories</h5></div>
                        <div class="widget-body">
                            <ul class="category-list">
                                @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('blog.category', $category->slug) }}">
                                        <span class="category-icon"><i class="fas fa-angle-right"></i></span>
                                        <span class="category-name">{{ $category->name }}</span>
                                        <span class="category-count">{{ $category->published_posts_count }}</span>
                                    </a>
                                    <div class="category-progress">
                                        <div class="progress-bar" style="width:{{ $posts->total() > 0 ? min(100, ($category->published_posts_count / $posts->total()) * 100) : 0 }}%"></div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- Popular Posts --}}
                    <div class="sidebar-widget">
                        <div class="widget-header"><i class="fas fa-fire"></i><h5>Popular Posts</h5></div>
                        <div class="widget-body">
                            @foreach($popularPosts as $index => $popular)
                            <div class="popular-post-item">
                                <div class="post-number">{{ $index + 1 }}</div>
                                <div class="post-thumbnail">
                                    @if($popular->featured_image)
                                        <img src="{{ Str::startsWith($popular->featured_image,'http') ? $popular->featured_image : asset('storage/'.$popular->featured_image) }}" alt="{{ $popular->title }}" loading="lazy">
                                    @else
                                        <div class="thumbnail-placeholder"><i class="fas fa-image" style="font-size:0.8rem;"></i></div>
                                    @endif
                                </div>
                                <div class="post-details">
                                    <a href="{{ route('blog.show', $popular->slug) }}" class="post-title">{{ Str::limit($popular->title, 50) }}</a>
                                    <div class="post-meta">
                                        <span><i class="fas fa-eye"></i> {{ $popular->views }}</span>
                                        <span><i class="far fa-calendar"></i> {{ $popular->published_at->format('M d') }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Recent Posts --}}
                    <div class="sidebar-widget">
                        <div class="widget-header"><i class="fas fa-clock"></i><h5>Recent Posts</h5></div>
                        <div class="widget-body">
                            @foreach($recentPosts as $recent)
                            <div class="recent-post-item">
                                <div class="post-thumbnail-small">
                                    @if($recent->featured_image)
                                        <img src="{{ Str::startsWith($recent->featured_image,'http') ? $recent->featured_image : asset('storage/'.$recent->featured_image) }}" alt="{{ $recent->title }}" loading="lazy">
                                    @else
                                        <div class="thumbnail-placeholder-small"><i class="fas fa-image"></i></div>
                                    @endif
                                </div>
                                <div class="post-details-small">
                                    <a href="{{ route('blog.show', $recent->slug) }}">{{ Str::limit($recent->title, 55) }}</a>
                                    <div class="post-date-small"><i class="far fa-clock"></i> {{ $recent->published_at->diffForHumans() }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Top Authors --}}
                    <div class="sidebar-widget">
                        <div class="widget-header"><i class="fas fa-users"></i><h5>Top Authors</h5></div>
                        <div class="widget-body">
                            @foreach($topAuthors as $author)
                            <div class="author-item">
                                <div class="author-avatar-large">{{ substr($author->name, 0, 1) }}</div>
                                <div>
                                    <a href="{{ route('blog.index', ['author' => $author->id]) }}" class="author-name-link">{{ $author->name }}</a>
                                    <div class="author-posts-count"><i class="fas fa-pen"></i> {{ $author->published_posts_count }} Articles</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection