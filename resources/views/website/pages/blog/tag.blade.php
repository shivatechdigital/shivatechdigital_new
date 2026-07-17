@extends('website.index')

@section('title', '#' . $tag->name . ' - Tag')
@section('meta_description', "Articles about {$tag->name}. Explore expert insights, guides, case studies and latest updates on {$tag->name} from Shiva Tech Digital.")
@section('canonical')
<link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('website.content')
<!-- Tag Header -->
<section class="tag-header py-5" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center text-white">
                <h1 class="display-4 fw-bold">
                    <i class="fas fa-hashtag"></i> {{ $tag->name }}
                </h1>
                <p class="lead mb-0">
                    <i class="fas fa-file-alt"></i> {{ $posts->total() }} Articles with this tag
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
                    <li class="breadcrumb-item active">#{{ $tag->name }}</li>
                </ol>
            </nav>

            <!-- Posts List -->
            <div class="row g-4">
                @forelse($posts as $post)
                <div class="col-md-6">
                    <article class="card h-100 shadow-sm">
                        <div class="row g-0">
                            <div class="col-md-4">
                                @if($post->featured_image)
                                    <img src="{{ Str::startsWith($post->featured_image, 'http') ? $post->featured_image : asset('storage/'.$post->featured_image) }}" 
                                         class="img-fluid h-100" style="object-fit: cover;" alt="{{ $post->title }}">
                                @else
                                    <div class="bg-gradient h-100 d-flex align-items-center justify-content-center text-white">
                                        <i class="fas fa-image fa-2x"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <a href="{{ route('blog.category', $post->category->slug) }}" 
                                           class="badge bg-primary text-decoration-none">
                                            {{ $post->category->name }}
                                        </a>
                                    </div>
                                    <h5 class="card-title">
                                        <a href="{{ route('blog.show', $post->slug) }}" class="text-dark text-decoration-none">
                                            {{ $post->title }}
                                        </a>
                                    </h5>
                                    <p class="card-text text-muted small">
                                        {{ Str::limit($post->excerpt, 80) }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center text-muted small">
                                        <span>
                                            <i class="fas fa-user"></i> {{ $post->user->name }}
                                        </span>
                                        <span>
                                            <i class="far fa-calendar"></i> {{ $post->published_at->format('M d, Y') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                @empty
                <div class="col-12">
                    <div class="empty-state text-center py-5">
                        <i class="fas fa-tag fa-4x text-muted mb-3"></i>
                        <h4>No posts with this tag yet</h4>
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

<style>
.bg-gradient {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}
</style>
@endsection