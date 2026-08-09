@extends('adminDashboard.index')
@section('adminDashboard.content')
<style>
    /* =========================================
       PAGE
    ========================================= */

    .create-post-page.container-fluid{
        padding: 30px;
        background: linear-gradient(135deg, #eff5ff 0%, #f9fbff 45%, #eef2ff 100%);
        border-radius: 18px;
    }

    html[data-theme=dark] .create-post-page.container-fluid {
        background: radial-gradient(circle at top left, #1e293b 0%, #0f172a 45%, #111827 100%);
    }

    .create-post-page .card{
        border: none;
        border-radius: 20px;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.92);
        box-shadow: 0 10px 40px rgba(0,0,0,0.06);
    }

    html[data-theme=dark] .create-post-page .card {
        background: rgba(17, 24, 39, 0.82);
        border: 1px solid rgba(148, 163, 184, 0.2);
    }

    .create-post-page .card-header{
        background: linear-gradient(135deg,#4f46e5,#7c3aed);
        padding: 22px 30px;
        border: none;
    }

    .create-post-page .card-header h3{
        color: #fff;
        font-size: 28px;
        font-weight: 700;
        margin: 0;
    }

    .create-post-page .card-body{
        padding: 35px;
    }

    /* =========================================
       LABELS
    ========================================= */

    .create-post-page .form-label{
        font-weight: 600;
        color: #111827;
        margin-bottom: 10px;
        font-size: 15px;
    }

    html[data-theme=dark] .create-post-page .form-label,
    html[data-theme=dark] .create-post-page h5,
    html[data-theme=dark] .create-post-page .text-muted {
        color: #e2e8f0 !important;
    }

    /* =========================================
       INPUTS
    ========================================= */

    .create-post-page .form-control,
    .create-post-page .form-select,
    .create-post-page select{
        min-height: 52px;
        border-radius: 14px !important;
        border: 1px solid #dbe2ea !important;
        background: #f9fafb !important;
        font-size: 15px;
        padding: 12px 18px;
        transition: all .3s ease;
        box-shadow: none !important;
    }

    textarea.form-control{
        min-height: 120px;
    }

    .create-post-page .form-control:focus,
    .create-post-page .form-select:focus,
    .create-post-page select:focus{
        border-color: #4f46e5 !important;
        background: #fff !important;
        box-shadow: 0 0 0 4px rgba(79,70,229,.12) !important;
    }

    html[data-theme=dark] .create-post-page .form-control,
    html[data-theme=dark] .create-post-page .form-select,
    html[data-theme=dark] .create-post-page select {
        background: rgba(30, 41, 59, 0.76) !important;
        color: #f8fafc !important;
        border-color: #475569 !important;
    }

    html[data-theme=dark] .create-post-page .form-control::placeholder {
        color: #94a3b8;
    }

    /* =========================================
       SELECT2
    ========================================= */

    .select2-container--default .select2-selection--multiple{
        border-radius: 14px !important;
        border: 1px solid #dbe2ea !important;
        min-height: 52px !important;
        padding: 6px 8px !important;
        background: #f9fafb !important;
        display: flex !important;
        flex-wrap: wrap;
        align-items: center;
        gap: 6px;
    }

    .create-post-page .select2-container {
        width: 100% !important;
    }

    .create-post-page .select2-container--default .select2-search--inline {
        flex: 1 0 130px;
    }

    .create-post-page .select2-container--default .select2-search--inline .select2-search__field {
        width: 100% !important;
        min-width: 120px;
        margin-top: 0 !important;
    }

    .select2-selection__choice{
        background: linear-gradient(135deg,#4f46e5,#7c3aed) !important;
        border: none !important;
        color: white !important;
        border-radius: 30px !important;
        padding: 6px 12px !important;
        font-size: 13px !important;
    }

    html[data-theme=dark] .create-post-page .select2-container--default .select2-selection--multiple {
        background: rgba(30, 41, 59, 0.76) !important;
        border-color: #475569 !important;
    }

    html[data-theme=dark] .create-post-page .select2-container--default .select2-selection__choice {
        color: #ffffff !important;
    }

    html[data-theme=dark] .create-post-page .select2-container--default .select2-search--inline .select2-search__field {
        color: #f8fafc !important;
    }

    html[data-theme=dark] .select2-dropdown {
        background: #111827 !important;
        color: #e2e8f0 !important;
        border-color: #334155 !important;
    }

    html[data-theme=dark] .select2-results__option {
        color: #e2e8f0 !important;
    }

    html[data-theme=dark] .select2-results__option--highlighted[aria-selected] {
        background-color: #2563eb !important;
        color: #ffffff !important;
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
        background: #f3f4f6 !important;
        border: none !important;
        padding: 10px !important;
    }

    .ck-editor__editable{
        min-height: 500px !important;
        padding: 25px !important;
        font-size: 16px !important;
        line-height: 1.9 !important;
    }

    /* =========================================
       SOURCE EDITOR
    ========================================= */

    #sourceEditor{
        background: #111827 !important;
        color: #f9fafb !important;
        border-radius: 16px !important;
        border: none !important;
        padding: 20px !important;
        min-height: 500px;
    }

    #editorContainer,
    #sourceContainer {
        min-height: 520px;
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
        transform: none;
        box-shadow: 0 10px 25px rgba(79,70,229,.25);
    }

    .create-post-page .btn {
        position: relative;
        top: 0;
    }

    .btn-secondary{
        background: #e5e7eb;
        border: none;
        color: #111827;
    }

    .btn-group .btn{
        border-radius: 12px !important;
    }

    .editor-mode-toggle {
        display: inline-flex;
        gap: 10px;
    }

    .editor-mode-toggle .btn {
        border-radius: 14px !important;
        min-width: 102px;
    }

    .editor-mode-toggle .btn-outline-primary {
        color: #2563eb;
        border-color: #2563eb;
        background: transparent;
    }

    html[data-theme=dark] .editor-mode-toggle .btn-outline-primary {
        color: #93c5fd;
        border-color: #3b82f6;
        background: rgba(30, 41, 59, 0.5);
    }

    html[data-theme=dark] .editor-mode-toggle .btn-primary {
        color: #ffffff;
    }

    /* =========================================
       HEADINGS
    ========================================= */

    .create-post-page h5{
        font-size: 24px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 20px;
    }

    /* =========================================
       FILE INPUT
    ========================================= */

    .create-post-page input[type="file"]{
        padding: 12px;
        background: #f9fafb;
    }

    /* =========================================
       CHECKBOX
    ========================================= */

    .create-post-page .form-check-input{
        width: 20px;
        height: 20px;
        margin-top: 2px;
    }

    .create-post-page .form-check-label{
        margin-left: 10px;
        font-weight: 600;
    }

    /* =========================================
       WORD COUNT
    ========================================= */

    .create-post-page #wordCount{
        font-weight: 700;
        color: #4f46e5;
    }

    .create-action-bar {
        position: sticky;
        bottom: 0;
        z-index: 5;
        background: rgba(255,255,255,0.95);
        border-top: 1px solid #e2e8f0;
        margin: 24px -35px -35px;
        padding: 14px 35px;
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    html[data-theme=dark] .create-action-bar {
        background: rgba(15,23,42,0.95);
        border-top-color: #334155;
    }

    /* =========================================
       MOBILE
    ========================================= */

    @media(max-width:768px){

        .create-post-page.container-fluid{
            padding: 15px;
        }

        .create-post-page .card-body{
            padding: 20px;
        }

        .create-post-page .row{
            flex-direction: column;
        }

        .create-action-bar {
            margin: 20px -20px -20px;
            padding: 12px 20px;
            position: static;
        }

    }
</style>
<div class="container-fluid create-post-page">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Create New Post</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" id="postForm">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">Title *</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
                                    <label class="form-label">Tags</label>
                                    <select name="tags[]" id="tagsSelect" class="form-control" multiple>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Excerpt</label>
                            <textarea name="excerpt" rows="3" class="form-control">{{ old('excerpt') }}</textarea>
                        </div>

                        <!-- Content Editor with Source Toggle -->
                        <h5 class="mt-4 mb-3"><i class="fas fa-edit"></i> Content</h5>
                        
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label class="form-label mb-0">Content * <small class="text-muted">(Min 300 words recommended)</small></label>
                                <div class="btn-group editor-mode-toggle" role="group">
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
                                          style="font-size: 13px; background-color: white; color: #d4d4d4; border-radius: 6px;"></textarea>
                            </div>
                            
                            <small class="text-muted mt-1 d-block">Word count: <span id="wordCount">0</span> words</small>
                            @error('content')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Featured Image</label>
                            <input type="file" name="featured_image" class="form-control" accept="image/*">
                        </div>

                        <!-- SEO Fields -->
                        <h5 class="mt-4">SEO Settings</h5>
                        <div class="mb-3">
                            <label class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Meta Description</label>
                            <textarea name="meta_description" rows="2" class="form-control">{{ old('meta_description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Meta Keywords</label>
                            <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords') }}">
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" name="is_published" value="1" class="form-check-input" id="published" {{ old('is_published') ? 'checked' : '' }}>
                            <label class="form-check-label" for="published">Publish Now</label>
                        </div>

                        <div class="create-action-bar">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Create Post
                            </button>
                            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
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
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script>
    let editorInstance;
    let isSourceMode = false;
    let editorTextarea = document.querySelector('#editor');

    if (window.jQuery && $('#tagsSelect').length) {
        $('#tagsSelect').select2({
            placeholder: 'Select Tags',
            width: '100%',
            closeOnSelect: false
        });
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
            
            // Set old content if validation fails
            const oldContent = `{!! addslashes(old('content', '')) !!}`;
            if (oldContent) {
                editor.setData(oldContent);
            }

            // Auto-update textarea on editor change
            editor.model.document.on('change:data', () => {
                editorTextarea.value = editor.getData();
            });
        })
        .catch(error => {
            console.error('CKEditor initialization failed:', error);
            alert('Failed to initialize editor. Please refresh the page.');
        });

    // Form submit handler - CRITICAL
    document.getElementById('postForm').addEventListener('submit', function(e) {
        if (isSourceMode) {
            // If in HTML mode, get content from source editor
            editorTextarea.value = document.getElementById('sourceEditor').value;
        } else if (editorInstance) {
            // If in visual mode, get content from CKEditor
            editorTextarea.value = editorInstance.getData();
        }
        
        // Validate content is not empty
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
        
        // Get HTML from source editor and set to CKEditor
        const htmlContent = document.getElementById('sourceEditor').value;
        editorInstance.setData(htmlContent);
        
        // Toggle visibility
        document.getElementById('sourceContainer').style.display = 'none';
        document.getElementById('editorContainer').style.display = 'block';
        
        // Update button styles
        this.classList.remove('btn-outline-primary');
        this.classList.add('btn-primary');
        document.getElementById('htmlModeBtn').classList.remove('btn-primary');
        document.getElementById('htmlModeBtn').classList.add('btn-outline-primary');
    });

    // Toggle to HTML Mode
    document.getElementById('htmlModeBtn').addEventListener('click', function() {
        if (isSourceMode) return;
        
        isSourceMode = true;
        
        // Get HTML from CKEditor and set to source editor
        const htmlContent = editorInstance.getData();
        document.getElementById('sourceEditor').value = formatHTML(htmlContent);
        
        // Toggle visibility
        document.getElementById('editorContainer').style.display = 'none';
        document.getElementById('sourceContainer').style.display = 'block';
        
        // Update button styles
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
</script>
@endpush
@endsection