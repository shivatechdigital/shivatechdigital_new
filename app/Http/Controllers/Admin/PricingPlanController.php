<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPlan;
use Illuminate\Http\Request;

class PricingPlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:pricing.view')->only(['index']);
        $this->middleware('permission:pricing.create')->only(['create', 'store']);
        $this->middleware('permission:pricing.update')->only(['edit', 'update']);
        $this->middleware('permission:pricing.delete')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $category = (string) $request->input('category', 'all');

        $query = PricingPlan::query();
        if ($category !== 'all') {
            $query->where('category', $category);
        }

        $plans = $query->orderBy('category')->orderBy('sort_order')->orderByDesc('created_at')->paginate(12);
        $categories = PricingPlan::categoryLabels();

        return view('adminDashboard.pages.pricing.index', compact('plans', 'categories', 'category'));
    }

    public function create()
    {
        $categories = PricingPlan::categoryLabels();

        return view('adminDashboard.pages.pricing.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|in:website,mobile,seo,maintenance',
            'title' => 'required|string|max:255',
            'price_label' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'features' => 'nullable|string',
            'is_popular' => 'required|boolean',
            'is_active' => 'required|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        PricingPlan::create([
            ...$validated,
            'features' => $this->parseLineItems($validated['features'] ?? null),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.pricing.index')->with('success', 'Pricing plan created successfully.');
    }

    public function edit(PricingPlan $plan)
    {
        $categories = PricingPlan::categoryLabels();

        return view('adminDashboard.pages.pricing.edit', compact('plan', 'categories'));
    }

    public function update(Request $request, PricingPlan $plan)
    {
        $validated = $request->validate([
            'category' => 'required|in:website,mobile,seo,maintenance',
            'title' => 'required|string|max:255',
            'price_label' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'features' => 'nullable|string',
            'is_popular' => 'required|boolean',
            'is_active' => 'required|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $plan->update([
            ...$validated,
            'features' => $this->parseLineItems($validated['features'] ?? null),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.pricing.index')->with('success', 'Pricing plan updated successfully.');
    }

    public function destroy(PricingPlan $plan)
    {
        $plan->delete();

        return back()->with('success', 'Pricing plan deleted.');
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
