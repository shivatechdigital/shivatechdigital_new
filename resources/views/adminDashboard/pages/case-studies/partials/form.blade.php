@php
    $metricsText = old('result_metrics');
    if ($metricsText === null && $caseStudy?->result_metrics) {
        $metricsText = collect($caseStudy->result_metrics)->map(fn($m) => ($m['label'] ?? '') . '|' . ($m['value'] ?? ''))->implode("\n");
    }

    $technologiesText = old('technologies', $caseStudy?->technologies ? implode(', ', $caseStudy->technologies) : '');
@endphp

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $caseStudy?->title) }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Industry</label>
        <input type="text" name="industry" class="form-control" value="{{ old('industry', $caseStudy?->industry) }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Client Name</label>
        <input type="text" name="client_name" class="form-control" value="{{ old('client_name', $caseStudy?->client_name) }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Project Type</label>
        <input type="text" name="project_type" class="form-control" value="{{ old('project_type', $caseStudy?->project_type) }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Thumbnail</label>
        <input type="file" name="thumbnail" class="form-control" accept="image/*">
        @if($caseStudy?->thumbnail)
            <small class="text-muted d-block mt-1">Current: {{ $caseStudy->thumbnail }}</small>
        @endif
    </div>
    <div class="col-md-3">
        <label class="form-label">Featured</label>
        <select name="is_featured" class="form-select">
            <option value="1" {{ old('is_featured', $caseStudy?->is_featured ? '1' : '0') == '1' ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ old('is_featured', $caseStudy?->is_featured ? '1' : '0') == '0' ? 'selected' : '' }}>No</option>
        </select>
    </div>
    <div class="col-md-3">
        <label class="form-label">Active</label>
        <select name="is_active" class="form-select">
            <option value="1" {{ old('is_active', $caseStudy?->is_active ?? true ? '1' : '0') == '1' ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ old('is_active', $caseStudy?->is_active ?? true ? '1' : '0') == '0' ? 'selected' : '' }}>No</option>
        </select>
    </div>
    <div class="col-md-3">
        <label class="form-label">Order</label>
        <input type="number" name="order" class="form-control" value="{{ old('order', $caseStudy?->order ?? 0) }}" min="0">
    </div>
    <div class="col-12">
        <label class="form-label">Challenge</label>
        <textarea name="challenge" class="form-control" rows="3">{{ old('challenge', $caseStudy?->challenge) }}</textarea>
    </div>
    <div class="col-12">
        <label class="form-label">Solution</label>
        <textarea name="solution" class="form-control" rows="3">{{ old('solution', $caseStudy?->solution) }}</textarea>
    </div>
    <div class="col-12">
        <label class="form-label">Results</label>
        <textarea name="results" class="form-control" rows="3">{{ old('results', $caseStudy?->results) }}</textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label">Result Metrics</label>
        <textarea name="result_metrics" class="form-control" rows="4" placeholder="Label|Value\nPage Speed|62%">{{ $metricsText }}</textarea>
        <small class="text-muted">One per line in format: Label|Value</small>
    </div>
    <div class="col-md-6">
        <label class="form-label">Technologies</label>
        <textarea name="technologies" class="form-control" rows="4" placeholder="Laravel, Vue, MySQL">{{ $technologiesText }}</textarea>
    </div>
</div>
