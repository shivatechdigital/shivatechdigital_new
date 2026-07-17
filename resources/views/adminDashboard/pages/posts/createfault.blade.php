@extends('adminDashboard.index')
@section('adminDashboard.content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Create New Blog Post</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" id="postForm">
                        @csrf
                        
                        <!-- Basic Information -->
                        <h5 class="mb-3"><i class="fas fa-file-alt"></i> Basic Information</h5>
                        
                        <div class="mb-3">
                            <label class="form-label">Title *</label>
                            <input type="text" name="title" id="postTitle" class="form-control @error('title') is-invalid @enderror" 
                                   value="{{ old('title') }}" required maxlength="200"
                                   placeholder="Enter your blog post title (50-60 characters recommended)">
                            <small class="text-muted">Character count: <span id="titleCount">0</span>/60 (optimal for SEO)</small>
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Slug (URL) *</label>
                            <input type="text" name="slug" id="postSlug" class="form-control @error('slug') is-invalid @enderror" 
                                   value="{{ old('slug') }}" required
                                   placeholder="auto-generated-from-title">
                            <small class="text-muted">Will be auto-generated from title. Use lowercase with hyphens.</small>
                            @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Category *</label>
                                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Tags <small class="text-muted">(Select multiple)</small></label>
                                    <select name="tags[]" class="form-control select2-tags" multiple>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted">Add relevant tags for better organization</small>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Excerpt/Summary</label>
                            <textarea name="excerpt" id="postExcerpt" rows="3" class="form-control" 
                                      maxlength="300" placeholder="Brief summary of your post (150-160 characters recommended)">{{ old('excerpt') }}</textarea>
                            <small class="text-muted">Character count: <span id="excerptCount">0</span>/160 (optimal for meta description)</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Author Name</label>
                            <input type="text" name="author_name" class="form-control" 
                                   value="{{ old('author_name', auth()->user()->name) }}"
                                   placeholder="Author display name">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Reading Time (minutes)</label>
                                    <input type="number" name="reading_time" class="form-control" 
                                           value="{{ old('reading_time', 5) }}" min="1" max="120"
                                           placeholder="Estimated reading time">
                                    <small class="text-muted">Will be auto-calculated if left empty</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Published Date</label>
                                    <input type="datetime-local" name="published_at" class="form-control" 
                                           value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}">
                                </div>
                            </div>
                        </div>

                        <!-- Content Editor -->
                        <h5 class="mt-4 mb-3"><i class="fas fa-edit"></i> Content</h5>
                        
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label class="form-label mb-0">Content * <small class="text-muted">(Min 300 words recommended)</small></label>
                                <div class="btn-group" role="group">
                                    <button type="button" id="visualModeBtn" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i> Visual
                                    </button>
                                    <button type="button" id="htmlModeBtn" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-code"></i> HTML
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Visual Editor Container -->
                            <div id="editorContainer">
                                <textarea name="content" id="editor" class="form-control @error('content') is-invalid @enderror" style="display:none;">{{ old('content') }}</textarea>
                            </div>
                            
                            <!-- HTML Source Editor (Hidden by default) -->
                            <div id="sourceContainer" style="display: none;">
                                <textarea id="sourceEditor" class="form-control font-monospace" rows="20" 
                                          style="font-size: 13px; background-color: #1e1e1e; color: #d4d4d4; border-radius: 6px;"></textarea>
                            </div>
                            
                            <small class="text-muted mt-1 d-block">Word count: <span id="wordCount">0</span> words</small>
                            @error('content')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>

                        <!-- Featured Image -->
                        <h5 class="mt-4 mb-3"><i class="fas fa-image"></i> Featured Image</h5>
                        
                        <div class="mb-3">
                            <label class="form-label">Featured Image *</label>
                            <input type="file" name="featured_image" id="featuredImage" class="form-control" accept="image/*" onchange="previewImage(event)">
                            <small class="text-muted">Recommended: 1200x630px (16:9 ratio), Max 2MB, JPG/PNG/WebP</small>
                            <div id="imagePreview" class="mt-2" style="display: none;">
                                <img id="preview" src="" alt="Preview" style="max-width: 300px; border-radius: 8px; border: 2px solid #dee2e6;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image Alt Text *</label>
                            <input type="text" name="image_alt" class="form-control" 
                                   value="{{ old('image_alt') }}"
                                   placeholder="Descriptive alt text for SEO and accessibility">
                            <small class="text-muted">Describe the image for search engines and screen readers</small>
                        </div>

                        <!-- SEO Fields -->
                        <h5 class="mt-4 mb-3"><i class="fas fa-search"></i> SEO Settings</h5>
                        
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> <strong>SEO Tips:</strong> 
                            Optimize these fields to improve search engine rankings. Leave blank to auto-generate from title and content.
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" id="metaTitle" class="form-control" 
                                   value="{{ old('meta_title') }}" maxlength="200"
                                   placeholder="SEO-optimized title (50-60 characters)">
                            <small class="text-muted">Character count: <span id="metaTitleCount">0</span>/60. If empty, post title will be used.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Meta Description</label>
                            <textarea name="meta_description" id="metaDescription" rows="3" class="form-control" 
                                      maxlength="200" placeholder="Compelling description for search results (150-160 characters)">{{ old('meta_description') }}</textarea>
                            <small class="text-muted">Character count: <span id="metaDescCount">0</span>/160. If empty, excerpt will be used.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Meta Keywords</label>
                            <input type="text" name="meta_keywords" class="form-control" 
                                   value="{{ old('meta_keywords') }}"
                                   placeholder="keyword1, keyword2, keyword3">
                            <small class="text-muted">Comma-separated keywords (5-10 keywords recommended)</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Canonical URL <small class="text-muted">(Optional)</small></label>
                            <input type="url" name="canonical_url" class="form-control" 
                                   value="{{ old('canonical_url') }}"
                                   placeholder="https://example.com/original-post">
                            <small class="text-muted">Use if this content is published elsewhere first</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Focus Keyword</label>
                            <input type="text" name="focus_keyword" class="form-control" 
                                   value="{{ old('focus_keyword') }}"
                                   placeholder="Primary keyword to rank for">
                            <small class="text-muted">The main keyword you want to rank for in search engines</small>
                        </div>

                        <!-- Schema/Structured Data -->
                        <h5 class="mt-4 mb-3"><i class="fas fa-code"></i> Schema Markup (Advanced)</h5>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Article Type</label>
                                    <select name="article_type" class="form-control">
                                        <option value="BlogPosting" selected>Blog Posting</option>
                                        <option value="Article">Article</option>
                                        <option value="NewsArticle">News Article</option>
                                        <option value="TechArticle">Tech Article</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Article Section</label>
                                    <input type="text" name="article_section" class="form-control" 
                                           value="{{ old('article_section', 'Blog') }}"
                                           placeholder="e.g., Digital Marketing">
                                </div>
                            </div>
                        </div>

                        <!-- Open Graph / Social Media -->
                        <h5 class="mt-4 mb-3"><i class="fab fa-facebook"></i> Social Media (Open Graph)</h5>
                        
                        <div class="mb-3">
                            <label class="form-label">OG Title <small class="text-muted">(For Facebook, LinkedIn)</small></label>
                            <input type="text" name="og_title" class="form-control" 
                                   value="{{ old('og_title') }}"
                                   placeholder="Title when shared on social media">
                            <small class="text-muted">Leave blank to use meta title</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">OG Description</label>
                            <textarea name="og_description" rows="2" class="form-control" 
                                      maxlength="200" placeholder="Description for social media shares">{{ old('og_description') }}</textarea>
                            <small class="text-muted">Leave blank to use meta description</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Twitter Card Type</label>
                            <select name="twitter_card" class="form-control">
                                <option value="summary_large_image" selected>Summary with Large Image</option>
                                <option value="summary">Summary</option>
                            </select>
                        </div>

                        <!-- Publishing Options -->
                        <h5 class="mt-4 mb-3"><i class="fas fa-cog"></i> Publishing Options</h5>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3 form-check">
                                    <input type="checkbox" name="is_published" value="1" class="form-check-input" 
                                           id="published" {{ old('is_published', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="published">
                                        <strong>Publish Now</strong>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 form-check">
                                    <input type="checkbox" name="is_featured" value="1" class="form-check-input" 
                                           id="featured" {{ old('is_featured') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="featured">
                                        <strong>Featured Post</strong>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 form-check">
                                    <input type="checkbox" name="allow_comments" value="1" class="form-check-input" 
                                           id="comments" {{ old('allow_comments', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="comments">
                                        <strong>Allow Comments</strong>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Post Status</label>
                            <select name="status" class="form-control">
                                <option value="published" selected>Published</option>
                                <option value="draft">Draft</option>
                                <option value="scheduled">Scheduled</option>
                            </select>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-4 pt-3 border-top">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save"></i> Create Post
                            </button>
                            <button type="submit" name="save_draft" value="1" class="btn btn-outline-secondary btn-lg">
                                <i class="fas fa-file"></i> Save as Draft
                            </button>
                            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary btn-lg">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .ck-editor__editable {
        min-height: 500px;
        font-size: 16px;
        line-height: 1.8;
    }
    
    #sourceEditor {
        font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
        resize: vertical;
        tab-size: 4;
    }
    
    .btn-group .btn {
        transition: all 0.3s ease;
    }
    
    .card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    .form-label {
        font-weight: 600;
        color: #374151;
    }
    
    h5 {
        color: #1f2937;
        font-weight: 700;
        padding-bottom: 10px;
        border-bottom: 2px solid #e5e7eb;
    }
    
    .select2-container .select2-selection--multiple {
        min-height: 38px;
    }
    
    .alert-info {
        background-color: #dbeafe;
        border-color: #93c5fd;
        color: #1e40af;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script>
    // Initialize Select2 for tags
    $(document).ready(function() {
        $('.select2-tags').select2({
            placeholder: 'Select tags',
            allowClear: true
        });
    });

    let editorInstance;
    let isSourceMode = false;
    let editorTextarea = document.querySelector('#editor');

    // Character counters
    function updateCounter(inputId, counterId, limit = 60) {
        const input = document.getElementById(inputId);
        const counter = document.getElementById(counterId);
        if (input && counter) {
            input.addEventListener('input', function() {
                const length = this.value.length;
                counter.textContent = length;
                counter.style.color = length > limit ? 'red' : length > limit - 10 ? 'orange' : 'inherit';
            });
            // Trigger once for initial value
            input.dispatchEvent(new Event('input'));
        }
    }

    updateCounter('postTitle', 'titleCount', 60);
    updateCounter('postExcerpt', 'excerptCount', 160);
    updateCounter('metaTitle', 'metaTitleCount', 60);
    updateCounter('metaDescription', 'metaDescCount', 160);

    // Auto-generate slug from title
    document.getElementById('postTitle').addEventListener('input', function() {
        const slug = this.value
            .toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim();
        document.getElementById('postSlug').value = slug;
    });

    // Image preview
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').style.display = 'block';
                document.getElementById('preview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    // Custom Upload Adapter
    class MyUploadAdapter {
        constructor(loader) {
            this.loader = loader;
        }

        upload() {
            return this.loader.file.then(file => new Promise((resolve, reject) => {
                const data = new FormData();
                data.append('upload', file);
                data.append('_token', '{{ csrf_token() }}');

                fetch('{{ route("admin.upload.image") }}', {
                    method: 'POST',
                    body: data,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(result => {
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

        abort() {}
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
                    'outdent', 'indent', 'alignment', '|',
                    'blockQuote', 'insertTable', 'imageUpload', 'mediaEmbed', '|',
                    'code', 'codeBlock', 'horizontalLine', '|',
                    'undo', 'redo'
                ]
            },
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' }
                ]
            },
            image: {
                toolbar: [
                    'imageTextAlternative', '|',
                    'imageStyle:inline',
                    'imageStyle:block',
                    'imageStyle:side', '|',
                    'linkImage'
                ]
            },
            table: {
                contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells', 'tableCellProperties', 'tableProperties']
            },
            link: {
                decorators: {
                    openInNewTab: {
                        mode: 'manual',
                        label: 'Open in new tab',
                        attributes: {
                            target: '_blank',
                            rel: 'noopener noreferrer'
                        }
                    }
                }
            }
        })
        .then(editor => {
            editorInstance = editor;
            
            const oldContent = `{!! addslashes(old('content', '')) !!}`;
            if (oldContent) {
                editor.setData(oldContent);
            }

            // Word count
            editor.model.document.on('change:data', () => {
                editorTextarea.value = editor.getData();
                updateWordCount();
            });

            updateWordCount();
        })
        .catch(error => {
            console.error('CKEditor error:', error);
            alert('Failed to initialize editor');
        });

    // Word count
    function updateWordCount() {
        const text = editorInstance ? editorInstance.getData().replace(/<[^>]*>/g, '') : '';
        const words = text.trim().split(/\s+/).filter(word => word.length > 0).length;
        document.getElementById('wordCount').textContent = words;
        document.getElementById('wordCount').style.color = words < 300 ? 'orange' : 'green';
    }

    // Form validation
    document.getElementById('postForm').addEventListener('submit', function(e) {
        if (isSourceMode) {
            editorTextarea.value = document.getElementById('sourceEditor').value;
        } else if (editorInstance) {
            editorTextarea.value = editorInstance.getData();
        }
        
        if (!editorTextarea.value.trim()) {
            e.preventDefault();
            alert('Please enter content for the post.');
            return false;
        }

        // Check word count
        const text = editorTextarea.value.replace(/<[^>]*>/g, '');
        const words = text.trim().split(/\s+/).filter(word => word.length > 0).length;
        if (words < 300) {
            if (!confirm('Your post has less than 300 words. For better SEO, consider adding more content. Continue anyway?')) {
                e.preventDefault();
                return false;
            }
        }
    });

    // Toggle Visual/HTML Mode
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

    // Format HTML
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

    // Tab support in source editor
    document.getElementById('sourceEditor').addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
            e.preventDefault();
            const start = this.selectionStart;
            const end = this.selectionEnd;
            this.value = this.value.substring(0, start) + '    ' + this.value.substring(end);
            this.selectionStart = this.selectionEnd = start + 4;
        }
    });
</script>
@endpush
@endsection