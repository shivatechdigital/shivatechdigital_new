<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:partners.view')->only(['index']);
        $this->middleware('permission:partners.create')->only(['create', 'store']);
        $this->middleware('permission:partners.update')->only(['edit', 'update']);
        $this->middleware('permission:partners.delete')->only(['destroy', 'bulkDelete']);
    }

    public function index(Request $request)
    {
        $search = trim((string) $request->input('search', ''));
        $status = (string) $request->input('status', 'all');
        $logoFilter = (string) $request->input('logo_filter', 'all');
        $sortBy = (string) $request->input('sort_by', 'created');
        $sortOrder = strtolower((string) $request->input('sort_order', 'desc'));
        $allowedPerPage = [10, 20, 50, 100];
        $perPage = (int) $request->input('per_page', 10);

        if (!in_array($perPage, $allowedPerPage, true)) {
            $perPage = 10;
        }

        if (!in_array($sortOrder, ['asc', 'desc'], true)) {
            $sortOrder = 'desc';
        }

        $sortMap = [
            'number' => 'id',
            'name' => 'name',
            'type' => 'type',
            'location' => 'location',
            'status' => 'status',
            'created' => 'created_at',
        ];

        if (!array_key_exists($sortBy, $sortMap)) {
            $sortBy = 'created';
        }

        $partners = $this->buildPartnersQuery($search, $status, $logoFilter)
            ->orderBy($sortMap[$sortBy], $sortOrder)
            ->paginate($perPage)
            ->appends($request->query());

        return view('adminDashboard.pages.partners.index', compact(
            'partners',
            'search',
            'status',
            'logoFilter',
            'sortBy',
            'sortOrder',
            'perPage'
        ));
    }

    /**
     * Frontend: Single Partner Page
     */
    public function show($slug)
    {
        $partner = Partner::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        return view('adminDashboard.pages.partners.show', compact('partner'));
    }
    
    public function create()
    {
        return view('adminDashboard.pages.partners.create');
    }

    /**
     * Admin: Store Partner
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp',
            'location' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        $logoPath = null;

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('partners', 'public');
        }

        Partner::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'logo' => $logoPath,
            'location' => $request->location,
            'type' => $request->type,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Partner added successfully');
    }

    public function edit(Partner $partner)
    {
        return view('adminDashboard.pages.partners.edit', compact('partner'));
    }
    
    /**
     * Admin: Update Partner
     */
    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image',
            'remove_logo' => 'nullable|boolean',
            'location' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        if ($request->boolean('remove_logo') && $partner->logo) {
            Storage::disk('public')->delete($partner->logo);
            $partner->logo = null;
        }

        if ($request->hasFile('logo')) {
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }
            $partner->logo = $request->file('logo')->store('partners', 'public');
        }

        $partner->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'location' => $request->location,
            'type' => $request->type,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Partner updated successfully');
    }

    /**
     * Admin: Delete Partner
     */
    public function destroy(Partner $partner)
    {
        if ($partner->logo) {
            Storage::disk('public')->delete($partner->logo);
        }

        $partner->delete();
        return redirect()->back()->with('success', 'Partner deleted successfully');
    }

    public function bulkDelete(Request $request)
    {
        $validated = $request->validate([
            'partner_ids' => 'required|array|min:1',
            'partner_ids.*' => 'exists:partners,id',
        ]);

        $partners = Partner::whereIn('id', $validated['partner_ids'])->get();

        foreach ($partners as $partner) {
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }
            $partner->delete();
        }

        return redirect()->route('partners.index')
            ->with('success', 'Selected partners deleted successfully');
    }

    private function buildPartnersQuery(string $search, string $status, string $logoFilter)
    {
        $query = Partner::query();

        if ($search !== '') {
            $query->where(function ($innerQuery) use ($search) {
                $innerQuery->where('name', 'like', '%' . $search . '%')
                    ->orWhere('slug', 'like', '%' . $search . '%')
                    ->orWhere('type', 'like', '%' . $search . '%')
                    ->orWhere('location', 'like', '%' . $search . '%');
            });
        }

        if ($status === 'active') {
            $query->where('status', 1);
        } elseif ($status === 'inactive') {
            $query->where('status', 0);
        }

        if ($logoFilter === 'with_logo') {
            $query->whereNotNull('logo')->where('logo', '!=', '');
        } elseif ($logoFilter === 'without_logo') {
            $query->where(function ($innerQuery) {
                $innerQuery->whereNull('logo')->orWhere('logo', '');
            });
        }

        return $query;
    }
}
