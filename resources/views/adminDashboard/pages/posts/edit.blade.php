
{{-- resources/views/adminDashboard/posts/edit.blade.php --}}

@extends('adminDashboard.index')
@section('adminDashboard.content')
@push('styles')

<style>

    /* =========================================
       PAGE SPACING
    ========================================= */

    .container-fluid{
        padding: 30px;
    }

    /* =========================================
       CARD DESIGN
    ========================================= */

    .card{
        border: none;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 10px 35px rgba(0,0,0,0.06);
        background: #fff;
    }

    .card-header{
        border: none;
        padding: 22px 28px;
        background: linear-gradient(135deg,#4f46e5,#7c3aed);
    }

    .card-header h3,
    .card-header h5{
        color: white;
        margin: 0;
        font-weight: 700;
    }

    .card-body{
        padding: 35px;
    }

    /* =========================================
       INPUTS
    ========================================= */

    .form-control,
    .form-select,
    select{
        min-height: 54px;
        border-radius: 14px !important;
        border: 1px solid #dbe2ea !important;
        background: #f9fafb !important;
        padding: 12px 18px !important;
        transition: .3s;
        box-shadow: none !important;
    }

    textarea.form-control{
        min-height: 120px;
    }

    .form-control:focus,
    .form-select:focus,
    select:focus{
        border-color: #4f46e5 !important;
        background: #fff !important;
        box-shadow: 0 0 0 4px rgba(79,70,229,.12) !important;
    }

    /* =========================================
       LABELS
    ========================================= */

    .form-label{
        font-weight: 700;
        color: #111827;
        margin-bottom: 10px;
    }

    /* =========================================
       BUTTONS
    ========================================= */

    .btn{
        border-radius: 14px !important;
        padding: 12px 22px;
        font-weight: 600;
        transition: .3s;
    }

    .btn-primary{
        background: linear-gradient(135deg,#4f46e5,#7c3aed);
        border: none;
    }

    .btn-primary:hover{
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(79,70,229,.25);
    }

    /* =========================================
       CKEDITOR
    ========================================= */

    .ck-editor{
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid #dbe2ea;
    }

    .ck.ck-toolbar{
        border: none !important;
        background: #f3f4f6 !important;
        padding: 10px !important;
    }

    .ck-editor__editable{
        min-height: 500px !important;
        padding: 25px !important;
        line-height: 1.9 !important;
        font-size: 16px !important;
    }

    /* =========================================
       SOURCE EDITOR
    ========================================= */

    #sourceEditor{
        background: #111827 !important;
        color: #f9fafb !important;
        border-radius: 16px !important;
        border: none !important;
        min-height: 500px;
        padding: 20px !important;
        font-size: 14px;
        line-height: 1.8;
    }

    /* =========================================
       SELECT2
    ========================================= */

    .select2-container--default .select2-selection--multiple{
        border-radius: 14px !important;
        border: 1px solid #dbe2ea !important;
        min-height: 54px !important;
        padding: 8px !important;
        background: #f9fafb !important;
    }

    .select2-selection__choice{
        background: linear-gradient(135deg,#4f46e5,#7c3aed) !important;
        border: none !important;
        color: white !important;
        border-radius: 30px !important;
        padding: 6px 12px !important;
    }

    /* =========================================
       SEO PREVIEW
    ========================================= */

    .seo-preview{
        background: #f9fafb;
        border-radius: 16px;
        padding: 20px;
    }

    .seo-title{
        font-size: 20px;
        font-weight: 700;
        color: #2563eb;
    }

    .seo-url{
        color: #16a34a;
        margin: 5px 0;
    }

    .seo-description{
        color: #6b7280;
        line-height: 1.7;
    }

    /* =========================================
       IMAGE PREVIEW
    ========================================= */

    #currentImageContainer .card,
    #newImagePreview .card{
        border-radius: 18px;
        overflow: hidden;
    }

    /* =========================================
       RESPONSIVE
    ========================================= */

    @media(max-width:768px){

        .container-fluid{
            padding: 15px;
        }

        .card-body{
            padding: 20px;
        }

    }

</style>

@endpush
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3><i class="fas fa-edit"></i> Edit Post</h3>
                    <div>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back to Posts
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Success/Error Messages --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" id="postForm">
                        @csrf
                        @method('PUT')
                        
                        {{-- Post Status Badge --}}
                        <div class="mb-3">
                            <span class="badge {{ $post->is_published ? 'bg-success' : 'bg-warning' }} fs-6">
                                <i class="fas {{ $post->is_published ? 'fa-check-circle' : 'fa-clock' }}"></i>
                                {{ $post->is_published ? 'Published' : 'Draft' }}
                            </span>
                            @if($post->published_at)
                                <small class="text-muted ms-2">
                                    Published: {{ $post->published_at->format('M d, Y h:i A') }}
                                </small>
                            @endif
                            <small class="text-muted ms-2">
                                Last Updated: {{ $post->updated_at->format('M d, Y h:i A') }}
                            </small>
                        </div>

                        {{-- Title --}}
                        <div class="mb-3">
                            <label class="form-label">Title *</label>
                            <input type="text" 
                                   name="title" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   value="{{ old('title', $post->title) }}" 
                                   required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Slug --}}
                        <div class="mb-3">
                            <label class="form-label">Slug</label>
                            <div class="input-group">
                                <span class="input-group-text me-3" style="border-radius:15px">{{ url('/') }}/posts/</span>
                                <input type="text" 
                                       name="slug" 
                                       id="slugInput"
                                       class="form-control @error('slug') is-invalid @enderror" 
                                       value="{{ old('slug', $post->slug) }}">
                                <button type="button" class="btn btn-outline-secondary ms-3" id="regenerateSlug">
                                    <i class="fas fa-sync-alt"></i> Regenerate
                                </button>
                            </div>
                            @error('slug')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Leave empty to auto-generate from title</small>
                        </div>

                        <div class="row">
                            {{-- Category --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Category *</label>
                                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" 
                                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Tags --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Tags</label>
                                    <select name="tags[]" id="tagsSelect" class="form-control" multiple>
                                        @php
                                            $selectedTags = old('tags', $post->tags->pluck('id')->toArray());
                                        @endphp
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" 
                                                {{ in_array($tag->id, $selectedTags) ? 'selected' : '' }}>
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted">Hold Ctrl/Cmd to select multiple tags</small>
                                </div>
                            </div>
                        </div>

                        {{-- Excerpt --}}
                        <div class="mb-3">
                            <label class="form-label">Excerpt</label>
                            <textarea name="excerpt" 
                                      rows="3" 
                                      class="form-control @error('excerpt') is-invalid @enderror"
                                      placeholder="Brief description of the post...">{{ old('excerpt', $post->excerpt) }}</textarea>
                            @error('excerpt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Short description displayed in post listings</small>
                        </div>

                        {{-- Content Editor with Source Toggle --}}
                        <h5 class="mt-4 mb-3"><i class="fas fa-edit"></i> Content</h5>
                        
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label class="form-label mb-0">
                                    Content * 
                                    <small class="text-muted">(Min 300 words recommended)</small>
                                </label>
                                <div class="btn-group" role="group">
                                    <button type="button" id="visualModeBtn" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i> Visual
                                    </button>
                                    <button type="button" id="htmlModeBtn" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-code"></i> HTML
                                    </button>
                                </div>
                            </div>
                            
                            {{-- Visual Editor Container --}}
                            <div id="editorContainer">
                                <textarea name="content" 
                                          id="editor" 
                                          class="form-control @error('content') is-invalid @enderror" 
                                          style="display:none;">{{ old('content', $post->content) }}</textarea>
                            </div>
                            
                            {{-- HTML Source Editor (Hidden by default) --}}
                            <div id="sourceContainer" style="display: none;">
                                <textarea id="sourceEditor" 
                                          class="form-control font-monospace" 
                                          rows="20" 
                                          style="font-size: 13px; background-color: #1e1e1e; color: #d4d4d4; border-radius: 6px;"></textarea>
                            </div>
                            
                            <small class="text-muted mt-1 d-block">
                                Word count: <span id="wordCount">0</span> words
                            </small>
                            @error('content')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Featured Image --}}
                        <div class="mb-3">
                            <label class="form-label">Featured Image</label>
                            
                            {{-- Current Image Preview --}}
                            @if($post->featured_image)
                                <div class="mb-2" id="currentImageContainer">
                                    <div class="card" style="max-width: 300px;">
                                        <img src="{{ Str::startsWith($post->featured_image, 'http') ? $post->featured_image : asset('storage/'.$post->featured_image) }}" 
                                             class="card-img-top" 
                                             alt="Current featured image"
                                             id="currentImage">
                                        <div class="card-body p-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">Current Image</small>
                                                <button type="button" 
                                                        class="btn btn-danger btn-sm" 
                                                        id="removeImageBtn"
                                                        onclick="removeCurrentImage()">
                                                    <i class="fas fa-trash"></i> Remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="remove_image" id="removeImageInput" value="0">
                            @endif
                            
                            {{-- New Image Upload --}}
                            <input type="file" 
                                   name="featured_image" 
                                   id="featuredImageInput"
                                   class="form-control @error('featured_image') is-invalid @enderror" 
                                   accept="image/*"
                                   onchange="previewNewImage(this)">
                            @error('featured_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Recommended size: 1200x630 pixels. Max: 2MB</small>
                            
                            {{-- New Image Preview --}}
                            <div id="newImagePreview" class="mt-2" style="display: none;">
                                <div class="card" style="max-width: 300px;">
                                    <img src="" id="newImage" class="card-img-top" alt="New image preview">
                                    <div class="card-body p-2">
                                        <small class="text-success"><i class="fas fa-check"></i> New Image Selected</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- SEO Fields --}}
                        <div class="card mt-4 mb-3">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">
                                    <i class="fas fa-search"></i> SEO Settings
                                    <button class="btn btn-sm btn-link float-end" 
                                            type="button" 
                                            data-bs-toggle="collapse" 
                                            data-bs-target="#seoCollapse">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </h5>
                            </div>
                            <div class="collapse show" id="seoCollapse">
                                <div class="card-body">
                                    {{-- Meta Title --}}
                                    <div class="mb-3">
                                        <label class="form-label">Meta Title</label>
                                        <input type="text" 
                                               name="meta_title" 
                                               class="form-control @error('meta_title') is-invalid @enderror" 
                                               value="{{ old('meta_title', $post->meta_title) }}"
                                               maxlength="60">
                                        @error('meta_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <small class="text-muted">
                                            <span id="metaTitleCount">{{ strlen(old('meta_title', $post->meta_title ?? '')) }}</span>/60 characters
                                        </small>
                                    </div>

                                    {{-- Meta Description --}}
                                    <div class="mb-3">
                                        <label class="form-label">Meta Description</label>
                                        <textarea name="meta_description" 
                                                  rows="2" 
                                                  class="form-control @error('meta_description') is-invalid @enderror"
                                                  maxlength="160">{{ old('meta_description', $post->meta_description) }}</textarea>
                                        @error('meta_description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <small class="text-muted">
                                            <span id="metaDescCount">{{ strlen(old('meta_description', $post->meta_description ?? '')) }}</span>/160 characters
                                        </small>
                                    </div>

                                    {{-- Meta Keywords --}}
                                    <div class="mb-3">
                                        <label class="form-label">Meta Keywords</label>
                                        <input type="text" 
                                               name="meta_keywords" 
                                               class="form-control @error('meta_keywords') is-invalid @enderror" 
                                               value="{{ old('meta_keywords', $post->meta_keywords) }}"
                                               placeholder="keyword1, keyword2, keyword3">
                                        @error('meta_keywords')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <small class="text-muted">Separate keywords with commas</small>
                                    </div>

                                    {{-- SEO Preview --}}
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <label class="form-label text-muted small">Search Engine Preview</label>
                                            <div class="seo-preview">
                                                <div class="seo-title text-primary" id="seoPreviewTitle">
                                                    {{ $post->meta_title ?: $post->title }}
                                                </div>
                                                <div class="seo-url text-success small">
                                                    {{ url('/posts/' . $post->slug) }}
                                                </div>
                                                <div class="seo-description text-muted small" id="seoPreviewDesc">
                                                    {{ $post->meta_description ?: Str::limit(strip_tags($post->content), 160) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Publishing Options --}}
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="fas fa-cog"></i> Publishing Options</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" 
                                                   name="is_published" 
                                                   value="1" 
                                                   class="form-check-input" 
                                                   id="published" 
                                                   {{ old('is_published', $post->is_published) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="published">
                                                <i class="fas fa-globe"></i> Published
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" 
                                                   name="is_featured" 
                                                   value="1" 
                                                   class="form-check-input" 
                                                   id="featured" 
                                                   {{ old('is_featured', $post->is_featured ?? false) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="featured">
                                                <i class="fas fa-star"></i> Featured Post
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                {{-- Scheduled Publishing --}}
                                <div class="mb-3">
                                    <label class="form-label">Schedule Publishing</label>
                                    <input type="datetime-local" 
                                           name="published_at" 
                                           class="form-control @error('published_at') is-invalid @enderror" 
                                           value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}">
                                    @error('published_at')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Leave empty to publish immediately when checked</small>
                                </div>
                            </div>
                        </div>

                        {{-- Post Statistics (Read Only) --}}
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="fas fa-chart-bar"></i> Post Statistics</h5>
                            </div>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-md-3">
                                        <div class="border rounded p-3">
                                            <h4 class="text-primary mb-0">{{ $post->views ?? 0 }}</h4>
                                            <small class="text-muted">Views</small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="border rounded p-3">
                                            <h4 class="text-success mb-0">{{ $post->comments_count ?? $post->comments->count() ?? 0 }}</h4>
                                            <small class="text-muted">Comments</small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="border rounded p-3">
                                            <h4 class="text-info mb-0">{{ $post->likes ?? 0 }}</h4>
                                            <small class="text-muted">Likes</small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="border rounded p-3">
                                            <h4 class="text-warning mb-0">{{ $post->shares ?? 0 }}</h4>
                                            <small class="text-muted">Shares</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-save"></i> Update Post
                                </button>
                                <button type="submit" name="save_and_continue" value="1" class="btn btn-success btn-lg">
                                    <i class="fas fa-check"></i> Save & Continue Editing
                                </button>
                                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary btn-lg">
                                    <i class="fas fa-times"></i> Cancel
                                </a>
                            </div>
                            <div>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <i class="fas fa-trash"></i> Delete Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Delete Confirmation Modal --}}
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle"></i> Confirm Delete
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this post?</p>
                <p class="fw-bold">{{ $post->title }}</p>
                <p class="text-danger"><small>This action cannot be undone!</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Yes, Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
<style>
    .ck-editor__editable {
        min-height: 400px;
    }
    #sourceEditor {
        font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
        resize: vertical;
        tab-size: 4;
    }
    .btn-group .btn {
        transition: all 0.3s ease;
    }
    .seo-preview {
        font-family: Arial, sans-serif;
    }
    .seo-title {
        font-size: 18px;
        font-weight: normal;
        line-height: 1.2;
    }
    .seo-url {
        font-size: 14px;
    }
    .seo-description {
        font-size: 14px;
        line-height: 1.4;
    }
    .select2-container--bootstrap-5 .select2-selection {
        min-height: 38px;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script>
    let editorInstance;
    let isSourceMode = false;
    let editorTextarea = document.querySelector('#editor');

    // Initialize Select2 for tags
    $(document).ready(function() {
        $('#tagsSelect').select2({
            theme: 'bootstrap-5',
            placeholder: 'Select tags...',
            allowClear: true
        });
    });

    // Custom Upload Adapter for CKEditor
    class MyUploadAdapter {
        constructor(loader) {
            this.loader = loader;
        }

        upload() {
            return this.loader.file.then(file => new Promise((resolve, reject) => {
                const data = new FormData();
                data.append('upload', file);
                data.append('_token', '{{ csrf_token() }}');

                console.log('Uploading image...');

                fetch('{{ route("admin.upload.image") }}', {
                    method: 'POST',
                    body: data,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    console.log('Response status:', response.status);
                    return response.text().then(text => {
                        try {
                            const json = JSON.parse(text);
                            if (!response.ok) {
                                throw new Error(json.error?.message || json.message || 'Upload failed');
                            }
                            return json;
                        } catch (e) {
                            console.error('Response text:', text);
                            throw new Error('Server error: ' + text.substring(0, 100));
                        }
                    });
                })
                .then(result => {
                    console.log('Upload successful:', result);
                    if (result.url) {
                        resolve({ default: result.url });
                    } else {
                        throw new Error('No URL in response');
                    }
                })
                .catch(error => {
                    console.error('Upload error:', error);
                    alert('Image upload failed: ' + error.message);
                    reject(error);
                });
            }));
        }

        abort() {
            console.log('Upload aborted');
        }
    }

    function MyCustomUploadAdapterPlugin(editor) {
        editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
            return new MyUploadAdapter(loader);
        };
    }

    // Initialize CKEditor
    ClassicEditor
        .create(editorTextarea, {
            extraPlugins: [MyCustomUploadAdapterPlugin],
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'underline', 'strikethrough', '|',
                    'link', 'bulletedList', 'numberedList', '|',
                    'outdent', 'indent', '|',
                    'blockQuote', 'insertTable', 'imageUpload', '|',
                    'undo', 'redo'
                ]
            },
            image: {
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:inline',
                    'imageStyle:block',
                    'imageStyle:side'
                ]
            },
            table: {
                contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
            }
        })
        .then(editor => {
            editorInstance = editor;
            console.log('CKEditor initialized successfully');
            
            // Update word count on change
            editor.model.document.on('change:data', () => {
                editorTextarea.value = editor.getData();
                updateWordCount();
            });

            // Initial word count
            updateWordCount();
        })
        .catch(error => {
            console.error('CKEditor initialization failed:', error);
            alert('Failed to initialize editor. Please refresh the page.');
        });

    // Word Count Function
    function updateWordCount() {
        if (editorInstance) {
            const content = editorInstance.getData();
            const text = content.replace(/<[^>]*>/g, ' ').replace(/\s+/g, ' ').trim();
            const wordCount = text ? text.split(' ').length : 0;
            document.getElementById('wordCount').textContent = wordCount;
        }
    }

    // Form submit handler
    document.getElementById('postForm').addEventListener('submit', function(e) {
        if (isSourceMode) {
            editorTextarea.value = document.getElementById('sourceEditor').value;
        } else if (editorInstance) {
            editorTextarea.value = editorInstance.getData();
        }
        
        if (!editorTextarea.value.trim()) {
            e.preventDefault();
            alert('Please enter some content for the post.');
            return false;
        }
        
        console.log('Content being submitted:', editorTextarea.value.substring(0, 100) + '...');
    });

    // Toggle to Visual Mode
    document.getElementById('visualModeBtn').addEventListener('click', function() {
        if (!isSourceMode) return;
        
        isSourceMode = false;
        
        const htmlContent = document.getElementById('sourceEditor').value;
        editorInstance.setData(htmlContent);
        
        document.getElementById('sourceContainer').style.display = 'none';
        document.getElementById('editorContainer').style.display = 'block';
        
        this.classList.remove('btn-outline-primary');
        this.classList.add('btn-primary');
        document.getElementById('htmlModeBtn').classList.remove('btn-primary');
        document.getElementById('htmlModeBtn').classList.add('btn-outline-primary');
    });

    // Toggle to HTML Mode
    document.getElementById('htmlModeBtn').addEventListener('click', function() {
        if (isSourceMode) return;
        
        isSourceMode = true;
        
        const htmlContent = editorInstance.getData();
        document.getElementById('sourceEditor').value = formatHTML(htmlContent);
        
        document.getElementById('editorContainer').style.display = 'none';
        document.getElementById('sourceContainer').style.display = 'block';
        
        this.classList.remove('btn-outline-primary');
        this.classList.add('btn-primary');
        document.getElementById('visualModeBtn').classList.remove('btn-primary');
        document.getElementById('visualModeBtn').classList.add('btn-outline-primary');
    });

    // Format HTML for better readability
    function formatHTML(html) {
        let formatted = '';
        let indent = 0;
        const tab = '    ';
        
        html = html.replace(/></g, '>\n<');
        const lines = html.split('\n');
        
        lines.forEach(line => {
            line = line.trim();
            if (!line) return;
            
            if (line.match(/^<\/\w/)) {
                indent = Math.max(0, indent - 1);
            }
            
            formatted += tab.repeat(indent) + line + '\n';
            
            if (line.match(/^<\w[^>]*[^\/]>/) && !line.match(/^<(br|hr|img|input|meta|link)/i)) {
                indent++;
            }
        });
        
        return formatted.trim();
    }

    // Handle Tab key in source editor
    document.getElementById('sourceEditor').addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
            e.preventDefault();
            const start = this.selectionStart;
            const end = this.selectionEnd;
            this.value = this.value.substring(0, start) + '    ' + this.value.substring(end);
            this.selectionStart = this.selectionEnd = start + 4;
        }
    });

    // Slug Generator
    document.getElementById('regenerateSlug').addEventListener('click', function() {
        const title = document.querySelector('input[name="title"]').value;
        if (title) {
            const slug = title
                .toLowerCase()
                .replace(/[^\w\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim();
            document.getElementById('slugInput').value = slug;
        }
    });

    // Auto-generate slug on title change (only if slug is empty)
    document.querySelector('input[name="title"]').addEventListener('input', function() {
        const slugInput = document.getElementById('slugInput');
        if (!slugInput.value || slugInput.dataset.autoGenerated === 'true') {
            const slug = this.value
                .toLowerCase()
                .replace(/[^\w\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim();
            slugInput.value = slug;
            slugInput.dataset.autoGenerated = 'true';
        }
    });

    // Mark slug as manually edited
    document.getElementById('slugInput').addEventListener('input', function() {
        this.dataset.autoGenerated = 'false';
    });

    // Featured Image Preview
    function previewNewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('newImage').src = e.target.result;
                document.getElementById('newImagePreview').style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Remove Current Image
    function removeCurrentImage() {
        if (confirm('Are you sure you want to remove the current image?')) {
            document.getElementById('currentImageContainer').style.display = 'none';
            document.getElementById('removeImageInput').value = '1';
        }
    }

    // SEO Character Counters
    document.querySelector('input[name="meta_title"]').addEventListener('input', function() {
        document.getElementById('metaTitleCount').textContent = this.value.length;
        document.getElementById('seoPreviewTitle').textContent = this.value || document.querySelector('input[name="title"]').value;
    });

    document.querySelector('textarea[name="meta_description"]').addEventListener('input', function() {
        document.getElementById('metaDescCount').textContent = this.value.length;
        document.getElementById('seoPreviewDesc').textContent = this.value || 'No description provided...';
    });

    // Update SEO preview on title change
    document.querySelector('input[name="title"]').addEventListener('input', function() {
        const metaTitle = document.querySelector('input[name="meta_title"]').value;
        if (!metaTitle) {
            document.getElementById('seoPreviewTitle').textContent = this.value;
        }
    });
</script>
@endpush
@endsection