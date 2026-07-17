@extends('website.index')

@section('title', $category->name . ' - Category')
@section('meta_description', $category->description ?? 'Browse posts in ' . $category->name)

@section('canonical')
<link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('website.content')
<!-- Category Header -->
<section class="category-header py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center text-white">
                @if($category->image)
                    <img src="{{ asset('storage/'.$category->image) }}" class="rounded-circle mb-3" width="120" height="120" style="object-fit: cover; border: 4px solid white;">
                @endif
                <h1 class="display-4 fw-bold">{{ $category->name }}</h1>
                @if($category->description)
                    <p class="lead">{{ $category->description }}</p>
                @endif
                <p class="mb-0">
                    <i class="fas fa-file-alt"></i> {{ $posts->total() }} Articles
                </p>
            </div>
        </div>
    </div>
</section>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-12">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                    <li class="breadcrumb-item active">{{ $category->name }}</li>
                </ol>
            </nav>

            <!-- Posts Grid -->
            <div class="row g-4">
                @forelse($posts as $post)
                <div class="col-md-4">
                    <article class="blog-card h-100">
                        <div class="blog-card-image">
                            @if($post->featured_image)
                                <img src="{{ Str::startsWith($post->featured_image, 'http') ? $post->featured_image : asset('storage/'.$post->featured_image) }}" alt="{{ $post->title }}">
                            @else
                                <div class="placeholder-image">
                                    <i class="fas fa-image fa-3x"></i>
                                </div>
                            @endif
                        </div>
                        
                        <div class="blog-card-body">
                            <div class="blog-card-meta mb-2">
                                <span class="read-time">
                                    <i class="far fa-clock"></i> {{ $post->read_time }} min
                                </span>
                                <span class="text-muted">
                                    <i class="far fa-calendar"></i> {{ $post->published_at->format('M d, Y') }}
                                </span>
                            </div>

                            <h5 class="blog-card-title">
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h5>
                            
                            <p class="blog-card-excerpt">
                                {{ Str::limit($post->excerpt ?? strip_tags($post->content), 100) }}
                            </p>

                            <div class="blog-card-footer">
                                <div class="author-info">
                                    <div class="author-avatar">{{ substr($post->user->name, 0, 1) }}</div>
                                    <div class="author-details">
                                        <div class="author-name">{{ $post->user->name }}</div>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-sm btn-outline-primary">
                                        Read More
                                    </a>
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
                        <h4>No posts in this category yet</h4>
                        <a href="{{ route('blog.index') }}" class="btn btn-primary mt-3">Browse All Posts</a>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-5">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
/* Include the same blog card styles from blog.index */
.blog-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
}
.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}
.blog-card-image {
    height: 200px;
    overflow: hidden;
}
.blog-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.placeholder-image {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}
.blog-card-body {
    padding: 20px;
}
.blog-card-title a {
    color: #212529;
    text-decoration: none;
}
.blog-card-title a:hover {
    color: #667eea;
}
.blog-card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 15px;
    border-top: 1px solid #e9ecef;
    margin-top: 15px;
}
.author-info {
    display: flex;
    align-items: center;
    gap: 10px;
}
.author-avatar {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
}
.tag-badge {
    display: inline-block;
    padding: 4px 10px;
    background: #f8f9fa;
    color: #495057;
    border-radius: 12px;
    font-size: 12px;
    text-decoration: none;
    margin-right: 5px;
}
.tag-badge:hover {
    background: #667eea;
    color: white;
}
</style>
@endpush
@endsection