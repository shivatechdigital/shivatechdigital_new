<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Models\TeamMember;
use App\Models\TimelineItem;
use App\Models\CoreValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:about.manage');
    }

    public function index()
    {
        $about = AboutPage::first() ?? new AboutPage();
        $teamMembers = TeamMember::ordered()->get();
        $timelineItems = TimelineItem::ordered()->get();
        $coreValues = CoreValue::ordered()->get();

        return view('adminDashboard.pages.about', compact('about', 'teamMembers', 'timelineItems', 'coreValues'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'page_badge' => 'required|string|max:255',
            'page_title' => 'required|string|max:255',
            'page_subtitle' => 'nullable|string',
            'years_experience' => 'required|integer|min:0',
            'projects_delivered' => 'required|integer|min:0',
            'team_members_count' => 'required|integer|min:0',
            'section_label' => 'required|string|max:255',
            'section_title' => 'required|string|max:255',
            'lead_text' => 'nullable|string',
            'description' => 'nullable|string',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'highlight_1_icon' => 'required|string|max:100',
            'highlight_1_title' => 'required|string|max:255',
            'highlight_1_text' => 'required|string|max:255',
            'highlight_2_icon' => 'required|string|max:100',
            'highlight_2_title' => 'required|string|max:255',
            'highlight_2_text' => 'required|string|max:255',
            'highlight_3_icon' => 'required|string|max:100',
            'highlight_3_title' => 'required|string|max:255',
            'highlight_3_text' => 'required|string|max:255',
            'founder_label' => 'required|string|max:255',
            'founder_name' => 'required|string|max:255',
            'founder_title' => 'required|string|max:255',
            'founder_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'founder_message' => 'nullable|string',
            'mission_text' => 'nullable|string',
            'vision_text' => 'nullable|string',
            'cta_title' => 'required|string|max:255',
            'cta_subtitle' => 'nullable|string|max:500',
        ]);

        $about = AboutPage::first() ?? new AboutPage();

        if ($request->hasFile('about_image')) {
            if ($about->about_image) {
                Storage::disk('public')->delete($about->about_image);
            }
            $validated['about_image'] = $request->file('about_image')->store('about', 'public');
        }

        if ($request->hasFile('founder_image')) {
            if ($about->founder_image) {
                Storage::disk('public')->delete($about->founder_image);
            }
            $validated['founder_image'] = $request->file('founder_image')->store('about/founder', 'public');
        }

        if ($about->exists) {
            $about->update($validated);
        } else {
            AboutPage::create($validated);
        }

        return redirect()->back()
            ->with('success', 'About page updated successfully!')
            ->with('active_tab', $request->input('active_tab', 'pills-header'));
    }

    public function storeTeamMember(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'linkedin_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'email' => 'nullable|email',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('team', 'public');
        }

        TeamMember::create($validated);

        return redirect()->back()
            ->with('success', 'Team member added successfully!')
            ->with('active_tab', $request->input('active_tab', 'pills-team'));
    }

    public function updateTeamMember(Request $request, TeamMember $teamMember)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'linkedin_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'email' => 'nullable|email',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
            'remove_image' => 'nullable|boolean',
        ]);
        
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $currentImage = $teamMember->image;

        if ($request->boolean('remove_image') && $currentImage) {
            Storage::disk('public')->delete($currentImage);
            $validated['image'] = null;
            $currentImage = null;
        }
        
        if ($request->hasFile('image')) {
            if ($currentImage) {
                Storage::disk('public')->delete($currentImage);
            }
            $validated['image'] = $request->file('image')->store('team', 'public');
        }
        
        $teamMember->update($validated);
        return redirect()->back()
            ->with('success', 'Team member updated successfully!')
            ->with('active_tab', $request->input('active_tab', 'pills-team'));
    }
    
    public function deleteTeamMember(Request $request, TeamMember $teamMember)
    {
        if ($teamMember->image) {
            Storage::disk('public')->delete($teamMember->image);
        }
        
        $teamMember->delete();
        return redirect()->back()
            ->with('success', 'Team member deleted successfully!')
            ->with('active_tab', $request->input('active_tab', 'pills-team'));
    }

    public function storeTimeline(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:100',
            'order' => 'required|integer|min:0',
        ]);

        TimelineItem::create($validated);

        return redirect()->back()
            ->with('success', 'Timeline item added successfully!')
            ->with('active_tab', $request->input('active_tab', 'pills-timeline'));
    }

    public function updateTimeline(Request $request, TimelineItem $timeline)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:100',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        
        $timeline->update($validated);

        return redirect()->back()
            ->with('success', 'Timeline item updated successfully!')
            ->with('active_tab', $request->input('active_tab', 'pills-timeline'));
    }

    public function deleteTimeline(Request $request, TimelineItem $timeline)
    {
        $timeline->delete();
        return redirect()->back()
            ->with('success', 'Timeline item deleted successfully!')
            ->with('active_tab', $request->input('active_tab', 'pills-timeline'));
    }

    public function storeCoreValue(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:100',
            'order' => 'required|integer|min:0',
        ]);

        CoreValue::create($validated);

        return redirect()->back()
            ->with('success', 'Core value added successfully!')
            ->with('active_tab', $request->input('active_tab', 'pills-values'));
    }

    public function updateCoreValue(Request $request, CoreValue $coreValue)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:100',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        
        $coreValue->update($validated);

        return redirect()->back()
            ->with('success', 'Core value updated successfully!')
            ->with('active_tab', $request->input('active_tab', 'pills-values'));
    }

    public function deleteCoreValue(Request $request, CoreValue $coreValue)
    {
        $coreValue->delete();
        return redirect()->back()
            ->with('success', 'Core value deleted successfully!')
            ->with('active_tab', $request->input('active_tab', 'pills-values'));
    }
}