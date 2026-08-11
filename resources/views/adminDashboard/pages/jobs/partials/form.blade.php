@php
    $requirementsText = old('requirements', $job?->requirements ? implode("\n", $job->requirements) : '');
    $responsibilitiesText = old('responsibilities', $job?->responsibilities ? implode("\n", $job->responsibilities) : '');
@endphp

<div class="row g-3">
    <div class="col-md-6"><label class="form-label">Title</label><input type="text" name="title" class="form-control" value="{{ old('title', $job?->title) }}" required></div>
    <div class="col-md-6"><label class="form-label">Department</label><input type="text" name="department" class="form-control" value="{{ old('department', $job?->department) }}"></div>
    <div class="col-md-6"><label class="form-label">Location</label><input type="text" name="location" class="form-control" value="{{ old('location', $job?->location ?? 'Noida / Remote') }}"></div>
    <div class="col-md-6">
        <label class="form-label">Employment Type</label>
        <select name="employment_type" class="form-select" required>
            @foreach($employmentTypes as $key => $label)
                <option value="{{ $key }}" {{ old('employment_type', $job?->employment_type ?? 'full_time') === $key ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6"><label class="form-label">Experience Level</label><input type="text" name="experience_level" class="form-control" value="{{ old('experience_level', $job?->experience_level) }}"></div>
    <div class="col-md-6"><label class="form-label">Salary Range</label><input type="text" name="salary_range" class="form-control" value="{{ old('salary_range', $job?->salary_range) }}"></div>
    <div class="col-12"><label class="form-label">Summary</label><textarea name="summary" rows="2" class="form-control">{{ old('summary', $job?->summary) }}</textarea></div>
    <div class="col-md-6"><label class="form-label">Requirements</label><textarea name="requirements" rows="5" class="form-control" placeholder="One line per requirement">{{ $requirementsText }}</textarea></div>
    <div class="col-md-6"><label class="form-label">Responsibilities</label><textarea name="responsibilities" rows="5" class="form-control" placeholder="One line per responsibility">{{ $responsibilitiesText }}</textarea></div>
    <div class="col-md-3"><label class="form-label">Status</label><select name="is_active" class="form-select"><option value="1" {{ old('is_active', $job?->is_active ?? true ? '1' : '0') == '1' ? 'selected' : '' }}>Active</option><option value="0" {{ old('is_active', $job?->is_active ?? true ? '1' : '0') == '0' ? 'selected' : '' }}>Inactive</option></select></div>
    <div class="col-md-3"><label class="form-label">Order</label><input type="number" name="order" class="form-control" min="0" value="{{ old('order', $job?->order ?? 0) }}"></div>
</div>
