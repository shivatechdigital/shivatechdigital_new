@php
    $milestonesText = old('milestones');
    if ($milestonesText === null && $clientProject?->milestones) {
        $milestonesText = collect($clientProject->milestones)->map(fn($m) => ($m['title'] ?? '') . '|' . ($m['status'] ?? '') . '|' . ($m['note'] ?? ''))->implode("\n");
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
    <div class="col-12"><label class="form-label">Milestones</label><textarea name="milestones" rows="5" class="form-control" placeholder="Title|Status|Note\nUI Design|Completed|Approved by client">{{ $milestonesText }}</textarea><small class="text-muted">One per line, format: Title|Status|Note</small></div>
    <div class="col-md-3"><label class="form-label">Active</label><select name="is_active" class="form-select"><option value="1" {{ old('is_active', $clientProject?->is_active ?? true ? '1' : '0') == '1' ? 'selected' : '' }}>Yes</option><option value="0" {{ old('is_active', $clientProject?->is_active ?? true ? '1' : '0') == '0' ? 'selected' : '' }}>No</option></select></div>
</div>
