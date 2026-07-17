<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Models\TeamMember;
use App\Models\TimelineItem;
use App\Models\CoreValue;

class AboutController extends Controller
{
    public function index()
    {
        $about = AboutPage::where('is_active', true)->first() ?? new AboutPage();
        $teamMembers = TeamMember::active()->ordered()->get();
        $timelineItems = TimelineItem::active()->ordered()->get();
        $coreValues = CoreValue::active()->ordered()->get();

        return view('website.pages.about', compact('about', 'teamMembers', 'timelineItems', 'coreValues'));
    }
}