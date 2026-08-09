@extends('adminDashboard.index')

@section('title', 'Edit Categories')

@section('adminDashboard.content')
<style>
    .category-form-page {
        --cf-bg: linear-gradient(130deg, #eff6ff 0%, #f8fafc 45%, #eef2ff 100%);
        --cf-surface: rgba(255, 255, 255, 0.86);
        --cf-text: #0f172a;
        --cf-muted: #64748b;
        --cf-border: rgba(148, 163, 184, 0.28);
        --cf-shadow: 0 20px 42px rgba(15, 23, 42, 0.12);
    }

    html[data-theme=dark] .category-form-page {
        --cf-bg: radial-gradient(circle at top, #1e293b 0%, #0f172a 48%, #111827 100%);
        --cf-surface: rgba(15, 23, 42, 0.88);
        --cf-text: #e2e8f0;
        --cf-muted: #94a3b8;
        --cf-border: rgba(148, 163, 184, 0.24);
        --cf-shadow: 0 24px 48px rgba(2, 6, 23, 0.55);
    }

    .category-form-page {
        background: var(--cf-bg);
        border-radius: 18px;
        padding: 18px;
    }

    .category-form-page .cat-form-card {
        background: var(--cf-surface);
        border: 1px solid var(--cf-border);
        box-shadow: var(--cf-shadow);
        border-radius: 16px;
        backdrop-filter: blur(10px);
    }

    .category-form-page .cat-form-card h3,
    .category-form-page .form-label,
    .category-form-page .form-control,
    .category-form-page .form-check-label,
    .category-form-page .slug-preview {
        color: var(--cf-text);
    }

    .category-form-page .form-control,
    .category-form-page textarea {
        border-color: var(--cf-border);
        background: rgba(255, 255, 255, 0.88);
        min-height: 44px;
    }

    html[data-theme=dark] .category-form-page .form-control,
    html[data-theme=dark] .category-form-page textarea {
        background: rgba(30, 41, 59, 0.8);
        border-color: #475569;
        color: #f8fafc;
    }

    .category-form-page .text-muted {
        color: var(--cf-muted) !important;
    }

    .current-image-box,
    .selected-image-box {
        border: 1px dashed var(--cf-border);
        border-radius: 12px;
        padding: 10px;
        margin-top: 10px;
    }

    .current-image-box img,
    .selected-image-box img {
        width: 100%;
        max-height: 220px;
        object-fit: cover;
        border-radius: 10px;
    }

    .selected-image-box {
        display: none;
    }

    .selected-image-actions {
        margin-top: 10px;
        display: flex;
        justify-content: flex-end;
    }
</style>

<div class="container-fluid category-form-page">
    <div class="row">
        <div class="col-xl-8 col-lg-10 mx-auto">
            <div class="card cat-form-card">
                <div class="card-header bg-transparent border-0 pb-0 d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Edit Category</h3>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
                <div class="card-body pt-3">
                    <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data" id="editCategoryForm">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Category Name *</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Slug</label>
                            <input type="text" class="form-control slug-preview" value="{{ $category->slug }}" disabled>
                            <small class="text-muted">Slug is auto-generated</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="4" class="form-control">{{ old('description', $category->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category Image</label>

                            @if($category->image)
                                <div class="current-image-box" id="currentImageBox">
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="Current category image">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="removeCurrentImage" name="remove_image" value="1" {{ old('remove_image') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="removeCurrentImage">Remove current image</label>
                                    </div>
                                </div>
                            @endif

                            <input type="file" id="categoryImageInput" name="image" class="form-control @error('image') is-invalid @enderror mt-2" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Leave empty to keep current image</small>

                            <div class="selected-image-box" id="selectedImageBox">
                                <img id="selectedImagePreview" alt="Selected category image preview">
                                <div class="selected-image-actions">
                                    <button type="button" class="btn btn-outline-danger btn-sm" id="clearSelectedImageBtn">
                                        <i class="fas fa-trash"></i> Remove Selected Image
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 flex-wrap">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Category
                            </button>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const imageInput = document.getElementById('categoryImageInput');
    const previewBox = document.getElementById('selectedImageBox');
    const previewImage = document.getElementById('selectedImagePreview');
    const clearButton = document.getElementById('clearSelectedImageBtn');
    const removeCurrentImage = document.getElementById('removeCurrentImage');
    const currentImageBox = document.getElementById('currentImageBox');

    function resetPreview() {
        previewImage.removeAttribute('src');
        previewBox.style.display = 'none';
    }

    imageInput?.addEventListener('change', function (event) {
        const file = event.target.files && event.target.files[0];
        if (!file) {
            resetPreview();
            return;
        }

        const reader = new FileReader();
        reader.onload = function (loadEvent) {
            previewImage.src = loadEvent.target.result;
            previewBox.style.display = 'block';
        };
        reader.readAsDataURL(file);

        if (removeCurrentImage) {
            removeCurrentImage.checked = false;
        }
    });

    clearButton?.addEventListener('click', function () {
        imageInput.value = '';
        resetPreview();
    });

    removeCurrentImage?.addEventListener('change', function () {
        if (removeCurrentImage.checked && currentImageBox) {
            currentImageBox.style.opacity = '0.55';
        } else if (currentImageBox) {
            currentImageBox.style.opacity = '1';
        }
    });
});
</script>
@endsection

