<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::oldest()->paginate(10);
        return view('adminDashboard.pages.partners.index', compact('partners'));
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
            'location' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('logo')) {
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
        $partner->delete();
        return redirect()->back()->with('success', 'Partner deleted successfully');
    }
}
