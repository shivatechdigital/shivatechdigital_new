<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobOpening;
use Illuminate\Http\Request;

class JobOpeningController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:jobs.view')->only(['index']);
        $this->middleware('permission:jobs.create')->only(['create', 'store']);
        $this->middleware('permission:jobs.update')->only(['edit', 'update']);
        $this->middleware('permission:jobs.delete')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $search = trim((string) $request->input('search', ''));
        $status = (string) $request->input('status', 'all');

        $query = JobOpening::query();

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('department', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('experience_level', 'like', "%{$search}%");
            });
        }

        if ($status === 'active') {
            $query->where('is_active', true);
        } elseif ($status === 'inactive') {
            $query->where('is_active', false);
        }

        $jobs = $query->orderBy('order')->orderByDesc('created_at')->paginate(10)->appends($request->query());
        $employmentTypes = JobOpening::employmentTypeLabels();

        return view('adminDashboard.pages.jobs.index', compact('jobs', 'search', 'status', 'employmentTypes'));
    }

    public function create()
    {
        $employmentTypes = JobOpening::employmentTypeLabels();

        return view('adminDashboard.pages.jobs.create', compact('employmentTypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'employment_type' => 'required|in:full_time,part_time,contract,internship,freelance',
            'experience_level' => 'nullable|string|max:255',
            'salary_range' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'requirements' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'is_active' => 'required|boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        JobOpening::create([
            'title' => $validated['title'],
            'department' => $validated['department'] ?? null,
            'location' => $validated['location'] ?? 'Noida / Remote',
            'employment_type' => $validated['employment_type'],
            'experience_level' => $validated['experience_level'] ?? null,
            'salary_range' => $validated['salary_range'] ?? null,
            'summary' => $validated['summary'] ?? null,
            'requirements' => $this->parseLineItems($validated['requirements'] ?? null),
            'responsibilities' => $this->parseLineItems($validated['responsibilities'] ?? null),
            'is_active' => (bool) $validated['is_active'],
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.jobs.index')->with('success', 'Job opening created successfully.');
    }

    public function edit(JobOpening $job)
    {
        $employmentTypes = JobOpening::employmentTypeLabels();

        return view('adminDashboard.pages.jobs.edit', compact('job', 'employmentTypes'));
    }

    public function update(Request $request, JobOpening $job)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'employment_type' => 'required|in:full_time,part_time,contract,internship,freelance',
            'experience_level' => 'nullable|string|max:255',
            'salary_range' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'requirements' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'is_active' => 'required|boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $job->update([
            'title' => $validated['title'],
            'department' => $validated['department'] ?? null,
            'location' => $validated['location'] ?? 'Noida / Remote',
            'employment_type' => $validated['employment_type'],
            'experience_level' => $validated['experience_level'] ?? null,
            'salary_range' => $validated['salary_range'] ?? null,
            'summary' => $validated['summary'] ?? null,
            'requirements' => $this->parseLineItems($validated['requirements'] ?? null),
            'responsibilities' => $this->parseLineItems($validated['responsibilities'] ?? null),
            'is_active' => (bool) $validated['is_active'],
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.jobs.index')->with('success', 'Job opening updated successfully.');
    }

    public function destroy(JobOpening $job)
    {
        $job->delete();

        return back()->with('success', 'Job opening deleted.');
    }

    private function parseLineItems(?string $input): ?array
    {
        if (!$input) {
            return null;
        }

        $items = preg_split('/\r\n|\r|\n/', $input) ?: [];
        $items = array_values(array_filter(array_map(fn($item) => trim($item), $items)));

        return empty($items) ? null : $items;
    }
}
