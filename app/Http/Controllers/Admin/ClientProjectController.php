<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientProject;
use App\Models\User;
use Illuminate\Http\Request;

class ClientProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:clientprojects.view')->only(['index']);
        $this->middleware('permission:clientprojects.create')->only(['create', 'store']);
        $this->middleware('permission:clientprojects.update')->only(['edit', 'update']);
        $this->middleware('permission:clientprojects.delete')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $status = (string) $request->input('status', 'all');
        $search = trim((string) $request->input('search', ''));

        $query = ClientProject::with('user')->latest('last_updated_at');

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('project_type', 'like', "%{$search}%")
                    ->orWhereHas('user', fn($uq) => $uq->where('name', 'like', "%{$search}%"));
            });
        }

        $projects = $query->paginate(10)->appends($request->query());
        $statusLabels = ClientProject::statusLabels();

        return view('adminDashboard.pages.client-projects.index', compact('projects', 'status', 'search', 'statusLabels'));
    }

    public function create()
    {
        $users = User::orderBy('name')->get(['id', 'name', 'email']);
        $statusLabels = ClientProject::statusLabels();

        return view('adminDashboard.pages.client-projects.create', compact('users', 'statusLabels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'project_type' => 'nullable|string|max:255',
            'status' => 'required|in:planning,in_progress,in_review,qa_testing,completed,on_hold',
            'progress' => 'required|integer|min:0|max:100',
            'start_date' => 'nullable|date',
            'estimated_delivery_date' => 'nullable|date',
            'client_note' => 'nullable|string',
            'milestones' => 'nullable|string',
            'is_active' => 'required|boolean',
        ]);

        ClientProject::create([
            ...$validated,
            'milestones' => $this->parseMilestones($validated['milestones'] ?? null),
        ]);

        return redirect()->route('admin.client-projects.index')->with('success', 'Client project created successfully.');
    }

    public function edit(ClientProject $clientProject)
    {
        $users = User::orderBy('name')->get(['id', 'name', 'email']);
        $statusLabels = ClientProject::statusLabels();

        return view('adminDashboard.pages.client-projects.edit', compact('clientProject', 'users', 'statusLabels'));
    }

    public function update(Request $request, ClientProject $clientProject)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'project_type' => 'nullable|string|max:255',
            'status' => 'required|in:planning,in_progress,in_review,qa_testing,completed,on_hold',
            'progress' => 'required|integer|min:0|max:100',
            'start_date' => 'nullable|date',
            'estimated_delivery_date' => 'nullable|date',
            'client_note' => 'nullable|string',
            'milestones' => 'nullable|string',
            'is_active' => 'required|boolean',
        ]);

        $clientProject->update([
            ...$validated,
            'milestones' => $this->parseMilestones($validated['milestones'] ?? null),
        ]);

        return redirect()->route('admin.client-projects.index')->with('success', 'Client project updated successfully.');
    }

    public function destroy(ClientProject $clientProject)
    {
        $clientProject->delete();

        return back()->with('success', 'Client project deleted.');
    }

    private function parseMilestones(?string $input): ?array
    {
        $content = $this->sanitizeMilestoneContent($input);

        if ($content === '') {
            return null;
        }

        return [[
            'title' => 'Milestones',
            'status' => '',
            'note' => $content,
        ]];
    }

    private function sanitizeMilestoneContent(?string $input): string
    {
        if (!$input) {
            return '';
        }

        $content = strip_tags($input, '<h2><h3><h4><p><strong><b><em><i><u><ol><ul><li><br>');
        $content = preg_replace('/<([a-z0-9]+)\b[^>]*>/i', '<$1>', $content) ?? '';

        return trim($content);
    }
}
