<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:testimonials.view')->only(['index']);
        $this->middleware('permission:testimonials.create')->only(['create', 'store']);
        $this->middleware('permission:testimonials.update')->only(['edit', 'update']);
        $this->middleware('permission:testimonials.delete')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $search   = trim((string) $request->input('search', ''));
        $status   = (string) $request->input('status', 'all');
        $featured = (string) $request->input('featured', 'all');
        $perPage  = (int) $request->input('per_page', 10);

        if (!in_array($perPage, [10, 20, 50, 100], true)) {
            $perPage = 10;
        }

        $query = Testimonial::query();

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('client_name', 'like', "%{$search}%")
                  ->orWhere('client_company', 'like', "%{$search}%")
                  ->orWhere('review', 'like', "%{$search}%");
            });
        }

        if ($status === 'active') {
            $query->where('is_active', true);
        } elseif ($status === 'inactive') {
            $query->where('is_active', false);
        }

        if ($featured === 'yes') {
            $query->where('is_featured', true);
        } elseif ($featured === 'no') {
            $query->where('is_featured', false);
        }

        $testimonials = $query->orderBy('order')->orderByDesc('created_at')
            ->paginate($perPage)
            ->appends($request->query());

        return view('adminDashboard.pages.testimonials.index', compact(
            'testimonials', 'search', 'status', 'featured', 'perPage'
        ));
    }

    public function create()
    {
        return view('adminDashboard.pages.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name'    => 'required|string|max:255',
            'client_role'    => 'nullable|string|max:255',
            'client_company' => 'nullable|string|max:255',
            'client_photo'   => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'rating'         => 'required|integer|min:1|max:5',
            'review'         => 'required|string|max:1000',
            'service_type'   => 'nullable|string|max:255',
            'is_featured'    => 'required|boolean',
            'is_active'      => 'required|boolean',
            'order'          => 'nullable|integer|min:0',
        ]);

        $photoPath = null;
        if ($request->hasFile('client_photo')) {
            $photoPath = $request->file('client_photo')->store('testimonials', 'public');
        }

        Testimonial::create([
            'client_name'    => $validated['client_name'],
            'client_role'    => $validated['client_role'] ?? null,
            'client_company' => $validated['client_company'] ?? null,
            'client_photo'   => $photoPath,
            'rating'         => $validated['rating'],
            'review'         => $validated['review'],
            'service_type'   => $validated['service_type'] ?? null,
            'is_featured'    => $validated['is_featured'],
            'is_active'      => $validated['is_active'],
            'order'          => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial added successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('adminDashboard.pages.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'client_name'    => 'required|string|max:255',
            'client_role'    => 'nullable|string|max:255',
            'client_company' => 'nullable|string|max:255',
            'client_photo'   => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'rating'         => 'required|integer|min:1|max:5',
            'review'         => 'required|string|max:1000',
            'service_type'   => 'nullable|string|max:255',
            'is_featured'    => 'required|boolean',
            'is_active'      => 'required|boolean',
            'order'          => 'nullable|integer|min:0',
        ]);

        $photoPath = $testimonial->client_photo;

        if ($request->hasFile('client_photo')) {
            if ($photoPath) {
                Storage::disk('public')->delete($photoPath);
            }
            $photoPath = $request->file('client_photo')->store('testimonials', 'public');
        }

        $testimonial->update([
            'client_name'    => $validated['client_name'],
            'client_role'    => $validated['client_role'] ?? null,
            'client_company' => $validated['client_company'] ?? null,
            'client_photo'   => $photoPath,
            'rating'         => $validated['rating'],
            'review'         => $validated['review'],
            'service_type'   => $validated['service_type'] ?? null,
            'is_featured'    => $validated['is_featured'],
            'is_active'      => $validated['is_active'],
            'order'          => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->client_photo) {
            Storage::disk('public')->delete($testimonial->client_photo);
        }
        $testimonial->delete();

        return redirect()->back()->with('success', 'Testimonial deleted.');
    }
}
