<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CaseStudyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:casestudies.view')->only(['index']);
        $this->middleware('permission:casestudies.create')->only(['create', 'store']);
        $this->middleware('permission:casestudies.update')->only(['edit', 'update']);
        $this->middleware('permission:casestudies.delete')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $search = trim((string) $request->input('search', ''));
        $status = (string) $request->input('status', 'all');

        $query = CaseStudy::query();

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('industry', 'like', "%{$search}%")
                  ->orWhere('client_name', 'like', "%{$search}%")
                  ->orWhere('project_type', 'like', "%{$search}%");
            });
        }

        if ($status === 'active') {
            $query->where('is_active', true);
        } elseif ($status === 'inactive') {
            $query->where('is_active', false);
        }

        $caseStudies = $query->orderByDesc('is_featured')
            ->orderBy('order')
            ->orderByDesc('created_at')
            ->paginate(10)
            ->appends($request->query());

        return view('adminDashboard.pages.case-studies.index', compact('caseStudies', 'search', 'status'));
    }

    public function create()
    {
        return view('adminDashboard.pages.case-studies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'industry' => 'nullable|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'project_type' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:3072',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'results' => 'nullable|string',
            'result_metrics' => 'nullable|string',
            'technologies' => 'nullable|string',
            'is_featured' => 'required|boolean',
            'is_active' => 'required|boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $thumbnail = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')->store('case-studies', 'public');
        }

        CaseStudy::create([
            'title' => $validated['title'],
            'industry' => $validated['industry'] ?? null,
            'client_name' => $validated['client_name'] ?? null,
            'project_type' => $validated['project_type'] ?? null,
            'thumbnail' => $thumbnail,
            'challenge' => $validated['challenge'] ?? null,
            'solution' => $validated['solution'] ?? null,
            'results' => $validated['results'] ?? null,
            'result_metrics' => $this->parseMetrics($validated['result_metrics'] ?? null),
            'technologies' => $this->parseCommaString($validated['technologies'] ?? null),
            'is_featured' => (bool) $validated['is_featured'],
            'is_active' => (bool) $validated['is_active'],
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.case-studies.index')->with('success', 'Case study created successfully.');
    }

    public function edit(CaseStudy $caseStudy)
    {
        return view('adminDashboard.pages.case-studies.edit', compact('caseStudy'));
    }

    public function update(Request $request, CaseStudy $caseStudy)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'industry' => 'nullable|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'project_type' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:3072',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'results' => 'nullable|string',
            'result_metrics' => 'nullable|string',
            'technologies' => 'nullable|string',
            'is_featured' => 'required|boolean',
            'is_active' => 'required|boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $thumbnail = $caseStudy->thumbnail;
        if ($request->hasFile('thumbnail')) {
            if ($thumbnail) {
                Storage::disk('public')->delete($thumbnail);
            }
            $thumbnail = $request->file('thumbnail')->store('case-studies', 'public');
        }

        $caseStudy->update([
            'title' => $validated['title'],
            'industry' => $validated['industry'] ?? null,
            'client_name' => $validated['client_name'] ?? null,
            'project_type' => $validated['project_type'] ?? null,
            'thumbnail' => $thumbnail,
            'challenge' => $validated['challenge'] ?? null,
            'solution' => $validated['solution'] ?? null,
            'results' => $validated['results'] ?? null,
            'result_metrics' => $this->parseMetrics($validated['result_metrics'] ?? null),
            'technologies' => $this->parseCommaString($validated['technologies'] ?? null),
            'is_featured' => (bool) $validated['is_featured'],
            'is_active' => (bool) $validated['is_active'],
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.case-studies.index')->with('success', 'Case study updated successfully.');
    }

    public function destroy(CaseStudy $caseStudy)
    {
        if ($caseStudy->thumbnail) {
            Storage::disk('public')->delete($caseStudy->thumbnail);
        }

        $caseStudy->delete();

        return back()->with('success', 'Case study deleted.');
    }

    private function parseCommaString(?string $input): ?array
    {
        if (!$input) {
            return null;
        }

        $items = array_values(array_filter(array_map('trim', explode(',', $input))));

        return empty($items) ? null : $items;
    }

    private function parseMetrics(?string $input): ?array
    {
        if (!$input) {
            return null;
        }

        $lines = preg_split('/\r\n|\r|\n/', $input) ?: [];
        $metrics = [];

        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '') {
                continue;
            }

            [$label, $value] = array_pad(array_map('trim', explode('|', $line, 2)), 2, '');
            if ($label === '' && $value === '') {
                continue;
            }

            $metrics[] = ['label' => $label, 'value' => $value];
        }

        return empty($metrics) ? null : $metrics;
    }
}
