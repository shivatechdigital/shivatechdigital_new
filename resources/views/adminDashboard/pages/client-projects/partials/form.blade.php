@php
    $milestonesText = old('milestones');
    if ($milestonesText === null && $clientProject?->milestones) {
        $milestonesText = collect($clientProject->milestones)->map(function ($milestone) {
            $note = $milestone['note'] ?? '';

            if (str_contains($note, '<')) {
                return $note;
            }

            $title = e($milestone['title'] ?? 'Milestone');
            $status = e($milestone['status'] ?? '');
            $note = e($note);

            return "<h3>{$title}</h3><p>" . ($status ? "<strong>Status:</strong> {$status}<br>" : '') . "{$note}</p>";
        })->implode('');
    }
@endphp

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Client User</label>
        <select name="user_id" class="form-select" required>
            <option value="">Select user</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id', $clientProject?->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }} ({{ $user->email }})</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6"><label class="form-label">Project Title</label><input type="text" name="title" class="form-control" value="{{ old('title', $clientProject?->title) }}" required></div>
    <div class="col-md-6"><label class="form-label">Project Type</label><input type="text" name="project_type" class="form-control" value="{{ old('project_type', $clientProject?->project_type) }}"></div>
    <div class="col-md-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
            @foreach($statusLabels as $key => $label)<option value="{{ $key }}" {{ old('status', $clientProject?->status ?? 'planning') === $key ? 'selected' : '' }}>{{ $label }}</option>@endforeach
        </select>
    </div>
    <div class="col-md-3"><label class="form-label">Progress %</label><input type="number" name="progress" min="0" max="100" class="form-control" value="{{ old('progress', $clientProject?->progress ?? 0) }}" required></div>
    <div class="col-md-3"><label class="form-label">Start Date</label><input type="date" name="start_date" class="form-control" value="{{ old('start_date', optional($clientProject?->start_date)->format('Y-m-d')) }}"></div>
    <div class="col-md-3"><label class="form-label">ETA</label><input type="date" name="estimated_delivery_date" class="form-control" value="{{ old('estimated_delivery_date', optional($clientProject?->estimated_delivery_date)->format('Y-m-d')) }}"></div>
    <div class="col-12"><label class="form-label">Client Note</label><textarea name="client_note" rows="3" class="form-control">{{ old('client_note', $clientProject?->client_note) }}</textarea></div>
    <div class="col-12">
        <label class="form-label" for="milestones">Milestones</label>
        <textarea name="milestones" id="milestones" rows="8" class="form-control">{!! $milestonesText !!}</textarea>
        <small class="milestones-help-text">Use headings, bold text, numbered lists, or bullet lists to share project updates.</small>
    </div>
    <div class="col-md-3"><label class="form-label">Active</label><select name="is_active" class="form-select"><option value="1" {{ old('is_active', $clientProject?->is_active ?? true ? '1' : '0') == '1' ? 'selected' : '' }}>Yes</option><option value="0" {{ old('is_active', $clientProject?->is_active ?? true ? '1' : '0') == '0' ? 'selected' : '' }}>No</option></select></div>
</div>

@once
    @push('styles')
        <style>
            .milestones-help-text {
                color: #000000;
            }

            select.form-select {
                padding-right: 3rem;
                background-position: right 1rem center;
            }

            #milestones + .ck-editor {
                border: 1px solid #cbd5e1;
                border-radius: 6px;
                overflow: hidden;
            }

            #milestones + .ck-editor .ck-toolbar {
                background: #f8fafc;
                border: 0;
                border-bottom: 1px solid #cbd5e1;
            }

            #milestones + .ck-editor .ck-editor__main > .ck-editor__editable {
                min-height: 320px;
                background: #ffffff;
                color: #1e293b;
            }

            #milestones + .ck-editor .ck-button,
            #milestones + .ck-editor .ck-button .ck-button__label {
                color: #334155;
            }

            html[data-theme="dark"] #milestones + .ck-editor {
                border-color: #475569;
            }

            html[data-theme="dark"] .milestones-help-text {
                color: #ffffff;
            }

            html[data-theme="dark"] #milestones + .ck-editor .ck-toolbar {
                background: #1e293b;
                border-bottom-color: #475569;
            }

            html[data-theme="dark"] #milestones + .ck-editor .ck-editor__main > .ck-editor__editable {
                background: #0f172a;
                color: #e2e8f0;
            }

            html[data-theme="dark"] #milestones + .ck-editor .ck-button,
            html[data-theme="dark"] #milestones + .ck-editor .ck-button .ck-button__label,
            html[data-theme="dark"] #milestones + .ck-editor .ck-dropdown__button .ck-button__label {
                color: #e2e8f0;
            }

            html[data-theme="dark"] #milestones + .ck-editor .ck-button:not(.ck-disabled):hover,
            html[data-theme="dark"] #milestones + .ck-editor .ck-button.ck-on {
                background: #334155;
            }

            html[data-theme="dark"] #milestones + .ck-editor .ck-button .ck-icon,
            html[data-theme="dark"] #milestones + .ck-editor .ck-button .ck-icon * {
                color: #e2e8f0;
            }
        </style>
    @endpush
@endonce

@once
    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor.create(document.querySelector('#milestones'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
            });
        </script>
    @endpush
@endonce
