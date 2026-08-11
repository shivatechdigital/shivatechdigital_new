@php
    $featuresText = old('features', $plan?->features ? implode("\n", $plan->features) : '');
@endphp
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Category</label>
        <select name="category" class="form-select" required>
            @foreach($categories as $key => $label)
                <option value="{{ $key }}" {{ old('category', $plan?->category) === $key ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6"><label class="form-label">Title</label><input type="text" name="title" class="form-control" value="{{ old('title', $plan?->title) }}" required></div>
    <div class="col-md-6"><label class="form-label">Price Label</label><input type="text" name="price_label" class="form-control" value="{{ old('price_label', $plan?->price_label) }}" required></div>
    <div class="col-md-6"><label class="form-label">Sort Order</label><input type="number" name="sort_order" class="form-control" min="0" value="{{ old('sort_order', $plan?->sort_order ?? 0) }}"></div>
    <div class="col-12"><label class="form-label">Description</label><textarea name="description" class="form-control" rows="2">{{ old('description', $plan?->description) }}</textarea></div>
    <div class="col-12"><label class="form-label">Features</label><textarea name="features" class="form-control" rows="4" placeholder="One line per feature">{{ $featuresText }}</textarea></div>
    <div class="col-md-3"><label class="form-label">Popular</label><select name="is_popular" class="form-select"><option value="1" {{ old('is_popular', $plan?->is_popular ? '1' : '0') == '1' ? 'selected' : '' }}>Yes</option><option value="0" {{ old('is_popular', $plan?->is_popular ? '1' : '0') == '0' ? 'selected' : '' }}>No</option></select></div>
    <div class="col-md-3"><label class="form-label">Active</label><select name="is_active" class="form-select"><option value="1" {{ old('is_active', $plan?->is_active ?? true ? '1' : '0') == '1' ? 'selected' : '' }}>Yes</option><option value="0" {{ old('is_active', $plan?->is_active ?? true ? '1' : '0') == '0' ? 'selected' : '' }}>No</option></select></div>
</div>
