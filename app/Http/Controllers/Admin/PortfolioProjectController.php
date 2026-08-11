<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PortfolioProject;
use Illuminate\Support\Facades\Storage;

class PortfolioProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:portfolio.view')->only(['index']);
        $this->middleware('permission:portfolio.create')->only(['create', 'store']);
        $this->middleware('permission:portfolio.update')->only(['edit', 'update']);
        $this->middleware('permission:portfolio.delete')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $search   = trim((string) $request->input('search', ''));
        $category = (string) $request->input('category', 'all');
        $status   = (string) $request->input('status', 'all');
        $perPage  = (int) $request->input('per_page', 10);

        if (!in_array($perPage, [10, 20, 50, 100], true)) {
            $perPage = 10;
        }

        $query = PortfolioProject::query();

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('client_name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($category !== 'all') {
            $query->where('category', $category);
        }

        if ($status === 'active') {
            $query->where('is_active', true);
        } elseif ($status === 'inactive') {
            $query->where('is_active', false);
        }

        $projects   = $query->orderBy('order')->orderByDesc('created_at')
                            ->paginate($perPage)->appends($request->query());
        $categories = PortfolioProject::categoryLabels();

        return view('adminDashboard.pages.portfolio.index', compact(
            'projects', 'categories', 'search', 'category', 'status', 'perPage'
        ));
    }

    public function create()
    {
        $categories = PortfolioProject::categoryLabels();
        return view('adminDashboard.pages.portfolio.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'category'     => 'required|in:web,mobile,marketing,design,ecommerce',
            'description'  => 'nullable|string|max:500',
            'image'        => 'nullable|image|mimes:png,jpg,jpeg,webp|max:3072',
            'project_url'  => 'nullable|url|max:255',
            'client_name'  => 'nullable|string|max:255',
            'technologies' => 'nullable|string',
            'is_featured'  => 'required|boolean',
            'is_active'    => 'required|boolean',
            'order'        => 'nullable|integer|min:0',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('portfolio', 'public');
        }

        // Convert comma-separated technologies string to array
        $technologies = null;
        if (!empty($validated['technologies'])) {
            $technologies = array_filter(array_map('trim', explode(',', $validated['technologies'])));
            $technologies = array_values($technologies);
        }

        PortfolioProject::create([
            'title'        => $validated['title'],
            'category'     => $validated['category'],
            'description'  => $validated['description'] ?? null,
            'image'        => $imagePath,
            'project_url'  => $validated['project_url'] ?? null,
            'client_name'  => $validated['client_name'] ?? null,
            'technologies' => $technologies,
            'is_featured'  => $validated['is_featured'],
            'is_active'    => $validated['is_active'],
            'order'        => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio project added successfully.');
    }

    public function edit(PortfolioProject $portfolio)
    {
        $categories = PortfolioProject::categoryLabels();
        return view('adminDashboard.pages.portfolio.edit', compact('portfolio', 'categories'));
    }

    public function update(Request $request, PortfolioProject $portfolio)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'category'     => 'required|in:web,mobile,marketing,design,ecommerce',
            'description'  => 'nullable|string|max:500',
            'image'        => 'nullable|image|mimes:png,jpg,jpeg,webp|max:3072',
            'project_url'  => 'nullable|url|max:255',
            'client_name'  => 'nullable|string|max:255',
            'technologies' => 'nullable|string',
            'is_featured'  => 'required|boolean',
            'is_active'    => 'required|boolean',
            'order'        => 'nullable|integer|min:0',
        ]);

        $imagePath = $portfolio->image;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('portfolio', 'public');
        }

        $technologies = $portfolio->technologies;
        if ($request->has('technologies')) {
            if (!empty($validated['technologies'])) {
                $technologies = array_values(array_filter(array_map('trim', explode(',', $validated['technologies']))));
            } else {
                $technologies = null;
            }
        }

        $portfolio->update([
            'title'        => $validated['title'],
            'category'     => $validated['category'],
            'description'  => $validated['description'] ?? null,
            'image'        => $imagePath,
            'project_url'  => $validated['project_url'] ?? null,
            'client_name'  => $validated['client_name'] ?? null,
            'technologies' => $technologies,
            'is_featured'  => $validated['is_featured'],
            'is_active'    => $validated['is_active'],
            'order'        => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio project updated successfully.');
    }

    public function destroy(PortfolioProject $portfolio)
    {
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }
        $portfolio->delete();

        return redirect()->back()->with('success', 'Project deleted.');
    }
}
